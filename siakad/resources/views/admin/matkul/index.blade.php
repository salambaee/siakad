@extends('layouts.admin')

@section('content')
<h1 class="text-xl font-bold mb-4">Mata Kuliah</h1>

<a href="{{ route('admin.matkul.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Tambah</a>

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
    @foreach($mataKuliah ?? [] as $mk)
    <tr class="border">
        <td class="p-2">{{ $mk->kode_mk }}</td>
        <td>{{ $mk->nama_mk }}</td>
        <td>{{ $mk->sks }}</td>
        <td>
            <a href="{{ route('admin.matkul.edit', $mk->kode_mk) }}" class="text-blue-600">Edit</a> |
            <form action="{{ route('admin.matkul.destroy', $mk->kode_mk) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-600">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</tbody>
</table>
@endsection