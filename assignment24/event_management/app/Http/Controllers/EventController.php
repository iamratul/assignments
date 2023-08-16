<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
        $query = Event::with('category')->where('user_id', $user_id);

        // Apply filters
        if ($request->has('category')) {
            $query->where('category_id', $request->input('category'));
        }

        $data = $query->get();
        return response()->json($data);
    }

    public function UpdateEvent(Request $request)
    {
        $event_id = $request->input('id');
        $user_id = $request->header('id');

        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $t = time();
            $file_name = $img->getClientOriginalName();
            $img_name = "{$user_id}-{$t}-{$file_name}";
            $img_url = "uploads/events/{$img_name}";

            $img->move(public_path('uploads/events'), $img_name);

            // Delete old image
            $file_path = $request->input('file_path');
            File::delete($file_path);

            // Update Event
            return Event::where('id', $event_id)->where('user_id', $user_id)->update([
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
        } else {
            // Update Event
            return Event::where('id', $event_id)->where('user_id', $user_id)->update([
                'category_id' => $request->input('category_id'),
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'date' => $request->input('date'),
                'time' => $request->input('time'),
                'location' => $request->input('location'),
                'seat' => $request->input('seat'),
                'price' => $request->input('price'),
            ]);
        }
    }

    public function DeleteEvent(Request $request)
    {
        $event_id = $request->input('id');
        $user_id = $request->header('id');
        $file_path = $request->input('file_path');
        File::delete($file_path);
        return Event::where('id', $event_id)->where('user_id', $user_id)->delete();
    }

    public function EventById(Request $request)
    {
        $event_id = $request->input('id');
        $user_id = $request->header('id');
        return Event::where('id', $event_id)->where('user_id', $user_id)->first();
    }
}
