@extends('cms.parent')

@section('title', 'Create Booking')

@section('content')

    <div class="container">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Create New Booking</h5>
            </div>

            <div class="card-body">
                <form>

                    @csrf

                    <label>Client</label>
                    <select id="client_id" name="client_id" class="form-control">
                        @foreach ($clients as $client)
                            <option value="{{ $client->id }}">
                                {{ $client->user?->first_name ?? 'No User' }}
                            </option>
                        @endforeach
                    </select>

                    <label>Hall</label>
                    <select id="hall_id" name = "hall_id"class="form-control">
                        @foreach ($halls as $hall)
                            <option value="{{ $hall->id }}">{{ $hall->name }}</option>
                        @endforeach
                    </select>

                    <label>Date</label>
                    <input type="date" id="booking_date" name="booking_date" class="form-control">

                    <label>Start Time</label>
                    <input type="time" id="start_time" name= "start_time" class="form-control">

                    <label>End Time</label>
                    <input type="time" id="end_time" name="end_time" class="form-control">



                    <label>gesuts num</label>
                    <input type="number" id="gesuts_num" name="gesuts_num" class="form-control">

                    <div class="mb-3">
                        <label class="form-label">Notes</label>
                        <textarea class="form-control" id="notes" name="notes" rows="4" placeholder="Write your notes..."></textarea>
                    </div>



                    <div class="d-flex justify-content-between">
                        <a href="{{ route('bookings.index') }}" class="btn btn-secondary">
                            Back
                        </a>
                        <button type="button" onclick="storeBooking()" class="btn btn-success mt-3">
                            Save
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
        function storeBooking() {

            let formData = new FormData();

            formData.append('client_id', document.getElementById('client_id').value);
            formData.append('hall_id', document.getElementById('hall_id').value);
            formData.append('booking_date', document.getElementById('booking_date').value);
            formData.append('start_time', document.getElementById('start_time').value);
            formData.append('end_time', document.getElementById('end_time').value);
            formData.append('gesuts_num', document.getElementById('gesuts_num').value);
            formData.append('notes', document.getElementById('notes').value);

            store('/cms/admin/bookings', formData);

        }
    </script>

@endsection
