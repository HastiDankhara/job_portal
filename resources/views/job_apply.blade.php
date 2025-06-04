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
                            <li class="breadcrumb-item active">Jobs Applied</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                @include('sidebar') {{-- Sidebar include --}}
                
                <div class="col-lg-9">
                    <div class="card border-0 shadow mb-4 p-3">
                        <div class="card-body card-form">
                            <h3 class="fs-4 mb-1">Jobs Applied</h3>
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
                                        {{-- <tr class="active"> --}}
                                            {{-- @if ($jobs->isNotEmpty()) --}}
                                                @forelse ($jobs as $job)
                                                <tr>
                                                    <td>
                                                        <div class="job-name fw-500">{{ $job->title }}</div>
                                                        <div class="info1">{{ $job->nature }} . {{ $job->location }}</div>
                                                    </td>
                                                    <td>{{ $job->created_at->format('d M, Y') }}</td>
                                                    <td>{{ $job->category }}</td>
                                                    <td>{{ $job->salary }}</td>
                                                    <td>
                                                        <div class="action-dots float-end">
                                                            <a href="#" class="" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                            </a>
                                                            <ul class="dropdown-menu dropdown-menu-end">
                                                                <li><a class="dropdown-item" href="{{ route('jobdetails',$job->id) }}"> <i class="fa fa-eye" aria-hidden="true"></i> View</a></li>
                                                                @if (Auth::user()->role == 'admin')
                                                                    <li><a class="dropdown-item" href="{{ route('deletejob.store',$job->id) }}"><i class="fa fa-trash" aria-hidden="true"></i> Remove</a></li>
                                                                @endif
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @empty
                                                <tr>
                                                    <td colspan="5" class="text-center">No jobs applied yet.</td>
                                                </tr>
                                                @endforelse
                                            {{-- @endif --}}
                                            
                                        {{-- </tr> --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
            <div>
                {{-- <div class="mt-5">
                    {{ $job->links('pagination::bootstrap-5') }}
                </div> --}}
            </div>
        </div>
    </section>
@endsection

