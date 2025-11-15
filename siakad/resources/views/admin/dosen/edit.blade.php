@extends('layouts.admin')

@section('content')
<h1 class="text-xl font-bold mb-4">Edit Dosen</h1>

<form class="bg-white p-4 shadow rounded">

    <label>NIDN</label>
    <input type="text" value="12345678" class="border p-2 w-full">

    <label>Nama</label>
    <input type="text" value="Dosen Contoh" class="border p-2 w-full">

    <label>Prodi</label>
    <input type="text" value="Teknik Informatika" class="border p-2 w-full">

    <label>Alamat</label>
    <input type="text" value="Banyuwangi" class="border p-2 w-full">

    <button class="mt-4 bg-blue-600 text-white px-4 py-2 rounded">Update</button>
</form>
@endsection
