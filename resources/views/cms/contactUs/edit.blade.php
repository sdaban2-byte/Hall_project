@extends('cms.parent')

@section('title', 'Edit contact Us')

@section('maintitle', 'Edit contact Us')

@section('subtitle', 'Edit contact Us')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card shadow-sm">

                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Edit contact Us</h5>
                    </div>

                    <div class="card-body">

                        <form id="contactUsForm">

                            @csrf


                            <!-- name -->
                            <div class="mb-3">
                                <label class="form-label">Name</label>

                                <input type="text" id="name" name="name" class="form-control"
                                    value="{{ $contactUs->name }}">
                            </div>
                            <!-- email -->
                            <div class="mb-3">
                                <label class="form-label">Email</label>

                                <input type="text" id="email" name="email" class="form-control"
                                    value="{{ $contactUs->email }}">
                            </div>
                            <!-- Massege -->
                            <div class="mb-3">
                                <label class="form-label">Massege</label>

                                <textarea id="massege" name="massege" class="form-control" rows="4">{{ $contactUs->massege }}</textarea>
                            </div>



                            <!-- Buttons -->
                            <div class="d-flex justify-content-between">

                                <a href="{{ route('contactUs.index') }}" class="btn btn-secondary">
                                    Back
                                </a>

                                <button type="button" class="btn btn-success"
                                    onclick="performUpdate({{ $contactUs->id }})">
                                    Update
                                </button>

                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        function performUpdate(id) {

            let formData = new FormData();

            formData.append('name', document.getElementById('name').value);
            formData.append('email', document.getElementById('email').value);
            formData.append('massege', document.getElementById('massege').value);

            storeRoute('/cms/admin/contactUs_update/' + id, formData);
        }
    </script>

@endsection
