@extends('layouts.admin')

@section('content')
<h1 class="text-xl font-bold mb-4">Tambah Mahasiswa</h1>

<form action="/admin/mahasiswa" method="POST" class="bg-white p-4 shadow rounded">
    @csrf

    <label>NIM</label>
    <input type="text" name="nim" class="border p-2 w-full">

    <label>Nama</label>
    <input type="text" name="nama" class="border p-2 w-full">

    <label>Jurusan</label>
    <input type="text" name="jurusan" class="border p-2 w-full">

    <label>Alamat</label>
    <input type="text" name="alamat" class="border p-2 w-full">

    <button class="mt-4 bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
</form>
@endsection
