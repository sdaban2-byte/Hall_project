@extends('cms.parent')

@section('title', 'Dashboard')

@section('content')

    <div class="container mt-4">

        <div class="row">

            <!-- Users -->
            <div class="col-md-3">
                <div class="card text-white bg-primary mb-3 text-center">
                    <div class="card-body">
                        <h5>Users</h5>
                        <h2>{{ $usersCount }}</h2>
                    </div>
                </div>
            </div>

            <!-- Admins -->
            <div class="col-md-3">
                <div class="card text-white bg-dark mb-3 text-center">
                    <div class="card-body">
                        <h5>Admins</h5>
                        <h2>{{ $adminsCount }}</h2>
                    </div>
                </div>
            </div>

            <!-- Clients -->
            <div class="col-md-3">
                <div class="card text-white bg-success mb-3 text-center">
                    <div class="card-body">
                        <h5>Clients</h5>
                        <h2>{{ $clientsCount }}</h2>
                    </div>
                </div>
            </div>

            <!-- Hall Owners -->
            <div class="col-md-3">
                <div class="card text-white bg-warning mb-3 text-center">
                    <div class="card-body">
                        <h5>Hall Owners</h5>
                        <h2>{{ $hallOwnersCount }}</h2>
                    </div>
                </div>
            </div>

            <!-- Halls -->
            <div class="col-md-3">
                <div class="card text-white bg-info mb-3 text-center">
                    <div class="card-body">
                        <h5>Halls</h5>
                        <h2>{{ $hallsCount }}</h2>
                    </div>
                </div>
            </div>

            {{-- <!-- Bookings -->
            <div class="col-md-3">
                <div class="card text-white bg-secondary mb-3 text-center">
                    <div class="card-body">
                        <h5>Bookings</h5>
                        <h2>{{ $bookingsCount }}</h2>
                    </div>
                </div>
            </div> --}}

            <!-- Reviews -->
            <div class="col-md-3">
                <div class="card text-white bg-danger mb-3 text-center">
                    <div class="card-body">
                        <h5>Reviews</h5>
                        <h2>{{ $reviewsCount }}</h2>
                    </div>
                </div>
            </div>
            <!-- booking -->
            <div class="col-md-3">
                <div class="card text-white bg-danger mb-3 text-center">
                    <div class="card-body">
                        <h5>Booking</h5>
                        <h2>{{ $bookingsCount }}</h2>
                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection
