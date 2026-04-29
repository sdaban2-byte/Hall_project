@extends('cms.parent')

@section('title','Edit Booking')

@section('content')
<div class="container">

<form>

    <label>Date</label>
    <input type="date" id="booking_date" value="{{ $booking->booking_date }}">

    <label>Start</label>
    <input type="time" id="start_time" value="{{ $booking->start_time }}">

    <label>End</label>
    <input type="time" id="end_time" value="{{ $booking->end_time }}">

    <button type="button" onclick="updateBooking({{ $booking->id }})">
        Update
    </button>

</form>

</div>
@endsection