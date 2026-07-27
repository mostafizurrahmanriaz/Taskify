<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Service;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::with('category')->get();

        return view('provider.services', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('provider.services_form', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
       $data = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required',
        'price' => 'required|numeric',
        'category_id' => 'required',
        'image' => 'required|mimes:jpeg,jpg,png,svg|max:3000'
        ]);

        $provider = auth()->user()->provider;

        if($request->hasFile('image')){
            $rename_img = time(). '.'. $request->file('image')->getClientOriginalExtension();
            $image = $request->file('image')->storeAs('images/service', $rename_img, 'public');

            $data['image'] = $rename_img;
            $data['provider_id'] = $provider->id;
            $data['status'] = 'active';
        }
        Service::create($data);
        return redirect()->route('provider.services');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
