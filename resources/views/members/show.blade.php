<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Anggota</title>
    <style>
        body { font-family: sans-serif; margin: 40px; max-width: 500px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; width: 40%; }
        .btn { display: inline-block; margin-top: 20px; padding: 8px 16px; background: #4b5563; color: #fff; text-decoration: none; border-radius: 4px; }
    </style>
</head>
<body>
    <h1>Detail Anggota</h1>

    <table>
        <tr><th>Nama</th><td>{{ $member->nama }}</td></tr>
        <tr><th>NIM</th><td>{{ $member->nim }}</td></tr>
        <tr><th>Email</th><td>{{ $member->email }}</td></tr>
        <tr><th>Nomor Telepon</th><td>{{ $member->nomor_telepon }}</td></tr>
        <tr><th>Alamat</th><td>{{ $member->alamat }}</td></tr>
        <tr><th>Status</th><td>{{ ucfirst($member->status) }}</td></tr>
    </table>

    <a href="{{ route('members.index') }}" class="btn">&larr; Kembali</a>
</body>
</html>