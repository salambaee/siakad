@extends('layouts.mahasiswa')

@section('content')

<h1 class="text-2xl font-bold mb-6">Informasi Akademik</h1>

<div class="border-b mb-4 flex gap-6">
    <button onclick="openTab('khs')" class="tab-btn font-semibold p-2 border-b-2 border-blue-600">KHS</button>
    <button onclick="openTab('transkrip')" class="tab-btn p-2">Transkrip</button>
    <button onclick="openTab('jadwal')" class="tab-btn p-2">Jadwal</button>
    <button onclick="openTab('presensi')" class="tab-btn p-2">Presensi</button>
</div>

<div id="khs" class="tab-content">

    <h2 class="text-xl font-bold mb-3">KHS (Kartu Hasil Studi)</h2>

    <table class="w-full bg-white shadow mt-4">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-2">Kode</th>
                <th>Mata Kuliah</th>
                <th>SKS</th>
                <th>Nilai</th>
            </tr>
        </thead>

        <tbody>
            <tr class="border">
                <td class="p-2">IF101</td>
                <td>Pemrograman Web</td>
                <td>3</td>
                <td>A</td>
            </tr>

            <tr class="border">
                <td class="p-2">IF203</td>
                <td>Basis Data</td>
                <td>3</td>
                <td>B+</td>
            </tr>
        </tbody>
    </table>

    <p class="mt-4 bg-blue-50 p-3 rounded">
        <strong>IP Semester:</strong> 3.75
    </p>
</div>

<div id="transkrip" class="tab-content hidden">

    <h2 class="text-xl font-bold mb-3">Transkrip Sementara</h2>

    <table class="w-full bg-white shadow mt-4">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-2">Kode</th>
                <th>Mata Kuliah</th>
                <th>SKS</th>
                <th>Nilai</th>
                <th>Semester</th>
            </tr>
        </thead>

        <tbody>
            <tr class="border">
                <td class="p-2">IF101</td>
                <td>Pemrograman Web</td>
                <td>3</td>
                <td>A</td>
                <td>3</td>
            </tr>

            <tr class="border">
                <td class="p-2">IF203</td>
                <td>Basis Data</td>
                <td>3</td>
                <td>B+</td>
                <td>3</td>
            </tr>
        </tbody>
    </table>

    <p class="mt-4 bg-blue-50 p-3 rounded">
        <strong>IPK:</strong> 3.82
    </p>
</div>

<div id="jadwal" class="tab-content hidden">

    <h2 class="text-xl font-bold mb-3">Jadwal Kuliah</h2>

    <table class="w-full bg-white shadow mt-4">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-2">Hari</th>
                <th>Jam</th>
                <th>Mata Kuliah</th>
                <th>Dosen</th>
                <th>Ruangan</th>
            </tr>
        </thead>

        <tbody>
            <tr class="border">
                <td class="p-2">Senin</td>
                <td>08.00 - 10.00</td>
                <td>Pemrograman Web</td>
                <td>Dosen A</td>
                <td>LAB 1</td>
            </tr>

            <tr class="border">
                <td class="p-2">Rabu</td>
                <td>10.00 - 12.00</td>
                <td>Basis Data</td>
                <td>Dosen B</td>
                <td>LAB 2</td>
            </tr>
        </tbody>
    </table>
</div>

<div id="presensi" class="tab-content hidden">

    <h2 class="text-xl font-bold mb-3">Presensi</h2>

    <table class="w-full bg-white shadow mt-4">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-2">Pertemuan</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            @for ($i = 1; $i <= 16; $i++)
            <tr class="border">
                <td class="p-2">Pertemuan {{ $i }}</td>
                <td>Hadir</td>
            </tr>
            @endfor
        </tbody>
    </table>

    <p class="mt-4 bg-blue-50 p-3 rounded">
        <strong>Persentase Kehadiran:</strong> 100%
    </p>
</div>

<script>
    function openTab(tabName) {
        document.querySelectorAll(".tab-content").forEach(c => c.classList.add("hidden"));
        document.getElementById(tabName).classList.remove("hidden");

        document.querySelectorAll(".tab-btn").forEach(b => b.classList.remove("border-blue-600", "font-semibold"));
        event.target.classList.add("border-blue-600", "font-semibold");
    }
</script>

@endsection