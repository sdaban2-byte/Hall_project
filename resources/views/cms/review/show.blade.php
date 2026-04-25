@extends('cms.parent')

@section('title', 'Show Review')

@section('maintitle', 'Show Review')

@section('subtitle', 'Review Details')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card shadow-sm">

                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0">Review Details</h5>
                    </div>

                    <div class="card-body">

                        <!-- Client Name -->
                        <div class="mb-3">
                            <label class="form-label">Client Name</label>
                            <input type="text" class="form-control" value="{{ $reviews->client->user->first_name }}"
                                disabled>
                        </div>

                        <!-- Rating -->
                        <div class="mb-3">
                            <label class="form-label">Rating</label>
                            <input type="number" class="form-control" min="1" max="5"
                                value="{{ $reviews->rating }}" disabled>
                        </div>

                        <!-- Comment -->
                        <div class="mb-3">
                            <label class="form-label">Comment</label>
                            <textarea class="form-control" rows="4" disabled>{{ $reviews->comment }}</textarea>
                        </div>

                    </div>

                    <div class="card-footer d-flex justify-content-between">

                        <a href="{{ route('reviews.index') }}" class="btn btn-secondary">
                            Back
                        </a>

                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection
