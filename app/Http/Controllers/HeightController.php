<?php

namespace App\Http\Controllers;

use App\Models\Height;
use Illuminate\Http\Request;

class HeightController extends Controller
{
    public function index()
    {
        $models = Height::all();
        return view('height.index', ['models' => $models]);
    }
    public function store(Request $request)
    {
        $models = new Height();
        $request->validate([
            'name' => 'required',
        ]);
        // dd($request->all());
        $models->name = $request->name;
        $models->save();
        return redirect()->back()->with('text', 'Success fully !');
    }
    public function edit(Request $request, Height $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $id->name = $request->name;
        $id->save();
        return redirect()->back()->with('text', 'Edit !');
    }
    public function delete(Height $id)
    {
        $id->delete();
        return redirect()->back()->with('text', 'Delete !');
    }
}
