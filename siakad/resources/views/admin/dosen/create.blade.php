@extends('layouts.admin')

@section('content')
<h1 class="text-xl font-bold mb-4">Tambah Dosen</h1>

<form class="bg-white p-4 shadow rounded">

    <label>NIDN</label>
    <input type="text" class="border p-2 w-full">

    <label>Nama</label>
    <input type="text" class="border p-2 w-full">

    <label>Prodi</label>
    <input type="text" class="border p-2 w-full">

    <label>Alamat</label>
    <input type="text" class="border p-2 w-full">

    <button class="mt-4 bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
</form>
@endsection
