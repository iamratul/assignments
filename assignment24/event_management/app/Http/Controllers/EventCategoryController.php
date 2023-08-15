<?php

namespace App\Http\Controllers;

use App\Models\EventCategory;
use Illuminate\Http\Request;

class EventCategoryController extends Controller
{
    public function EventCategoryPage()
    {
        return view('pages.dashboard.event-category-page');
    }

    public function EventCategoryList(Request $request)
    {
        $user_id = $request->header('id');
        return EventCategory::where('user_id', $user_id)->get();
    }

    public function CreateEventCategory(Request $request)
    {
        $user_id = $request->header('id');
        return EventCategory::create([
            'name' => $request->input('name'),
            'user_id' => $user_id
        ]);
    }

    public function UpdateEventCategory(Request $request)
    {
        $category_id = $request->input('id');
        $user_id = $request->header('id');
        return EventCategory::where('user_id', $user_id)->where('id', $category_id)->update([
            'name' => $request->input('name'),
        ]);
    }

    public function DeleteEventCategory(Request $request)
    {
        $category_id = $request->input('id');
        $user_id = $request->header('id');
        return EventCategory::where('id', $category_id)->where('user_id', $user_id)->delete();
    }

    public function EventCategoryById(Request $request)
    {
        $category_id = $request->input('id');
        $user_id = $request->header('id');
        return EventCategory::where('id', $category_id)->where('user_id', $user_id)->first();
    }
}
