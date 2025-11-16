@extends('layouts.dosen')

@section('content')
<h1 class="text-2xl font-bold mb-6">KRS Mahasiswa</h1>

{{-- Pilih Mahasiswa --}}
<div class="bg-white shadow rounded-xl p-6 border border-gray-200 mb-8">
    <h2 class="text-lg font-semibold text-gray-700 mb-4">Pilih Mahasiswa</h2>

    <form class="flex gap-4">
        <select class="border border-gray-300 rounded-lg px-4 py-2 w-64">
            <option>Pilih Mahasiswa</option>
            <option>Andri Setiawan</option>
            <option>Budi Prasetyo</option>
            <option>Fajar Nugraha</option>
        </select>

        <button
            class="px-5 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
            Tampilkan KRS
        </button>
    </form>
</div>

{{-- Status KRS --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white shadow rounded-xl p-6 border border-gray-200">
        <h3 class="text-lg font-semibold text-gray-700">Mahasiswa</h3>
        <p class="mt-3 text-sm text-gray-500">Andri Setiawan • 2341720013</p>
    </div>

    <div class="bg-white shadow rounded-xl p-6 border border-gray-200">
        <h3 class="text-lg font-semibold text-gray-700">Status KRS</h3>
        <p class="mt-3 text-sm text-yellow-600 font-medium">Menunggu Persetujuan</p>
    </div>

    <div class="bg-white shadow rounded-xl p-6 border border-gray-200 flex items-center gap-4">
        <button class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">Setujui</button>
        <button class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">Tolak</button>
    </div>
</div>

{{-- Tabel KRS --}}
<div class="bg-white shadow rounded-xl p-6 border border-gray-200 mb-8">
    <h2 class="text-xl font-semibold text-gray-700 mb-4">Daftar Mata Kuliah Yang Diambil</h2>

    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="border-b">
                <th class="py-3 text-gray-600">Kode</th>
                <th class="py-3 text-gray-600">Mata Kuliah</th>
                <th class="py-3 text-gray-600">SKS</th>
                <th class="py-3 text-gray-600">Hari</th>
                <th class="py-3 text-gray-600">Waktu</th>
                <th class="py-3 text-gray-600">Ruang</th>
            </tr>
        </thead>
        <tbody class="divide-y">
            <tr>
                <td class="py-3 font-medium">TI301</td>
                <td class="py-3">Pemrograman Web</td>
                <td class="py-3">3</td>
                <td class="py-3">Senin</td>
                <td class="py-3">09:00 – 11:00</td>
                <td class="py-3">B205</td>
            </tr>

            <tr>
                <td class="py-3 font-medium">TI205</td>
                <td class="py-3">Struktur Data</td>
                <td class="py-3">3</td>
                <td class="py-3">Selasa</td>
                <td class="py-3">13:00 – 15:00</td>
                <td class="py-3">A102</td>
            </tr>

            <tr>
                <td class="py-3 font-medium">TI410</td>
                <td class="py-3">Basis Data</td>
                <td class="py-3">3</td>
                <td class="py-3">Rabu</td>
                <td class="py-3">10:00 – 12:00</td>
                <td class="py-3">D201</td>
            </tr>
        </tbody>
    </table>
</div>

{{-- Catatan --}}
<div class="bg-white shadow rounded-xl p-6 border border-gray-200">
    <h2 class="text-xl font-semibold text-gray-700 mb-4">Catatan Dosen Wali</h2>

    <textarea
        class="w-full border border-gray-300 rounded-lg p-3"
        rows="4"
        placeholder="Tambahkan catatan atau alasan bila menolak KRS..."></textarea>

    <button class="mt-4 px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
        Simpan Catatan
    </button>
</div>
@endsection
