@extends('layouts.admin')

@section('content')
<h2>Edit Kategori</h2>

<form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nama Lokasi</label>
    <input type="text" name="name" value="{{ $category->name }}" required>

    <button type="submit">Update</button>
    <a href="{{ route('admin.categories.index') }}">Kembali</a>
</form>
@endsection
