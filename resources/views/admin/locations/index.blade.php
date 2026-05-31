@extends('layouts.admin')

@section('content')
<h1>Manajemen Lokasi</h1>

<a href="{{ route('admin.locations.create') }}" class="btn-primary">
    + Tambah Lokasi
</a>

<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama Lokasi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    @forelse ($locations as $location)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $location->name }}</td>
            <td>
                <a href="{{ route('admin.locations.edit', $location) }}">
                    Edit
                </a>

                <form action="{{ route('admin.locations.destroy', $location) }}"
                      method="POST"
                      style="display:inline"
                      onsubmit="return confirm('Hapus lokasi ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-danger">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="3">Belum ada lokasi</td>
        </tr>
    @endforelse
    </tbody>
</table>
@endsection
