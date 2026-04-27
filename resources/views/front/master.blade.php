<?php
// use App\Models\Hall;

// $halls = Hall::all(); // صفحة فيها متغيرات ومعنديش دالة امرر المتغيرات فيها
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halls | @yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
    @yield('styles')
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top px-4">

        <a class="navbar-brand text-warning fw-bold" href="#">Elite Halls</a>

        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#nav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav ms-auto">

                <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#halls">Halls</a></li>
                <li class="nav-item"><a class="nav-link" href="#reviews">Reviews</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.html">Contact us</a></li>


                <li class="nav-item ms-3">
                    <a class="btn btn-warning" href="login.html">Login</a>
                </li>

            </ul>
        </div>

    </nav>
    @yield('content')



    {{-- @foreach ($halls as $hall)
        <div class="col-md-4">
            <div class="card shadow">
                <img class="card-img-top" src="{{ asset('storage/images/hall/' . $hall->image) }}">
                <div class="card-body text-center">
                    <h5>{{ $hall->name }}</h5>
                    <p>Capacity: {{ $hall->capacity }}</p>
                    <a href="hall-details.html" class="btn btn-dark w-100">View Details</a>
                </div>
            </div>
        </div>
    @endforeach --}}
    <!-- FOOTER -->
    <div class="footer">
        © 2026 Elite Wedding Halls
    </div>


</body>

</html>
