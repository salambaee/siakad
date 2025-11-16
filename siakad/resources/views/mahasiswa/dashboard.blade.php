@extends('layouts.mahasiswa')

@section('content')
<h1 class="text-2xl font-bold mb-6">Selamat Datang, {{ Auth::user()->nama ?? 'Mahasiswa' }}</h1>

{{-- Info Cards --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white shadow rounded-xl p-6 border border-gray-200">
        <h3 class="text-lg font-semibold text-gray-700">Jadwal Kuliah Hari Ini</h3>
        <p class="mt-3 text-sm text-gray-500">Anda memiliki 2 kelas yang dijadwalkan hari ini.</p>
        <a href="{{ route('mahasiswa.jadwal') }}" class="mt-4 inline-block text-blue-600 font-medium hover:underline">Lihat Jadwal</a>
    </div>

    <div class="bg-white shadow rounded-xl p-6 border border-gray-200">
        <h3 class="text-lg font-semibold text-gray-700">Rencana Studi (KRS)</h3>
        <p class="mt-3 text-sm text-gray-500">Status: <span class="font-medium text-green-600">Disetujui</span>. SKS Ditempuh: 21.</p>
        <a href="{{ route('mahasiswa.krs') }}" class="mt-4 inline-block text-blue-600 font-medium hover:underline">Lihat KRS</a>
    </div>

    <div class="bg-white shadow rounded-xl p-6 border border-gray-200">
        <h3 class="text-lg font-semibold text-gray-700">Hasil Studi (KHS)</h3>
        <p class="mt-3 text-sm text-gray-500">IPK Sementara Anda adalah 3.75.</p>
        <a href="{{ route('mahasiswa.nilai') }}" class="mt-4 inline-block text-blue-600 font-medium hover:underline">Lihat Nilai</a>
    </div>
</div>

<div class="bg-white shadow rounded-xl p-6 border border-gray-200 mb-8">
    <h2 class="text-xl font-semibold text-gray-700 mb-4">Ringkasan Jadwal Minggu Ini</h2>

    <ul class="divide-y divide-gray-200">
        <li class="py-3 flex justify-between">
            <span class="font-medium text-gray-700">Pemrograman Web</span>
            <span class="text-gray-500 text-sm">Senin, 09:00 - 11:00</span>
        </li>
        <li class="py-3 flex justify-between">
            <span class="font-medium text-gray-700">Struktur Data</span>
            <span class="text-gray-500 text-sm">Rabu, 13:00 - 15:00</span>
        </li>
        <li class="py-3 flex justify-between">
            <span class="font-medium text-gray-700">Basis Data</span>
            <span class="text-gray-500 text-sm">Jumat, 10:00 - 12:00</span>
        </li>
    </ul>
</div>

<div class="bg-white shadow rounded-xl p-6 border border-gray-200">
    <h2 class="text-xl font-semibold text-gray-700 mb-4">Pengumuman Terbaru</h2>

    <div class="space-y-3">
        <div class="p-4 bg-blue-50 border-l-4 border-blue-400 rounded">
            <p class="text-sm text-gray-700">Batas akhir pembayaran UKT semester genap adalah 30 November.</p>
        </div>
        <div class="p-4 bg-green-50 border-l-4 border-green-400 rounded">
            <p class="text-sm text-gray-700">Perwalian dan pengisian KRS semester genap dibuka mulai 1-15 Desember.</p>
        </div>
    </div>
</div>
@endsection