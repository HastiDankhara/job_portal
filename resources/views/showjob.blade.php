@extends('layout')
@section('main')
    <section class="section bg-light py-5">
        <div class="container">
            <h2 class="mb-4">{{ $savejob->title }}</h2>
            <div class="mb-3">
                <strong>Category:</strong> {{ $savejob->category }} <br>
                <strong>Nature:</strong> {{ $savejob->nature }} <br>
                <strong>Vacancy:</strong> {{ $savejob->vacancy }} <br>
                <strong>Salary:</strong> {{ $savejob->salary }} <br>
                <strong>Location:</strong> {{ $savejob->location }}
            </div>

            <div class="mb-3">
                <h5>Description</h5>
                <p>{{ $savejob->description }}</p>

                <h5>Responsibilities</h5>
                <p>{{ $savejob->responsibility }}</p>

                <h5>Benefits</h5>
                <p>{{ $savejob->benefits }}</p>

                <h5>Qualifications</h5>
                <p>{{ $savejob->qualification }}</p>

                <h5>Keywords</h5>
                <p>{{ $savejob->keywords }}</p>
            </div>

            <div class="mb-3">
                <h5>Company Info</h5>
                <p>
                    <strong>Name:</strong> {{ $savejob->company_name }} <br>
                    <strong>Location:</strong> {{ $savejob->company_location }} <br>
                    <strong>Website:</strong> <a href="{{ $savejob->company_website }}" target="_blank">{{ $savejob->company_website }}</a>
                </p>
            </div>

            <a href="{{ route('jobapply') }}" class="btn btn-secondary">Back to Jobs</a>
        </div>
    </section>
@endsection


