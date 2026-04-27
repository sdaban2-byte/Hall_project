@extends('cms.parent')

@section('title','edit_role')

@section('maintitle','edit_role')

@section('subtitle','edit_role')

@section('styles')

@endsection

@section('content')
  <div class="card card-info card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header">
                  </div>
                  <!--end::Header-->
                  <!--begin::Form-->
               <form class="needs-validation" novalidate>

  <div class="card-body">
    <div class="form-group mb-3">
    <label for="guard_name" class="form-label">Guard Name</label>
        <select class="form-select custom-scroll-select" id="guard_name" name="guard_name">
            <option value="admin" {{ $roles->guard_name == 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="client" {{ $roles->guard_name == 'client' ? 'selected' : '' }}>Client</option>
            <option value="hall_owner" {{ $roles->guard_name == 'hall_owner' ? 'selected' : '' }}>Hall Owner</option>
        </select>
</div>
    <div class="row g-3">

      <div class="col-md-12"> <label for="name" class="form-label">Role Name</label>
        <input
          type="text"
          class="form-control"
          id="name"
          name="name"
          value="{{ $roles->name }}"
          required
        />
        <div class="valid-feedback">Looks good!</div>
      </div>

     



       </div>
        </div>
      <div class="card-footer">
       <button class="btn btn-primary" type="button" onclick="performUpdate({{ $roles->id }})">Update</button>
      <a href="{{ route('roles.index') }}" class="btn btn-primary" type="submit">Index</a>
          </div>
            </form>
                  <!--end::Form-->
                  <!--begin::JavaScript-->
                  <script>
                    // Example starter JavaScript for disabling form submissions if there are invalid fields
                    (() => {
                      'use strict';

                      // Fetch all the forms we want to apply custom Bootstrap validation styles to
                      const forms = document.querySelectorAll('.needs-validation');

                      // Loop over them and prevent submission
                      Array.from(forms).forEach((form) => {
                        form.addEventListener(
                          'submit',
                          (event) => {
                            if (!form.checkValidity()) {
                              event.preventDefault();
                              event.stopPropagation();
                            }

                            form.classList.add('was-validated');
                          },
                          false,
                        );
                      });
                    })();
                  </script>
                  <!--end::JavaScript-->
                </div>
@endsection

@section('scripts')
<script>
    function performUpdate(id) {
    let formData = new FormData();
    formData.append('name', document.getElementById('name').value);
    formData.append('guard_name', document.getElementById('guard_name').value);
    

    storeRoute('/cms/admin/roles_update/'+id, formData);
}


</script>
@endsection
