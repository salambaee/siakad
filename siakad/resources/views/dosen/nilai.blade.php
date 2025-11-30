@extends('layouts.dosen')

@section('title', 'Input & Kelola Nilai Mahasiswa')

@section('content')
<div class="bg-white shadow rounded-lg p-6">
    <h1 class="text-2xl font-bold mb-6">Input & Kelola Nilai Mahasiswa</h1>

    {{-- Form Pilih Mata Kuliah --}}
    <div class="mb-8 p-4 bg-gray-50 rounded-lg border border-gray-200">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Pilih Mata Kuliah untuk Penilaian</h2>
        <form class="grid grid-cols-1 md:grid-cols-3 gap-4 items-end">
            <div>
                <label for="matkul" class="text-sm font-medium text-gray-600">Mata Kuliah</label>
                <select id="matkul" class="w-full border border-gray-300 rounded-lg px-4 py-2 mt-1 focus:ring-blue-500 focus:border-blue-500">
                    <option>-- Pilih Mata Kuliah --</option>
                    {{-- Di sini data mata kuliah seharusnya diambil dari database --}}
                    <option>Pemrograman Web (TI-3A)</option>
                    <option>Struktur Data (TI-3B)</option>
                    <option>Basis Data (TI-3C)</option>
                </select>
            </div>
            
            <div>
                <label for="periode" class="text-sm font-medium text-gray-600">Periode Penilaian</label>
                <select id="periode" class="w-full border border-gray-300 rounded-lg px-4 py-2 mt-1 focus:ring-blue-500 focus:border-blue-500">
                    <option>-- Pilih Periode --</option>
                    <option>Nilai Akhir</option>
                    <option>Nilai Tengah Semester (UTS)</option>
                </select>
            </div>

            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition duration-150 mt-1 md:mt-0">
                Tampilkan Mahasiswa
            </button>
        </form>
    </div>

    {{-- Tabel Input Nilai --}}
    <div class="overflow-x-auto">
        {{-- Header dinamis setelah mata kuliah dipilih --}}
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Daftar Mahasiswa - Pemrograman Web (TI-3A)</h2>

        <table class="w-full bg-white shadow-md rounded-lg">
            <thead class="bg-gray-200">
                <tr>
                    <th class="p-3 text-left">NIM</th>
                    <th class="p-3 text-left">Nama Mahasiswa</th>
                    <th class="p-3 text-center w-24">Nilai Tugas (30%)</th>
                    <th class="p-3 text-center w-24">Nilai UTS (30%)</th>
                    <th class="p-3 text-center w-24">Nilai UAS (40%)</th>
                    <th class="p-3 text-center w-16">Nilai Huruf</th>
                    <th class="p-3 text-left w-24">Aksi</th>
                </tr>
            </thead>
            <tbody>
                {{-- Contoh Data Statis, ganti dengan @forelse($mahasiswa as $mhs) --}}
                <tr class="border-b hover:bg-gray-50 transition">
                    <td class="p-3">2023001</td>
                    <td class="p-3 font-medium">Budi Santoso</td>
                    <td class="p-3 text-center">
                        <input type="number" value="85" class="w-full text-center border rounded-lg p-1 text-sm">
                    </td>
                    <td class="p-3 text-center">
                        <input type="number" value="90" class="w-full text-center border rounded-lg p-1 text-sm">
                    </td>
                    <td class="p-3 text-center">
                        <input type="number" value="88" class="w-full text-center border rounded-lg p-1 text-sm">
                    </td>
                    <td class="p-3 text-center">
                        <span class="font-bold text-green-600">A</span>
                    </td>
                    <td class="p-3">
                        <button class="bg-indigo-500 text-white px-3 py-1 rounded text-sm hover:bg-indigo-600">Simpan</button>
                    </td>
                </tr>

                <tr class="border-b hover:bg-gray-50 transition">
                    <td class="p-3">2023002</td>
                    <td class="p-3 font-medium">Siti Rahayu</td>
                    <td class="p-3 text-center">
                        <input type="number" value="70" class="w-full text-center border rounded-lg p-1 text-sm">
                    </td>
                    <td class="p-3 text-center">
                        <input type="number" value="75" class="w-full text-center border rounded-lg p-1 text-sm">
                    </td>
                    <td class="p-3 text-center">
                        <input type="number" value="68" class="w-full text-center border rounded-lg p-1 text-sm">
                    </td>
                    <td class="p-3 text-center">
                        <span class="font-bold text-yellow-600">B</span>
                    </td>
                    <td class="p-3">
                        <button class="bg-indigo-500 text-white px-3 py-1 rounded text-sm hover:bg-indigo-600">Simpan</button>
                    </td>
                </tr>
                {{-- @empty --}}
                {{-- <tr><td colspan="7" class="p-3 text-center text-gray-500">Silakan pilih mata kuliah terlebih dahulu.</td></tr> --}}
                {{-- @endforelse --}}
            </tbody>
        </table>
    </div>

    <div class="mt-6 text-right">
        <button class="px-6 py-2 bg-green-600 text-white rounded-lg shadow hover:bg-green-700 disabled:opacity-50">
            Kirim Nilai Final
        </button>
    </div>
</div>
@endsection