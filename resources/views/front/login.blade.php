@section('title', 'login Title')
@section('styles')
@endsection
@section('content')
    <!-- FORM -->
    <div class="center">
        <div class="card p-4 shadow">

            <h3 class="text-center text-warning">Login</h3>

            <input class="form-control my-3" placeholder="Email">
            <input type="password" class="form-control my-3" placeholder="Password">

            <button class="btn btn-warning w-100">Login</button>

            <p class="text-center mt-3">
                No account? <a href="register.html">Register</a>
            </p>

        </div>
    </div>
@endsection
@section('script')



@endsection
