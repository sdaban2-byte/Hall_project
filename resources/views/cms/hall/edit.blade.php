@extends('cms.parent')

@section('title', 'Edit Hall')

@section('maintitle', 'Edit Hall')

@section('subtitle', 'Edit Hall')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card shadow-sm">

                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Edit Hall</h5>
                    </div>

                    <div class="card-body">

                        <form id="hallForm">

                            @csrf

                            <!-- Owner -->
                            <div class="mb-3">
                                <label class="form-label">Owner</label>

                                <select name="hall_owner_id" id="hall_owner_id" class="form-control">
                                    @foreach ($hall_owners as $hall_owner)
                                        <option value="{{ $hall_owner->id }}"
                                            {{ $halls->hall_owner_id == $hall_owner->id ? 'selected' : '' }}>
                                            {{ $hall_owner->user->first_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>


                            <!-- name -->
                            <div class="mb-3">
                                <label class="form-label">name</label>
                                <input class="form-control" id="name" name="name"
                                    placeholder="enter the name of hall" value="{{ $halls->name }}"></input>
                            </div>
                            <!-- Image -->
                            <div class="mb-3">
                                <label for="image" class="form-label"> Image</label>
                                <input value="{{ $halls->image }}" type="file" class="form-control" id="image"
                                    name="image" accept="image/">
                            </div>
                            <!-- capacity -->
                            <div class="mb-3">
                                <label class="form-label">capacity</label>
                                <input value="{{ $halls->capacity }}" class="form-control" id="capacity"
                                    name="capacity"></input>
                            </div>
                            <!-- location -->
                            <div class="mb-3">
                                <label class="form-label">location</label>
                                <input value="{{ $halls->location }}" class="form-control" id="location" name="location"
                                    placeholder="enter the location of hall"></input>
                            </div>
                            <!-- description -->
                            <div class="mb-3">
                                <label class="form-label">description</label>
                                <input value="{{ $halls->description }}" class="form-control" id="description"
                                    name="description" placeholder="enter the description of hall"></input>
                            </div>
                            <!-- price -->
                            <div class="mb-3">
                                <label class="form-label">price </label>
                                <input value="{{ $halls->price }}" type="number" class="form-control" id="price"
                                    name="price"></input>
                            </div>



                            <!-- Buttons -->
                            <div class="d-flex justify-content-between">

                                <a href="{{ route('halls.index') }}" class="btn btn-secondary">
                                    Back
                                </a>

                                <button type="button" class="btn btn-success"
                                    onclick="performUpdate({{ $halls->id }})">
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

            formData.append('hall_owner_id', document.getElementById('hall_owner_id').value);
            formData.append('name', document.getElementById('name').value);
            formData.append('image', document.getElementById('image').files[0]);
            formData.append('capacity', document.getElementById('capacity').value);
            formData.append('price', document.getElementById('price').value);
            formData.append('location', document.getElementById('location').value);
            formData.append('description', document.getElementById('description').value);

            storeRoute('/cms/admin/halls_update/' + id, formData);
        }
    </script>

@endsection
