@extends('cms.parent')

@section('title', 'Create Halls')

@section('maintitle', 'Create Halls')

@section('subtitle', 'Create Halls')

@section('content')

    <div class="container">

        <div class="card">

            <div class="card-body">

                <form id="hallForm">


                    <div class="mb-3">
                        <input type="hidden" name="hall_owner_id" value="{{ $id ?? request()->route('id') }}">
                            class="form-control form-control-solid" hidden />
                    </div>
                    {{-- Owner
                    <div class="mb-3">
                        <label>Hall Owner</label>

                        <select id="hall_owner_id" name="hall_owner_id" class="form-control">
                            <option value="">Select Owner</option>

                            @foreach ($hall_owners as $owner)
                                <option value="{{ $owner->id }}">
                                    {{ $owner->user->first_name ?? 'No Name' }}
                                </option>
                            @endforeach
                        </select>
                    </div>
 --}}


                    {{-- Name --}}
                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" id="name" class="form-control">
                    </div>

                    {{-- Image --}}
                    <div class="mb-3">
                        <label>Image</label>
                        <input type="file" id="image" class="form-control">
                    </div>

                    {{-- Capacity --}}
                    <div class="mb-3">
                        <label>Capacity</label>
                        <input type="number" id="capacity" class="form-control">
                    </div>

                    {{-- Price --}}
                    <div class="mb-3">
                        <label>Price</label>
                        <input type="number" id="price" class="form-control">
                    </div>

                    {{-- Location --}}
                    <div class="mb-3">
                        <label>Location</label>
                        <input type="text" id="location" class="form-control">
                    </div>

                    {{-- Description --}}
                    <div class="mb-3">
                        <label>Description</label>
                        <textarea id="description" class="form-control"></textarea>
                    </div>

                    <button type="button" class="btn btn-success" onclick="performStore()">
                        Save
                    </button>
                    <a href="{{ route('indexHall',$id) }}" class="btn btn-secondary">
                        Back
                    </a>
                </form>

            </div>

        </div>

    </div>

@endsection

@section('scripts')
    <script>
        function performStore() {

            let formData = new FormData();

            formData.append('hall_owner_id', document.getElementById('hall_owner_id').value);
            formData.append('name', document.getElementById('name').value);
            formData.append('image', document.getElementById('image').files[0]);
            formData.append('capacity', document.getElementById('capacity').value);
            formData.append('price', document.getElementById('price').value);
            formData.append('location', document.getElementById('location').value);
            formData.append('description', document.getElementById('description').value);

            store('/cms/admin/halls', formData);
        }
    </script>
@endsection
