@extends('admin.layout')

@section('content')

<div class="admin-hero">
    <div>
        <h1>Dashboard Admin</h1>
        <p>Kelola laporan Lost & Found Kampus</p>
    </div>
    <img src="https://cdn-icons-png.flaticon.com/512/3500/3500833.png">
</div>

<div class="stats-grid">
    <div class="stat-card">
        <img src="https://cdn-icons-png.flaticon.com/512/1828/1828817.png">
        <h3>Total Postingan</h3>
        <p>{{ $totalItems }}</p>
    </div>

    <div class="stat-card warning">
        <img src="https://cdn-icons-png.flaticon.com/512/595/595067.png">
        <h3>Menunggu Verifikasi</h3>
        <p>{{ $pendingItems }}</p>
    </div>

    <div class="stat-card success">
        <img src="https://cdn-icons-png.flaticon.com/512/1077/1077063.png">
        <h3>Total User</h3>
        <p>{{ $totalUsers }}</p>
    </div>

    <div class="stat-card approved">
        <img src="https://cdn-icons-png.flaticon.com/512/845/845646.png">
        <h3>Barang Disetujui</h3>
        <p>{{ $approvedItems }}</p>
    </div>
</div>

<div class="admin-section">
    <h2>Barang Menunggu Persetujuan</h2>

    @forelse($pendingList as $item)
        <div class="pending-item">
            <img src="{{ asset('storage/'.$item->image) }}">
            <div>
                <strong>{{ $item->title }}</strong>
                <p>{{ $item->location->location_name }}</p>
            </div>
            <a href="{{ route('admin.items') }}" class="btn">Review</a>
        </div>
    @empty
        <p>Tidak ada barang pending 🎉</p>
    @endforelse
</div>

@endsection
