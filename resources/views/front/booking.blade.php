@extends('front.master')


@section('title', 'Booking Title')

@section('styles')


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


@endsection
@section('content')

    <div class="page-header">
        <h2>
            Booking
        </h2>
    </div>

    <section class="section container">
        <form id="bookingForm" class="col-md-6 mx-auto">

            <input name="client_id" id="client_id" class="form-control mb-3" placeholder="Client ID">

            <input name="hall_id" id="hall_id" class="form-control mb-3" placeholder="Hall ID">

            <input name="booking_date" id="booking_date" type="date" class="form-control mb-3">

            <input name="start_time" id="start_time" type="time" class="form-control mb-3">

            <input name="end_time" id="end_time" type="time" class="form-control mb-3">

            <input name="gesuts_num" id="gesuts_num" class="form-control mb-3" placeholder="Guests Number">

            <textarea name="notes" id="notes" class="form-control mb-3" placeholder="Notes"></textarea>

            <button type="button" onclick="storebooking()" class="btn btn-warning w-100">
                Confirm Booking
            </button>



        </form>

    </section>
@endsection
@section('script')

    <script src="{{ asset('js/crud.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function storebooking() {
            let formData = new FormData();

            formData.append('client_id', document.getElementById('client_id').value);
            formData.append('hall_id', document.getElementById('hall_id').value);
            formData.append('booking_date', document.getElementById('booking_date').value);
            formData.append('start_time', document.getElementById('start_time').value);
            formData.append('end_time', document.getElementById('end_time').value);
            formData.append('gesuts_num', document.getElementById('gesuts_num').value);
            formData.append('notes', document.getElementById('notes').value);

            store('/halls/booking', formData);

        }
    </script>

@endsection
