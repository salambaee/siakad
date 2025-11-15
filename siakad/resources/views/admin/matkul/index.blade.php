@extends('layouts.admin')

@section('content')
<h1 class="text-xl font-bold mb-4">Mata Kuliah</h1>

<a href="/admin/matkul/create" class="bg-blue-600 text-white px-4 py-2 rounded">Tambah</a>

<table class="w-full mt-4 bg-white shadow">
<thead>
    <tr class="bg-gray-200">
        <th class="p-2">Kode MK</th>
        <th>Nama MK</th>
        <th>SKS</th>
        <th>Aksi</th>
    </tr>
</thead>

<tbody>
    <tr class="border">
        <td class="p-2">IF101</td>
        <td>Pemrograman Web</td>
        <td>3</td>
        <td>
            <a href="/admin/matkul/edit" class="text-blue-600">Edit</a> |
            <a href="#" class="text-red-600">Delete</a>
        </td>
    </tr>
</tbody>
</table>
@endsection
