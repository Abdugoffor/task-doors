<?php

namespace App\Http\Controllers;

use App\Models\Width;
use Illuminate\Http\Request;

class WidthController extends Controller
{
    public function index()
    {
        $models = Width::all();
        return view('width.index', ['models' => $models]);
    }
    public function store(Request $request)
    {
        $models = new Width();
        $request->validate([
            'name' => 'required',
        ]);
        $models->name = $request->name;
        $models->save();
        return redirect()->back()->with('text', 'Success fully !');
    }
    public function edit(Request $request, Width $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $id->name = $request->name;
        $id->save();
        return redirect()->back()->with('text', 'Edit !');
    }
    public function delete(Width $id)
    {
        $id->delete();
        return redirect()->back()->with('text', 'Delete !');
    }
}
