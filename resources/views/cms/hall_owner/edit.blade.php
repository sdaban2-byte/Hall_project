@extends('cms.parent')

@section('title', 'Edit hall_owners')

@section('maintitle', 'Edit hall_owners')

@section('subtitle', 'Edit hall_owners')

@section('styles')

@endsection

@section('content')
    <div class="card card-info card-outline mb-4">
        <!--begin::Header-->
        <div class="card-header">
            <div class="card-title">Edit data of Hall Owners</div>
        </div>
        <!--end::Header-->
        <!--begin::Form-->
        <form class="needs-validation" novalidate>
            <div class="card-body">
                <div class="row g-3">
                    <!-- Image -->
                    <div class="mb-3">
                        <label for="image" class="form-label"ءء> Image</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/">
                    </div>

                    <!-- First Name -->
                    <div class="mb-3">
                        <label class="form-label">First Name</label>
                        <input type="text" id="first_name" class="form-control"
                            value="{{ $hall_owners->user->first_name ?? '' }}">
                    </div>

                    <!-- Last Name -->
                    <div class="mb-3">
                        <label class="form-label">Last Name</label>
                        <input type="text" id="last_name" class="form-control"
                            value="{{ $hall_owners->user->last_name ?? '' }}">
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" id="email" class="form-control" value="{{ $hall_owners->email ?? '' }}">
                    </div>

                    <!-- City -->
                    <div class="mb-3">
                        <label class="form-label">City</label>
                        <select id="city_id" class="form-select">
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}" @selected(($hall_owners->user->city_id ?? '') == $city->id)>
                                    {{-- selected هذه اختصار من Laravel بدل كتابة if. --}}
                                    {{ $city->city_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Mobile -->
                    <div class="mb-3">
                        <label class="form-label">Mobile</label>
                        <input type="text" id="mobile" class="form-control"
                            value="{{ $hall_owners->user->mobile ?? '' }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Date</label>
                        <input type="text" id="date" class="form-control"
                            value="{{ $hall_owners->user->date ?? '' }}">
                    </div>
                    <!-- Address -->
                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <input type="text" id="address" class="form-control"
                            value="{{ $hall_owners->user->address ?? '' }}">
                    </div>
                    <!-- company_name -->
                    <div class="mb-3">
                        <label class="form-label">company_name</label>
                        <input type="text" id="company_name" class="form-control"
                            value="{{ $hall_owners->company_name ?? '' }}">
                    </div>

                    <!-- Gender -->
                    <div class="mb-3">
                        <label class="form-label">Gender</label>
                        <select id="gender" class="form-select">
                            <option selected>{{ $hall_owners->user->gender }}
                            </option>

                        </select>
                    </div>

                    <!-- Status -->
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select id="status" class="form-select">
                            <option selected>{{ $hall_owners->user->status }}
                            </option>
                        </select>
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" id="password" class="form-control">
                    </div>

                </div>



            </div>
    </div>
    <div class="card-footer">
        <button class="btn btn-primary" type="button" onclick="performUpdate({{ $hall_owners->id }})">Update</button>
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
        let password = document.getElementById('password').value;

        if (password !== '') {
            formData.append('password', password);
        }
        $.ajax({
            url: form.action,
            type: "POST",
            data: new FormData(form),
            processData: false,
            contentType: false,
            success: function(response) {

                if (response.icon === 'success') {
                    window.location.href = response.redirect;
                }

                if (response.icon === 'error') {
                    alert(response.title);
                }
            }
        });
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
            formData.append('company_name', document.getElementById('company_name').value);
            formData.append('password', document.getElementById('password').value);
            formData.append('date', document.getElementById('date').value);
            formData.append('mobile', document.getElementById('mobile').value);
            formData.append('gender', document.getElementById('gender').value);
            formData.append('status', document.getElementById('status').value);
            formData.append('image', document.getElementById('image').files[0]);

            storeRoute('/cms/admin/hall_owners_update/' + id, formData);
        }
    </script>

@endsection
