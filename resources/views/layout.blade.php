<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}" />
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/trumbowyg@2.27.3/dist/ui/trumbowyg.min.css">
    <title>JobPortal</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow py-3">
            <div class="container">
                <a class="navbar-brand" href="index.html">CareerVibe</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-0 ms-sm-0 me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('home') }}">Home</a>
                        </li>	
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('post_job') }}">Post a Job</a>
                        </li>										
                    </ul>
                    @if (!Auth::check())
                        <a class="btn btn-outline-primary me-2" href="{{ route('login') }}" type="submit">Login</a>
                    @else
                    @if (Auth::user()->role == 'admin')
                        <a class="btn btn-outline-primary me-2" href="{{ route('role.create') }}" type="submit">Role</a>
                        <a class="btn btn-outline-primary me-2" href="{{ route('admin') }}" type="submit">Admin</a>
                    @endif
                        <a class="btn btn-outline-primary me-2" href="{{ route('showaccount') }}" type="submit">Account</a>
                    @endif				
                    {{-- <a class="btn btn-primary me-2" href="{{ route('post_job') }}" type="submit">Post a Job</a> --}}
                    {{-- <a class="btn btn-outline-primary me-2" href="{{ route('showaccount') }}" type="submit">Account</a> --}}
                    {{-- <a class="btn btn-outline-primary me-2" href="{{ route('login') }}" type="submit">Login</a> --}}
                    <a class="btn btn-outline-primary" href="{{ route('logout') }}" type="submit">Logout</a>
                </div>
            </div>
        </nav>
    </header>
    <div>
        @yield('main') 
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title pb-0" id="exampleModalLabel">Change Profile Picture</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="propic" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Profile Image</label>
                            <input type="file" class="form-control" id="image"  name="image">
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary mx-3">Update</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                        
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="bg-dark py-3 bg-2">
        <div class="container">
            <p class="text-center text-white pt-3 fw-bold fs-6">© 2023 xyz company, all right reserved</p>
        </div>
    </footer> 
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.5.1.3.min.js') }}"></script>
    <script src="{{ asset('assets/js/instantpages.5.1.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/lazyload.17.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/trumbowyg@2.27.3/dist/trumbowyg.min.js"></script>
    <script>
        $('.textarea').trumbowyg();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#propic').on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('update_propic') }}",
                data: formData,
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status == 'success') {
                        alert("Profile picture updated successfully");
                        $('#exampleModal').modal('hide');
                        location.reload();
                    } else {
                        alert("Failed to update profile picture");
                        window.location.reload();
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    </script>
    @yield('scripts')
</body>
</html>