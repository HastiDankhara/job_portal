@extends('layout')
@section('main')
    <section class="section-5">
        <div class="container my-5">
            <div class="py-lg-2">&nbsp;</div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-7">
                    <div class="card shadow border-0 p-5">
                        <h1 class="h3">Login</h1>
                        <form action="{{ route('login.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="mb-2">Email*</label>
                                <input type="text" value="{{old('email')}}" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="example@example.com">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div> 
                            <div class="mb-3">
                                <label for="" class="mb-2">Password*</label>
                                <input type="password" value="{{old('email')}}" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter Password">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div> 
                            <div class="justify-content-between d-flex">
                            <button type="submit" class="btn btn-primary mt-2">Login</button>
                            </div>
                        </form>                    
                    </div>
                    <div class="mt-4 text-center">
                        <p>Do not have an account? <a  href="{{ route('register') }}">Register</a></p>
                    </div>
                </div>
            </div>
            <div class="py-lg-5">&nbsp;</div>
        </div>
    </section>
@endsection

{{-- @section('scripts')
    <script>
        $(document).ready(function(){
            $('#loginform').submit(function(e){
                e.preventDefault();

                $.ajax({
                    url: '{{ route("login.store") }}',
                    type: 'post',
                    data: $(this).serialize(),
                    success: function(response){
                        alert("Login successfully");
                        $('#loginform')[0].reset();
                        $('.form-control').removeClass('is-invalid');
                        $('.invalid-feedback').remove();

                        if (response.success && response.redirect_url) {
                            window.location.href = response.redirect_url;
                        }
                    },
                    error: function(xhr) {
                        $('.invalid-feedback').remove();
                        $('.form-control').removeClass('is-invalid');

                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            $.each(errors, function(key, value) {
                                let input = $('#' + key);
                                input.addClass('is-invalid');
                                input.after('<div class="invalid-feedback">' + value[0] + '</div>');
                            });
                        } else if (xhr.status === 401) {
                            alert("Invalid login credentials.");
                        } else {
                            alert("Something went wrong. Please try again.");
                            console.log(xhr.responseText); // Debug use
                        }
                    }
                });
            });
        });
    </script>
@endsection --}}