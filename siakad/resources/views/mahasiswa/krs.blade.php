@extends('layouts.mahasiswa')

@section('content')
<h1 class="text-2xl font-bold mb-4">Pengisian Kartu Rencana Studi (KRS)</h1>
<p class="text-gray-600 mb-6">Semester Ganjil 2024/2025</p>

@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
        {{ session('success') }}
    </div>
@endif

<div class="bg-white shadow rounded-xl p-6 border border-gray-200">
    <h2 class="text-xl font-semibold text-gray-700 mb-4">Mata Kuliah Ditawarkan</h2>

    <form action="{{ route('mahasiswa.krs.store') }}" method="POST">
        @csrf
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Pilih</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kode</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Mata Kuliah</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">SKS</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Jadwal</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Dosen</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($jadwalsTersedia as $jadwal)
                        @php
                            $isChecked = in_array($jadwal->id_jadwal, $krsDiambil);
                        @endphp
                        <tr>
                            <td class="px-6 py-4">
                                <input type="checkbox" name="id_jadwal[]" value="{{ $jadwal->id_jadwal }}" 
                                       class="rounded h-4 w-4 text-blue-600 focus:ring-blue-500"
                                       {{ $isChecked ? 'checked' : '' }}>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $jadwal->matkul->kode_mk }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $jadwal->matkul->nama_mk }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $jadwal->matkul->sks }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                {{ $jadwal->hari }}, {{ $jadwal->jam }} <br>
                                <span class="text-xs text-gray-400">{{ $jadwal->ruang }}</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $jadwal->dosen->nama ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                                Tidak ada jadwal kuliah yang tersedia untuk Prodi Anda saat ini.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6 flex justify-end">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded">
                Simpan KRS
            </button>
        </div>
    </form>
</div>
@endsection