@extends('layouts.admin')

@section('content')
<h2>Kelola Kategori</h2>

<a href="{{ route('admin.categories.create') }}">+ Tambah Kategori</a>

<table>
    <tr>
        <th>Nama</th>
        <th>Aksi</th>
    </tr>
    @foreach($categories as $cat)
    <tr>
        <td>{{ $cat->name }}</td>
        <td>
            <a href="{{ route('admin.categories.edit', $cat) }}">Edit</a>

            <form action="{{ route('admin.categories.destroy', $cat) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button onclick="return confirm('Hapus?')">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
