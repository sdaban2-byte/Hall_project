@extends('front.master')


@section('title', 'all halls Title')

@section('styles')




@endsection
@section('content')

    <!-- CONTENT -->
    <div class="container py-5">


        <div class="row g-4">
            @foreach ($halls as $hall)
                <div class="col-md-4">
                    <div class="card shadow">
                        <img class="card-img-top" src="{{ asset('storage/images/hall/' . $hall->image) }}">
                        <div class="card-body text-center">
                            <h5>{{ $hall->name }}</h5>
                            <p>Capacity: {{ $hall->capacity }} Guests</p>
                            <a href="{{ route('hall_detiles.page', $hall->id) }}" class="btn btn-dark w-100">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    </div>

@endsection
@section('script')



@endsection
