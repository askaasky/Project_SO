@extends('layouts.app')

@section('content')
<div style="
    max-width: 800px;
    margin: 40px auto;
    color: #e5e7eb;
">

    {{-- HEADER PROFILE --}}
    <div style="
        background: linear-gradient(135deg, #020617, #0f172a);
        padding: 30px;
        border-radius: 16px;
        margin-bottom: 30px;
        border: 1px solid #1e293b;
    ">
        <div style="display: flex; align-items: center; gap: 20px;">
            
            {{-- AVATAR --}}
            <div style="
                width: 80px;
                height: 80px;
                border-radius: 50%;
                background: #1d4ed8;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 32px;
                font-weight: bold;
                color: white;
            ">
                {{ strtoupper(substr($user->display_name, 0, 1)) }}
            </div>

            {{-- INFO --}}
            <div>
                <h2 style="margin:0;">
                    {{ $user->display_name }}
                </h2>
                <p style="margin:5px 0; color:#9ca3af;">
                    Mahasiswa
                </p>
                <p style="font-size:13px; color:#6b7280;">
                    Total laporan: {{ $items->count() }}
                </p>
            </div>

        </div>
    </div>

    {{-- LIST POSTINGAN --}}
    <h3 style="margin-bottom: 15px;">Postingan</h3>

    @forelse ($items as $item)
        <div style="
            background: #111827;
            padding: 20px;
            border-radius: 14px;
            margin-bottom: 20px;
            border: 1px solid #1f2937;
        ">
            <h4 style="margin-top:0;">
                {{ $item->title }}
            </h4>

            <span style="
                display: inline-block;
                padding: 4px 12px;
                border-radius: 20px;
                font-size: 12px;
                color: white;
                background: {{ $item->status === 'lost' ? '#dc2626' : '#16a34a' }};
            ">
                {{ strtoupper($item->status) }}
            </span>

            <p style="margin-top: 12px;">
                {{ $item->description }}
            </p>

            <small style="color:#9ca3af;">
                {{ $item->category->name ?? '-' }}
                •
                {{ $item->location->location_name ?? '-' }}
                •
                {{ $item->created_at->diffForHumans() }}
            </small>

            {{-- AKSI JIKA PEMILIK --}}
            @if ($item->user_id === auth()->id())
                <div style="margin-top:10px;">
                    <a href="#" style="color:#60a5fa; margin-right:10px;">Edit</a>
                    <a href="#" style="color:#f87171;">Hapus</a>
                </div>
            @endif

            @if ($item->image_path)
                <img 
                    src="{{ asset('storage/' . $item->image_path) }}" 
                    class="w-full rounded-lg mb-3"
                     alt="Item Image"
    >
            @endif
        </div>
    @empty
        <p style="color:#9ca3af;">Belum ada postingan.</p>
    @endforelse

</div>
@endsection
