@extends('cms.parent')

@section('title', 'client Index')

@section('maintitle', 'client Index')

@section('subtitle', 'client Index')

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
                            <a href="{{ route('clients.create') }}" class="btn btn-primary" type="submit">Create new
                                client</a>

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
                                        <th class="text-center">booking_count</th>
                                        <th class="text-center">last_booking_date</th>
                                        <th class="text-center">sitting</th>

                                    </tr>

                                </thead>
                                <tbody>
                                    @foreach ($clients as $client)
                                        <tr class="align-middle">
                                            <td>{{ $client->id }}</td>

                                            <td>
                                                <img src="{{ asset('storage/images/client/' . optional($client->user)->image) }}"
                                                    class="rounded-circle" width="50" height="50">

                                            </td>

                                            <td>{{ $client->user->first_name ?? '' }}</td>
                                            <td>{{ $client->user->last_name ?? '' }}</td>

                                            <td>{{ $client->email }}</td>
                                            <td>{{ $client->bookings->count() }}</td>

                                            <td>
                                                {{ $client->bookings->sortByDesc('booking_date')->first()?->booking_date ?? 'No booking' }}
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">

                                                    <a href="{{ route('clients.show', $client->id) }}"
                                                        class="btn btn-sm btn-outline-success" title="Show">
                                                        <i class="bi bi-eye-fill"></i>
                                                    </a>

                                                    <a href="{{ route('clients.edit', $client->id) }}"
                                                        class="btn btn-sm btn-outline-primary" title="Edit">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>

                                                    <form action="{{ route('clients.destroy', $client->id) }}"
                                                        method="POST" style="display:inline;"
                                                        onsubmit="return confirm('Are you sure you want to delete ({{ optional($client->user)->first_name ?? 'this user' }})?');">
                                                        {{-- رجّع null بدل error --}}
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button"
                                                            onclick="confirmDestroy({{ $client->id }}, this)"
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
                        {{ $clients->links() }}
                    </div>
                    <!-- /.card -->

                @endsection

                @section('scripts')
                    <script>
                        function confirmDestroy(id, reference) {
                            destroy('/cms/admin/clients/' + id, reference);
                        }
                    </script>

                @endsection
