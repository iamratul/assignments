<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Exception;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function EventPage()
    {
        return view('pages.dashboard.event-page');
    }

    public function CreateEvent(Request $request)
    {
        try {
            $user_id = $request->header('id');
            $img = $request->file('image');
            $t = time();
            $file_name = $img->getClientOriginalName();
            $img_name = "{$user_id}-{$t}-{$file_name}";
            $img_url = "uploads/events/{$img_name}";

            $img->move(public_path('uploads/events'), $img_name);

            Event::create([
                'user_id' => $user_id,
                'category_id' => $request->input('category_id'),
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'date' => $request->input('date'),
                'time' => $request->input('time'),
                'location' => $request->input('location'),
                'seat' => $request->input('seat'),
                'price' => $request->input('price'),
                'image' => $img_url,
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Event Creation Successfull',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Event Creation Failed!',
            ]);
        }
    }

    public function EventList(Request $request)
    {
        $user_id = $request->header('id');
        // return Income::with('category')->where('user_id', $user_id)->get();

        $query = Event::with('category')->where('user_id', $user_id);

        // Apply filters
        if ($request->has('category')) {
            $query->where('category_id', $request->input('category'));
        }

        $data = $query->get();

        return response()->json($data);
    }

    public function EventDetails(Request $request)
    {
        $event_id = $request->input('id');
        $user_id = $request->header('id');
        // return Event::where('user_id', $user_id)->where('id', $event_id)->get();
    }

    public function UpdateEvent(Request $request)
    {
        $event_id = $request->input('id');
        $user_id = $request->header('id');
    }

    public function DeleteEvent(Request $request)
    {
        $event_id = $request->input('id');
        $user_id = $request->header('id');
        return Event::where('id', $event_id)->where('user_id', $user_id)->delete();
    }

    public function EventById(Request $request)
    {
        $event_id = $request->input('id');
        $user_id = $request->header('id');
        return Event::where('id', $event_id)->where('user_id', $user_id)->first();
    }
}
