@extends('layouts.admin')

@section('content')

<h1 class="text-xl font-bold mb-4">Presensi Per Kelas</h1>

<table class="w-full bg-white shadow mt-4">
    <thead>
        <tr class="bg-gray-200">
            <th class="p-3">Mata Kuliah</th>
            <th>Dosen</th>
            <th>Hari</th>
            <th>Jam</th>
            <th>Ruangan</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        <tr class="border">
            <td class="p-3">Pemrograman Web</td>
            <td>Dosen A</td>
            <td>Senin</td>
            <td>08.00 - 10.00</td>
            <td>LAB 1</td>
            <td>
                <a href="/admin/presensi/input" class="text-blue-600">Input Presensi</a> |
                <a href="/admin/presensi/rekap" class="text-green-600">Rekap</a>
            </td>
        </tr>

        <tr class="border">
            <td class="p-3">Basis Data</td>
            <td>Dosen B</td>
            <td>Rabu</td>
            <td>10.00 - 12.00</td>
            <td>LAB 2</td>
            <td>
                <a href="/admin/presensi/input" class="text-blue-600">Input Presensi</a> |
                <a href="/admin/presensi/rekap" class="text-green-600">Rekap</a>
            </td>
        </tr>
    </tbody>
</table>

@endsection
