<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Lost & Found</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: system-ui, -apple-system, BlinkMacSystemFont;
            background: #000;
            color: #e7e9ea;
        }

        /* NAVBAR */
        .navbar {
            position: sticky;
            top: 0;
            z-index: 50;
            height: 60px;
            background: #000;
            border-bottom: 1px solid #2f3336;
            display: flex;
            align-items: center;
            padding: 0 20px;
            font-weight: bold;
            font-size: 18px;
        }

        /* LAYOUT */
        .layout {
            display: grid;
            grid-template-columns: 280px auto 320px;
            justify-content: center;
            height: calc(100vh - 60px);
        }

        /* SIDEBAR (BASE) */
        .sidebar {
            background: #000;
            padding: 20px;
            position: sticky;
            top: 60px;
            height: calc(100vh - 60px);
            overflow-y: auto;
        }

        /* SIDEBAR BORDER FIX */
        .layout > .sidebar:first-child {
            border-right: 1px solid #2f3336;
        }

        .layout > .sidebar:last-child {
            border-left: 1px solid #2f3336;
        }

        /* PROFILE */
        .profile-box {
            text-align: center;
        }

        .profile-avatar {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background: #1d9bf0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            font-weight: bold;
            margin: 0 auto 10px;
        }

        .profile-name {
            font-weight: bold;
            font-size: 18px;
        }

        .profile-btn {
            display: block;
            margin-top: 12px;
            padding: 10px;
            background: #1d9bf0;
            color: #fff;
            text-decoration: none;
            border-radius: 999px;
            font-size: 14px;
        }

        /* FEED */
        .feed {
            width: 620px;
            max-width: 620px;
            border-left: 1px solid #2f3336;
            border-right: 1px solid #2f3336;
            overflow-y: auto;
        }

        .post-btn {
            display: block;
            padding: 14px;
            background: #1d9bf0;
            color: white;
            text-align: center;
            text-decoration: none;
            font-weight: bold;
            border-radius: 999px;
            margin: 15px;
        }

        /* CARD POST */
        .card {
            background: #000;
            padding: 16px;
            border-bottom: 1px solid #2f3336;
        }

        .card:hover {
            background: #080808;
        }

        .header {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            text-decoration: none;
            color: inherit;
        }

        .avatar {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: #1d9bf0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            margin-right: 10px;
        }

        .time {
            font-size: 12px;
            color: #71767b;
        }

        h3 {
            margin: 10px 0;
        }

        img {
            width: 100%;
            border-radius: 16px;
            margin: 10px 0;
        }

        .meta {
            font-size: 13px;
            color: #71767b;
            margin-top: 6px;
        }

        .badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: bold;
            margin-top: 8px;
        }

        .lost { background: #dc2626; }
        .found { background: #16a34a; }

        .actions {
            margin-top: 10px;
            display: flex;
            gap: 10px;
        }

        .btn-edit {
            padding: 6px 12px;
            background: #1d9bf0;
            color: white;
            border-radius: 999px;
            text-decoration: none;
            font-size: 13px;
        }

        .btn-delete {
            padding: 6px 12px;
            background: #dc2626;
            color: white;
            border-radius: 999px;
            border: none;
            font-size: 13px;
            cursor: pointer;
        }

        /* SEARCH */
        input, select {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border-radius: 999px;
            border: 1px solid #2f3336;
            background: #000;
            color: #e7e9ea;
        }

        .search button {
            width: 100%;
            margin-top: 12px;
            padding: 12px;
            background: #1d9bf0;
            border-radius: 999px;
            color: white;
            border: none;
            font-weight: bold;
        }

        hr {
            border: 1px solid #2f3336;
            margin: 15px 0;
        }
    </style>
</head>

<body>

<div class="navbar">
    Lost & Found Kampus
</div>

<div class="layout">

    <!-- SIDEBAR KIRI -->
    <div class="sidebar">
        <div class="profile-box">
            <div class="profile-avatar">
                {{ strtoupper(substr(auth()->user()->display_name,0,1)) }}
            </div>
            <div class="profile-name">{{ auth()->user()->display_name }}</div>
            <p>{{ auth()->user()->nim }}</p>
            <p>{{ auth()->user()->name }}</p>
            <p>Role: {{ auth()->user()->role }}</p>

            <a href="{{ route('profile.show', auth()->id()) }}" class="profile-btn">
                Lihat Profil
            </a>
        </div>

        <hr>

        <p>📦 Total Postingan:
            <b>{{ auth()->user()->items()->count() }}</b>
        </p>

        <p>🟢 Dipublikasikan:
            <b>{{ auth()->user()->items()->count() }}</b>
        </p>

        <hr>

        <p style="font-size:12px;line-height:1.5">
            ℹ️ Sistem Lost & Found membantu civitas kampus melaporkan barang hilang/ditemukan.
        </p>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn-delete" style="width:100%;margin-top:10px">
                Logout
            </button>
        </form>
    </div>

    <!-- FEED -->
    <div class="feed">
        <a href="{{ route('items.create') }}" class="post-btn">
            + Posting Barang Hilang / Ditemukan
        </a>

        @forelse ($items as $item)
        <div class="card">
            <a href="{{ route('profile.show', $item->user->id) }}" class="header">
                <div class="avatar">
                    {{ strtoupper(substr($item->user->display_name,0,1)) }}
                </div>
                <div>
                    <b>{{ $item->user->display_name }}</b>
                    <div class="time">{{ $item->created_at->diffForHumans() }}</div>
                </div>
            </a>

            <h3>{{ $item->title }}</h3>

            @if ($item->image_path)
                <img src="{{ asset('storage/'.$item->image_path) }}">
            @endif

            <p>{{ $item->description }}</p>

            <p class="meta">
                📂 {{ $item->category->name ?? '-' }} •
                📍 {{ $item->location->name ?? '-' }}
            </p>

            <span class="badge {{ $item->status }}">
                {{ strtoupper($item->status) }}
            </span>

            <p class="meta">📞 {{ $item->user->phone }}</p>

            @if ($item->user_id === auth()->id())
            <div class="actions">
                <a href="{{ route('items.edit', $item->id) }}" class="btn-edit">Edit</a>

                <form action="{{ route('items.destroy', $item->id) }}" method="POST"
                      onsubmit="return confirm('Yakin hapus postingan ini?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn-delete">Hapus</button>
                </form>
            </div>
            @endif
        </div>
        @empty
            <p style="padding:20px">Tidak ada postingan.</p>
        @endforelse
    </div>

    <!-- SIDEBAR KANAN -->
    <div class="sidebar search">
        <h3>🔍 Pencarian</h3>

        <form method="GET" action="{{ route('dashboard') }}">
            <input type="text" name="q" placeholder="Cari judul..." value="{{ request('q') }}">

            <select name="status">
                <option value="">Semua Status</option>
                <option value="lost" {{ request('status')=='lost'?'selected':'' }}>Lost</option>
                <option value="found" {{ request('status')=='found'?'selected':'' }}>Found</option>
            </select>

            <select name="category">
                <option value="">Semua Kategori</option>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}" {{ request('category')==$cat->id?'selected':'' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>

            <button>Cari</button>
        </form>
    </div>

</div>

</body>
</html>
