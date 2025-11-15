@extends('layouts.admin')

@section('content')
<h1 class="text-xl font-bold mb-4">Data Kelas / Jadwal</h1>

<a href="/admin/kelas/create" class="bg-blue-600 text-white px-4 py-2 rounded">Tambah</a>

<table class="w-full mt-4 bg-white shadow">
<thead>
<tr class="bg-gray-200">
    <th class="p-2">Mata Kuliah</th>
    <th>Dosen</th>
    <th>Hari</th>
    <th>Jam</th>
    <th>Ruangan</th>
    <th>Aksi</th>
</tr>
</thead>

<tbody>
<tr class="border">
    <td class="p-2">Pemrograman Web</td>
    <td>Dosen Contoh</td>
    <td>Senin</td>
    <td>08.00 - 10.00</td>
    <td>LAB 1</td>
    <td>
        <a href="/admin/kelas/edit" class="text-blue-600">Edit</a> |
        <a href="#" class="text-red-600">Delete</a>
    </td>
</tr>
</tbody>
</table>
@endsection
