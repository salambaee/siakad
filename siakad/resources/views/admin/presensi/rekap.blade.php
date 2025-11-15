@extends('layouts.admin')

@section('content')

<h1 class="text-xl font-bold mb-4">Rekap Presensi</h1>

<div class="mb-4 p-4 bg-white shadow rounded">
    <p><strong>Mata Kuliah:</strong> Pemrograman Web</p>
    <p><strong>Dosen:</strong> Dosen A</p>
    <p><strong>Hari/Jam:</strong> Senin, 08.00 - 10.00</p>
</div>

<table class="w-full bg-white shadow">
    <thead>
        <tr class="bg-gray-200">
            <th class="p-3">NIM</th>
            <th>Nama</th>
            @for ($i = 1; $i <= 16; $i++)
                <th>P{{ $i }}</th>
            @endfor
        </tr>
    </thead>

    <tbody>
        <tr>
            <td class="p-3">20241001</td>
            <td>Andi</td>
            @for ($i = 1; $i <= 16; $i++)
                <td>H</td>
            @endfor
        </tr>

        <tr>
            <td class="p-3">20241002</td>
            <td>Sari</td>
            @for ($i = 1; $i <= 16; $i++)
                <td>A</td>
            @endfor
        </tr>
    </tbody>
</table>

@endsection
