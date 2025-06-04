@extends('layout')

@section('main')
    <section class="section-5 bg-2">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('post_job') }}">Post a Job</a></li>
                            <li class="breadcrumb-item active">Account Settings</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row">
                @include('sidebar') {{-- Sidebar include --}}

                <div class="col-lg-9">
                    {{-- Profile Update Card --}}
                    <div class="card border-0 shadow mb-4">
                        <form action="#" method="POST" id="userform" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body p-4">
                                <h3 class="fs-4 mb-1">My Profile</h3>

                                <div class="mb-4">
                                    <label class="mb-2">Name*</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
                                </div>

                                <div class="mb-4">
                                    <label class="mb-2">Email*</label>
                                    <input type="text" name="email" id="email" class="form-control" value="{{ $user->email }}">
                                </div>

                                <div class="mb-4">
                                    <label class="mb-2">Designation*</label>
                                    <input type="text" name="designation" id="designation" class="form-control" value="{{ $user->designation }}">
                                </div>

                                <div class="mb-4">
                                    <label class="mb-2">Mobile*</label>
                                    <input type="text" name="mobile" id="mobile" class="form-control" value="{{ $user->mobile }}">
                                </div>
                            </div>

                            <div class="card-footer p-4">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>

                    {{-- Password Change Card --}}
                    <div class="card border-0 shadow mb-4">
                        <div class="card-body p-4">
                            <h3 class="fs-4 mb-1">Change Password</h3>
                            <form action="" id="changebtn" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-4">
                                    <label class="mb-2">Old Password*</label>
                                    <input type="password" id="old_password" name="old_password" class="form-control">
                                </div>
                                <div class="mb-4">
                                    <label class="mb-2">New Password*</label>
                                    <input type="password" id="new_password" name="new_password" class="form-control">
                                </div>
                                <div class="mb-4">
                                    <label class="mb-2">Confirm Password*</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                                </div>

                                <div class="card-footer p-4">
                                    <button type="submit" class="btn btn-primary">Change</button>
                                </div>
                            </form>
                        </div>
                    </div>                
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $('#userform').on('submit', function(e){
                e.preventDefault();

                $.ajax({
                    url: "{{ route('account.update_profile') }}",
                    type: "POST",
                    data: $(this).serialize(),
                    success: function(response) {
                        if(response.status === 'success'){
                            alert('Profile updated successfully');
                            if(response.redirect_url) {
                                window.location.href = response.redirect_url;
                            }
                        } else {
                            alert('Error updating profile');
                        }
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            $('.invalid-feedback').remove();
                            $('.form-control').removeClass('is-invalid');

                            $.each(errors, function(key, value) {
                                let input = $('#' + key);
                                input.addClass('is-invalid');
                                input.after('<div class="invalid-feedback">' + value[0] + '</div>');
                            });
                        }
                    }
                });
            });
        });
        $(document).ready(function(){
            // $('#changebtn').on('submit', function(e){
            //     e.preventDefault();

            //     $.ajax({
            //         url: "{{ route('changepass') }}",
            //         type: "POST",
            //         data: $(this).serialize(),
            //         success: function(response) {
            //             if(response.status === 'success'){
            //                 alert('Profile updated successfully');
            //                 if(response.redirect_url) {
            //                     window.location.href = response.redirect_url;
            //                 }
            //             } else {
            //                 alert('Error updating profile');
            //             }
            //         },
            //         error: function(xhr) {
            //             if (xhr.status === 422) {
            //                 let errors = xhr.responseJSON.errors;
            //                 $('.invalid-feedback').remove();
            //                 $('.form-control').removeClass('is-invalid');

            //                 $.each(errors, function(key, value) {
            //                     let input = $('#' + key);
            //                     input.addClass('is-invalid');
            //                     input.after('<div class="invalid-feedback">' + value[0] + '</div>');
            //                 });
            //             }
            //         }
            //     });
            // });
            $('#changebtn').on('submit', function(e){
    e.preventDefault();

    $.ajax({
        url: "{{ route('changepass') }}",
        type: "POST",
        data: $(this).serialize() + '&_method=PUT',
        success: function(response) {
            if(response.status === 'success'){
                alert('Password changed successfully');
                if(response.redirect_url) {
                    window.location.href = response.redirect_url;
                }
            } else {
                alert('Error changing password');
            }
        },
        error: function(xhr) {
            if (xhr.status === 422) {
                let errors = xhr.responseJSON.errors;
                $('.invalid-feedback').remove();
                $('.form-control').removeClass('is-invalid');

                $.each(errors, function(key, value) {
                    let input = $('#' + key);
                    input.addClass('is-invalid');
                    input.after('<div class="invalid-feedback">' + value[0] + '</div>');
                });
            } else if (xhr.status === 403) {
                alert(xhr.responseJSON.message);
            }
        }
    });
});

        });
        
    </script>
@endsection
