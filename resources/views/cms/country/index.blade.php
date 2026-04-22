@extends('cms.parent')

@section('title','country')

@section('maintitle','country')

@section('subtitle','country')

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
            <a href="{{ route('countries.create') }}" class="btn btn-primary" type="submit">Create new country</a>

                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table class="table table-bordered">
                      <thead>
                        
                        <tr>
                          <th style="width: 10px" class="text-center">id</th>
                          <th class="text-center">country_name</th>
                          <th class="text-center">code</th>
                          <th class="text-center">Action</th>
                          
                        </tr>
                        
                      </thead>
                     <tbody>
                        @foreach ( $countries as $country)
                            
                        
                        <tr class="align-middle">
                            <td>{{ $country->id }}</td>
                            <td>{{ $country->country_name}}</td>
                            <td>{{ $country->code}}</td>
                            <td class="text-center">
            <div class="btn-group">
                
                <a href="{{ route('countries.show', $country->id) }}" 
                   class="btn btn-sm btn-outline-success" title="Show">
                    <i class="bi bi-eye-fill"></i>
                </a>

                <a href="{{ route('countries.edit', $country->id) }}" 
                   class="btn btn-sm btn-outline-primary" title="Edit">
                    <i class="bi bi-pencil-square"></i>
                </a>

                <form action="{{ route('countries.destroy', $country->id) }}" method="POST" style="display:inline;" 
                      onsubmit="return confirm('Are you sure you want to delete ({{ $country->country_name }})?');">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="confirmDestroy({{ $country->id }}, this)" class="btn btn-sm btn-outline-danger" title="Delete">
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
                  {{ $countries-> links() }}
                </div>
                <!-- /.card -->

@endsection

@section('scripts')
<script>
   function confirmDestroy(id, reference) {
    destroy('/cms/admin/countries/' + id, reference);
}
</script>

@endsection