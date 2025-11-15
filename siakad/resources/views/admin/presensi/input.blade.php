@extends('layouts.admin')

@section('content')

<h1 class="text-xl font-bold mb-4">Input Presensi Mahasiswa</h1>

<div class="mb-4 p-4 bg-white shadow rounded">
    <p><strong>Mata Kuliah:</strong> Pemrograman Web</p>
    <p><strong>Dosen:</strong> Dosen A</p>
    <p><strong>Hari/Jam:</strong> Senin, 08.00 - 10.00</p>
</div>

<form class="bg-white p-4 shadow rounded">

    <table class="w-full">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-2">NIM</th>
                <th>Nama</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td class="p-2">20241001</td>
                <td>Andi</td>
                <td>
                    <select class="border p-2">
                        <option>Hadir</option>
                        <option>Sakit</option>
                        <option>Izin</option>
                        <option>Alfa</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td class="p-2">20241002</td>
                <td>Sari</td>
                <td>
                    <select class="border p-2">
                        <option>Hadir</option>
                        <option>Sakit</option>
                        <option>Izin</option>
                        <option>Alfa</option>
                    </select>
                </td>
            </tr>
        </tbody>
    </table>

    <button class="mt-4 bg-blue-600 text-white px-4 py-2 rounded">Simpan Presensi</button>
</form>

@endsection
