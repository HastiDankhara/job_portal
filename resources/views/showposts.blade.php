@extends('adminsidebar')

@section('main')
<div class="container-fluid py-4">

    <!-- 🔹 Job Posts Table -->
    <div class="mb-5">
        <h4 class="fw-bold mb-3">📝 Job Post Details</h4>
        <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle">
                <thead class="text-center">
                    <tr>
                        <th>#️⃣ ID</th>
                        <th>🆔 User ID</th>
                        <th>📌 Title</th>
                        <th>📂 Category</th>
                        <th>⚙️ Nature</th>
                        <th>👥 Vacancy</th>
                        <th>💰 Salary</th>
                        <th>📍 Location</th>
                        <th>📝 Description</th>
                        <th>🎁 Benefit</th>
                        <th>🧰 Responsibility</th>
                        <th>🎓 Qualification</th>
                        <th>🔑 Keyword</th>
                        <th>🏢 Com. Name</th>
                        <th>📌 Com. Location</th>
                        <th>🌐 Com. Website</th>
                        <th>📅 Created</th>
                        <th>📝 Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($savepost as $post)
                    <tr class="text-center">
                        <td class="fw-semibold">{{ $post->id }}</td>
                        <td>{{ $post->user_id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->category }}</td>
                        <td>{{ $post->nature }}</td>
                        <td>{{ $post->vacancy }}</td>
                        <td>{{ $post->salary }}</td>
                        <td>{{ $post->location }}</td>
                        <td>{{ $post->description }}</td>
                        <td>{{ $post->benefits }}</td>
                        <td>{{ $post->responsibility }}</td>
                        <td>{{ $post->qualification }}</td>
                        <td>{{ $post->keywords }}</td>
                        <td>{{ $post->company_name }}</td>
                        <td>{{ $post->company_location }}</td>
                        <td>{{ $post->company_website }}</td>
                        <td>{{ $post->created_at->format('d M Y') }}</td>
                        <td>
                            <a href="{{ route('editjob',$post->id) }}" class="btn btn-primary btn-sm">✏️ Edit</a>
                            <form action="{{ route('deletejob.store', $post->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure to delete this post?🤔')">
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
