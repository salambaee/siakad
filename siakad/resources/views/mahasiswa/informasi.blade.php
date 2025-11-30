@extends('layouts.mahasiswa')

@section('content')
<div class="bg-white shadow rounded-lg p-6">
    <h1 class="text-2xl font-bold mb-6">Informasi Akademik</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <div class="bg-gray-50 p-4 rounded-lg">
            <h2 class="text-lg font-semibold mb-4">Data Pribadi</h2>
            <div class="space-y-2">
                <div class="flex justify-between">
                    <span class="text-gray-600">NIM:</span>
                    <span class="font-semibold">{{ $mahasiswa->nim }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Nama:</span>
                    <span class="font-semibold">{{ $mahasiswa->nama }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Program Studi:</span>
                    <span class="font-semibold">{{ $mahasiswa->prodi->nama_prodi ?? '-' }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Angkatan:</span>
                    <span class="font-semibold">{{ $mahasiswa->angkatan }}</span>
                </div>
            </div>
        </div>

        <div class="bg-blue-50 p-4 rounded-lg">
            <h2 class="text-lg font-semibold mb-4">Indeks Prestasi</h2>
            <div class="text-center">
                <div class="text-4xl font-bold text-blue-600 mb-2">{{ number_format($ipk, 2) }}</div>
                <p class="text-gray-600">IPK (Indeks Prestasi Kumulatif)</p>
            </div>
        </div>
    </div>

    <div class="mb-8">
        <h2 class="text-xl font-semibold mb-4">Riwayat KRS</h2>
        <div class="overflow-x-auto">
            <table class="w-full bg-white border border-gray-200 rounded-lg">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-3 text-left text-sm font-semibold">Mata Kuliah</th>
                        <th class="p-3 text-left text-sm font-semibold">SKS</th>
                        <th class="p-3 text-left text-sm font-semibold">Semester</th>
                        <th class="p-3 text-left text-sm font-semibold">Nilai Huruf</th>
                        <th class="p-3 text-left text-sm font-semibold">Nilai Angka</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($krs as $item)
                    <tr class="border-b border-gray-200 hover:bg-gray-50">
                        <td class="p-3 text-sm">{{ $item->jadwal->matkul->nama_mk ?? '-' }}</td>
                        <td class="p-3 text-sm">{{ $item->jadwal->matkul->sks ?? '-' }}</td>
                        <td class="p-3 text-sm">{{ $item->semester }}</td>
                        <td class="p-3 text-sm">
                            <span class="px-2 py-1 rounded text-xs 
                                {{ $item->nilai && $item->nilai->nilai_huruf ? 
                                    ($item->nilai->nilai_huruf == 'A' ? 'bg-green-100 text-green-800' : 
                                    ($item->nilai->nilai_huruf == 'B' ? 'bg-blue-100 text-blue-800' : 
                                    ($item->nilai->nilai_huruf == 'C' ? 'bg-yellow-100 text-yellow-800' : 
                                    'bg-red-100 text-red-800'))) 
                                : 'bg-gray-100 text-gray-800' }}">
                                {{ $item->nilai->nilai_huruf ?? 'Belum' }}
                            </span>
                        </td>
                        <td class="p-3 text-sm">{{ $item->nilai->nilai_angka ?? '-' }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="p-3 text-center text-gray-500">
                            Belum ada data KRS
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-white border border-gray-200 rounded-lg p-4 text-center">
            <div class="text-2xl font-bold text-blue-600">{{ $krs->count() }}</div>
            <div class="text-gray-600 text-sm">Total Mata Kuliah</div>
        </div>
        <div class="bg-white border border-gray-200 rounded-lg p-4 text-center">
            <div class="text-2xl font-bold text-green-600">
                {{ $krs->where('nilai.nilai_angka', '!=', null)->count() }}
            </div>
            <div class="text-gray-600 text-sm">Mata Kuliah Selesai</div>
        </div>
        <div class="bg-white border border-gray-200 rounded-lg p-4 text-center">
            <div class="text-2xl font-bold text-purple-600">{{ $totalSks ?? 0 }}</div>
            <div class="text-gray-600 text-sm">Total SKS Diambil</div>
        </div>
    </div>
</div>
@endsection