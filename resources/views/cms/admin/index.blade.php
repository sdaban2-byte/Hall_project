@extends('cms.parent')

@section('title', 'Admin Index')

@section('maintitle', 'Admin Index')

@section('subtitle', 'Admin Index')

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
                            <a href="{{ route('admins.create') }}" class="btn btn-primary" type="submit">Create new Admin</a>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>

                                    <tr>
                                        <th style="width: 10px" class="text-center">id</th>
                                        <th class="text-center">Image</th>
                                        <th class="text-center">First name </th>
                                        <th class="text-center">Last name</th>
                                        <th class="text-center">email</th>
                                        <th class="text-center">gender</th>
                                        <th class="text-center">status</th>
                                        <th class="text-center">city name </th>
                                        <th class="text-center">sitting</th>

                                    </tr>

                                </thead>
                                <tbody>
                                    @foreach ($admins as $admin)
                                        <tr class="align-middle">
                                            <td>{{ $admin->id }}</td>

                                            <td>
                                                <img src="{{ asset('storage/images/admin/' . $admin->user->image ?? '') }}"
                                                    class="rounded-circle" alt="user Image" width="50" height="50">

                                            </td>

                                            <td>{{ $admin->user->first_name ?? '' }}</td>
                                            <td>{{ $admin->user->last_name ?? '' }}</td>

                                            <td>{{ $admin->email }}</td>
                                            <td>
                                                @if ($admin->user->gender == 'male')
                                                    <span class="badge bg-primary">{{ $admin->user->gender ?? '' }}</span>
                                                @else
                                                    <span class="badge" style="background-color:#e83e8c;">{{ $admin->user->gender ?? '' }}</span>
                                                @endif
                                            </td>

                                            <td>{{ $admin->user->status ?? '' }}</td>


                                            <td><span class="badge bg-info">{{ $admin->user->city->city_name ?? '' }}</span>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">

                                                    <a href="{{ route('admins.show', $admin->id) }}"
                                                        class="btn btn-sm btn-outline-success" title="Show">
                                                        <i class="bi bi-eye-fill"></i>
                                                    </a>

                                                    <a href="{{ route('admins.edit', $admin->id) }}"
                                                        class="btn btn-sm btn-outline-primary" title="Edit">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>

                                                    <form action="{{ route('admins.destroy', $admin->id) }}" method="POST"
                                                        style="display:inline;"
                                                        onsubmit="return confirm('Are you sure you want to delete ({{ optional($admin->user)->first_name ?? 'this user' }})?');">
                                                        {{-- رجّع null بدل error --}}
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button"
                                                            onclick="confirmDestroy({{ $admin->id }}, this)"
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
                        {{ $admins->links() }}
                    </div>
                    <!-- /.card -->

                @endsection

                @section('scripts')
                    <script>
                        function confirmDestroy(id, reference) {
                            destroy('/cms/admin/admins/' + id, reference);
                        }
                    </script>

                @endsection
