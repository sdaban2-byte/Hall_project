@extends('front.master')


@section('title', ' hall detailes')

@section('styles')




@endsection
@section('content')


    <div class="header">
        <a href="all-halls.html" class="text-warning text-decoration-none">← Back</a>
        <h5>Hall Details</h5>
        <div></div>
    </div>

    <div class="container py-4 text-center">

        <img class="hall-img" src="{{ asset('storage/images/hall/' . $halls->image) }}">

        <h2>{{ $halls->name }}</h2>
        <p class="text-muted">{{ $halls->description }}</p>

        <div class="text-start mt-4">
            <ul>
                <li>Capacity: {{ $halls->capacity }} Guests</li>
                <li>Price: $ {{ $halls->price }}</li>
                <li>Location: {{ $halls->location }}</li>
            </ul>
        </div>

        <a href="booking.html" class="btn btn-warning btn-lg mt-3">Book Now</a>


    </div>

@endsection
@section('script')



@endsection
