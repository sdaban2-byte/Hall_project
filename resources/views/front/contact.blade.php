@extends('front.master')


@section('title', 'Contact us ')

@section('styles')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">



@endsection
@section('content')

    <div class="page-header">

        <h5 class="text-white m-0">Contact Us</h5>


    </div>

    <section class="section container">

        <form class="col-md-6 mx-auto">
            @csrf
            <label class="form-label">name</label>
            <input class="form-control" id="name" name="name" rows="4" placeholder="Write your name ..."></input>

            <!-- email -->
            <div class="mb-3">
                <label class="form-label">email</label>
                <input class="form-control" id="email" name="email" rows="4"
                    placeholder="Write your email ..."></input>
            </div>


            <!-- description -->
            <div class="mb-3">
                <label class="form-label">massege</label>
                <textarea class="form-control" id="massege" name="massege" rows="10" placeholder="Write your  massege ..."></textarea>
            </div>

            <button type="button" onclick="storeContact()" class="btn btn-dark w-100">Send</button>

        </form>

    </section>




@endsection
@section('script')
    <script src="{{ asset('js/crud.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function storeContact() {
            let formData = new FormData();

            formData.append('name', document.getElementById('name').value);
            formData.append('email', document.getElementById('email').value);
            formData.append('massege', document.getElementById('massege').value);
            store('/halls/contactus', formData);
        }
    </script>

@endsection
