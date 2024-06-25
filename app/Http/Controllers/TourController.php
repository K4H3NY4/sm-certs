<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use Illuminate\Http\Request;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Tour::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
       
        $request->validate([
           'name' => 'required',
            'slug' => 'required',
            'price' => 'required'
        ]); 
       
        return Tour::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return Tour::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $tour = Tour::find($id);
        $tour->update($request->all());
        return Tour::find($id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
       return Tour::destroy($id);
    }


       /**
     * This will search a tour
     */
    public function search(string $name)
    {
        //
       return Tour::where('name', 'like', '%'.$name.'%')->get();
    }
}
