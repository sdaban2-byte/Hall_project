@extends('cms.parent')

@section('title', 'slider')

@section('maintitle', 'slider')

@section('subtitle', 'slider')

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
                            <a href="{{ route('sliders.create') }}" class="btn btn-primary" type="submit">Create new
                                slider</a>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>

                                    <tr>
                                        <th class="text-center"> Slider Title </th>
                                        <th class="text-center">Slider description </th>
                                        <th class="text-center">Slider image </th>
                                        <th class="text-center">Action</th>

                                    </tr>

                                </thead>
                                <tbody>
                                    @foreach ($sliders as $slider)
                                        <tr class="align-middle">

                                            <td>{{ $slider->title }}</td>

                                            <td>{{ $slider->description }}</td>

                                            <td>
                                                <img src="{{ asset('storage/images/slider/' . $slider->image ?? ' ') }}"
                                                    alt="user Image" width="50" height="50">

                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">

                                                    <a href="{{ route('sliders.show', $slider->id) }}"
                                                        class="btn btn-sm btn-outline-success">
                                                        <i class="bi bi-eye-fill"></i>
                                                    </a>

                                                    <a href="{{ route('sliders.edit', $slider->id) }}"
                                                        class="btn btn-sm btn-outline-primary">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>

                                                    <form action="{{ route('sliders.destroy', $slider->id) }}"
                                                        method="POST" style="display:inline;"
                                                        onsubmit="return confirm('Delete this slider?');">

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
                        {{ $sliders->links() }}
                    </div>
                    <!-- /.card -->

                @endsection

                @section('scripts')
                    <script>
                        function confirmDestroy(id, reference) {
                            destroy('/cms/admin/sliders/' + id, reference);
                        }
                    </script>

                @endsection
