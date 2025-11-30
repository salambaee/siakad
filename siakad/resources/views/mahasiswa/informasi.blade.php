@extends('layouts.mahasiswa')

@section('content')
<div class="bg-white shadow rounded p-6">

    <h1 class="text-2xl font-bold mb-4">Informasi Mahasiswa</h1>

    {{-- Informasi Data Diri --}}
    <div class="p-4 border rounded shadow-sm mb-6">
        <h2 class="text-lg font-semibold mb-2">Data Diri</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-gray-700">
            <p><strong>NIM:</strong> {{ $mahasiswa->nim }}</p>
            <p><strong>Nama:</strong> {{ $mahasiswa->nama }}</p>
            <p><strong>Program Studi:</strong> {{ $mahasiswa->prodi->nama_prodi ?? '-' }}</p>
            <p><strong>Angkatan:</strong> {{ $mahasiswa->angkatan }}</p>
            <p><strong>IPK:</strong> 
                <span class="font-bold text-blue-600">{{ number_format($ipk, 2) }}</span>
            </p>
        </div>
    </div>

    {{-- Informasi Akademik --}}
    <div class="p-4 border rounded shadow-sm mb-6">
        <h2 class="text-lg font-semibold mb-2">Informasi Akademik</h2>
        <p class="text-gray-700">
            Berikut adalah informasi akademik dan aktivitas perkuliahan kamu.
        </p>
    </div>

    {{-- Riwayat KRS dan Nilai --}}
    <div class="p-4 border rounded shadow-sm">
        <h2 class="text-lg font-semibold mb-4">Riwayat KRS & Nilai</h2>

        @if ($krs->count() > 0)
            <table class="w-full border text-left">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="p-2">Mata Kuliah</th>
                        <th class="p-2">SKS</th>
                        <th class="p-2">Semester</th>
                        <th class="p-2">Tahun Ajaran</th>
                        <th class="p-2">Nilai</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($krs as $item)
                        <tr class="border">
                            <td class="p-2">{{ $item->jadwal->matkul->nama_matkul ?? '-' }}</td>
                            <td class="p-2">{{ $item->jadwal->matkul->sks ?? '-' }}</td>
                            <td class="p-2">{{ $item->semester ?? '-' }}</td>
                            <td class="p-2">{{ $item->tahun_ajaran ?? '-' }}</td>
                            <td class="p-2">
                                @if($item->nilai && $item->nilai->nilai_huruf)
                                    <span class="font-semibold">{{ $item->nilai->nilai_huruf }}</span>
                                @else
                                    <span class="text-gray-500">Belum Ada</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        @else
            <p class="text-gray-600">Belum ada data KRS.</p>
        @endif

    </div>

</div>
@endsection
