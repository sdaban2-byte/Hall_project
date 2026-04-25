@extends('cms.parent')

@section('title', 'Show halls')

@section('maintitle', 'halls Details')

@section('subtitle', 'Show halls')

@section('content')

    <div class="container">

        <div class="card">

            <div class="card-body">

                {{-- halls Name --}}
                <h3 class="mb-3">{{ $halls->name }}</h3>

                {{-- Owner --}}
                <p>
                    <b>Owner:</b>
                    {{ optional($halls->hall_owner->user)->first_name ?? 'No Owner' }}
                </p>
                {{-- Capacity --}}
                <p>
                    <b>Capacity:</b> {{ $halls->capacity }}
                </p>

                {{-- Price --}}
                <p>
                    <b>Price:</b> {{ $halls->price }} $
                </p>

                {{-- Location --}}
                <p>
                    <b>Location:</b> {{ $halls->location }}
                </p>

                {{-- Description --}}
                <p>
                    <b>Description:</b> {{ $halls->description }}
                </p>

                {{-- Image --}}
                <div class="mt-3">
                    <b>Image:</b><br>

                    @if ($halls->image)
                        <img src="{{ asset('storage/images/halls/' . $halls->image) }}" width="250" class="img-thumbnail">
                    @else
                        <p>No Image Available</p>
                    @endif
                </div>

                {{-- Back Button --}}
                <div class="mt-4">
                    <a href="{{ route('halls.index') }}" class="btn btn-secondary">
                        Back
                    </a>
                </div>

            </div>

        </div>

    </div>

@endsection
