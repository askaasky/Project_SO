@extends('layouts.admin')

@section('content')
<h1 class="page-title">Manajemen Barang</h1>

<div class="table-card">
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Judul</th>
                <th>Pelapor</th>
                <th>Status</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($items as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->user->name ?? '-' }}</td>
                <td>{{ ucfirst($item->status) }}</td>
                <td>{{ $item->created_at->format('d M Y') }}</td>
                <td>
                    {{-- FIX DI SINI: delete ➜ destroy --}}
                    <form action="{{ route('admin.items.destroy', $item) }}" method="POST"
                          onsubmit="return confirm('Yakin hapus postingan ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn-reject">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" align="center">Belum ada barang</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection
