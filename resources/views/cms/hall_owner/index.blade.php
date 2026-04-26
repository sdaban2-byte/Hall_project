@extends('cms.parent')

@section('title', 'Hall Owner Index')

@section('maintitle', 'Hall Owner Index')

@section('subtitle', 'Hall Owner Index')

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
                            <a href="{{ route('hall_owners.create') }}" class="btn btn-primary" type="submit">Create new
                                Hall Owner </a>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>

                                    <tr>
                                        <th style="width: 10px" class="text-center">id</th>
                                        <th class="text-center">Image</th>
                                        <th class="text-center">Full name </th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Company Name</th>
                                        <th class="text-center">Halls</th>
                                        <th class="text-center">city name </th>
                                        <th class="text-center">sitting</th>

                                    </tr>

                                </thead>
                                <tbody>
                                    @foreach ($hall_owners as $hall_owner)
                                        <tr class="align-middle">
                                            <td>{{ $hall_owner->id }}</td>

                                            <td>
                                                <img src="{{ asset('storage/images/hall_owner/' . optional($hall_owner->user)->image) }}"
                                                    class="rounded-circle" alt="user Image" width="50" height="50">

                                            </td>

                                            <td> {{ optional($hall_owner->user)->first_name ?? 'No Owner' }}


                                            </td>
                                            <td>{{ $hall_owner->email ?? '' }}</td>

                                            <td>{{ $hall_owner->company_name }}</td>
                                            {{-- edit to is_veridied --}}
                                            {{-- <td>
                                                <span
                                                    class="badge {{ $hall_owner->is_verified ? 'bg-success' : 'bg-danger' }}">
                                                    {{ $hall_owner->is_verified ? 'Verified' : 'Not Verified' }}
                                                </span>
                                            </td> --}}
                                            <td><a href="{{ route('indexHall', ['id' => $hall_owner->id]) }}"
                                                    class="btn bg-success">( {{ $hall_owner->halls_count }} )hall/s</a>
                                            </td>

                                            <td><span
                                                    class="badge bg-info">{{ $hall_owner->user->city->city_name ?? '' }}</span>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">

                                                    <a href="{{ route('hall_owners.show', $hall_owner->id) }}"
                                                        class="btn btn-sm btn-outline-success" title="Show">
                                                        <i class="bi bi-eye-fill"></i>
                                                    </a>

                                                    <a href="{{ route('hall_owners.edit', $hall_owner->id) }}"
                                                        class="btn btn-sm btn-outline-primary" title="Edit">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>

                                                    <form action="{{ route('hall_owners.destroy', $hall_owner->id) }}"
                                                        method="POST" style="display:inline;"
                                                        onsubmit="return confirm('Are you sure you want to delete ({{ optional($hall_owner->user)->first_name ?? 'this user' }})?');">
                                                        {{-- رجّع null بدل error --}}
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button"
                                                            onclick="confirmDestroy({{ $hall_owner->id }}, this)"
                                                            class="btn btn-sm btn-outline-danger" title="Delete">
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
                        {{ $hall_owners->links() }}
                    </div>
                    <!-- /.card -->

                @endsection

                @section('scripts')
                    <script>
                        function confirmDestroy(id, reference) {
                            destroy('/cms/admin/hall_owners/' + id, reference);
                        }
                    </script>

                @endsection
