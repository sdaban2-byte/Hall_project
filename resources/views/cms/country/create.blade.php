@extends('cms.parent')

@section('title','create_country')

@section('maintitle','create_contry')

@section('subtitle','create_country')

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
    <div class="row g-3">
      
      <div class="col-md-12"> <label for="country_name" class="form-label">Country Name</label>
        <input
          type="text"
          class="form-control"
          id="country_name"
          name="country_name"
          placeholder="Enter country name"
          required
        />
        <div class="valid-feedback">Looks good!</div>
      </div>
      
      <div class="col-md-12"> <label for="code" class="form-label">Country Code</label>
        <input
          type="text"
          class="form-control"
          id="code"
          name="code"
          placeholder="Enter code (e.g. PS)"
          required
        />
        <div class="valid-feedback">Looks good!</div>
      </div>

       </div>
        </div>
      <div class="card-footer">
       <button class="btn btn-primary" type="button" onclick="performStore()">Store</button>
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
<script>
    function performStore() {
    let formData = new FormData();
    // تأكدي من وجود علامات الاقتباس حول المعرفات
    formData.append('country_name', document.getElementById('country_name').value);
    formData.append('code', document.getElementById('code').value);

    store('/cms/admin/countries', formData);
}


</script>
@endsection
