@extends('layouts.admin')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-4">

    <!-- Total Mahasiswa -->
    <div class="bg-white p-6 shadow rounded flex flex-col items-center">
        <!-- Icon Mahasiswa -->
        <svg xmlns="http://www.w3.org/2000/svg" 
            fill="none" viewBox="0 0 24 24" stroke-width="1.5" 
            stroke="currentColor" class="w-12 h-12 text-blue-500 mb-3">
            <path stroke-linecap="round" stroke-linejoin="round" 
            d="M15 12a3 3 0 11-6 0 3 3 0 016 0zm6 8.25a6 6 0 00-12 0M4.5 6.75h15M3 4.5h18"/>
        </svg>

        <h2 class="text-lg font-semibold text-gray-700">Total Mahasiswa</h2>
        <p class="text-3xl font-bold text-blue-600 mt-1">{{ $totalMahasiswa ?? '-' }}</p>
    </div>

    <!-- Total Dosen -->
    <div class="bg-white p-6 shadow rounded flex flex-col items-center">
        <!-- Icon Dosen -->
        <svg xmlns="http://www.w3.org/2000/svg" 
            fill="none" viewBox="0 0 24 24" stroke-width="1.5" 
            stroke="currentColor" class="w-12 h-12 text-green-500 mb-3">
            <path stroke-linecap="round" stroke-linejoin="round" 
            d="M12 6.75a3 3 0 110-6 3 3 0 010 6zm6 14.25v-2.25a6 6 0 00-12 0v2.25"/>
        </svg>

        <h2 class="text-lg font-semibold text-gray-700">Total Dosen</h2>
        <p class="text-3xl font-bold text-green-600 mt-1">{{ $totalDosen ?? '-' }}</p>
    </div>

    <!-- Total Mata Kuliah -->
    <div class="bg-white p-6 shadow rounded flex flex-col items-center">
        <!-- Icon Mata Kuliah -->
        <svg xmlns="http://www.w3.org/2000/svg" 
            fill="none" viewBox="0 0 24 24" stroke-width="1.5" 
            stroke="currentColor" class="w-12 h-12 text-yellow-500 mb-3">
            <path stroke-linecap="round" stroke-linejoin="round" 
            d="M12 3l8.5 4.5-8.5 4.5L3.5 7.5 12 3zm0 9v9m-4.5-4.5h9"/>
        </svg>

        <h2 class="text-lg font-semibold text-gray-700">Total Mata Kuliah</h2>
        <p class="text-3xl font-bold text-yellow-600 mt-1">{{ $totalMatkul ?? '-' }}</p>
    </div>

</div>
@endsection
