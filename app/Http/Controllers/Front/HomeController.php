<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Hall;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function home()
    {
        $halls = Hall::take(3)->get();
        $sliders = Slider::all();

        return view('front.index', compact('halls', 'sliders'));
    }
}
