@extends('cms.parent')

@section('title','show_country')

@section('maintitle','show_contry')

@section('subtitle','show_country')

@section('styles')

@endsection

@section('content')
  <div class="card card-info card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header">
                    <div class="card-title">show Data of country</div>
                  </div>
                  <!--end::Header-->
                  <!--begin::Form-->
                 <form class="needs-validation" novalidate>
  <div class="card-body">
    <div class="row g-3">
      
      <div class="col-md-12"> <label for="country_name" class="form-label">Country Name</label>
        <input
          type="text"
          class="form-control"
          id="country_name" disabled
          name="country_name"
          value="{{ $countries->country_name }}"
          required
        />
        <div class="valid-feedback">Looks good!</div>
      </div>
      
      <div class="col-md-12"> <label for="code" class="form-label">Country Code</label>
        <input
          type="text"
          class="form-control"
          id="code" disabled
          name="code"
          value="{{ $countries->code }}"
          required
        />
        <div class="valid-feedback">Looks good!</div>
      </div>

       </div>
        </div>
      <div class="card-footer">
  
       <a href="{{ route('countries.index') }}" class="btn btn-primary" type="submit">Index</a>
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
