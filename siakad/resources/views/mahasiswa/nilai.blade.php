@extends('layouts.mahasiswa')

@section('content')
<h1 class="text-2xl font-bold mb-6">Hasil Studi Mahasiswa</h1>

<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
    <div class="bg-white shadow rounded-xl p-4 border border-gray-200">
        <h4 class="text-sm font-medium text-gray-500">IP Semester (IPS)</h4>
        <p class="text-xl font-semibold text-blue-600">3.80</p>
    </div>
    <div class="bg-white shadow rounded-xl p-4 border border-gray-200">
        <h4 class="text-sm font-medium text-gray-500">SKS Semester</h4>
        <p class="text-xl font-semibold text-gray-800">21</p>
    </div>
    <div class="bg-white shadow rounded-xl p-4 border border-gray-200">
        <h4 class="text-sm font-medium text-gray-500">IP Kumulatif (IPK)</h4>
        <p class="text-xl font-semibold text-blue-600">3.75</p>
    </div>
    <div class="bg-white shadow rounded-xl p-4 border border-gray-200">
        <h4 class="text-sm font-medium text-gray-500">Total SKS</h4>
        <p class="text-xl font-semibold text-gray-800">80</p>
    </div>
</div>

<div class="bg-white shadow rounded-xl p-6 border border-gray-200">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-semibold text-gray-700">Kartu Hasil Studi (KHS)</h2>
        <div class="flex space-x-4">
            <select class="rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                <option>Semester 5 (2024/2025)</option>
                <option>Semester 4 (2023/2024)</option>
                <option>Semester 3 (2023/2024)</option>
            </select>
            <button class="text-sm font-medium text-blue-600 hover:underline">Cetak Transkrip</button>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kode MK</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mata Kuliah</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">SKS</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nilai</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Bobot</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total (SKS x Bobot)</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">IF501</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Kecerdasan Buatan</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">3</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">A</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">4.00</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">12.00</td>
                </tr>
                 <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">IF502</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Analisis Perancangan SI</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">3</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">A-</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">3.75</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">11.25</td>
                </tr>
                 <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">IF503</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Manajemen Proyek TI</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">3</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">B+</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">3.50</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">10.50</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection