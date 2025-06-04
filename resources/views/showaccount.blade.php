@extends('layout')

@section('main')
<section class="bg-light py-5">
    <div class="container">
        <div class="row mb-4">
            <div class="col">
                <nav aria-label="breadcrumb" class="rounded-3 p-3 mb-3">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">My Account</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            {{-- @include('sidebar') Sidebar include --}}
            <div class="col-lg-9 mx-auto"> {{-- Centered content --}}
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-4">
                            <div>
                                <h4 class="mb-0">Logged In User's Details</h4>
                                {{-- <h4 class="mb-0">{{ Auth::user()->name }}</h4>
                                <p class="text-muted mb-0">{{ Auth::user()->email }}</p> --}}
                            </div>
                        </div>

                        <hr>

                        <div class="row mb-3">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <label class="form-label fw-semibold">Full Name</label>
                                <div class="form-control bg-light">{{ Auth::user()->name }}</div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Email</label>
                                <div class="form-control bg-light">{{ Auth::user()->email }}</div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <label class="form-label fw-semibold">Designation</label>
                                <div class="form-control bg-light">{{ Auth::user()->designation }}</div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Mobile</label>
                                <div class="form-control bg-light">{{ Auth::user()->mobile }}</div>
                            </div>
                        </div>

                        <div class="text-end">
                            <a href="{{ route('account.profile') }}" class="btn btn-primary">
                                Edit Profile
                            </a>
                        </div>
                    </div> {{-- End card-body --}}
                </div> {{-- End card --}}
            </div> {{-- End col --}}
        </div> {{-- End row --}}
    </div> {{-- End container --}}
</section>
@endsection
