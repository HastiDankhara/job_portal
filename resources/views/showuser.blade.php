@extends('adminsidebar')

@section('main')
<div class="container-fluid py-4">
    <!-- 🔹 Users Table -->
    <div class="mb-4">
        <h3 class="fw-bold mb-3">👥 User Management</h3>
        <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle">
                <thead class="text-center">
                    <tr>
                        <th scope="col">#️⃣ ID</th>
                        <th scope="col">👤 Name</th>
                        <th scope="col">✉️ Email</th>
                        <th scope="col">🔑 Role</th>
                        <th scope="col">📅 Created</th>
                        <th scope="col">📝 Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr class="text-center">
                        <td class="fw-semibold">{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->created_at->format('d M Y') }}</td>
                        <td>
                            <a href="{{ route('edituser',$user->id) }}" class="btn btn-primary btn-sm">✏️ Edit</a>
                            <form action="{{ route('deleteuser.store',$user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure to delete this post?🤔');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">🗑️ Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
