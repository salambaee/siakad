@extends('layouts.mahasiswa')

@section('content')
<h1 class="text-xl font-bold mb-4">Profil Mahasiswa</h1>

<div class="bg-white p-4 shadow rounded">
    <p><strong>Nama:</strong> {{ $mhs->nama }}</p>
    <p><strong>NIM:</strong> {{ $mhs->nim }}</p>
    <p><strong>Jurusan:</strong> {{ $mhs->jurusan }}</p>

    <a href="{{ route('mahasiswa.khs.print',$mhs->id) }}" class="bg-blue-600 text-white px-3 py-2 inline-block mt-4 rounded">
        Cetak KHS
    </a>

    <form action="{{ route('logout') }}" method="POST" class="mt-4">
        @csrf
        <button class="bg-red-600 text-white px-3 py-2 rounded">Logout</button>
    </form>
</div>
@endsection
