@extends('layouts.admin')

@section('content')
<h1 class="text-xl font-bold mb-4">Data Kelas / Jadwal</h1>

<a href="{{ route('admin.kelas.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Tambah</a>

@if(session('success'))
    <div class="mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
        {{ session('success') }}
    </div>
@endif

<table class="w-full mt-4 bg-white shadow rounded-lg overflow-hidden">
    <thead>
        <tr class="bg-gray-200 text-gray-700">
            <th class="p-3 text-left">Mata Kuliah</th>
            <th class="p-3 text-left">Dosen</th>
            <th class="p-3 text-left">Hari</th>
            <th class="p-3 text-left">Jam</th>
            <th class="p-3 text-left">Ruangan</th>
            <th class="p-3 text-left">Aksi</th>
        </tr>
    </thead>

    <tbody>
        @forelse($jadwal as $item)
        <tr class="border-b hover:bg-gray-50 transition">
            <td class="p-3">
                <span class="font-semibold">{{ $item->matkul->nama_mk ?? '-' }}</span>
                <br>
                <span class="text-xs text-gray-500">{{ $item->matkul->kode_mk ?? '' }}</span>
            </td>
            <td class="p-3">{{ $item->dosen->nama ?? '-' }}</td>
            <td class="p-3">{{ $item->hari }}</td>
            <td class="p-3">{{ $item->jam }}</td>
            <td class="p-3">{{ $item->ruang }}</td>
            <td class="p-3 flex items-center gap-3">
                <a href="{{ route('admin.kelas.edit', $item->id_jadwal) }}" class="text-blue-600 hover:text-blue-800 font-medium">Edit</a>
                
                <form action="{{ route('admin.kelas.destroy', $item->id_jadwal) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:text-red-800 font-medium">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="p-6 text-center text-gray-500 italic">
                Belum ada data jadwal kelas.
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection