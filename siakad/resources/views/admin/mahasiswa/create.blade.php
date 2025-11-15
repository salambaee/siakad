@extends('layouts.admin')

@section('content')
<h1 class="text-xl font-bold mb-4">Tambah Mahasiswa</h1>

<form action="/admin/mahasiswa" method="POST" class="bg-white shadow p-4 rounded">
    @csrf

    <div class="mb-4">
        <label>NIM</label>
        <input type="text" name="nim" class="border p-2 w-full" required>
    </div>

    <div class="mb-4">
        <label>Nama</label>
        <input type="text" name="nama" class="border p-2 w-full" required>
    </div>

    <div class="mb-4">
        <label>Jurusan</label>
        <input type="text" name="jurusan" class="border p-2 w-full" required>
    </div>

    <button class="bg-blue-600 text-white px-4 py-2 rounded">
        Simpan
    </button>
</form>
@endsection
