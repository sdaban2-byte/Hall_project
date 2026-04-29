<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Models\Hall;
use App\Models\Review;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    //

    public function home()
    {
        $halls = Hall::orderBy('updated_at', 'desc')->take(3)->get();
        $sliders = Slider::take(3)->get();
        $reviews = Review::all();

        return view('front.index', compact('halls', 'sliders', 'reviews'));
    }

    public function all_halls()
    {
        $halls = Hall::all();

        return view('front.all_halls', compact('halls'));
    }
    public function hall_detiles($id)
    {
        $halls = Hall::findOrFail($id);

        return view('front.hall_detiles', compact('halls'));
    }

    public function contactus()
    {

        return view('front.contact');
    }
    public function storeContact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'icon' => 'error',
                'title' => $validator->getMessageBag()->first(),
            ], 400);
        }

        $contactUs = new ContactUs();
        $contactUs->name = $request->name;
        $contactUs->email = $request->email;
        $contactUs->massege = $request->massege;
        $contactUs->save();

        return response()->json([
            'icon' => 'success',
            'title' => 'Created Successfully',
        ]);
    }
}
