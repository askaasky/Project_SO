@extends('layouts.admin')

@section('content')
<h1>Edit Lokasi</h1>

<form action="{{ route('admin.locations.update', $location) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nama Lokasi</label>
    <input type="text"
           name="name"
           value="{{ old('name', $location->name) }}"
           required>

    @error('location_name')
        <small style="color:red">{{ $message }}</small>
    @enderror

    <br><br>

    <button type="submit" class="btn-primary">
        Update
    </button>

    <a href="{{ route('admin.locations.index') }}">
        Batal
    </a>
</form>
@endsection
