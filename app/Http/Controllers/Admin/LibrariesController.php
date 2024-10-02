<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Libraries;
use Illuminate\Http\Request;

class LibrariesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $libraries =Libraries::paginate(5);
        return view('admin.libraries.index', compact('libraries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('admin.libraries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Image validation
        ]);

        $input = $request->all();
        $image = $request->file('image');
        if(!empty($image)){
            $filename = time() . '_' . $image->getClientOriginalName(); //23422234234image.png
            $image->move(public_path('assets/images/libraries/'), $filename);
            
            $input['image'] = $filename;
        }
        $library = Libraries::create($input);
        
        return redirect()->route('admin.libraries.index')->with('success','success', 'Libraries created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Libraries $libraries)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
       
        $library = Libraries::findOrFail($id);
        return view('admin.libraries.edit', [
            'library'=> $library
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $library = Libraries::find($id);
        $input = $request->all();
        $image = $request->file('image');
        
        if(!empty($image)){
            $filename = time() . '_' . $image->getClientOriginalName(); //23422234234image.png
            $image->move(public_path('assets/images/libraries/'), $filename);
            
            $input['image'] = $filename;
        }

        $library->update($input);

        return redirect()->route('admin.libraries.index')->with('success', 'Library updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $library = Libraries::findOrFail($id);
        $library->delete();
        return redirect()->route('admin.libraries.index')->with('success','Delete Library Successfull');
    }
}