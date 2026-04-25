@extends('cms.parent')

@section('title','edit_city')

@section('maintitle','edit_city')

@section('subtitle','edit_city')

@section('styles')

@endsection

@section('content')
  <div class="card card-info card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header">
                    <div class="card-title">Edit data of country</div>
                  </div>
                  <!--end::Header-->
                  <!--begin::Form-->
                 <form class="needs-validation" novalidate>
  <div class="card-body">
     <div class="form-group mb-3">
    <label for="country_id" class="form-label">Country Name</label>
    <select class="form-select custom-scroll-select" id="country_id" name="country_id">
        <option value="" selected disabled>Select a country</option>
        @foreach($countries as $country)
            <option value="{{ $country->id }}">{{ $country->country_name }}</option>
        @endforeach
    </select>
</div>

    
    <div class="row g-3">


      <div class="col-md-12"> <label for="city_name" class="form-label">City Name</label>
        <input
          type="text"
          class="form-control"
          id="city_name"
          name="city_name"
          value="{{ $cities->city_name }}"
          required
        />
        <div class="valid-feedback">Looks good!</div>
      </div>

      <div class="col-md-12"> <label for="street" class="form-label">street</label>
        <input
          type="text"
          class="form-control"
          id="street"
          name="street"
          value="{{ $cities->street}}"
          required
        />
        <div class="valid-feedback">Looks good!</div>
      </div>

      <div class="col-md-12"> <label for="country_id" class="form-label">country_id</label>
        <input
          type="text"
          class="form-control"
          id="country_id"
          name="country_id"
          value="{{ $cities->country_id}}"
          required
        />
        <div class="valid-feedback">Looks good!</div>
      </div>

       </div>
        </div>
      <div class="card-footer">
       <button class="btn btn-primary" type="button" onclick="performUpdate({{ $cities->id }})">Update</button>
       <a href="{{ route('cities.index') }}" class="btn btn-primary" type="submit">Index</a>
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
    formData.append('city_name', document.getElementById('city_name').value);
    formData.append('street', document.getElementById('street').value);
    formData.append('country_id', document.getElementById('country_id').value);


    storeRoute('/cms/admin/cities_update/'+id, formData);
}


</script>

@endsection
