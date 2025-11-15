@extends('layouts.admin')

@section('content')
<h1 class="text-xl font-bold mb-4">Data Dosen</h1>

<a href="/admin/dosen/create" class="bg-blue-600 text-white px-4 py-2 rounded">Tambah</a>

<table class="w-full mt-4 bg-white shadow">
    <thead>
        <tr class="bg-gray-200">
            <th class="p-2">NIDN</th>
            <th>Nama</th>
            <th>Prodi</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        <tr class="border">
            <td class="p-2">12345678</td>
            <td>Dosen Contoh</td>
            <td>Teknik Informatika</td>
            <td>
                <a href="/admin/dosen/edit" class="text-blue-600">Edit</a> |
                <a href="#" class="text-red-600">Delete</a>
            </td>
        </tr>
    </tbody>
</table>
@endsection
