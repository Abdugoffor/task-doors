<?php

namespace App\Http\Controllers;

use App\Models\Door;
use Illuminate\Http\Request;

class DoorController extends Controller
{
    public function index()
    {
        $models = Door::all();
        return view('door.index', ['models' => $models]);
    }
    public function store(Request $request)
    {
        $models = new Door();
        $request->validate([
            'name' => 'required',
            'img' => 'required|mimes:jpg,png',
        ]);
        $models->name = $request->name;
        if ($request->hasfile('img')) {
            $file = $request->file('img');
            $extensions = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extensions;
            $file->move('uploded/', $filename);
            $models->img = 'uploded/' . $filename;
        }
        $models->save();
        return redirect()->back()->with('text', 'Success fully !');
    }
    public function edit(Request $request, Door $id)
    {
        $request->validate([
            'name' => 'required',
            'img' => 'mimes:jpg,png',
        ]);
        $id->name = $request->name;
        if ($request->hasfile('img')) {
            $file = $request->file('img');
            $extensions = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extensions;
            $file->move('uploded/', $filename);
            $id->img = 'uploded/' . $filename;
        }
        $id->save();
        return redirect()->back()->with('text', 'Edit !');
    }
    public function delete(Door $id)
    {
        $id->delete();
        return redirect()->back()->with('text', 'Delete !');
    }
}
