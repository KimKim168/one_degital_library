<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $videos = video::all(); 
        return view('admin.videos.index',compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.videos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
            $image->move(public_path('assets/images/videos/'), $filename);
            
            $input['image'] = $filename;
        }

        $academy = Video::create($input);
     
        return redirect()->route('admin.videos.index')->with('success','');
    }

    /**
     * Display the specified resource.
     */
    public function show(video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $videos = Video::find($id);
        return view('admin.videos.edit', compact('videos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $videos = Video::find($id);
        $input = $request->all();
        $image = $request->file('image');
        
        if(!empty($image)){
            $filename = time() . $image->getClientOriginalName();
            $image->move(public_path('assets/images/videos/'), $filename);
            
            $input['image'] = $filename;
        }
        
        $videos->update($input);
        return redirect()->route('admin.videos.index')->with('success','');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $videos = Video::find($id);
        $videos->delete();
        return redirect()->route('admin.videos.index')->with('success','');
    }
}