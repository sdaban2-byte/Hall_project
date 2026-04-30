<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Booking;
use App\Models\Client;
use App\Models\Hall;
use App\Models\HallOwner;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        $usersCount = User::count();
        $adminsCount = Admin::count();
        $clientsCount = Client::count();
        $hallOwnersCount = HallOwner::count();
        $hallsCount = Hall::count();
        $bookingsCount = Booking::count();
        $reviewsCount = Review::count();

        return view('cms.statiscticDashboard', compact(
            'usersCount',
            'adminsCount',
            'clientsCount',
            'hallOwnersCount',
            'hallsCount',
            'bookingsCount',
            'reviewsCount'
        ));
    }
}
