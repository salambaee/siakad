@extends('layouts.dosen')

@section('content')
<h1 class="text-2xl font-bold mb-6">Kelola Presensi - Tambah Kelas</h1>

{{-- Form Tambah Kelas --}}
<div class="bg-white shadow rounded-xl p-6 border border-gray-200 mb-8">
    <h2 class="text-xl font-semibold text-gray-700 mb-4">Tambah Kelas Mengajar</h2>

    <form action="{{ route('dosen.kelas.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @csrf

        {{-- Mata Kuliah --}}
        <div>
            <label class="text-sm font-medium text-gray-600">Mata Kuliah</label>
            <select name="kode_mk" class="w-full border border-gray-300 rounded-lg px-4 py-2 mt-1">
                <option value="">Pilih Mata Kuliah</option>
                @foreach($mataKuliah as $mk)
                    <option value="{{ $mk->kode_mk }}">{{ $mk->nama_mk }}</option>
                @endforeach
            </select>
        </div>

        {{-- Kelas --}}
        <div>
            <label class="text-sm font-medium text-gray-600">Kelas</label>
            <input type="text" name="kelas" placeholder="Contoh: TI-3A"
                   class="w-full border border-gray-300 rounded-lg px-4 py-2 mt-1">
        </div>

        {{-- Hari --}}
        <div>
            <label class="text-sm font-medium text-gray-600">Hari</label>
            <select name="hari" class="w-full border border-gray-300 rounded-lg px-4 py-2 mt-1">
                <option value="">Pilih Hari</option>
                <option value="Senin">Senin</option>
                <option value="Selasa">Selasa</option>
                <option value="Rabu">Rabu</option>
                <option value="Kamis">Kamis</option>
                <option value="Jumat">Jumat</option>
            </select>
        </div>

        {{-- Jam Mulai --}}
        <div>
            <label class="text-sm font-medium text-gray-600">Jam Mulai</label>
            <input type="time" name="jam_mulai"
                   class="w-full border border-gray-300 rounded-lg px-4 py-2 mt-1">
        </div>

        {{-- Jam Selesai --}}
        <div>
            <label class="text-sm font-medium text-gray-600">Jam Selesai</label>
            <input type="time" name="jam_selesai"
                   class="w-full border border-gray-300 rounded-lg px-4 py-2 mt-1">
        </div>

        {{-- Ruang --}}
        <div>
            <label class="text-sm font-medium text-gray-600">Ruang</label>
            <input type="text" name="ruang" placeholder="Contoh: B205"
                   class="w-full border border-gray-300 rounded-lg px-4 py-2 mt-1">
        </div>

        <div class="md:col-span-2">
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700">
                Tambah Kelas
            </button>
        </div>
    </form>
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
            @foreach($kelas as $kelasItem)
            <tr>
                <td class="py-3 font-medium">{{ $kelasItem->mataKuliah->nama_mk ?? '-' }}</td>
                <td class="py-3">{{ $kelasItem->kelas }}</td>
                <td class="py-3">{{ $kelasItem->hari }}</td>
                <td class="py-3">{{ $kelasItem->jam_mulai }} - {{ $kelasItem->jam_selesai }}</td>
                <td class="py-3">{{ $kelasItem->ruang }}</td>
                <td class="py-3">
                    <a href="#" class="text-blue-600 hover:underline">Presensi</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection