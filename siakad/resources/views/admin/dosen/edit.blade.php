@extends('layouts.admin')

@section('content')
<h1 class="text-xl font-bold mb-4">Edit Dosen</h1>

<form action="{{ url('/admin/dosen/'.$dosen->nidn) }}" method="POST" class="bg-white p-4 shadow rounded">
    @csrf
    @method('PUT')

    <label>NIDN</label>
    <input type="text" name="nidn" value="{{ $dosen->nidn }}" class="border p-2 w-full mb-2" readonly>

    <label>Nama</label>
    <input type="text" name="nama" value="{{ $dosen->nama }}" class="border p-2 w-full mb-2" required>

    <label>Prodi</label>
    <select name="id_prodi" class="border p-2 w-full mb-2" required>
        @foreach ($prodi as $p)
            <option value="{{ $p->id_prodi }}" {{ $dosen->id_prodi == $p->id_prodi ? 'selected' : '' }}>
                {{ $p->nama_prodi }}
            </option>
        @endforeach
    </select>

    <label>Keahlian</label>
    <input type="text" name="keahlian" value="{{ $dosen->keahlian }}" class="border p-2 w-full mb-2">

    <label>Password</label>
    <input type="password" name="password" class="border p-2 w-full mb-2" placeholder="Kosongkan jika tidak diubah">

    <label>Peran</label>
    <input type="text" name="peran" value="{{ $dosen->peran }}" class="border p-2 w-full mb-2">

    <button type="submit" class="mt-4 bg-blue-600 text-white px-4 py-2 rounded">Update</button>
</form>
@endsection
