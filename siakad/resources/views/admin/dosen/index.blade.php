@extends('layouts.admin')

@section('content')
<h1 class="text-xl font-bold mb-4">Data Dosen</h1>

<a href="{{ url('/admin/dosen/create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Tambah</a>

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
        @foreach ($dosen as $d)
        <tr class="border">
            <td class="p-2">{{ $d->nidn }}</td>
            <td>{{ $d->nama }}</td>
            <td>{{ $d->prodi->nama_prodi ?? '-' }}</td>
            <td>
                <a href="{{ url('/admin/dosen/'.$d->nidn.'/edit') }}" class="text-blue-600">Edit</a> |
                <form action="{{ url('/admin/dosen/'.$d->nidn) }}" method="POST" class="inline">
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
