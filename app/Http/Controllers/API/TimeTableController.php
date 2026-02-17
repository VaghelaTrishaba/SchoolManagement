<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Timetable;

class TimetableController extends Controller
{
    public function index()
    {
        return view('timetable');
    }

    public function getEvents()
    {
        return response()->json(Timetable::all());
    }

    public function store(Request $request)
    {
        $event = Timetable::create($request->all());
        return response()->json($event);
    }

    public function update(Request $request, $id)
    {
        $event = Timetable::findOrFail($id);
        $event->update($request->all());
        return response()->json($event);
    }

    public function destroy($id)
    {
        Timetable::findOrFail($id)->delete();
        return response()->json(['success' => true]);
    }
}
?>