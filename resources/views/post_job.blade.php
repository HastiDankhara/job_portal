@extends('layout')
@section('main')
    <section class="section-5 bg-2">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Post a Job</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                @include('sidebar') {{-- Sidebar include --}}
                
                <div class="col-lg-9">
                    <form action="#" id="savejob" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card border-0 shadow mb-4 ">
                            <div class="card-body card-form p-4">
                                
                                    <h3 class="fs-4 mb-1">Job Details</h3>
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <label for="" class="mb-2">Title<span class="req">*</span></label>
                                            <input type="text" placeholder="Job Title" id="title" name="title" class="form-control">
                                        </div>
                                        <div class="col-md-6  mb-4">
                                            <label for="" class="mb-2">Category<span class="req">*</span></label>
                                            <select name="category" id="category" class="form-control">
                                                <option value="">Select a Category</option>
                                                <option value="Engineering">Engineering</option>
                                                <option value="Accountant">Accountant</option>
                                                <option value="Information Technology">Information Technology</option>
                                                <option value="Fashion designing">Fashion designing</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <label for="" class="mb-2">Job Nature<span class="req">*</span></label>
                                            <select name="nature" id="nature" class="form-select">
                                                <option value="Full Time">Full Time</option>
                                                <option value="Part Time">Part Time</option>
                                                <option value="Remote">Remote</option>
                                                <option value="Freelance">Freelance</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6  mb-4">
                                            <label for="" class="mb-2">Vacancy<span class="req">*</span></label>
                                            <input type="number" min="1" placeholder="Vacancy" id="vacancy" name="vacancy" class="form-control">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="mb-4 col-md-6">
                                            <label for="" class="mb-2">Salary</label>
                                            <input type="text" placeholder="Salary" id="salary" name="salary" class="form-control">
                                        </div>

                                        <div class="mb-4 col-md-6">
                                            <label for="" class="mb-2">Location<span class="req">*</span></label>
                                            <input type="text" placeholder="location" id="location" name="location" class="form-control">
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label for="" class="mb-2">Description<span class="req">*</span></label>
                                        <textarea class="form-control" name="description" id="description" cols="5" rows="5" placeholder="Description"></textarea>
                                    </div>
                                    <div class="mb-4">
                                        <label for="" class="mb-2">Benefits</label>
                                        <textarea class="form-control" name="benefits" id="benefits" cols="5" rows="5" placeholder="Benefits"></textarea>
                                    </div>
                                    <div class="mb-4">
                                        <label for="" class="mb-2">Responsibility</label>
                                        <textarea class="form-control" name="responsibility" id="responsibility" cols="5" rows="5" placeholder="Responsibility"></textarea>
                                    </div>
                                    <div class="mb-4">
                                        <label for="" class="mb-2">Qualifications</label>
                                        <textarea class="form-control" name="qualification" id="qualification" cols="5" rows="5" placeholder="Qualifications"></textarea>
                                    </div>
                                    <div class="mb-4">
                                        <label for="" class="mb-2">Keywords<span class="req">*</span></label>
                                        <input type="text" placeholder="keywords" id="keywords" name="keywords" class="form-control">
                                    </div>

                                    <h3 class="fs-4 mb-1 mt-5 border-top pt-5">Company Details</h3>

                                    <div class="row">
                                        <div class="mb-4 col-md-6">
                                            <label for="" class="mb-2">Name<span class="req">*</span></label>
                                            <input type="text" placeholder="Company Name" id="company_name" name="company_name" class="form-control">
                                        </div>

                                        <div class="mb-4 col-md-6">
                                            <label for="" class="mb-2">Location</label>
                                            <input type="text" placeholder="Location" id="company_location" name="company_location" class="form-control">
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label for="" class="mb-2">Website</label>
                                        <input type="text" placeholder="Website" id="company_website" name="company_website" class="form-control">
                                    </div>
                                </div> 
                                <div class="card-footer  p-4">
                                    <button type="submit" class="btn btn-primary">Save Job</button>
                                </div>               
                        </div>
                    </form>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
                $('#savejob').submit(function(e) {
                    e.preventDefault();
                    console.log("Form submitted");
                    $.ajax({
                        url: '{{ route("savejob.store") }}',
                        type: 'POST',
                        data: $('#savejob').serialize(),
                        success: function(response) {
                            // console.log(response); 
                            alert("Job Save successfully");
                            $('#savejob')[0].reset();
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