@extends('layouts.admin')

@section('content')
<h1 class="page-title">Daftar User</h1>

<div class="table-card">
    <table>
        <thead>
            <tr>
                <th>#</th>

                {{-- SORT NIM --}}
                <th>
                    <a href="{{ route('admin.users.index', [
                        'sort' => 'nim',
                        'direction' => request('direction') === 'asc' ? 'desc' : 'asc'
                    ]) }}">
                        NIM
                    </a>
                </th>

                {{-- SORT NAMA --}}
                <th>
                    <a href="{{ route('admin.users.index', [
                        'sort' => 'name',
                        'direction' => request('direction') === 'asc' ? 'desc' : 'asc'
                    ]) }}">
                        Nama
                    </a>
                </th>

                <th>Display Name</th>
                <th>No. Telp</th>
                <th>Role</th>

                {{-- SORT TANGGAL --}}
                <th>
                    <a href="{{ route('admin.users.index', [
                        'sort' => 'created_at',
                        'direction' => request('direction') === 'asc' ? 'desc' : 'asc'
                    ]) }}">
                        Tanggal Daftar
                    </a>
                </th>
            </tr>
        </thead>

        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->nim ?? '-' }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->display_name ?? '-' }}</td>
                    <td>{{ $user->phone ?? '-' }}</td>
                    <td>
                        <span class="badge {{ $user->role === 'admin' ? 'found' : 'pending' }}">
                            {{ strtoupper($user->role) }}
                        </span>
                    </td>
                    <td>{{ $user->created_at->format('d M Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="text-align:center">
                        Tidak ada user
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
