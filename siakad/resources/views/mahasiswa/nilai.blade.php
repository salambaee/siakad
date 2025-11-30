@extends('layouts.mahasiswa')

@section('content')
<div class="bg-white shadow rounded-lg p-6">
    <h1 class="text-2xl font-bold mb-6">Kartu Hasil Studi (KHS)</h1>

    @if($khs->isEmpty())
        <div class="p-4 bg-yellow-50 text-yellow-700 border border-yellow-200 rounded">
            Belum ada data nilai yang tersedia.
        </div>
    @else
        @foreach($khs as $semester => $items)
            <div class="mb-8 border border-gray-200 rounded-lg overflow-hidden">
                <div class="bg-blue-600 text-white p-3 flex justify-between items-center">
                    <h3 class="text-lg font-semibold">Semester: {{ $semester }}</h3>
                    <span class="text-sm bg-blue-700 px-2 py-1 rounded">
                        Tahun Ajaran: {{ $items->first()->tahun_ajaran ?? '-' }}
                    </span>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full bg-white">
                        <thead class="bg-gray-100 border-b">
                            <tr>
                                <th class="p-3 text-left text-sm font-semibold text-gray-600">Kode MK</th>
                                <th class="p-3 text-left text-sm font-semibold text-gray-600">Mata Kuliah</th>
                                <th class="p-3 text-center text-sm font-semibold text-gray-600">SKS</th>
                                <th class="p-3 text-center text-sm font-semibold text-gray-600">Nilai Huruf</th>
                                <th class="p-3 text-center text-sm font-semibold text-gray-600">Nilai Angka</th>
                                <th class="p-3 text-center text-sm font-semibold text-gray-600">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @php 
                                $totalSksSemester = 0;
                                $totalBobotSemester = 0;
                            @endphp

                            @foreach($items as $krs)
                                @php
                                    $sks = $krs->jadwal->matkul->sks ?? 0;
                                    $nilaiAngka = $krs->nilai->nilai_angka ?? 0;
                                    
                                    if($krs->nilai && $krs->nilai->nilai_angka !== null) {
                                        $totalSksSemester += $sks;
                                        $totalBobotSemester += ($sks * $nilaiAngka);
                                    }
                                @endphp
                                <tr class="hover:bg-gray-50">
                                    <td class="p-3 text-sm font-mono text-gray-500">{{ $krs->jadwal->matkul->kode_mk ?? '-' }}</td>
                                    <td class="p-3 text-sm font-medium text-gray-800">{{ $krs->jadwal->matkul->nama_mk ?? '-' }}</td>
                                    <td class="p-3 text-sm text-center">{{ $sks }}</td>
                                    <td class="p-3 text-center">
                                        @if($krs->nilai)
                                            <span class="font-bold {{ $krs->nilai->nilai_huruf == 'A' ? 'text-green-600' : ($krs->nilai->nilai_huruf == 'E' ? 'text-red-600' : 'text-gray-700') }}">
                                                {{ $krs->nilai->nilai_huruf }}
                                            </span>
                                        @else
                                            <span class="text-gray-400">-</span>
                                        @endif
                                    </td>
                                    <td class="p-3 text-sm text-center">{{ $krs->nilai->nilai_angka ?? '-' }}</td>
                                    <td class="p-3 text-center">
                                        @if($krs->nilai)
                                            <span class="px-2 py-1 text-xs rounded bg-green-100 text-green-800">Selesai</span>
                                        @else
                                            <span class="px-2 py-1 text-xs rounded bg-yellow-100 text-yellow-800">Menunggu</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="bg-gray-50">
                            <tr>
                                <td colspan="6" class="p-3 text-right">
                                    <span class="text-gray-600 text-sm font-semibold mr-2">Indeks Prestasi Semester (IPS):</span>
                                    <span class="text-lg font-bold text-blue-600">
                                        {{ $totalSksSemester > 0 ? number_format($totalBobotSemester / $totalSksSemester, 2) : '0.00' }}
                                    </span>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        @endforeach
    @endif
</div>
@endsection