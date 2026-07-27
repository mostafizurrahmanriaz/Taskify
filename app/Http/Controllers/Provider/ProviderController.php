<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProviderRequest;
use App\Models\Portfolio;
use App\Models\Provider;
use Illuminate\Http\Request;


class ProviderController extends Controller
{
    public function setupProfile(ProviderRequest $req){
        
        $data = $req->validated();
        if($req->hasFile('profile_image')){

        // Profile Image Upload 
        $new_profile = time(). '.'. $req->file('profile_image')->getClientOriginalExtension();
        $profile  =$req->file('profile_image')->storeAs('images/profile/', $new_profile, 'public');

        // Save file name to DB
        $data['profile_image'] = $new_profile;
        $data['user_id'] = auth()->id();

        }

       // Insert into database
       $provider =  Provider::create($data);

    return redirect()->route('provider.dashboard');
    }

    public function ProviderDashboard(){
        return view('provider/dashboard');
    }
    public function UserDashboard(){
        return view('home/index');
    }
}
