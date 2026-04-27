@extends('cms.parent')

@section('title','show_role')

@section('maintitle','show_role')

@section('subtitle','show_role')

@section('styles')

@endsection

@section('content')
  <div class="card card-info card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header">
                    <div class="card-title">show Data of role</div>
                  </div>
                  <!--end::Header-->
                  <!--begin::Form-->
                 <form class="needs-validation" novalidate>
  <div class="card-body">
    <div class="row g-3">
      
      <div class="col-md-12"> <label for="name" class="form-label">Role Name</label>
        <input
          type="text"
          class="form-control"
          id="name" disabled
          name="name"
          value="{{ $roles->name }}"
          required
        />
        <div class="valid-feedback">Looks good!</div>
      </div>
      
      <div class="col-md-12"> <label for="guard_name" class="form-label">Guard_name</label>
        <input
          type="text"
          class="form-control"
          id="guard_name" disabled
          name="guard_name"
          value="{{ $roles->guard_name }}"
          required
        />
        <div class="valid-feedback">Looks good!</div>
      </div>

       </div>
        </div>
      <div class="card-footer">
  
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

@endsection
