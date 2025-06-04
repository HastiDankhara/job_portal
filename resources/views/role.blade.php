@extends('layout')

@section('main')
<section class="section-5">
    <div class="container my-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-7">
                <div class="card shadow border-0 p-5">
                    <h1 class="h3">Create Role</h1>
                    <form id="roleForm" method="POST" action="{{ route('role.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name">Role Name*</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Enter Role Name">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Create Role</button>
                    </form>
                </div>
                <div class="mt-4 text-center">
                    <p>Go back to <a href="{{ route('home') }}">Home</a></p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

{{-- @section('scripts')
    <script>
        $(document).ready(function () {
            $('#roleForm').submit(function (e) {
                e.preventDefault();
                $.ajax({
                    url: '{{ route("role.store") }}',
                    type: 'POST',
                    data: $('#roleForm').serialize(),
                    success: function (response) {
                        alert("Role created successfully");
                        $('#roleForm')[0].reset();
                        $('.form-control').removeClass('is-invalid');
                        $('.invalid-feedback').remove();
                        if (response.success && response.redirect_url) {
                            window.location.href = response.redirect_url;
                        }
                    },
                    error: function (xhr) {
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            $('.invalid-feedback').remove();
                            $('.form-control').removeClass('is-invalid');

                            $.each(errors, function (key, value) {
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
@endsection --}}
