@extends('cms.parent')

@section('title', 'Edit Booking')

@section('content')

    <div class="container">
        <div class="card shadow-sm">

            <div class="card-header bg-warning text-dark">
                <h5 class="mb-0">Edit Booking</h5>
            </div>

            <div class="card-body">

                <form>

                    @csrf

                    {{-- Client --}}
                    <label>Client</label>
                    <select id="client_id" name="client_id" class="form-control">
                        @foreach ($clients as $client)
                            <option value="{{ $client->id }}" {{ $booking->client_id == $client->id ? 'selected' : '' }}>
                                {{ $client->user?->first_name ?? 'No User' }}
                            </option>
                        @endforeach
                    </select>

                    {{-- Hall --}}
                    <label class="mt-2">Hall</label>
                    <select id="hall_id" name="hall_id" class="form-control">
                        @foreach ($halls as $hall)
                            <option value="{{ $hall->id }}" {{ $booking->hall_id == $hall->id ? 'selected' : '' }}>
                                {{ $hall->name }}
                            </option>
                        @endforeach
                    </select>

                    {{-- Date --}}
                    <label class="mt-2">Date</label>
                    <input type="date" id="booking_date" name="booking_date" class="form-control"
                        value="{{ $booking->booking_date }}">

                    {{-- Start Time --}}
                    <label class="mt-2">Start Time</label>
                    <input type="time" id="start_time" name="start_time" class="form-control"
                        value="{{ $booking->start_time }}">

                    {{-- End Time --}}
                    <label class="mt-2">End Time</label>
                    <input type="time" id="end_time" name="end_time" class="form-control"
                        value="{{ $booking->end_time }}">

                    {{-- Guests Number --}}
                    <label class="mt-2">Guests Number</label>
                    <input type="number" id="gesuts_num" name="gesuts_num" class="form-control"
                        value="{{ $booking->gesuts_num }}">

                    {{-- Notes --}}
                    <label class="mt-2">Notes</label>
                    <textarea id="notes" name="notes" class="form-control" rows="4">{{ $booking->notes }}</textarea>


                    <div class="card-footer d-flex justify-content-between">

                        <a href="{{ route('bookings.index') }}" class="btn btn-secondary">
                            Back
                        </a>
                        {{-- Button --}}
                        <button type="button" onclick="updateBooking({{ $booking->id }})" class="btn btn-primary mt-3">
                            Update
                        </button>

                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection


@section('scripts')

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        function updateBooking(id) {

            let formData = new FormData();

            formData.append('client_id', document.getElementById('client_id').value);
            formData.append('hall_id', document.getElementById('hall_id').value);
            formData.append('booking_date', document.getElementById('booking_date').value);
            formData.append('start_time', document.getElementById('start_time').value);
            formData.append('end_time', document.getElementById('end_time').value);
            formData.append('gesuts_num', document.getElementById('gesuts_num').value);
            formData.append('notes', document.getElementById('notes').value);

            storeRoute('/cms/admin/bookings_update/' + id, formData);


        }
    </script>

@endsection
