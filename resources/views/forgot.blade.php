@extends('layout')
@section('main')
    <section class="section-5">
        <div class="container my-5">
            <div class="py-lg-2">&nbsp;</div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-7">
                    <div class="card shadow border-0 p-5">
                        <h1 class="h3">Forgot Password</h1>
                        <form action="{{ route('forgot.store') }}" method="POST">
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
                            <div class="justify-content-between d-flex">
                            <button type="submit" class="btn btn-primary mt-2">Forgot</button>
                                <a href="{{ route('login') }}" class="mt-3">← Back to Login</a>
                            </div>
                        </form>                    
                    </div>
                </div>
            </div>
            <div class="py-lg-5">&nbsp;</div>
        </div>
    </section>
@endsection