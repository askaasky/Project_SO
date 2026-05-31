@extends('layouts.admin')

@section('content')
<h3>Tambah Lokasi</h3>

<form action="{{ route('admin.locations.store') }}" method="POST">
    @csrf

    <input type="text" name="name" required>

    <button type="submit">Simpan</button>
</form>
@endsection
