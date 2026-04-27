@extends('cms.parent')

@section('title', 'Create contactUs')

@section('maintitle', 'Create contactUs')

@section('subtitle', 'Create contactUs')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Create New contactUs</h5>
                    </div>

                    <div class="card-body">

                        <form id="contactUsForm">

                            <!-- name -->
                            <div class="mb-3">
                                <label class="form-label">name</label>
                                <input class="form-control" id="name" name="name" rows="4"
                                    placeholder="Write your name ..."></input>
                            </div>


                            <!-- email -->
                            <div class="mb-3">
                                <label class="form-label">email</label>
                                <input class="form-control" id="email" name="email" rows="4"
                                    placeholder="Write your email ..."></input>
                            </div>


                            <!-- description -->
                            <div class="mb-3">
                                <label class="form-label">massege</label>
                                <textarea class="form-control" id="massege" name="massege" rows="2" placeholder="Write your  massege ..."></textarea>
                            </div>

                            <!-- Buttons -->
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('contactUs.index') }}" class="btn btn-secondary">
                                    Back
                                </a>

                                <button type="button" class="btn btn-success" onclick="performStore()">
                                    Save contactUs
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
        function performStore() {
            let formData = new FormData();

            formData.append('name', document.getElementById('name').value);
            formData.append('email', document.getElementById('email').value);
            formData.append('massege', document.getElementById('massege').value);

            store('/cms/admin/contactUs', formData);
        }
    </script>
@endsection
