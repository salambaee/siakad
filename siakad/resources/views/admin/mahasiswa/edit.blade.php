@extends('layouts.admin')

@section('content')
<h1 class="text-xl font-bold mb-4">Edit Mahasiswa</h1>

<form action="/admin/mahasiswa/{{ $data->id }}" method="POST" class="bg-white shadow p-4 rounded">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <label>NIM</label>
        <input type="text" name="nim" class="border p-2 w-full" value="{{ $data->nim }}" required>
    </div>

    <div class="mb-4">
        <label>Nama</label>
        <input type="text" name="nama" class="border p-2 w-full" value="{{ $data->nama }}" required>
    </div>

    <div class="mb-4">
        <label>Jurusan</label>
        <input type="text" name="jurusan" class="border p-2 w-full" value="{{ $data->jurusan }}" required>
    </div>

    <button class="bg-green-600 text-white px-4 py-2 rounded">
        Update
    </button>
</form>
@endsection
