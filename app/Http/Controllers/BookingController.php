<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\http\Models\Booking;
use App\Models\Booking as ModelsBooking;
use App\Models\Category;

class BookingController extends Controller
{
        public function bookings (){
        return view('provider/bookings');
        }

        public function allBooking (){
        $provider = auth()->user()->id;
        $bookings = ModelsBooking::with('service')->with('user')->where('provider_id', $provider)->get();
        return response()->json($bookings);

        }
        public function view (string $id){
        return view('provider.booking__view', compact('id'));

        }
        public function info (string $id){
        $booking = ModelsBooking::with('service')->with('user')->find($id);
        $category_id =$booking->service->category_id;
        $category = Category::find($category_id);
        return response()->json([
                'booking' => $booking,
                'category' => $category
        ]); 

        }
        public function updateBooking(string $id, Request $req){
                $booking = ModelsBooking::find($id);
                $booking->status = $req->status;
                $update =  $booking->save();
                if($update){
                return response()->json('success');
                }else{
                return response()->json('something went wrong!');
                }
        }
}
