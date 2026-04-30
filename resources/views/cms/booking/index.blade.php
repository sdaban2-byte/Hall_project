@extends('cms.parent')

@section('title', 'Bookings')

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
                @foreach ($bookings as $booking)
                    <tr>
                        <td>{{ $booking->id }}</td>
                        <td>{{ optional($booking->client->user)->first_name }}</td>
                        <td>{{ $booking->hall->name ?? '' }}</td>
                        <td>{{ $booking->booking_date }}</td>
                        <td>{{ $booking->start_time }} - {{ $booking->end_time }}</td>
                        <td>
                            @if ($booking->status == 'pending')
                                <span class="badge bg-warning">Pending</span>
                            @elseif($booking->status == 'approved')
                                <span class="badge bg-success">Approved</span>
                            @else
                                <span class="badge bg-danger">Rejected</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('bookings.show', $booking->id) }}" class="btn btn-success btn-sm">View</a>
                            <a href="{{ route('bookings.edit', $booking->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <button onclick="approve({{ $booking->id }})" class="btn btn-success btn-sm">
                                Approve
                            </button>

                            <button onclick="reject({{ $booking->id }})" class="btn btn-danger btn-sm">
                                Reject
                            </button>
                            <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST"
                                style="display:inline;"
                                onsubmit="return confirm('Are you sure you want to delete ({{ optional($booking->user)->first_name ?? 'this user' }})?');">
                                {{-- رجّع null بدل error --}}
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="confirmDestroy({{ $booking->id }}, this)"
                                    class="btn btn-sm btn-outline-danger" title="Delete">
                                    <i class="bi bi-trash3-fill"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $bookings->links() }}

    </div>
@endsection

@section('scripts')
    <script>
        function requestAction(url, method = 'POST') {

            axios({
                method: method,
                url: url
            }).then(res => {
                location.reload();
            }).catch(err => {
                console.log(err.response);
            });

        }

        function confirmDestroy(id, reference) {
            destroy('/cms/admin/bookings/' + id, reference);
        }

        function approve(id) {
            requestAction('/cms/admin/bookings/' + id + '/approve');
        }

        function reject(id) {
            requestAction('/cms/admin/bookings/' + id + '/reject');
        }
    </script>

@endsection
