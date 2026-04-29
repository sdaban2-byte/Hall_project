@extends('cms.parent')

@section('title', 'Show Slider')

@section('maintitle', 'Show Slider')

@section('subtitle', 'Slider Details')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card shadow-sm">

                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0">Slider Details</h5>
                    </div>

                    <div class="card-body">

                        <!-- title -->
                        <div class="mb-3">
                            <label class="form-label">Slider title</label>
                            <input type="text" class="form-control" value="{{ $sliders->title }}" disabled>
                        </div>

                        <!-- description -->
                        <div class="mb-3">
                            <label class="form-label"> Slider description </label>
                            <input type="text" class="form-control" value="{{ $sliders->description }}" disabled>
                        </div>

                        <!-- Image -->
                        <div class="mb-3">
                            <label for="image" class="form-label"ءء>Choosen Image for Slider</label>
                            <input type="file" class="form-control" id="image" disabled name="image"
                                value="{{ $sliders->image ?? '' }}">
                        </div>

                    </div>

                    <div class="card-footer d-flex justify-content-between">

                        <a href="{{ route('sliders.index') }}" class="btn btn-secondary">
                            Back
                        </a>

                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection
