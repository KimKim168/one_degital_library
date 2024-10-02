<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\LinkSocialMedia;
use Illuminate\Http\Request;

class LinkSocialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $links = LinkSocialMedia::all();
        return view('admin.link-socails.index', ['links'=> $links]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //return view('admin.link_socail_media.create', ['link'=> LinkSocialMedia::all()]);
        return view('admin.link-socails.create');
    }

    /**
     * Store a newly created resource in storage.
     */
   
    
    public function store(Request $request)
    {   
        
        $request->validate([
            'name' => 'required|string|max:255',
            'logo_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Image validation
        ]);

        $input = $request->all(); //Retrieve all input data from the request.
        $image = $request->file('logo_image'); //Retrieve the Uploaded image file.
       
        if(!empty($image)){
            $filename = time() . $image->getClientOriginalName();
            $image->move(public_path('assets/images/links/'), $filename);
            
            $input['logo_image'] = $filename;
        }
        LinkSocialMedia::create($input);
        return redirect()->route('admin.links.index')->with('success', 'created successfully.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(LinkSocialMedia $linkSocialMedia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $link = LinkSocialMedia::find($id);
        return view('admin.link-socails.edit', ['links'=> $link]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $link = LinkSocialMedia::find($id);
        $input = $request->all();
        $image = $request->file('logo_image');
        if(!empty($image)){
            $filename = time() . $image->getClientOriginalName();
            $image->move(public_path('assets/images/links/'), $filename);
            
            $input['logo_image'] = $filename;
        }

        $link->update($input);

        return redirect()->route('admin.links.index')->with('success', 'link updated successfully.');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        LinkSocialMedia::find($id)->delete();
        return redirect()->route('admin.links.index')->with('success','Delete Success');
    }


 
}