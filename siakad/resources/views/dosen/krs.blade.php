@extends('layouts.dosen')

@section('title', 'Kelola KRS Mahasiswa')

@section('content')
<div class="bg-white shadow rounded-lg p-6">
    <h1 class="text-2xl font-bold mb-6">Kelola KRS Mahasiswa</h1>

    <div class="overflow-x-auto">
        <table class="w-full bg-white shadow-md rounded-lg">
            <thead class="bg-gray-200">
                <tr>
                    <th class="p-3 text-left">NIM</th>
                    <th class="p-3 text-left">Nama Mahasiswa</th>
                    <th class="p-3 text-left">Mata Kuliah</th>
                    <th class="p-3 text-left">Semester</th>
                    <th class="p-3 text-left">Status</th>
                    <th class="p-3 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($krs as $item)
                <tr class="border-b">
                    <td class="p-3">{{ $item->mahasiswa->nim ?? '-' }}</td>
                    <td class="p-3">{{ $item->mahasiswa->nama ?? '-' }}</td>
                    <td class="p-3">{{ $item->jadwal->matkul->nama_mk ?? '-' }}</td>
                    <td class="p-3">{{ $item->semester }}</td>
                    <td class="p-3">
                        <span class="px-2 py-1 rounded text-xs
                            {{ $item->status == 'Disetujui' ? 'bg-green-100 text-green-800' :
                               ($item->status == 'Ditolak' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                            {{ $item->status }}
                        </span>
                    </td>
                    <td class="p-3">
                        @if($item->status == 'Pending')
                        <form action="{{ route('dosen.krs.approve', $item->id) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded text-sm hover:bg-green-600">
                                Setujui
                            </button>
                        </form>
                        <form action="{{ route('dosen.krs.reject', $item->id) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded text-sm hover:bg-red-600">
                                Tolak
                            </button>
                        </form>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="p-3 text-center text-gray-500">
                        Tidak ada data KRS
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection