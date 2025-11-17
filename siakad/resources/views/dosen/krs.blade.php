@extends('layouts.dosen') 

@section('content')
<div>
    <h2>KRS Mahasiswa</h2>

    @if(session('success'))
        <div style="color: green; border: 1px solid green; padding: 10px; margin-bottom: 15px;">
            {{ session('success') }}
        </div>
    @endif

    <div style="margin-bottom: 20px;">
        <form action="{{ route('dosen.krs') }}" method="GET">
            <label for="mahasiswa_id">Pilih Mahasiswa</label>
            <select name="mahasiswa_id" id="mahasiswa_id" onchange="this.form.submit()">
                <option value="">Pilih Mahasiswa</option>
                
                @foreach($mahasiswaList as $mhs)
                    <option value="{{ $mhs->nim }}" 
                            {{ ($mahasiswaDetail && $mahasiswaDetail->nim == $mhs->nim) ? 'selected' : '' }}>
                        {{ $mhs->nama }} ({{ $mhs->nim }})
                    </option>
                @endforeach
                
            </select>
            <button type="submit">Tampilkan KRS</button>
        </form>
    </div>

    @if($mahasiswaDetail)
        <hr>
        <h3>Mahasiswa</h3>
        <p><strong>{{ $mahasiswaDetail->nama }} • {{ $mahasiswaDetail->nim }}</strong></p>

        @if($krsMahasiswa && $krsMahasiswa->count() > 0)
            <form action="{{ route('dosen.krs.updateStatus') }}" method="POST" style="margin-bottom: 20px;">
                @csrf
                <input type="hidden" name="nim" value="{{ $mahasiswaDetail->nim }}">
                
                <p>Status KRS: <strong>Menunggu Persetujuan</strong></p>
                <button type="submit" name="status" value="Disetujui" style="background-color: #28a745; color: white; padding: 8px 12px; border: none; cursor: pointer; border-radius: 4px;">
                    Setujui
                </button>
                <button type="submit" name="status" value="Ditolak" style="background-color: #dc3545; color: white; padding: 8px 12px; border: none; cursor: pointer; border-radius: 4px;">
                    Tolak
                </button>
            </form>

            <h4>Daftar Mata Kuliah Yang Diambil</h4>
            <table border="1" cellpadding="8" cellspacing="0" style="width: 100%; border-collapse: collapse;">
                <thead style="background-color: #f4f4f4;">
                    <tr>
                        <th>Kode</th>
                        <th>Mata Kuliah</th>
                        <th>SKS</th>
                        <th>Hari</th>
                        <th>Waktu</th>
                        <th>Ruang</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($krsMahasiswa as $krs)
                        <tr>
                            <td>{{ $krs->jadwal->matkul->kode_mk }}</td>
                            <td>{{ $krs->jadwal->matkul->nama_mk }}</td>
                            <td>{{ $krs->jadwal->matkul->sks }}</td>
                            <td>{{ $krs->jadwal->hari }}</td>
                            <td>{{ $krs->jadwal->jam }}</td>
                            <td>{{ $krs->jadwal->ruang }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Tidak ada KRS yang menunggu persetujuan untuk mahasiswa ini.</p>
        @endif
    
    @elseif(request()->query('mahasiswa_id'))
        <p>Mahasiswa tidak ditemukan.</p>
    @else
        <p>Silakan pilih mahasiswa untuk melihat detail KRS.</p>
    @endif
</div>
@endsection