@extends('layouts.dosen')

@section('content')
<h1 class="text-2xl font-bold mb-6">Jadwal Mengajar</h1>

<div class="bg-white shadow rounded-xl p-6 border border-gray-200 mb-6">
    <h2 class="text-xl font-semibold text-gray-700 mb-4">Jadwal Mengajar Hari Ini</h2>

    {{-- Contoh data statis, nanti bisa diganti dengan data dari database --}}
    <ul class="divide-y divide-gray-200">
        <li class="py-3 flex justify-between">
            <span class="font-medium text-gray-700">Pemrograman Web</span>
            <div class="text-right">
                <span class="text-gray-500 text-sm block">09:00 - 11:00</span>
                <span class="text-gray-400 text-xs">Ruang B205</span>
            </div>
        </li>

        <li class="py-3 flex justify-between">
            <span class="font-medium text-gray-700">Struktur Data</span>
            <div class="text-right">
                <span class="text-gray-500 text-sm block">13:00 - 15:00</span>
                <span class="text-gray-400 text-xs">Ruang A102</span>
            </div>
        </li>
    </ul>
</div>

<div class="bg-white shadow rounded-xl p-6 border border-gray-200">
    <h2 class="text-xl font-semibold text-gray-700 mb-4">Jadwal Minggu Ini</h2>

    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="border-b">
                <th class="py-2 text-gray-600">Mata Kuliah</th>
                <th class="py-2 text-gray-600">Hari</th>
                <th class="py-2 text-gray-600">Waktu</th>
                <th class="py-2 text-gray-600">Ruang</th>
            </tr>
        </thead>

        <tbody class="divide-y">
            <tr>
                <td class="py-3 font-medium">Basis Data</td>
                <td class="py-3">Senin</td>
                <td class="py-3">10:00 – 12:00</td>
                <td class="py-3">D201</td>
            </tr>

            <tr>
                <td class="py-3 font-medium">Pemrograman Web</td>
                <td class="py-3">Rabu</td>
                <td class="py-3">09:00 – 11:00</td>
                <td class="py-3">B305</td>
            </tr>

            <tr>
                <td class="py-3 font-medium">Struktur Data</td>
                <td class="py-3">Jumat</td>
                <td class="py-3">13:00 – 15:00</td>
                <td class="py-3">A102</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
