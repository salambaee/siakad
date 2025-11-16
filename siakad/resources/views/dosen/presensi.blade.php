@extends('layouts.dosen')

@section('content')
<h1 class="text-2xl font-bold mb-6">Kelola Presensi - Tambah Kelas</h1>

{{-- Form Tambah Kelas --}}
<div class="bg-white shadow rounded-xl p-6 border border-gray-200 mb-8">
    <h2 class="text-xl font-semibold text-gray-700 mb-4">Tambah Kelas Mengajar</h2>

    <form class="grid grid-cols-1 md:grid-cols-2 gap-6">
        
        {{-- Mata Kuliah --}}
        <div>
            <label class="text-sm font-medium text-gray-600">Mata Kuliah</label>
            <select class="w-full border border-gray-300 rounded-lg px-4 py-2 mt-1">
                <option>Pilih Mata Kuliah</option>
                <option>Pemrograman Web</option>
                <option>Struktur Data</option>
                <option>Basis Data</option>
            </select>
        </div>

        {{-- Kelas --}}
        <div>
            <label class="text-sm font-medium text-gray-600">Kelas</label>
            <select class="w-full border border-gray-300 rounded-lg px-4 py-2 mt-1">
                <option>Pilih Kelas</option>
                <option>TI-3A</option>
                <option>TI-3B</option>
                <option>TI-3C</option>
            </select>
        </div>

        {{-- Hari --}}
        <div>
            <label class="text-sm font-medium text-gray-600">Hari</label>
            <select class="w-full border border-gray-300 rounded-lg px-4 py-2 mt-1">
                <option>Pilih Hari</option>
                <option>Senin</option>
                <option>Selasa</option>
                <option>Rabu</option>
                <option>Kamis</option>
                <option>Jumat</option>
            </select>
        </div>

        {{-- Jam --}}
        <div>
            <label class="text-sm font-medium text-gray-600">Jam</label>
            <input type="text"
                   placeholder="Contoh: 09:00 - 11:00"
                   class="w-full border border-gray-300 rounded-lg px-4 py-2 mt-1">
        </div>

        {{-- Ruang --}}
        <div>
            <label class="text-sm font-medium text-gray-600">Ruang</label>
            <input type="text"
                   placeholder="Contoh: B205"
                   class="w-full border border-gray-300 rounded-lg px-4 py-2 mt-1">
        </div>
    </form>

    <button class="mt-6 px-6 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700">
        Tambah Kelas
    </button>
</div>

{{-- Daftar Kelas --}}
<div class="bg-white shadow rounded-xl p-6 border border-gray-200">
    <h2 class="text-xl font-semibold text-gray-700 mb-4">Daftar Kelas Yang Anda Ampu</h2>

    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="border-b">
                <th class="py-3 text-gray-600">Mata Kuliah</th>
                <th class="py-3 text-gray-600">Kelas</th>
                <th class="py-3 text-gray-600">Hari</th>
                <th class="py-3 text-gray-600">Jam</th>
                <th class="py-3 text-gray-600">Ruang</th>
                <th class="py-3 text-gray-600">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y">
            <tr>
                <td class="py-3 font-medium">Pemrograman Web</td>
                <td class="py-3">TI-3A</td>
                <td class="py-3">Senin</td>
                <td class="py-3">09:00 - 11:00</td>
                <td class="py-3">B205</td>
                <td class="py-3">
                    <a href="#" class="text-blue-600 hover:underline">Presensi</a>
                </td>
            </tr>

            <tr>
                <td class="py-3 font-medium">Struktur Data</td>
                <td class="py-3">TI-3B</td>
                <td class="py-3">Kamis</td>
                <td class="py-3">13:00 - 15:00</td>
                <td class="py-3">A102</td>
                <td class="py-3">
                    <a href="#" class="text-blue-600 hover:underline">Presensi</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
