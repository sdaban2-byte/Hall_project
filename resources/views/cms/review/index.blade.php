@extends('cms.parent')

@section('title', 'review')

@section('maintitle', 'review')

@section('subtitle', 'review')

@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
@endsection

@section('content')
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <a href="{{ route('reviews.create') }}" class="btn btn-primary" type="submit">Create new
                                review</a>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>

                                    <tr>
                                        <th class="text-center"> client name </th>
                                        <th class="text-center">rating </th>
                                        <th class="text-center">comment </th>
                                        <th class="text-center">Action</th>

                                    </tr>

                                </thead>
                                <tbody>
                                    @foreach ($reviews as $review)
                                        <tr class="align-middle">

                                            <td>{{ optional($review->client->user)->first_name }}</td>

                                            <td>{{ $review->rating }}</td>

                                            <td>{{ $review->comment }}</td>

                                            <td class="text-center">
                                                <div class="btn-group">

                                                    <a href="{{ route('reviews.show', $review->id) }}"
                                                        class="btn btn-sm btn-outline-success">
                                                        <i class="bi bi-eye-fill"></i>
                                                    </a>

                                                    <a href="{{ route('reviews.edit', $review->id) }}"
                                                        class="btn btn-sm btn-outline-primary">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>

                                                    <form action="{{ route('reviews.destroy', $review->id) }}"
                                                        method="POST" style="display:inline;"
                                                        onsubmit="return confirm('Delete this review?');">

                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                                            <i class="bi bi-trash3-fill"></i>
                                                        </button>

                                                    </form>

                                                </div>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        {{--  <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-end">
                      <li class="page-item">
                        <a class="page-link" href="#">&laquo;</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#">1</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#">2</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#">3</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#">&raquo;</a>
                      </li>
                    </ul>
                  </div>  --}}
                        {{ $reviews->links() }}
                    </div>
                    <!-- /.card -->

                @endsection

                @section('scripts')
                    <script>
                        function confirmDestroy(id, reference) {
                            destroy('/cms/admin/reviews/' + id, reference);
                        }
                    </script>

                @endsection
