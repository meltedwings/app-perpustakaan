@extends('layouts.app')

@section('title', 'Daftar Anggota')

@section('content')
    <h1>Daftar Anggota</h1>

    <form action="{{ route('members.index') }}" method="GET" style="margin-bottom: 20px;">
        <input type="text" name="search" placeholder="Cari nama anggota..." value="{{ request('search') }}" style="padding: 6px; width: 250px;">
        <button type="submit" style="padding: 6px 12px; cursor: pointer;">Cari</button>
        @if(request('search'))
            <a href="{{ route('members.index') }}" style="margin-left: 10px; color: red; text-decoration: none;">Reset</a>
        @endif
    </form>

    <p><a href="{{ route('members.create') }}" class="btn">+ Tambah Anggota</a></p>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Email</th>
                <th>No. Telepon</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($members as $member)
                <tr>
                    {{-- Menggunakan format object ($member->properti) sesuai Eloquent --}}
                    <td>{{ $member->id }}</td>
                    <td>{{ $member->nama }}</td>
                    <td>{{ $member->nim }}</td>
                    <td>{{ $member->email }}</td>
                    <td>{{ $member->nomor_telepon }}</td>
                    <td>{{ ucfirst($member->status) }}</td>
                    <td>
                        <a href="{{ route('members.show', $member->id) }}">Detail</a> |
                        <a href="{{ route('members.edit', $member->id) }}">Edit</a> |
                        <form style="display:inline;" action="{{ route('members.destroy', $member->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus anggota ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background: none; border: none; color: blue; text-decoration: underline; cursor: pointer; padding: 0;">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Belum ada data anggota.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top: 20px;">
        {{ $members->appends(request()->query())->links() }}
    </div>
@endsection