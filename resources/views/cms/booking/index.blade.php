@extends('cms.parent')

@section('title','Bookings')

@section('content')
<div class="container">

    <a href="{{ route('bookings.create') }}" class="btn btn-primary mb-3">
        Create Booking
    </a>

    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Client</th>
                <th>Hall</th>
                <th>Date</th>
                <th>Time</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
        @foreach($bookings as $booking)
            <tr>
                <td>{{ $booking->id }}</td>
                <td>{{ $booking->client->user->first_name ?? '' }}</td>
                <td>{{ $booking->hall->name ?? '' }}</td>
                <td>{{ $booking->booking_date }}</td>
                <td>{{ $booking->start_time }} - {{ $booking->end_time }}</td>
                <td>
                    <span class="badge bg-info">{{ $booking->status }}</span>
                </td>
                <td>
                    <a href="{{ route('bookings.show',$booking->id) }}" class="btn btn-success btn-sm">View</a>
                    <a href="{{ route('bookings.edit',$booking->id) }}" class="btn btn-primary btn-sm">Edit</a>

                    <button onclick="confirmDestroy({{ $booking->id }})"
                        class="btn btn-danger btn-sm">
                        Delete
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
@endsection