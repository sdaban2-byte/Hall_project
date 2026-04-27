@extends('cms.parent')

@section('title', 'Edit Slider')

@section('maintitle', 'Edit Slider')

@section('subtitle', 'Edit Slider')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card shadow-sm">

                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Edit Slider</h5>
                    </div>

                    <div class="card-body">

                        <form id="sliderForm">

                            @csrf


                            <!-- title -->
                            <div class="mb-3">
                                <label class="form-label">title</label>

                                <input type="text" id="title" name="title" class="form-control"
                                    value="{{ $sliders->title }}">
                            </div>

                            <!-- description -->
                            <div class="mb-3">
                                <label class="form-label">description</label>

                                <textarea id="description" name="description" class="form-control" rows="4">{{ $sliders->description }}</textarea>
                            </div>

                            <!-- Image -->
                            <div class="mb-3">
                                <label class="form-label">Image</label>

                                <input type="file" id="Image" name="Image" class="form-control" accept="image/"
                                    value="{{ $sliders->Image }}">
                            </div>

                            <!-- Buttons -->
                            <div class="d-flex justify-content-between">

                                <a href="{{ route('sliders.index') }}" class="btn btn-secondary">
                                    Back
                                </a>

                                <button type="button" class="btn btn-success" onclick="performUpdate({{ $sliders->id }})">
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

            formData.append('title', document.getElementById('title').value);
            formData.append('description', document.getElementById('description').value);
            formData.append('image', document.getElementById('image').files[0]);

            storeRoute('/cms/admin/sliders_update/' + id, formData);
        }
    </script>

@endsection
