@extends('cms.parent')

@section('title', 'Show contact Us')

@section('maintitle', 'Show contact Us')

@section('subtitle', 'contact Us Details')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card shadow-sm">

                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0">Contact Us Details</h5>
                    </div>

                    <div class="card-body">

                        <!-- name -->
                        <div class="mb-3">
                            <label class="form-label"> Name</label>
                            <input type="text" class="form-control" value="{{ $contactUs->name }}" disabled>
                        </div>

                        <!-- email -->
                        <div class="mb-3">
                            <label class="form-label">  email </label>
                            <input type="text" class="form-control" value="{{ $contactUs->email }}" disabled>
                        </div>

                        <!-- massege -->


                           <div class="mb-3">
                            <label class="form-label"> Massege</label>
                            <input type="text" class="form-control" value="{{ $contactUs->massege }}" disabled>
                        </div>

                    </div>

                    <div class="card-footer d-flex justify-content-between">

                        <a href="{{ route('contactUs.index') }}" class="btn btn-secondary">
                            Back
                        </a>

                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection
