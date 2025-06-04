<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body">
    <div class="container-fluid min-vh-100">
        <div class="row g-0 min-vh-100">
            <!-- Sidebar -->
            <div class="col-md-3">
                <div class="bg-success text-white min-vh-100 p-4 d-flex flex-column">
                    <h2 class="fw-bold mb-4">Admin</h2>
                    <ul class="nav flex-column mb-auto">
                        <!-- links -->
                        <li class="nav-item mb-2">
                            <a href="{{ route('admin') }}" class="nav-link text-white">
                                📊 Dashboard
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a href="{{ route('home') }}" class="nav-link text-white">
                                🏡 Home
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a href="{{ route('users') }}" class="nav-link text-white">
                                👥 Users
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a href="{{ route('admin.post') }}" class="nav-link text-white">
                                📝 Posts
                            </a>
                        </li>
                    </ul>
                    <div class="mt-auto pt-3 border-top border-white">
                        <small>© 2025 Admin Panel</small>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <div class="col-md-9 p-4">
                <div class="bg-white shadow-sm p-4 rounded-3">
                    @yield('main')
                </div>
            </div>
        </div>
    </div>
</body>

</html>