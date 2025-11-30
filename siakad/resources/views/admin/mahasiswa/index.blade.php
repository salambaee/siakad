@extends('layouts.admin')

@section('content')
<h1 class="text-xl font-bold mb-4">Data Mahasiswa</h1>

<a href="{{ route('admin.mahasiswa.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">
    Tambah
</a>

<table class="w-full mt-4 bg-white shadow">
    <thead>
        <tr class="bg-gray-200">
            <th class="p-2">NIM</th>
            <th>Nama</th>
            <th>Program Studi</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($mahasiswa as $m)
        <tr class="border">
            <td class="p-2">{{ $m->nim }}</td>
            <td>{{ $m->nama }}</td>
            <td>{{ $m->prodi->nama_prodi ?? '-' }}</td>
            <td class="flex gap-2">

                <a href="{{ route('admin.mahasiswa.edit', $m->nim) }}" class="text-blue-600">
                   Edit
                </a>

                <form action="{{ route('admin.mahasiswa.destroy', $m->nim) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-600">Delete</button>
                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
