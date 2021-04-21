<?php

namespace App\Http\Controllers\Activities;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminActivityController extends Controller
{
    public function index()
    {
        return view('activity.index');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'start' => 'required',
            'description' => 'required'
        ]);

        Activity::create([
            'title' => $request->title,
            'start' => date('Y-m-d H:i:s', strtotime($request->start)),
            'end' => date('Y-m-d H:i:s', strtotime($request->input('end', null))),
            'color' => $request->color,
            'description' => $request->description,
            'icon' => $request->icon
        ]);

        return redirect()->back()->with('success', 'Event berhasil ditambah');
    }

    public function destroy(Request $request)
    {
        $activity = Activity::find($request->id);
        if (!empty($activity)) {
            $activity->delete();
            return redirect()->back()->with('success', 'Event berhasil dihapus');
        } else {
            return redirect()->back()->with('success', 'Event gagal dihapus');
        }
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'start' => 'required',
            'description' => 'required'
        ]);

        $activity = Activity::where('id', $id)->first();
        $activity->title = $request->title;
        $activity->start = date('Y-m-d H:i:s', strtotime($request->start));
        $activity->end = date('Y-m-d H:i:s', strtotime($request->input('end', null)));
        $activity->color = $request->color;
        $activity->description = $request->description;
        $activity->icon = $request->icon;
        $activity->save();

        return redirect()->back()->with('success', 'Event berhasil diupdate');
    }
}
