<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    /**s
     * Display a listing of the resource.
     */
    public function index()
    { 
        $features = Feature::paginate(5);
        return view('admin.features.index', compact('features'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.features.create');
      
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
            $image->move(public_path('assets/images/features/'), $filename);
            
            $input['image'] = $filename;
        }
        $feature = Feature::create($input);
        
        return redirect()->route('admin.features.index')->with('success','success', 'Slide created successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show(Feature $feature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
       $feature = Feature::findOrFail($id);
       return view('admin.features.edit',[
        'featureUpdate'=> $feature
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

        $feature = Feature::findOrFail($id);
        $input = $request->all();
        $image = $request->file('image');
        if(!empty($image)){
            $filename = time() . $image->getClientOriginalName();
            $image->move(public_path('assets/images/features/'), $filename);
            
            $input['image'] = $filename;
        }

        $feature->update($input);

        return redirect()->route('admin.features.index')->with('success', 'Slide updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $feature = Feature::findOrFail($id);
        $feature->delete();
        return redirect()->route('admin.features.index')->with('success','');
    }
}