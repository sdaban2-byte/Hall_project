@extends('cms.parent')

@section('title', 'Show Hall Owner')

@section('maintitle', 'Show Hall Owner')

@section('subtitle', 'Show Hall Owner')

@section('styles')

@endsection

@section('content')
    <div class="card card-info card-outline mb-4">
        <!--begin::Header-->
        <div class="card-header">
            <div class="card-title">Show data of Hall Owner</div>
        </div>
        <!--end::Header-->
        <!--begin::Form-->
        <form class="needs-validation" novalidate>
            <form class="needs-validation" novalidate>
                <div class="card-body">

                    <!-- City -->
                    <div class="mb-3">
                        <label class="form-label">City</label>
                        <input type="text" class="form-control" disabled
                            value="{{ $hall_owners->user->city->city_name ?? '' }}">
                    </div>

                    <!-- Names -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control" disabled id="first_name" name="first_name"
                                value="{{ $hall_owners->user->first_name ?? '' }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="last_name" disabled name="last_name"
                                value="{{ $hall_owners->user->last_name ?? '' }}" required>
                        </div>
                    </div>

                    <!-- Email + Password -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" disabled name="email"
                                value="{{ $hall_owners->email ?? '' }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="password" class="form-label">Password</label>

                            <div class="input-group">
                                <input type="password" class="form-control" id="password" disabled name="password"
                                    value="{{ $hall_owners->password }}">

                                <button type="button" class="btn btn-outline-secondary" onclick="togglePassword()">
                                    👁️
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Mobile + Date -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="mobile" class="form-label">Mobile</label>
                            <input type="text" class="form-control" id="mobile" disabled name="mobile"
                                value="{{ $hall_owners->user->mobile ?? '' }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control" id="date" disabled name="date"
                                value="{{ $hall_owners->user->date ?? '' }}" required>
                        </div>
                    </div>

                    <!-- Address -->
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" disabled name="address"
                            value="{{ $hall_owners->user->address ?? '' }}" required>
                    </div>

                    <!-- company_name -->
                    <div class="mb-3">
                        <label for="company_name" class="form-label">Company Name</label>
                        <input type="text" class="form-control" id="company_name" disabled name="company_name"
                            value="{{ $hall_owners->company_name ?? '' }}" required>
                    </div>

                    <!-- Gender + Status -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-select" id="gender" disabled name="gender"
                                value="{{ $hall_owners->user->gender ?? '' }}">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" disabled name="status"
                                value="{{ $hall_owners->user->status ?? '' }}">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>

                    <!-- Image -->
                    <div class="mb-3">
                        <label for="image" class="form-label"ءء>Choose Image</label>
                        <input type="file" class="form-control" id="image" disabled name="image"
                            value="{{ $hall_owners->user->image ?? '' }}">
                    </div>

                </div>
                <div class="card-footer">

                    <a href="{{ route('hall_owners.index') }}" class="btn btn-primary" type="submit">Index</a>
                </div>
            </form>
            <!--end::Form-->
            <!--begin::JavaScript-->
            <script>
                // Example starter JavaScript for disabling form submissions if there are invalid fields
                (() => {
                    'use strict';

                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    const forms = document.querySelectorAll('.needs-validation');

                    // Loop over them and prevent submission
                    Array.from(forms).forEach((form) => {
                        form.addEventListener(
                            'submit',
                            (event) => {
                                if (!form.checkValidity()) {
                                    event.preventDefault();
                                    event.stopPropagation();
                                }

                                form.classList.add('was-validated');
                            },
                            false,
                        );
                    });
                })();
            </script>
            <script>
                function togglePassword() {
                    let input = document.getElementById('password');

                    if (input.type === "password") {
                        input.type = "text";
                    } else {
                        input.type = "password";
                    }
                }
            </script>
            <!--end::JavaScript-->
    </div>
@endsection

@section('scripts')
    <script>
        function performUpdate(id) {
            let formData = new FormData();

            formData.append('first_name', document.getElementById('first_name').value);
            formData.append('last_name', document.getElementById('last_name').value);
            formData.append('city_id', document.getElementById('city_id').value);
            formData.append('email', document.getElementById('email').value);
            formData.append('address', document.getElementById('address').value);
            formData.append('password', document.getElementById('password').value);
            formData.append('date', document.getElementById('date').value);
            formData.append('mobile', document.getElementById('mobile').value);
            formData.append('gender', document.getElementById('gender').value);
            formData.append('status', document.getElementById('status').value);
            formData.append('company_name', document.getElementById('company_name').value);
            formData.append('image', document.getElementById('image').files[0]);

            storeRoute('/cms/admin/hall_owners_update/' + id, formData);
        }
    </script>

@endsection
