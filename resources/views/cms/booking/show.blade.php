@extends('cms.parent')

@section('title', 'Booking Details')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card shadow-sm">

                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0">Booking Details</h5>
                    </div>

                    <div class="card-body">
                        <!-- Client Name -->
                        <div class="mb-3">
                            <label class="form-label">Client Name</label>
                            <input type="text" class="form-control" value="{{ $booking->client->user->first_name }}"
                                disabled>
                        </div>
                        <!-- Hall Name -->
                        <div class="mb-3">
                            <label class="form-label">Hall Name</label>
                            <input type="text" class="form-control" value="{{ $booking->hall->name }}" disabled>
                        </div>
                        <!-- Date -->
                        <div class="mb-3">
                            <label class="form-label">Date</label>
                            <input type="date" class="form-control" value="{{ $booking->booking_date }}" disabled>
                        </div>
                        <!-- Time -->
                        <div class="mb-3">
                            <label class="form-label">Time</label>
                            <input type="text" class="form-control"
                                value="{{ $booking->start_time }} - {{ $booking->end_time }}" disabled>
                        </div>

                        <!-- Status -->
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <input type="text" class="form-control" value="{{ $booking->status }}" disabled>
                        </div>

                        <!-- gesuts num -->
                        <div class="mb-3">
                            <label class="form-label">gesuts num</label>
                            <input type="enum" class="form-control" value="{{ $booking->gesuts_num }}" disabled>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Notes</label>
                            <textarea class="form-control" disabled>
{{ $booking->notes ?? 'No notes' }}</textarea>
                        </div>

                        <div class="card-footer d-flex justify-content-between">

                            <a href="{{ route('bookings.index') }}" class="btn btn-secondary">
                                Back
                            </a>

                        </div>

                    </div>
                @endsection
