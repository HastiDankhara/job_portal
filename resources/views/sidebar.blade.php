<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
<div class="col-lg-3">
                    <div class="card border-0 shadow mb-4 p-3">
                        <div class="s-body text-center mt-3">
                            @if (Auth::user()->profile_pic && file_exists(public_path('profile_pic/' . Auth::user()->profile_pic)))
                                <img src="{{ asset('profile_pic/' . Auth::user()->profile_pic) }}" alt="avatar" class="profile-img">
                            @else
                                <img src="{{ asset('assets/images/avatar7.png') }}" alt="avatar" class="profile-img">
                            @endif
                            <h5 class="mt-3 pb-0">{{ Auth::user()->name }}</h5>
                            <p class="text-muted mb-1 fs-6">{{ Auth::user()->designation }}</p>
                            <div class="d-flex justify-content-center mb-2">
                                <button data-bs-toggle="modal" data-bs-target="#exampleModal" type="button" class="btn btn-primary">Change Profile Picture</button>
                            </div>
                        </div>
                    </div>
                    <div class="card account-nav border-0 shadow mb-4 mb-lg-0">
                        <div class="card-body p-0">
                            <ul class="list-group list-group-flush ">
                                <li class="list-group-item d-flex justify-content-between p-3">
                                    <a href="{{ route('account.profile') }}">Account Settings</a>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <a href="{{ route('post_job') }}">Post a Job</a>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <a href="{{ route('my_job') }}">My Jobs</a>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <a href="{{ route('jobapply') }}">All Jobs</a>
                                </li>                                                     
                            </ul>
                        </div>
                    </div>
                </div>