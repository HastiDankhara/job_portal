@extends('layout')
@section('main')
    <section class="section-5 bg-2">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('post_job') }}">Post a Job</a></li>                            
                            <li class="breadcrumb-item active">My Jobs</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                @include('sidebar') {{-- Sidebar include --}}
                
                <div class="col-lg-9">
                    <div class="card border-0 shadow mb-4 p-3">
                        <div class="card-body card-form">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h3 class="fs-4 mb-1">My Jobs</h3>
                                </div>
                                <div style="margin-top: -10px;">
                                    <a href="{{ route('post_job') }}" class="btn btn-primary">Post a Job</a>
                                </div>
                                
                            </div>
                            <div class="table-responsive">
                                <table class="table ">
                                    <thead class="bg-light">
                                        <tr>
                                            <th scope="col">Title</th>
                                            <th scope="col">Job Created</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Salary</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="border-0">
                                       @if ($savejobs->isNotEmpty())
                                            @foreach ($savejobs as $job)
                                                <tr class="active">
                                                    <td>
                                                        <div class="job-name fw-500">{{ $job->title }}</div>
                                                        <div class="info1">{{ $job->nature }},
                                                            <br>{{ $job->location }}</div>
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($job->created_at)->format('d M, Y') }}</td>
                                                    <td>{{ $job->category }}</td>
                                                    <td>
                                                        <div class="job-status text-capitalize">{{ $job->salary }}</div>
                                                        <div class="info1">Vacancy: {{ $job->vacancy }} Years</div>
                                                    </td>
                                                    <td>
                                                        <div class="action-dots float-end">
                                                            <button class="btn btn-light btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                            </button>
                                                            <ul class="dropdown-menu dropdown-menu-end">
                                                                <li><a class="dropdown-item" href="#"> <i class="fa fa-eye" aria-hidden="true"></i> View</a></li>
                                                                <li><a class="dropdown-item" href="{{ route('editjob',$job->id) }}"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></li>
                                                                <li><a class="dropdown-item" href="{{ route('deletejob',$job->id) }}" onclick="confirmDelete($jobId)"><i class="fa fa-trash" aria-hidden="true"></i> Remove</a></li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                       @endif
                                    </tbody>
                                    
                                </table>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
            <div>
                <div class="mt-5">
                    {{ $savejobs->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        function confirmDelete(jobId) {
            if(confirm('Are you sure you want to delete this job?')){
                $.ajax({
                    url: '{{ url('job/delete') }}/' + jobId,  // construct URL with job id
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(response) {
                        if(response.success) {
                            alert('Job deleted successfully');
                            location.reload();
                        } else {
                            alert('Error deleting job');
                        }
                    },
                    error: function(xhr, status, error) {
                        alert('Error deleting job');
                    }
                });
            }
        }
    </script>
@endsection
