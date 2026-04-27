@extends('cms.parent')

@section('title', 'Create slider')

@section('maintitle', 'Create slider')

@section('subtitle', 'Create slider')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Create New slider</h5>
                    </div>

                    <div class="card-body">

                        <form id="sliderForm">

                            <!-- title -->
                            <div class="mb-3">
                                <label class="form-label">title</label>
                                <input class="form-control" id="title" name="title" rows="4"
                                    placeholder="Write your title slider..."></input>
                            </div>


                            <!-- description -->
                            <div class="mb-3">
                                <label class="form-label">description</label>
                                <textarea class="form-control" id="description" name="description" rows="2"
                                    placeholder="Write your slider description ..."></textarea>
                            </div>
                            <!-- Image -->
                            <div class="mb-3">
                                <label for="image" class="form-label"ءء>Choose Image</label>
                                <input type="file" class="form-control" id="image" name="image" accept="image/">
                            </div>

                            <!-- Buttons -->
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('sliders.index') }}" class="btn btn-secondary">
                                    Back
                                </a>

                                <button type="button" class="btn btn-success" onclick="performStore()">
                                    Save slider
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

            formData.append('title', document.getElementById('title').value);
            formData.append('description', document.getElementById('description').value);
            formData.append('image', document.getElementById('image').files[0]);

            store('/cms/admin/sliders', formData);
        }
    </script>
@endsection
