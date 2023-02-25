<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        $models = Color::all();
        return view('color.index', ['models' => $models]);
    }
    public function store(Request $request)
    {
        $models = new Color();
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
    public function edit(Request $request, Color $id)
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
    public function delete(Color $id)
    {
        $id->delete();
        return redirect()->back()->with('text', 'Delete !');
    }
}
