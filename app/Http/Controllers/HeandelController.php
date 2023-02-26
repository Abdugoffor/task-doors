<?php

namespace App\Http\Controllers;

use App\Models\Heandel;
use Illuminate\Http\Request;

class HeandelController extends Controller
{
    public function index()
    {
        $models = Heandel::all();
        return view('heandl.index', ['models' => $models]);
    }
    public function store(Request $request)
    {
        $models = new Heandel();
        $request->validate([
            'name' => 'required',
            'img' => 'required|mimes:jpg,png',
            'price' => 'required',
        ]);
        $models->name = $request->name;
        $models->price = $request->price;
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
    public function edit(Request $request, Heandel $id)
    {
        $request->validate([
            'name' => 'required',
            'img' => 'mimes:jpg,png',
            'price' => 'required',
        ]);
        $id->name = $request->name;
        $id->price = $request->price;
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
    public function delete(Heandel $id)
    {
        $id->delete();
        return redirect()->back()->with('text', 'Delete !');
    }
}
