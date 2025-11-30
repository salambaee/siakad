@extends('layouts.dosen')

@section('title', 'Input & Kelola Nilai Mahasiswa')

@section('content')
<div class="bg-white shadow rounded-lg p-6">
    <h1 class="text-2xl font-bold mb-6">Input & Kelola Nilai Mahasiswa</h1>

    <div class="mb-8 p-4 bg-gray-50 rounded-lg border border-gray-200">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Pilih Kelas untuk Penilaian</h2>
        <form method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-4 items-end">
            <div>
                <label for="kelas_id" class="text-sm font-medium text-gray-600">Kelas</label>
                <select name="kelas_id" id="kelas_id" class="w-full border border-gray-300 rounded-lg px-4 py-2 mt-1 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">-- Pilih Kelas --</option>
                    @foreach($kelas as $k)
                        <option value="{{ $k->id }}" {{ request('kelas_id') == $k->id ? 'selected' : '' }}>
                            {{ $k->mataKuliah->nama_mk ?? '-' }} ({{ $k->kelas }})
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition duration-150 mt-1 md:mt-0">
                Tampilkan Mahasiswa
            </button>
        </form>
    </div>

    @if($selectedKelas)
    <div class="overflow-x-auto">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">
            Daftar Mahasiswa - {{ $selectedKelas->mataKuliah->nama_mk ?? '-' }} ({{ $selectedKelas->kelas }})
        </h2>

        <form action="{{ route('dosen.nilai.final') }}" method="POST" class="mb-4">
            @csrf
            <input type="hidden" name="kelas_id" value="{{ $selectedKelas->id }}">
            <button type="submit" class="px-6 py-2 bg-green-600 text-white rounded-lg shadow hover:bg-green-700">
                Kirim Nilai Final
            </button>
        </form>

        @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
            {{ session('error') }}
        </div>
        @endif

        <table class="w-full bg-white shadow-md rounded-lg">
            <thead class="bg-gray-200">
                <tr>
                    <th class="p-3 text-left">NIM</th>
                    <th class="p-3 text-left">Nama Mahasiswa</th>
                    <th class="p-3 text-center w-24">Nilai Tugas (30%)</th>
                    <th class="p-3 text-center w-24">Nilai UTS (30%)</th>
                    <th class="p-3 text-center w-24">Nilai UAS (40%)</th>
                    <th class="p-3 text-center w-16">Nilai Akhir</th>
                    <th class="p-3 text-center w-16">Nilai Huruf</th>
                    <th class="p-3 text-left w-24">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($mahasiswa as $mhs)
                @php
                    $nilai = $mhs->nilai_data;
                @endphp
                <tr class="border-b hover:bg-gray-50 transition">
                    <td class="p-3">{{ $mhs->nim }}</td>
                    <td class="p-3 font-medium">{{ $mhs->nama }}</td>
                    <form action="{{ route('dosen.nilai.simpan') }}" method="POST">
                        @csrf
                        <input type="hidden" name="nim" value="{{ $mhs->nim }}">
                        <input type="hidden" name="kelas_id" value="{{ $selectedKelas->id }}">
                        <td class="p-3 text-center">
                            <input type="number" name="nilai_tugas" value="{{ $nilai->nilai_tugas ?? '' }}" 
                                   class="w-full text-center border rounded-lg p-1 text-sm" min="0" max="100" step="0.1">
                        </td>
                        <td class="p-3 text-center">
                            <input type="number" name="nilai_uts" value="{{ $nilai->nilai_uts ?? '' }}" 
                                   class="w-full text-center border rounded-lg p-1 text-sm" min="0" max="100" step="0.1">
                        </td>
                        <td class="p-3 text-center">
                            <input type="number" name="nilai_uas" value="{{ $nilai->nilai_uas ?? '' }}" 
                                   class="w-full text-center border rounded-lg p-1 text-sm" min="0" max="100" step="0.1">
                        </td>
                        <td class="p-3 text-center">
                            <span class="font-bold {{ $nilai && $nilai->nilai_akhir >= 65 ? 'text-green-600' : 'text-red-600' }}">
                                {{ $nilai->nilai_akhir ?? '-' }}
                            </span>
                        </td>
                        <td class="p-3 text-center">
                            <span class="font-bold {{ $nilai && $nilai->nilai_akhir >= 65 ? 'text-green-600' : 'text-red-600' }}">
                                {{ $nilai->nilai_huruf ?? '-' }}
                            </span>
                        </td>
                        <td class="p-3">
                            <button type="submit" class="bg-indigo-500 text-white px-3 py-1 rounded text-sm hover:bg-indigo-600">
                                Simpan
                            </button>
                        </td>
                    </form>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="p-3 text-center text-gray-500">
                        Tidak ada mahasiswa dalam kelas ini
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @endif
</div>
@endsection