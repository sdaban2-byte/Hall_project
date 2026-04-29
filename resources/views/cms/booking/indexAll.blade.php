@extends('cms.parent')

@section('title', 'Hall')

@section('maintitle', 'Hall')

@section('subtitle', 'Hall')

@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
@endsection
@section('content')

    <div class="container-fluid">

        <div class="card">

            {{-- <div class="card-header">
                <a href="{{ route('createHall', $id) }}" class="btn btn-primary">
                    Create Hall
                </a>
            </div> --}}

            <div class="card-body">

                <table class="table table-bordered text-center">

                    <thead>
                        <tr>
                            <th>Owner</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Capacity</th>
                            <th>Price</th>
                            {{-- <th>Actions</th> --}}
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($halls as $hall)
                            <tr>

                                <td>
                                    {{ optional($hall->hall_owner->user)->first_name ?? 'No Owner' }}
                                </td>

                                <td>{{ $hall->name }}</td>


                                <td>
                                    <img src="{{ asset('storage/images/hall/' . $hall->image) }}" alt="user Image"
                                        width="50" height="50">

                                </td>

                                <td>{{ $hall->capacity }}</td>
                                <td>{{ $hall->price }}</td>

                                {{-- <td>

                                    <a href="{{ route('halls.show', $hall->id) }}" class="btn btn-success btn-sm">
                                        Show
                                    </a>

                                    <a href="{{ route('halls.edit', $hall->id) }}" class="btn btn-primary btn-sm">
                                        Edit
                                    </a>

                                    <button class="btn btn-danger btn-sm"
                                        onclick="confirmDestroy({{ $hall->id }}, this)">
                                        Delete
                                    </button>

                                </td> --}}

                            </tr>
                        @endforeach
                    </tbody>

                </table>

                {{ $halls->links('pagination::bootstrap-5') }}
            </div>

        </div>

    </div>

@endsection

@section('scripts')
    <script>
        function confirmDestroy(id, reference) {
            destroy('/cms/admin/halls/' + id, reference);
        }
    </script>
@endsection
