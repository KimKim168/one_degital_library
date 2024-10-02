<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Pricing;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pricing = Pricing::all();
        // return $pricing;
        return view('admin.prices.index', ['prices'=> $pricing]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pricing = Pricing::all();
        
        return view('admin.prices.create' , ['prices'=> $pricing]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=> 'required|string|max:255',
            'description' => 'nullable|string',
            'sub_title' => 'required|string|max:255',
            'sub_description' => 'required|string',
            'url'=> 'required|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
       
        $input = $request->all();
        $image = $request->file('img');
        
        if(!empty($image)){
            $filename = time() . $image->getClientOriginalName();
            $image->move(public_path('assets/images/prices/'), $filename);
            
            $input['img'] = $filename;
        }
        

        $pricing = Pricing::create($input);


        return redirect()->route('admin.prices.index')->with('success','');
        

    }

    /**
     * Display the specified resource.
     */
    public function show(Pricing $pricing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pricing = Pricing::findOrFail($id);  
        return view('admin.prices.edit', ['price'=> $pricing]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $price = Pricing::findOrFail($id);
        $input = $request->all();
        $image = $request->file('img');
        
        if(!empty($image)){
            $filename = time() . $image->getClientOriginalName();
            $image->move(public_path('assets/images/prices/'), $filename);
            
            $input['img'] = $filename;
        }

        $price->update($input);
        
        return redirect()->route('admin.prices.index')->with('success','');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pricing = Pricing::findOrFail($id);
        $pricing->delete();
        return redirect()->route('admin.prices.index')->with('success','');
        
    }
}