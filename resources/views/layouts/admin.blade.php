<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CMS Admin | Makeni College</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root { --mace-green:#006b12; --mace-dark:#06320d; }
        body { background:#f5f8f5; color:#16351f; }
        .sidebar { background:var(--mace-dark); min-height:100vh; }
        .sidebar a { color:#dfeee2; text-decoration:none; padding:.7rem 1rem; display:block; border-radius:8px; }
        .sidebar a:hover { background:rgba(255,255,255,.09); color:#fff; }
        .admin-card { border:0; border-radius:8px; box-shadow:0 12px 28px rgba(0,0,0,.06); }
        .btn-mace { background:var(--mace-green); color:#fff; border-color:var(--mace-green); }
        .btn-mace:hover { background:#004b0d; color:#fff; border-color:#004b0d; }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <aside class="col-lg-2 sidebar p-3">
            <div class="d-flex align-items-center gap-2 text-white mb-4">
                <img src="{{ asset('images/college.png') }}" alt="MACE logo" style="width:42px;height:42px;object-fit:contain;background:#fff;border-radius:6px">
                <strong>Makeni College of Education</strong>
            </div>
            <nav class="d-grid gap-1">
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                <a href="{{ route('admin.settings') }}">Site Settings</a>
                @foreach(['pages' => 'Pages', 'hero-slides' => 'Hero Slides', 'departments' => 'Departments', 'programmes' => 'Programmes', 'fees' => 'Fees', 'enrollment-steps' => 'Enrollment Steps', 'gallery' => 'Gallery', 'news' => 'News', 'notices' => 'Notices', 'portal-links' => 'Portal Links', 'users' => 'Admin Users'] as $key => $label)
                    <a href="{{ route('admin.resource.index', $key) }}">{{ $label }}</a>
                @endforeach
                <a href="{{ route('home') }}" target="_blank">View Website</a>
            </nav>
        </aside>
        <main class="col-lg-10 p-4 p-xl-5">
            @if(session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif
            @yield('content')
        </main>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
