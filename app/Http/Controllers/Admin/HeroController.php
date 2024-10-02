<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Hero;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(Hero $hero)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    
     public function edit()
     {
        $hero = Hero::findOrFail(1); // Static ID 1
        return view('admin.hero.edit', compact('hero'));
     }

    public function update(Request $request){

     $request->validate([
         'title' => 'required|string|max:255',
         'description' => 'required|string|max:1000',
         'placeholder' => 'required|string|max:255',
         'button_title' => 'required|string|max:255',
     ]);

     $hero = Hero::findOrFail(1);


     // Update hero attributes
     $hero->title = $request->input('title');
     $hero->description = $request->input('description');
     $hero->placeholder = $request->input('placeholder');
     $hero->button_title = $request->input('button_title');

     if ($request->hasFile('image')) {
         $image = $request->file('image');
         $filename = time() . '_' . $image->getClientOriginalName();
         $image->move(public_path('assets/images/heroes/'), $filename);
         $hero->image = $filename;
     }

     $hero->save();


     return redirect()->back()->with('success', 'Hero updated successfully');
 }

 /**
  * Remove the specified resource from storage.
  */
public function destroy(Hero $hero){

}
}