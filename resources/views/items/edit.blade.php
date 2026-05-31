@extends('layouts.app')

@section('content')

<style>
    /* FIX DARK MODE SELECT */
    select {
        width: 100%;
        padding: 10px;
        background: #020617;
        color: #e5e7eb;
        border: 1px solid #1e293b;
        border-radius: 8px;
    }

    select option {
        background: #020617;
        color: #e5e7eb;
    }

    select:focus {
        outline: none;
        border-color: #2563eb;
    }
</style>

<div style="
    max-width:600px;
    margin:40px auto;
    background:#020617;
    padding:24px;
    border-radius:16px;
    border:1px solid #1e293b;
    color:#e5e7eb;
">
    <h2 style="font-size:20px;margin-bottom:20px;">
        Edit Postingan
    </h2>

    <form method="POST" action="{{ route('items.update', $item->id) }}">
        @csrf
        @method('PUT')

        {{-- TITLE --}}
        <input
            type="text"
            name="title"
            value="{{ $item->title }}"
            required
            style="
                width:100%;
                padding:10px;
                background:#020617;
                color:white;
                border:none;
                border-bottom:1px solid #1e293b;
                margin-bottom:12px;
            "
        >

        {{-- DESCRIPTION --}}
        <textarea
            name="description"
            rows="4"
            required
            style="
                width:100%;
                background:#020617;
                color:white;
                border:none;
                resize:vertical;
                margin-bottom:12px;
            "
        >{{ $item->description }}</textarea>

        {{-- CATEGORY & LOCATION --}}
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:10px;margin-bottom:12px;">
            <select name="category_id" required>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ $item->category_id==$cat->id?'selected':'' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>

            <select name="location_id" required>
                @foreach($locations as $loc)
                    <option value="{{ $loc->id }}" {{ $item->location_id==$loc->id?'selected':'' }}>
                        {{ $loc->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- STATUS --}}
        <select name="status" required style="margin-bottom:16px;">
            <option value="lost" {{ $item->status=='lost'?'selected':'' }}>Hilang</option>
            <option value="found" {{ $item->status=='found'?'selected':'' }}>Ditemukan</option>
        </select>

        {{-- SUBMIT --}}
        <button
            style="
                width:100%;
                padding:12px;
                background:#16a34a;
                color:white;
                border:none;
                border-radius:999px;
                font-weight:bold;
                cursor:pointer;
            "
        >
            Update
        </button>
    </form>
</div>
@endsection
