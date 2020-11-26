<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Records;

class HomeController extends Controller
{
    /*
    public function __construct()
    {
        $this->middleware('auth');
    }
    */
    
    public function index()
    {
        $record = new Records();
        return view('main', ['data' => $record->paginate(4)]);
    }

    public function add()
    {
        return view('add');
    }

    public function addPost(Request $request)
    {
        $valid = $request->validate([
            'name' => 'required|min:1|max:255',
            'year' => 'required|min:1800|max:2020|integer',
            'author' => 'required|min:1|max:255',
            'studio' => 'required|min:1|max:255',
            'image' => 'required|image'
        ]);

        $path = $request->file('image')->store('uploads', 'public');

        $record = new Records();
        $record->name = $request->input('name');
        $record->year = $request->input('year');
        $record->author = $request->input('author');
        $record->studio = $request->input('studio');
        $record->image = $path;

        $record->save();

        return redirect()->route('add');
    }

    public function edit($id)
    {
        $record = new Records();
        $itemRecord = $record->where('id', '=', $id)->get();
        return view('edit', ['data' => $itemRecord, 'id' => $id]);
    }

    public function editPost($id, Request $request)
    {
        
        $valid = $request->validate([
            'name' => 'required|min:1|max:255',
            'year' => 'required|min:1800|max:2020|integer',
            'author' => 'required|min:1|max:255',
            'studio' => 'required|min:1|max:255',
            'image' => 'image'
        ]);
        
        $record = new Records();
        $itemRecord = $record::find($id);
        $itemRecord->name = $request->input('name');
        $itemRecord->year = $request->input('year');
        $itemRecord->author = $request->input('author');
        $itemRecord->studio = $request->input('studio');
        if($request->file('image') != null){
            $path = $request->file('image')->store('uploads', 'public');
            $itemRecord->image = $path;
        }
        $itemRecord->save();

        return redirect()->route('home');
    }
    public function delete($id){
        $record = new Records();
        $itemRecord = $record::find($id);
        $itemRecord->delete();
        return redirect()->route('home');
    }
}
