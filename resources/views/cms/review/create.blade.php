@extends('cms.parent')

@section('title', 'Create Review')

@section('maintitle', 'Create Review')

@section('subtitle', 'Create Review')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Create New Review</h5>
                    </div>

                    <div class="card-body">

                        <form id="reviewForm">

                            @csrf

                            <!-- Client -->
                            <div class="mb-3">
                                <label class="form-label">Client</label>
                                <select class="form-control" id="client_id" name="client_id">
                                    <option disabled selected>Select Client</option>
                                    @foreach ($clients as $client)
                                        <option value="{{ $client->id }}">
                                            {{-- {{ $client->user->first_name }} {{ $client->user->last_name }} --}}
                                            {{ $client->user?->first_name ?? 'No Name' }} </option>

                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Rating -->
                            <div class="mb-3">
                                <label class="form-label">Rating (1 - 5)</label>
                                <input type="number" class="form-control" id="rating" name="rating" min="1"
                                    max="5" placeholder="Enter rating">
                            </div>

                            <!-- Comment -->
                            <div class="mb-3">
                                <label class="form-label">Comment</label>
                                <textarea class="form-control" id="comment" name="comment" rows="4" placeholder="Write your review..."></textarea>
                            </div>

                            <!-- Buttons -->
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('reviews.index') }}" class="btn btn-secondary">
                                    Back
                                </a>

                                <button type="button" class="btn btn-success" onclick="performStore()">
                                    Save Review
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

            formData.append('client_id', document.getElementById('client_id').value);
            formData.append('rating', document.getElementById('rating').value);
            formData.append('comment', document.getElementById('comment').value);

            store('/cms/admin/reviews', formData);
        }
    </script>
@endsection
