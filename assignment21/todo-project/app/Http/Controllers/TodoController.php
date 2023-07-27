<?php

namespace App\Http\Controllers;

use App\Http\Middleware\TokenVerifyMiddleware;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware([TokenVerifyMiddleware::class], ['except' => ['index', 'show']]);
    }

    public function index(Request $request)
    {
        $todos = Todo::where('user_id', $request->userID)->get();
        return response()->json($todos);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $todo = new Todo([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->header('id'),
        ]);

        $todo->save();

        return response()->json(['message' => 'Todo created successfully.', 'todo' => $todo], 201);
    }

    public function show(Request $request, $id)
    {
        $todo = Todo::find($id);

        if (!$todo || $todo->user_id !== $request->userID) {
            return response()->json(['message' => 'Todo not found.'], 404);
        }

        return response()->json($todo);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $todo = Todo::find($id);

        if (!$todo || $todo->user_id !== $request->userID) {
            return response()->json(['message' => 'Todo not found.'], 404);
        }

        $todo->title = $request->title;
        $todo->description = $request->description;
        $todo->save();

        return response()->json(['message' => 'Todo updated successfully.', 'todo' => $todo]);
    }

    public function destroy(Request $request, $id)
    {
        $todo = Todo::find($id);

        if (!$todo || $todo->user_id !== $request->userID) {
            return response()->json(['message' => 'Todo not found.'], 404);
        }

        $todo->delete();

        return response()->json(['message' => 'Todo deleted successfully.']);
    }
}
