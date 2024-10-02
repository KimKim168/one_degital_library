<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $support = Support::all();
        return view('admin.supports.index', compact('support'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.supports.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'title' => 'required|string|max:255',
           'description' => 'nullable|string', // Adjusted validation rule
        ]);
       

        $input = $request->all(); //Retrieve all input data from the request.
       
        Support::create($input);
        
        return redirect()->route('admin.supports.index')->with('success', 'created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Support $support)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $support = Support::findOrFail($id);
       return view('admin.supports.edit', compact('support'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
       
        $request->validate([
            'title' => 'required|string|max:255',
           'description' => 'nullable|string', // Adjusted validation rule
        ]);
   
        $support = Support::findOrFail($id);
        $input = $request->all();
        $support->update($input);
   
        return redirect()->route('admin.supports.index')->with('success', 'Support updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $support = Support::findOrFail($id);
        $support->delete();
        
        return redirect()->route('admin.supports.index')->with('success','');
    }
}