@extends('layouts.admin')

@section('content')
<h1 class="text-xl font-bold mb-4">Tambah Dosen</h1>

<form action="{{ route('dosen.store') }}" method="POST" class="bg-white p-4 shadow rounded">
    @csrf

    <label>NIDN</label>
    <input type="text" name="nidn" class="border p-2 w-full" required>

    <label>Nama</label>
    <input type="text" name="nama" class="border p-2 w-full" required>

    <label>Prodi</label>
    <select name="id_prodi" class="border p-2 w-full" required>
        <option value="">-- Pilih Prodi --</option>
        @foreach($prodi as $p)
            <option value="{{ $p->id_prodi }}">{{ $p->nama_prodi }}</option>
        @endforeach
    </select>

    <label>Keahlian</label>
    <input type="text" name="keahlian" class="border p-2 w-full">

    <label>Password</label>
    <input type="password" name="password" class="border p-2 w-full">

    <label>Peran</label>
    <input type="text" name="peran" class="border p-2 w-full" value="Dosen" readonly>

    <button type="submit" class="mt-4 bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
</form>
@endsection
