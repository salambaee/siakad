@extends('layouts.admin')

@section('content')

<h1 class="text-xl font-bold mb-4">Presensi Per Kelas</h1>

@if(session('success'))
    <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
        {{ session('success') }}
    </div>
@endif

<table class="w-full bg-white shadow rounded-lg overflow-hidden mt-4">
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
            <td class="p-3 flex gap-3">
                <a href="{{ route('admin.presensi.input', $item->id_jadwal) }}" class="text-blue-600 hover:text-blue-800 font-medium">
                    Input
                </a>
                <span class="text-gray-300">|</span>
                <a href="{{ route('admin.presensi.rekap', $item->id_jadwal) }}" class="text-green-600 hover:text-green-800 font-medium">
                    Rekap
                </a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="p-6 text-center text-gray-500 italic">
                Belum ada jadwal kelas aktif untuk presensi.
            </td>
        </tr>
        @endforelse
    </tbody>
</table>

@endsection