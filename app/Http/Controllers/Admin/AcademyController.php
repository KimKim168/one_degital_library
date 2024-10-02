<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Academy;
use Illuminate\Http\Request;

class AcademyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $academy = Academy::all();
        return view('admin.academies.index', compact('academy'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.academies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'video_title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'url' => 'required|url', // Ensuring the URL is valid
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        $input = $request->all();
        $image = $request->file('image');

        if(!empty($image)){
            $filename = time() . $image->getClientOriginalName();
            $image->move(public_path('assets/images/academies/'), $filename);
            
            $input['image'] = $filename;
        }

        $academy = Academy::create($input);
     
        return redirect()->route('admin.academies.index')->with('success','');

    }

    /**
     * Display the specified resource.
     */
    public function show(Academy $academy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $academy = Academy::find($id);
        return view('admin.academies.edit', compact('academy'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $academy = Academy::find($id);
        $input = $request->all();
        $image = $request->file('image');
        
        if(!empty($image)){
            $filename = time() . $image->getClientOriginalName();
            $image->move(public_path('assets/images/academies/'), $filename);
            
            $input['image'] = $filename;
        }
        
        $academy->update($input);
        return redirect()->route('admin.academies.index')->with('success','');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Academy::find($id)->delete();
        return redirect()->route('admin.academies.index')->with('success','');
    }
}