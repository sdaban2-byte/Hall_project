@extends('cms.parent')

@section('title', 'Edit Review')

@section('maintitle', 'Edit Review')

@section('subtitle', 'Edit Review')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card shadow-sm">

                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Edit Review</h5>
                    </div>

                    <div class="card-body">

                        <form id="reviewForm">

                            @csrf

                            <!-- Client -->
                            <div class="mb-3">
                                <label class="form-label">Client</label>

                                <select name="client_id" id="client_id" class="form-control">
                                    @foreach ($clients as $client)
                                        <option value="{{ $client->id }}"
                                            {{ $reviews->client_id == $client->id ? 'selected' : '' }}>
                                            {{ $client->user->first_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Rating -->
                            <div class="mb-3">
                                <label class="form-label">Rating</label>

                                <input type="number" id="rating" name="rating" class="form-control" min="1"
                                    max="5" value="{{ $reviews->rating }}">
                            </div>

                            <!-- Comment -->
                            <div class="mb-3">
                                <label class="form-label">Comment</label>

                                <textarea id="comment" name="comment" class="form-control" rows="4">{{ $reviews->comment }}</textarea>
                            </div>

                            <!-- Buttons -->
                            <div class="d-flex justify-content-between">

                                <a href="{{ route('reviews.index') }}" class="btn btn-secondary">
                                    Back
                                </a>

                                <button type="button" class="btn btn-success" onclick="performUpdate({{ $reviews->id }})">
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

            formData.append('client_id', document.getElementById('client_id').value);
            formData.append('rating', document.getElementById('rating').value);
            formData.append('comment', document.getElementById('comment').value);

            storeRoute('/cms/admin/reviews_update/' + id, formData);
        }
    </script>

@endsection
