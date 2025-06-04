@extends('layout')

@section('main')
<section class="section-5">
    <div class="container my-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-7">
                <div class="card shadow border-0 p-5">
                    <h1 class="h3">Register</h1>
                    <form id="form">
                        @csrf
                        <div class="mb-3">
                            <label>Name*</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name">
                        </div>
                        <div class="mb-3">
                            <label>Email*</label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="Enter Email">
                        </div>
                        <div class="mb-3">
                            <label>Password*</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password">
                        </div>
                        <div class="mb-3">
                            <label>Confirm Password*</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Re-Enter Password">
                        </div>
                        <div class="mb-3">
                            <label>Designation*</label>
                            <input type="text" name="designation" id="designation" class="form-control" placeholder="Enter Designation">
                        </div>
                        <div class="mb-3">
                            <label>Mobile*</label>
                            <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Enter Mobile Number">
                        </div>
                        <div class="mb-3">
                            <label for="role">Role*</label>
                            <select name="role" id="role" class="form-control">
                                <option value="">-- Select Role --</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}">{{ ucfirst($role->name) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Register</button>
                    </form>
                </div>
                <div class="mt-4 text-center">
                    <p>Have an account? <a href="{{ route('login') }}">Login</a></p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    $('#form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: '{{ route("register.store") }}',
            type: 'POST',
            data: $('#form').serialize(),
            success: function(response) {
                alert("Registered successfully");
                $('#form')[0].reset();
                $('.form-control').removeClass('is-invalid');
                $('.invalid-feedback').remove();
                if (response.success && response.redirect_url) {
                    window.location.href = response.redirect_url;
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
</script>
@endsection
