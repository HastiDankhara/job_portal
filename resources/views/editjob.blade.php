@extends('layout')
@section('main')
    <section class="section-5 bg-2">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Edit a Job</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                @include('sidebar') {{-- Sidebar include --}}
                
                <div class="col-lg-9">
                    <form action="#" id="editjob" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card border-0 shadow mb-4 ">
                            <div class="card-body card-form p-4">
                                
                                    <h3 class="fs-4 mb-1">Update Job Details</h3>
                                    <div class="row">
                                        <input type="hidden" name="id" value="{{ $savejob->id }}">
                                        <div class="col-md-6 mb-4">
                                            <label for="" class="mb-2">Title<span class="req">*</span></label>
                                            <input type="text" value="{{ $savejob->title }}" placeholder="Job Title" id="title" name="title" class="form-control">
                                        </div>
                                        <div class="col-md-6  mb-4">
                                            <label for="" class="mb-2">Category<span class="req">*</span></label>
                                            <select name="category" id="category" class="form-control">
                                                <option value="">Select a Category</option>
                                                <option value="Engineering" @selected($savejob->category == 'Engineering')>Engineering</option>
                                                <option value="Accountant" @selected($savejob->category == 'Accountant')>Accountant</option>
                                                <option value="Information Technology" @selected($savejob->category == 'Information Technology')>Information Technology</option>
                                                <option value="Fashion designing" @selected($savejob->category == 'Fashion designing')>Fashion designing</option>
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
                                            <input type="number" min="1" placeholder="Vacancy" id="vacancy" name="vacancy" class="form-control" value="{{ $savejob->vacancy }}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="mb-4 col-md-6">
                                            <label for="" class="mb-2">Salary</label>
                                            <input type="text" value="{{ $savejob->salary }}" placeholder="Salary" id="salary" name="salary" class="form-control">
                                        </div>

                                        <div class="mb-4 col-md-6">
                                            <label for="" class="mb-2">Location<span class="req">*</span></label>
                                            <input type="text" value="{{ $savejob->location }}" placeholder="location" id="location" name="location" class="form-control">
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label for="" class="mb-2">Description<span class="req">*</span></label>
                                        <textarea class="form-control" name="description" id="description" cols="5" rows="5" placeholder="Description">{{ $savejob->description }}</textarea>
                                    </div>
                                    <div class="mb-4">
                                        <label for="" class="mb-2">Benefits</label>
                                        <textarea class="form-control" name="benefits" id="benefits" cols="5" rows="5" placeholder="Benefits">{{ $savejob->benefits }}</textarea>
                                    </div>
                                    <div class="mb-4">
                                        <label for="" class="mb-2">Responsibility</label>
                                        <textarea class="form-control" name="responsibility" id="responsibility" cols="5" rows="5" placeholder="Responsibility">{{ $savejob->responsibility }}</textarea>
                                    </div>
                                    <div class="mb-4">
                                        <label for="" class="mb-2">Qualifications</label>
                                        <textarea class="form-control" name="qualification" id="qualification" cols="5" rows="5" placeholder="Qualifications">{{ $savejob->qualification }}</textarea>
                                    </div>
                                    <div class="mb-4">
                                        <label for="" class="mb-2">Keywords<span class="req">*</span></label>
                                        <input type="text" value="{{ $savejob->keywords }}" placeholder="keywords" id="keywords" name="keywords" class="form-control">
                                    </div>

                                    <h3 class="fs-4 mb-1 mt-5 border-top pt-5">Company Details</h3>

                                    <div class="row">
                                        <div class="mb-4 col-md-6">
                                            <label for="" class="mb-2">Name<span class="req">*</span></label>
                                            <input type="text" value="{{ $savejob->company_name }}" placeholder="Company Name" id="company_name" name="company_name" class="form-control">
                                        </div>

                                        <div class="mb-4 col-md-6">
                                            <label for="" class="mb-2">Location</label>
                                            <input type="text" value="{{ $savejob->company_location }}" placeholder="Location" id="company_location" name="company_location" class="form-control">
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label for="" class="mb-2">Website</label>
                                        <input type="text" value="{{ $savejob->company_website }}" placeholder="Website" id="company_website" name="company_website" class="form-control">
                                    </div>
                                </div> 
                                <div class="card-footer  p-4">
                                    <button type="submit" class="btn btn-primary">Update Job</button>
                                </div>               
                            </div>
                    </form>
                </div>
            </div>
    </section>
@endsection

@section('scripts')
        <script>
            $(document).ready(function(){
                $('#editjob').on('submit', function(e){
                    e.preventDefault();

                    $.ajax({
                        url: "{{ route('updatejob.store') }}",
                        type: "POST",
                        data: $(this).serialize(),
                        success: function(response) {
                            if(response.success){
                                alert('Job updated successfully');
                                if(response.redirect_url) {
                                    window.location.href = response.redirect_url;
                                }
                            } else {
                                alert('Error updating Job');
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