<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Hall;
use App\Models\Client;

class BookingController extends CmsCrudController
{
    protected string $model = Booking::class;
    protected string $route = 'bookings';
    protected string $title = 'Booking';

    protected array $fields = [
        'booking_date' => ['label' => 'Booking Date', 'type' => 'datetime-local'],
        'guests_number' => ['label' => 'Guests Number', 'type' => 'number'],
        'status' => ['label' => 'Status', 'type' => 'text'],
        'hall_id' => ['label' => 'Hall', 'type' => 'select', 'options' => 'halls', 'option_label' => 'name'],
        'client_id' => ['label' => 'Client', 'type' => 'select', 'options' => 'clients', 'option_label' => 'email'],
    ];

    protected function viewData(): array
    {
        return [
            'halls' => Hall::all(),
            'clients' => Client::all(),
        ];
    }
}