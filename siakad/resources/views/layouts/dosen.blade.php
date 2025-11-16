<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'SIAKAD' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="flex h-screen">

        {{-- Sidebar --}}
        <aside class="w-64 bg-blue-700 text-white p-6 flex flex-col">
            
            {{-- Menampilkan Nama Dosen & Subjudul --}}
            <div class="mb-6">
                <div class="text-2xl font-bold truncate" title="{{ Auth::guard('dosen')->user()->nama ?? 'Dosen' }}">
                    {{ Auth::guard('dosen')->user()->nama ?? 'Dosen' }}
                </div>
                <div class="text-sm text-blue-200">Panel Dosen</div>
            </div>

            {{-- Memperbaiki Navigasi --}}
            <nav class="flex-1">
                <ul>
                    <li class="mb-2">
                        {{-- Menggunakan route() helper --}}
                        <a href="{{ route('dosen.dashboard') }}" class="block py-2 px-4 rounded hover:bg-blue-800">Dashboard</a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('dosen.krs') }}" class="block py-2 px-4 rounded hover:bg-blue-800">KRS Mahasiswa</a>
                    </li>
                    <li class="mb-2">
                        {{-- Mengganti link /admin/kelas ke route dosen.jadwal --}}
                        <a href="{{ route('dosen.jadwal') }}" class="block py-2 px-4 rounded hover:bg-blue-800">Jadwal & Kelas</a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('dosen.presensi') }}" class="block py-2 px-4 rounded hover:bg-blue-800">Presensi</a>
                    </li>
                    <li class="mb-2">
                        {{-- Menambahkan link Nilai yang hilang --}}
                        <a href="{{ route('dosen.nilai') }}" class="block py-2 px-4 rounded hover:bg-blue-800">Input Nilai</a>
                    </li>
                </ul>
            </nav>

            {{-- Menambahkan Tombol Logout --}}
            <div class="mt-auto pt-6">
                 <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block w-full text-left py-2 px-4 rounded hover:bg-blue-800">
                        Logout
                    </button>
                </form>
            </div>

        </aside>

        {{-- Konten Utama --}}
        <main class="flex-1 overflow-auto p-6">
            @yield('content')
        </main>

    </div>

</body>
</html>