@extends('layouts.admin')

@section('content')
<h2>Tambah Kategori</h2>

<form action="{{ route('admin.categories.store') }}" method="POST">
    @csrf

    <label>Nama Kategori</label>
    <input type="text" name="name" required>

    <button type="submit">Simpan</button>
    <a href="{{ route('admin.categories.index') }}">Kembali</a>
</form>
@endsection
