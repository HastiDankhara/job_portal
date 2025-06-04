@extends('adminsidebar')

@section('main')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-9">
            <div class="card shadow border-0 p-4">
                <h2 class="mb-4 text-center">Edit User</h2>

                {{-- Global success & error messages --}}
                {{-- @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}

                <form action="{{ route('edituser.store', $user->id) }}" method="POST" id="userform" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Name --}}
                    <div class="mb-3">
                        <label for="name" class="form-label">Name*</label>
                        <input type="text" value="{{ old('name', $user->name) }}" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Name">
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    {{-- Email --}}
                    <div class="mb-3">
                        <label for="email" class="form-label">Email*</label>
                        <input type="email" value="{{ old('email', $user->email) }}" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email">
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    {{-- Designation --}}
                    <div class="mb-3">
                        <label for="designation" class="form-label">Designation*</label>
                        <input type="text" value="{{ old('designation', $user->designation) }}" name="designation" id="designation" class="form-control @error('designation') is-invalid @enderror" placeholder="Enter Designation">
                        @error('designation') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    {{-- Mobile --}}
                    <div class="mb-3">
                        <label for="mobile" class="form-label">Mobile*</label>
                        <input type="text" value="{{ old('mobile', $user->mobile) }}" name="mobile" id="mobile" class="form-control @error('mobile') is-invalid @enderror" placeholder="Enter Mobile Number">
                        @error('mobile') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    {{-- Role --}}
                    <div class="mb-3">
                        <label for="role" class="form-label">Role*</label>
                        <input type="text" value="{{ old('role', $user->role ?? '') }}" name="role" id="role" class="form-control @error('role') is-invalid @enderror" placeholder="Enter Role (e.g., admin, user)">
                        @error('role') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    {{-- Submit Button --}}
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary mt-3">Update</button>
                        <a href="{{ route('users') }}" class="btn btn-link mt-2">&larr; Back to Users</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
