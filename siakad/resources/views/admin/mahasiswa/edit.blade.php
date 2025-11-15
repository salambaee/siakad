@extends('layouts.admin')

@section('content')
<h1 class="text-xl font-bold mb-4">Edit Mahasiswa</h1>

<form action="{{ route('mahasiswa.update', $mahasiswa->nim) }}" method="POST" class="bg-white shadow p-4 rounded">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <label>NIM</label>
        <input type="text" name="nim" class="border p-2 w-full" value="{{ $mahasiswa->nim }}" readonly>
        {{-- NIM sebaiknya readonly karena primary key --}}
    </div>

    <div class="mb-4">
        <label>Nama</label>
        <input type="text" name="nama" class="border p-2 w-full" value="{{ $mahasiswa->nama }}" required>
    </div>

    <div class="mb-4">
        <label>Program Studi</label>
        <select name="id_prodi" class="border p-2 w-full" required>
            <option value="">-- Pilih Prodi --</option>
            @foreach($prodi as $p)
                <option value="{{ $p->id_prodi }}" 
                    {{ $mahasiswa->id_prodi == $p->id_prodi ? 'selected' : '' }}>
                    {{ $p->nama_prodi }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-4">
        <label>Angkatan</label>
        <input type="text" name="angkatan" class="border p-2 w-full" value="{{ $mahasiswa->angkatan }}" required>
    </div>

    <button class="bg-green-600 text-white px-4 py-2 rounded">
        Update
    </button>
</form>
@endsection
