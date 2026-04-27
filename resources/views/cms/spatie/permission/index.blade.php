@extends('cms.parent')

@section('title','permission')

@section('maintitle','permission')

@section('subtitle','permission')

@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
@endsection

@section('content')
<div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid" >
            <!--begin::Row-->
            <div class="row">
              <div class="col-md-12">
                <div class="card mb-4">
                  <div class="card-header">
            <a href="{{ route('permissions.create') }}" class="btn btn-primary" type="submit">Create new permission</a>

                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table class="table table-bordered">
                      <thead>

                        <tr>
                          <th style="width: 10px" class="text-center">id</th>
                          <th class="text-center">permission_name</th>
                          <th class="text-center">guard_name</th>
                    
                          <th class="text-center">Action</th>

                        </tr>

                      </thead>
                     <tbody>
                        @foreach ( $permissions as $permission)


                        <tr class="align-middle">
                            <td>{{ $permission->id }}</td>
                            <td>{{ $permission->name}}</td>
                            <td>{{ $permission->guard_name}}</td>
                            <td class="text-center">
            <div class="btn-group">

                <a href="{{ route('permissions.show', $permission->id) }}"
                   class="btn btn-sm btn-outline-success" title="Show">
                    <i class="bi bi-eye-fill"></i>
                </a>

                <a href="{{ route('permissions.edit', $permission->id) }}"
                   class="btn btn-sm btn-outline-primary" title="Edit">
                    <i class="bi bi-pencil-square"></i>
                </a>

                <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST" style="display:inline;"
                      onsubmit="return confirm('Are you sure you want to delete ({{ $permission->name }})?');">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="confirmDestroy({{ $permission->id }}, this)" class="btn btn-sm btn-outline-danger" title="Delete">
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
                  {{ $permissions-> links() }}
                </div>
                <!-- /.card -->

@endsection

@section('scripts')
<script>
   function confirmDestroy(id, reference) {
    destroy('/cms/admin/permissions/' + id, reference);
}
</script>

@endsection
