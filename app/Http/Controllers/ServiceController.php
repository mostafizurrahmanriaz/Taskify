<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $provider = auth()->user()->provider;
        $services = Service::where('provider_id', $provider->id)->with('category')->get();

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
    public function store(ServiceRequest $request)
    {
        
       $data = $request->validated();

        $provider = auth()->user()->provider;

        if($request->hasFile('image')){
            $rename_img = time(). '.'. $request->file('image')->getClientOriginalExtension();
            $image = $request->file('image')->storeAs('images/service', $rename_img, 'public');

            $data['image'] = $rename_img;
            $data['provider_id'] = $provider->id;
            $data['status'] = 'Active';
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
        $service = Service::with('category')->find($id);
        $categoreis = Category::all();
        return view('provider.services__edit', compact('service', 'categoreis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceRequest $request, string $id)
    {
        $service = Service::find($id);
        $data = $request->validated();
        $provider = auth()->user()->provider;
        if($request->hasFile('image')){
            //delete old image
            if($service->image && Storage::disk('public')->exists('images/service/'.$service->image )){
                Storage::disk('public')->delete('images/service/'.$service->image);
            }
            // Upload new image
            $new_img = time().'.'. $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('images/service', $new_img, 'public');
            $data['image'] = $new_img;
            $data['provider_id'] = $provider->id;
        }
            Service::find($id)->update($data);
            return redirect()->route('provider.services');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Service::find($id);
        Storage::disk('public')->delete('images/service/' . $service->image);
        $service->delete();
        return redirect()->route('provider.services');
    }
}
