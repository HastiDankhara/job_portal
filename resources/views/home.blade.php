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

    {{-- <section class="section-1 py-5 "> 
        <div class="container">
            <div class="card border-0 shadow p-5">
                <form action="{{ route('jobapply') }}" method="get">
                    <div class="row">
                        <div class="col-md-3 mb-3 mb-sm-3 mb-lg-0">
                            <input type="text" class="form-control" name="keywords" id="keywords" placeholder="Keywords">
                        </div>
                        <div class="col-md-3 mb-3 mb-sm-3 mb-lg-0">
                            <input type="text" class="form-control" name="location" id="location" placeholder="Location">
                        </div>
                        <div class="col-md-3 mb-3 mb-sm-3 mb-lg-0">
                            <select name="category" id="category" class="form-control">
                                <option value="">Select a Category</option>
                                @if($newcate->isNotEmpty())
                                    @foreach ($newcate as $cate)
                                        <option value="{{ $cate->id }}">{{ $cate->category }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        
                        <div class=" col-md-3 mb-xs-3 mb-sm-3 mb-lg-0">
                            <div class="d-grid gap-2">
                                <button href="#" type="submit" class="btn btn-primary btn-block">Search</button>
                            </div>
                            
                        </div>
                    </div>
                </form>      
            </div>
        </div>
    </section> --}}

    <section class="section-2 bg-2 py-5">
        <div class="container">
            <h2>Popular Categories</h2>
            <div class="row pt-5">
                @if ($category->isNotEmpty())
                    @foreach ($category as $cat)
                    <div class="col-lg-4 col-xl-3 col-md-6">
                    <div class="single_catagory">
                        <a href="jobs.html"><h4 class="pb-2">{{ $cat->category }}</h4></a>
                        <p class="mb-0"> <span>50</span> Available position</p>
                    </div>
                </div>
                    @endforeach
                @endif
                
            </div>
        </div>
    </section>

    {{-- <section class="section-3  py-5">
        <div class="container">
            <h2>Featured Jobs</h2>
            <div class="row pt-5">
                <div class="job_listing_area">                    
                    <div class="job_lists">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card border-0 p-3 shadow mb-4">
                                    <div class="card-body">
                                        <h3 class="border-0 fs-5 pb-2 mb-0">Web Developer</h3>
                                        <p>We are in need of a Web Developer for our company.</p>
                                        <div class="bg-light p-3 border">
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-map-marker"></i></span>
                                                <span class="ps-1">Noida</span>
                                            </p>
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-clock-o"></i></span>
                                                <span class="ps-1">Remote</span>
                                            </p>
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-usd"></i></span>
                                                <span class="ps-1">2-3 Lacs PA</span>
                                            </p>
                                        </div>

                                        <div class="d-grid mt-3">
                                            <a href="{{ route('job_details') }}" class="btn btn-primary btn-lg">Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="card border-0 p-3 shadow mb-4">
                                    <div class="card-body">
                                        <h3 class="border-0 fs-5 pb-2 mb-0">Web Developer</h3>
                                        <p>We are in need of a Web Developer for our company.</p>
                                        <div class="bg-light p-3 border">
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-map-marker"></i></span>
                                                <span class="ps-1">Noida</span>
                                            </p>
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-clock-o"></i></span>
                                                <span class="ps-1">Remote</span>
                                            </p>
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-usd"></i></span>
                                                <span class="ps-1">2-3 Lacs PA</span>
                                            </p>
                                        </div>

                                        <div class="d-grid mt-3">
                                            <a href="{{ route('job_details') }}" class="btn btn-primary btn-lg">Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card border-0 p-3 shadow mb-4">
                                    <div class="card-body">
                                        <h3 class="border-0 fs-5 pb-2 mb-0">Web Developer</h3>
                                        <p>We are in need of a Web Developer for our company.</p>
                                        <div class="bg-light p-3 border">
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-map-marker"></i></span>
                                                <span class="ps-1">Noida</span>
                                            </p>
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-clock-o"></i></span>
                                                <span class="ps-1">Remote</span>
                                            </p>
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-usd"></i></span>
                                                <span class="ps-1">2-3 Lacs PA</span>
                                            </p>
                                        </div>

                                        <div class="d-grid mt-3">
                                            <a href="{{ route('job_details') }}" class="btn btn-primary btn-lg">Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card border-0 p-3 shadow mb-4">
                                    <div class="card-body">
                                        <h3 class="border-0 fs-5 pb-2 mb-0">Web Developer</h3>
                                        <p>We are in need of a Web Developer for our company.</p>
                                        <div class="bg-light p-3 border">
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-map-marker"></i></span>
                                                <span class="ps-1">Noida</span>
                                            </p>
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-clock-o"></i></span>
                                                <span class="ps-1">Remote</span>
                                            </p>
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-usd"></i></span>
                                                <span class="ps-1">2-3 Lacs PA</span>
                                            </p>
                                        </div>

                                        <div class="d-grid mt-3">
                                            <a href="{{ route('job_details') }}" class="btn btn-primary btn-lg">Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card border-0 p-3 shadow mb-4">
                                    <div class="card-body">
                                        <h3 class="border-0 fs-5 pb-2 mb-0">Web Developer</h3>
                                        <p>We are in need of a Web Developer for our company.</p>
                                        <div class="bg-light p-3 border">
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-map-marker"></i></span>
                                                <span class="ps-1">Noida</span>
                                            </p>
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-clock-o"></i></span>
                                                <span class="ps-1">Remote</span>
                                            </p>
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-usd"></i></span>
                                                <span class="ps-1">2-3 Lacs PA</span>
                                            </p>
                                        </div>

                                        <div class="d-grid mt-3">
                                            <a href="{{ route('job_details') }}" class="btn btn-primary btn-lg">Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card border-0 p-3 shadow mb-4">
                                    <div class="card-body">
                                        <h3 class="border-0 fs-5 pb-2 mb-0">Web Developer</h3>
                                        <p>We are in need of a Web Developer for our company.</p>
                                        <div class="bg-light p-3 border">
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-map-marker"></i></span>
                                                <span class="ps-1">Noida</span>
                                            </p>
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-clock-o"></i></span>
                                                <span class="ps-1">Remote</span>
                                            </p>
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-usd"></i></span>
                                                <span class="ps-1">2-3 Lacs PA</span>
                                            </p>
                                        </div>

                                        <div class="d-grid mt-3">
                                            <a href="{{ route('job_details') }}" class="btn btn-primary btn-lg">Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    {{-- <section class="section-3 bg-2 py-5">
        <div class="container">
            <h2>Latest Jobs</h2>
            <div class="row pt-5">
                <div class="job_listing_area">                    
                    <div class="job_lists">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card border-0 p-3 shadow mb-4">
                                    <div class="card-body">
                                        <h3 class="border-0 fs-5 pb-2 mb-0">Web Developer</h3>
                                        <p>We are in need of a Web Developer for our company.</p>
                                        <div class="bg-light p-3 border">
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-map-marker"></i></span>
                                                <span class="ps-1">Noida</span>
                                            </p>
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-clock-o"></i></span>
                                                <span class="ps-1">Remote</span>
                                            </p>
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-usd"></i></span>
                                                <span class="ps-1">2-3 Lacs PA</span>
                                            </p>
                                        </div>

                                        <div class="d-grid mt-3">
                                            <a href="{{ route('job_details') }}" class="btn btn-primary btn-lg">Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="card border-0 p-3 shadow mb-4">
                                    <div class="card-body">
                                        <h3 class="border-0 fs-5 pb-2 mb-0">Web Developer</h3>
                                        <p>We are in need of a Web Developer for our company.</p>
                                        <div class="bg-light p-3 border">
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-map-marker"></i></span>
                                                <span class="ps-1">Noida</span>
                                            </p>
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-clock-o"></i></span>
                                                <span class="ps-1">Remote</span>
                                            </p>
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-usd"></i></span>
                                                <span class="ps-1">2-3 Lacs PA</span>
                                            </p>
                                        </div>

                                        <div class="d-grid mt-3">
                                            <a href="{{ route('job_details') }}" class="btn btn-primary btn-lg">Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card border-0 p-3 shadow mb-4">
                                    <div class="card-body">
                                        <h3 class="border-0 fs-5 pb-2 mb-0">Web Developer</h3>
                                        <p>We are in need of a Web Developer for our company.</p>
                                        <div class="bg-light p-3 border">
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-map-marker"></i></span>
                                                <span class="ps-1">Noida</span>
                                            </p>
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-clock-o"></i></span>
                                                <span class="ps-1">Remote</span>
                                            </p>
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-usd"></i></span>
                                                <span class="ps-1">2-3 Lacs PA</span>
                                            </p>
                                        </div>

                                        <div class="d-grid mt-3">
                                            <a href="{{ route('job_details') }}" class="btn btn-primary btn-lg">Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card border-0 p-3 shadow mb-4">
                                    <div class="card-body">
                                        <h3 class="border-0 fs-5 pb-2 mb-0">Web Developer</h3>
                                        <p>We are in need of a Web Developer for our company.</p>
                                        <div class="bg-light p-3 border">
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-map-marker"></i></span>
                                                <span class="ps-1">Noida</span>
                                            </p>
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-clock-o"></i></span>
                                                <span class="ps-1">Remote</span>
                                            </p>
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-usd"></i></span>
                                                <span class="ps-1">2-3 Lacs PA</span>
                                            </p>
                                        </div>

                                        <div class="d-grid mt-3">
                                            <a href="{{ route('job_details') }}" class="btn btn-primary btn-lg">Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card border-0 p-3 shadow mb-4">
                                    <div class="card-body">
                                        <h3 class="border-0 fs-5 pb-2 mb-0">Web Developer</h3>
                                        <p>We are in need of a Web Developer for our company.</p>
                                        <div class="bg-light p-3 border">
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-map-marker"></i></span>
                                                <span class="ps-1">Noida</span>
                                            </p>
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-clock-o"></i></span>
                                                <span class="ps-1">Remote</span>
                                            </p>
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-usd"></i></span>
                                                <span class="ps-1">2-3 Lacs PA</span>
                                            </p>
                                        </div>

                                        <div class="d-grid mt-3">
                                            <a href="{{ route('job_details') }}" class="btn btn-primary btn-lg">Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card border-0 p-3 shadow mb-4">
                                    <div class="card-body">
                                        <h3 class="border-0 fs-5 pb-2 mb-0">Web Developer</h3>
                                        <p>We are in need of a Web Developer for our company.</p>
                                        <div class="bg-light p-3 border">
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-map-marker"></i></span>
                                                <span class="ps-1">Noida</span>
                                            </p>
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-clock-o"></i></span>
                                                <span class="ps-1">Remote</span>
                                            </p>
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-usd"></i></span>
                                                <span class="ps-1">2-3 Lacs PA</span>
                                            </p>
                                        </div>

                                        <div class="d-grid mt-3">
                                            <a href="{{ route('job_details') }}" class="btn btn-primary btn-lg ">Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
@endsection
