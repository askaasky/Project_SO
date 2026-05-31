<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin - Lost & Found</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>

<div class="admin-container">

    {{-- SIDEBAR --}}
    <aside class="sidebar">
        <h2>Admin Panel</h2>

        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a href="{{ route('admin.items') }}">Postingan</a>
        <a href="{{ route('admin.categories.index') }}">Kategori</a>
        <a href="{{ route('admin.locations.index') }}">Lokasi</a>
        <a href="{{ route('admin.users.index') }}">Users</a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="logout">Logout</button>
        </form>
    </aside>

    {{-- MAIN --}}
    <div class="main-content">

        {{-- TOPBAR --}}
        <div class="topbar">
            <span>Dashboard Admin</span>
            <span class="admin-name">Administrator</span>
        </div>

        {{-- CONTENT --}}
        <div class="content">
            @yield('content')
        </div>

    </div>

</div>

</body>
</html>
