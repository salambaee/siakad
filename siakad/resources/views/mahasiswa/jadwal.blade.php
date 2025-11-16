@extends('layouts.mahasiswa')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">Jadwal Kuliah</h1>
    <span class="text-sm font-medium text-gray-600">Semester Ganjil 2024/2025</span>
</div>

<div class="bg-white shadow rounded-xl p-6 border border-gray-200">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Hari</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Waktu</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mata Kuliah</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dosen</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ruang</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900" rowspan="2">Senin</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">09:00 - 11:00</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Pemrograman Web</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Dr. Ahmad Fauzi</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Lab SI-1</td>
                </tr>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">13:00 - 15:00</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Kecerdasan Buatan</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Rahmat Hidayat, M.Kom</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Teori-5</td>
                </tr>
                
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Selasa</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">10:00 - 12:00</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Analisis Perancangan SI</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Sri Rahayu, M.Kom</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Teori-2</td>
                </tr>

                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Rabu</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">13:00 - 15:00</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Struktur Data</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Nur Aisyah, M.Kom</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Lab-JRK2</td>
                </tr>

                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Jumat</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">10:00 - 12:00</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Basis Data</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Bambang Wijaya, M.T</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Lab SI-1</td>
                </tr>
                
            </tbody>
        </table>
    </div>
</div>
@endsection