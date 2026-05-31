<!DOCTYPE html>
<html lang="id">
<head>
    <title>ELDIEF</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-900 text-gray-200 min-h-screen">

<nav class="bg-slate-950 p-4 text-white flex justify-between border-b border-slate-800">
    <b>ELDIEF</b>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="hover:text-red-400 transition">
            Logout
        </button>
    </form>
</nav>

<div class="p-6">
    @yield('content')
</div>

</body>
</html>
