<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Web Profile')</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.8-dist/css/bootstrap.min.css') }}">
    @stack('styles')
</head>
<body class="bg-light d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand bg-warning shadow-sm">
        <div class="container-fluid">
            <span class="navbar-brand fw-bold">SISTEM INFORMASI</span>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                   <li class="nav-item">
       <form action="{{ route('logout') }}" method="POST" class="d-inline">
           @csrf
           <button type="submit" class="nav-link btn btn-link">Logout</button>
       </form>
   </li>
</ul>
        </div>
    </nav>

    <div class="d-flex flex-grow-1">
        <aside class="bg-dark text-white p-3" style="width: 220px;">
            <h6 class="text-center mb-3">Admin Menu</h6>
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('admin.projects.index') }}">Data Project</a></li>
            </ul>
        </aside>

        <main class="flex-grow-1 p-4">
            @yield('content')
        </main>
    </div>

    <footer class="bg-white text-center py-3 border-top">
        <small>&copy; 2026 MyProfile. All rights reserved.</small>
    </footer>

    <script src="{{ asset('bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js') }}"></script>
    @stack('scripts')
</body>
</html>