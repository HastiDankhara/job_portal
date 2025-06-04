@extends('adminsidebar') {{-- Assuming layout file includes sidebar --}}
@section('main')
    <div class="container-fluid p-4">
        <!-- Topbar -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h4 fw-bold">Dashboard</h1>
        </div>

        <!-- Cards -->
        <div class="row g-4">
            <div class="col-md-3">
                <div class="bg-white shadow-sm rounded-3 p-3 d-flex align-items-center gap-3">
                    <div class="fs-2 text-primary">👥</div>
                    <div>
                        <small class="text-muted">Users</small>
                        <h4 class="mb-0 fw-bold">{{ $total }}</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="bg-white shadow-sm rounded-3 p-3 d-flex align-items-center gap-3">
                    <div class="fs-2 text-danger">📝</div>
                    <div>
                        <small class="text-muted">Posts</small>
                        <h4 class="mb-0 fw-bold">{{ $totalpost }}</h4>
                    </div>
                </div>
            </div>
            {{-- <div class="col-md-3">
                <div class="bg-white shadow-sm rounded-3 p-3 d-flex align-items-center gap-3">
                    <div class="fs-2 text-success">📈</div>
                    <div>
                        <small class="text-muted">Visits</small>
                        <h4 class="mb-0 fw-bold">1,230</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="bg-white shadow-sm rounded-3 p-3 d-flex align-items-center gap-3">
                    <div class="fs-2 text-secondary">💬</div>
                    <div>
                        <small class="text-muted">Comments</small>
                        <h4 class="mb-0 fw-bold">98</h4>
                    </div>
                </div>
            </div> --}}
        </div>

        <!-- Table -->
        <div class="bg-white mt-5 p-4 rounded-3 shadow-sm">
            <h5 class="mb-4 fw-semibold">Recent Users</h5>
            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($users as $user)
                        <tr class="text-center">
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
