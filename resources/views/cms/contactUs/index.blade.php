@extends('cms.parent')

@section('title', 'contact Us')

@section('maintitle', 'contact Us')

@section('subtitle', 'contact Us')

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
                            <a href="{{ route('contactUs.create') }}" class="btn btn-primary" type="submit">Create new
                                contactUs</a>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>

                                    <tr>
                                        <th class="text-center"> Name </th>
                                        <th class="text-center">contactUs email </th>

                                        <th class="text-center">contactUs Massege </th>
                                        <th class="text-center">Action</th>

                                    </tr>

                                </thead>
                                <tbody>
                                    @foreach ($contactUs as $contact_Us)
                                        <tr class="align-middle">

                                            <td>{{ $contact_Us->name }}</td>

                                            <td>{{ $contact_Us->email }}</td>
                                            <td>{{ $contact_Us->massege }}</td>


                                            <td class="text-center">
                                                <div class="btn-group">

                                                    {{-- <a href="{{ route('contactUs.show', $contact_Us->id) }}"
                                                        class="btn btn-sm btn-outline-success">
                                                        <i class="bi bi-eye-fill"></i>
                                                    </a>

                                                    <a href="{{ route('contactUs.edit', $contact_Us->id) }}"
                                                        class="btn btn-sm btn-outline-primary">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a> --}}


                                                    <button type="button"
                                                        onclick="confirmDestroy({{ $contact_Us->id }}, this)"
                                                        class="btn btn-sm btn-outline-danger">
                                                        <i class="bi bi-trash3-fill"></i>
                                                    </button>
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
                        {{ $contactUs->links() }}
                    </div>
                    <!-- /.card -->

                @endsection

                @section('scripts')

                    <script>
                        function confirmDestroy(id, reference) {
                            Swal.fire({
                                title: "Are you sure?",
                                text: "You won't be able to revert this!",
                                icon: "warning",
                                showCancelButton: true,
                                confirmButtonText: "Yes, delete it!"
                            }).then((result) => {
                                if (result.isConfirmed) {

                                    fetch('/cms/admin/contactUs/' + id, {
                                            method: 'DELETE',
                                            headers: {
                                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                                'Accept': 'application/json'
                                            }
                                        })
                                        .then(res => res.json())
                                        .then(data => {

                                            reference.closest('tr').remove(); // حذف مباشر بدون refresh

                                            Swal.fire({
                                                icon: 'success',
                                                title: data.title
                                            });

                                        });
                                }
                            });
                        }
                    </script>

                @endsection
