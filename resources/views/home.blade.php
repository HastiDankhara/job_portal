@extends('layout')
@section('main')
    <section class="section-0 lazy d-flex bg-image-style dark align-items-center "   class="" data-bg="assets/images/banner5.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12 col-xl-8">
                    <h1>Ready to Build Your Career?</h1>
                    <p>Join thousands of job seekers and get hired now!</p>
                    <div class="banner-btn mt-5"><a href="{{ route('register') }}" class="btn btn-primary mb-4 mb-sm-0">Get Started</a></div>
                    {{-- <div class="banner-btn mt-5"><a href="#" class="btn btn-primary mb-4 mb-sm-0">Explore Now</a></div> --}}
                </div>
            </div>
        </div>
    </section>
@endsection
