<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Booking;

class UserController extends Controller
{
    public function dashboard(){
        
        $services = Service::where('status', 'Active')->with('provider')->take(6)->get();
        return view('home/index', compact('services'));
       }
    public function serviceDatails(string $id){

        $service = Service::find($id);
        $provider = $service->provider;
        $user = $service->provider->user;

         return view('user.service__details', compact('service', 'provider', 'user'));
       }

    public function bookingService(Request $req){
        $service = Service::find($req->service_id);
        $alreadybooked = Booking::where('service_id', $req->service_id)->where('status', 'pending')->exists();
       //preventing from dublicate booking 
        if($alreadybooked){
            return response()->json([
            'status' => 403
        ]);
        }
        //create booking 
      $booking =  Booking::create([
            'user_id' =>  auth()->id(),
            'provider_id' =>  $service->provider_id,
            'service_id' => $service->id,
            'status' => 'pending'
        ]);

        if($booking){
            return response()->json([
            'status' => 200
        ]);

        }else{
            return response()->json([
            'status' => 403
        ]);
        }
    }   

    public function bookinghistory(){
        $user_id  = auth()->user()->id;

        $booking__list = Booking::where('user_id', $user_id)->with(['service', 'provider.user'])->latest()->get();
        return view ('user.booking__history', compact('booking__list'));
    }
}
