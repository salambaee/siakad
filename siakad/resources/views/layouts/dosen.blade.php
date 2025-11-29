<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAKAD - Dosen</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex">
        <div class="bg-blue-800 text-white w-64 min-h-screen">
            <div class="p-4">
                <h1 class="text-xl font-bold">SIAKAD</h1>
                <p class="text-sm text-blue-200">Panel Dosen</p>
            </div>
            
            <nav class="mt-6">
                <a href="{{ route('dosen.dashboard') }}" class="block py-2 px-4 hover:bg-blue-700">Dashboard</a>
                <a href="{{ route('dosen.jadwal') }}" class="block py-2 px-4 hover:bg-blue-700">Jadwal Mengajar</a>
                <a href="{{ route('dosen.krs') }}" class="block py-2 px-4 hover:bg-blue-700">Kelola KRS</a>
                <a href="{{ route('dosen.presensi') }}" class="block py-2 px-4 hover:bg-blue-700">Presensi</a>
                <a href="{{ route('dosen.nilai') }}" class="block py-2 px-4 hover:bg-blue-700">Input Nilai</a>
                
                <form action="{{ route('logout') }}" method="POST" class="mt-4">
                    @csrf
                    <button type="submit" class="w-full text-left py-2 px-4 hover:bg-blue-700 text-red-300">
                        Logout
                    </button>
                </form>
            </nav>
        </div>

        <div class="flex-1">
            <header class="bg-white shadow">
                <div class="px-6 py-4">
                    <div class="flex justify-between items-center">
                        <h2 class="text-lg font-semibold text-gray-800">
                            @yield('title', 'Dashboard Dosen')
                        </h2>
                        <div class="text-sm text-gray-600">
                            {{ Auth::guard('dosen')->user()->nama ?? 'Dosen' }}
                        </div>
                    </div>
                </div>
            </header>

            <main class="p-6">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>