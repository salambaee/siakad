@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold mb-4">Dashboard Admin</h1>

<div class="grid grid-cols-3 gap-4">

    <div class="bg-white p-4 shadow rounded">
        <p class="text-gray-600 text-sm">Total Mahasiswa</p>
        <h2 class="text-2xl font-bold mt-2">{{ $totalMahasiswa }}</h2>
    </div>

    <div class="bg-white p-4 shadow rounded">
        <p class="text-gray-600 text-sm">Total Dosen</p>
        <h2 class="text-2xl font-bold mt-2">{{ $totalDosen }}</h2>
    </div>

    <div class="bg-white p-4 shadow rounded">
        <p class="text-gray-600 text-sm">Total Mata Kuliah</p>
        <h2 class="text-2xl font-bold mt-2">{{ $totalMatkul }}</h2>
    </div>

</div>
@endsection
