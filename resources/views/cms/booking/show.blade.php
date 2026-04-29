@extends('cms.parent')

@section('title','Booking Details')

@section('content')
<div class="container">

<h3>Booking Details</h3>

<p>Client: {{ $booking->client->user->first_name }}</p>
<p>Hall: {{ $booking->hall->name }}</p>
<p>Date: {{ $booking->booking_date }}</p>
<p>Time: {{ $booking->start_time }} - {{ $booking->end_time }}</p>
<p>Status: {{ $booking->status }}</p>

</div>
@endsection