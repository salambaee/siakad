@extends('layouts.mahasiswa')

@section('content')
<h1 class="text-2xl font-bold mb-4">Pengisian Kartu Rencana Studi (KRS)</h1>
<p class="text-gray-600 mb-6">Semester Ganjil 2024/2025</p>

<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
    <div class="bg-white shadow rounded-xl p-4 border border-gray-200">
        <h4 class="text-sm font-medium text-gray-500">Status KRS</h4>
        <p class="text-lg font-semibold text-green-600">Disetujui</p>
    </div>
    <div class="bg-white shadow rounded-xl p-4 border border-gray-200">
        <h4 class="text-sm font-medium text-gray-500">Total SKS Diambil</h4>
        <p class="text-lg font-semibold text-gray-800">21 SKS</p>
    </div>
    <div class="bg-white shadow rounded-xl p-4 border border-gray-200">
        <h4 class="text-sm font-medium text-gray-500">Batas SKS</h4>
        <p class="text-lg font-semibold text-gray-800">24 SKS</p>
    </div>
</div>

<div class="bg-white shadow rounded-xl p-6 border border-gray-200">
    <h2 class="text-xl font-semibold text-gray-700 mb-4">Mata Kuliah Ditawarkan (Semester 3)</h2>
    
    <form action="{{ route('mahasiswa.krs.store') }}" method="POST">
        @csrf
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pilih</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kode MK</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mata Kuliah</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">SKS</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jadwal</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dosen</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap"><input type="checkbox" name="mk[]" value="1" class="rounded"></td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">IF101</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Pemrograman Web</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">3</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Senin, 09:00 - 11:00</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Dr. Ahmad Fauzi</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap"><input type="checkbox" name="mk[]" value="2" class="rounded" checked disabled></td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">IF102</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Struktur Data</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">3</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Rabu, 13:00 - 15:00</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Nur Aisyah, M.Kom</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap"><input type="checkbox" name="mk[]" value="3" class="rounded"></td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">IF103</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Basis Data</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">3</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Jumat, 10:00 - 12:00</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Bambang Wijaya, M.T</td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="mt-6 flex justify-end">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" disabled>
                Ajukan KRS (Masa Pengisian Ditutup)
            </button>
        </div>
    </form>
</div>
@endsection