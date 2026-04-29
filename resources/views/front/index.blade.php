@extends('front.master')

@section('title', 'Index Title')

@section('styles')
    <style>
        .hero {
            height: 100vh;
            background-size: cover;
            background-position: center;
        }

        .hero h1 {
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.8);
        }

        .hero p {
            text-shadow: 1px 1px 6px rgba(0, 0, 0, 0.8);
        }
    </style>
@endsection


@section('content')

    <!-- HERO SLIDER -->
    <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <div class="carousel-inner">

            @foreach ($sliders as $index => $slider)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }} hero"
                    style="background-image: url('{{ asset('storage/images/slider/' . $slider->image) }}');">

                    <div class="d-flex flex-column justify-content-center align-items-center text-center h-100">

                        <h1>{{ $slider->title }}</h1>

                        <p class="mt-3">
                            {{ $slider->description }}
                        </p>

                    </div>
                </div>
            @endforeach

        </div>

        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>

    </div>
    <!-- Controls (يمين/يسار) -->
    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>

    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>

    </div>

    <!-- ABOUT -->
    <section id="about" class="section container">
        <div class="row align-items-center">

            <div class="col-md-6">
                <h2 class="fw-bold">About Us</h2>
                <p class="text-muted">
                    We are a platform created to be a place that shares your joys and brings together all connections in one
                    place,
                    especially in our city of Gaza, to help you choose the right venues for you, book them easily,
                    and learn everything related to them.
                </p>

                <div class="d-flex gap-4 mt-4">
                    <div>
                        <h3 class="text-warning">150+</h3>
                        <p>Halls</p>
                    </div>
                    <div>
                        <h3 class="text-warning">800+</h3>
                        <p>Bookings</p>
                    </div>
                    <div>
                        <h3 class="text-warning">4.9★</h3>
                        <p>Rating</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <img class="w-100 rounded-4 shadow" src="https://images.unsplash.com/photo-1519225421980-715cb0215aed">
            </div>

        </div>
    </section>


    <!-- HALLS -->
    <section id="halls" class="section container">
        <h2 class="text-center mb-5">Featured Halls</h2>

        <div class="row g-4">
            @foreach ($halls as $hall)
                <div class="col-md-4">
                    <div class="card shadow">
                        <img class="card-img-top" src="{{ asset('storage/images/hall/' . $hall->image) }}">
                        <div class="card-body text-center">
                            <h5>{{ $hall->name }}</h5>
                            <p>Capacity: {{ $hall->capacity }} Guests</p>
                            <a href="{{ route('hall_detiles.page', $hall->id) }}"class="btn btn-dark w-100">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>

        <div class="text-center mt-5">
            <a href="{{ route('all_halls.page') }}" class="btn btn-outline-dark btn-lg">
                Explore All Halls →
            </a>
        </div>

    </section>


    <!-- REVIEWS -->
    <section class="section container">
        <h3 class="mb-4 text-center fw-bold">Client Reviews</h3>

        <div class="row g-3 mb-4">

            @foreach ($reviews as $review)
                <div class="col-md-6">
                    <div class="card shadow-sm p-3 border-0">
                        <p class="mb-1">“{{ $review->comment }}”</p>
                        <small class="text-warning">— {{ optional($review->client->user)->first_name }}</small>
                    </div>
                </div>
            @endforeach




        </div>

        <div class="card shadow p-4 border-0">
            <h5 class="mb-3">Write Your Review</h5>

            <textarea class="form-control mb-3" rows="4" placeholder="Write your experience...">


            </textarea>

            <button class="btn btn-warning w-100 fw-bold">
                Submit Review
            </button>
        </div>
    </section>

@endsection

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@section('script')
@endsection
