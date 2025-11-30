<!DOCTYPE html>
<html>
<head>
    <title>Cetak KHS</title>
</head>
<body>
<h2>KHS - {{ $mhs->nama }}</h2>
<p>NIM: {{ $mhs->nim }}</p>

<table border="1" cellspacing="0" cellpadding="8">
    <tr>
        <th>Kode MK</th>
        <th>Nama MK</th>
        <th>SKS</th>
        <th>Nilai</th>
    </tr>

    @foreach ($nilai as $n)
    <tr>
        <td>{{ $n->kode_mk }}</td>
        <td>{{ $n->nama_mk }}</td>
        <td>{{ $n->sks }}</td>
        <td>{{ $n->nilai }}</td>
    </tr>
    @endforeach
</table>

<button onclick="window.print()" style="margin-top:20px;">Cetak</button>
</body>
</html>
