@extends('layouts.app')

@section('content')
<div style="
    max-width: 600px;
    margin: 40px auto;
    background: #020617;
    padding: 24px;
    border-radius: 16px;
    border: 1px solid #1e293b;
    color: #e5e7eb;
">

    <h2 style="margin-bottom:20px;font-size:20px;">
        Posting Barang Hilang / Ditemukan
    </h2>

    <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- TITLE --}}
        <input
            type="text"
            name="title"
            placeholder="Nama barang"
            required
            style="
                width:100%;
                background:#020617;
                border:none;
                border-bottom:1px solid #1e293b;
                padding:12px 0;
                font-size:18px;
                color:white;
                outline:none;
                margin-bottom:15px;
            "
        >

        {{-- DESCRIPTION --}}
        <textarea
            name="description"
            placeholder="Ceritakan detail barang (lokasi terakhir, ciri-ciri, dll)…"
            required
            rows="4"
            style="
                width:100%;
                background:#020617;
                border:none;
                resize: vertical;
                font-size:16px;
                color:white;
                outline:none;
                margin-bottom:15px;
            "
        ></textarea>

        {{-- IMAGE --}}
        <div style="margin-bottom:15px;">
            <label style="font-size:14px;color:#9ca3af;">
                Tambah foto (opsional)
            </label>
            <input
                type="file"
                name="image"
                accept="image/*"
                style="
                    display:block;
                    margin-top:6px;
                    color:#9ca3af;
                "
            >
        </div>

        {{-- META --}}
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:10px;margin-bottom:15px;">
            <select name="category_id" required style="background:#020617;color:white;border:1px solid #1e293b;padding:8px;border-radius:8px;">
                <option value="">Kategori</option>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>

            <select name="location_id" required style="background:#020617;color:white;border:1px solid #1e293b;padding:8px;border-radius:8px;">
                <option value="">Lokasi</option>
                @foreach ($locations as $loc)
                    <option value="{{ $loc->id }}">{{ $loc->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- STATUS --}}
        <select name="status" required style="width:100%;background:#020617;color:white;border:1px solid #1e293b;padding:8px;border-radius:8px;margin-bottom:20px;">
            <option value="lost">Hilang</option>
            <option value="found">Ditemukan</option>
        </select>

        {{-- ACTION --}}
        <button
            type="submit"
            style="
                width:100%;
                background:#1d4ed8;
                color:white;
                padding:12px;
                border:none;
                border-radius:999px;
                font-weight:bold;
                cursor:pointer;
            "
        >
            Posting
        </button>

    </form>
</div>
@endsection
