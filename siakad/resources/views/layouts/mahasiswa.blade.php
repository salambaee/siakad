<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Mahasiswa' }} - SIAKAD</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="flex h-screen">

        <aside class="w-64 bg-blue-700 text-white flex flex-col">
            <div class="p-6">
                <h2 class="text-2xl font-bold truncate" title="{{ Auth::guard('mahasiswa')->user()->nama ?? 'Mahasiswa' }}">
                    {{ Auth::guard('mahasiswa')->user()->nama ?? 'Mahasiswa' }}
                </h2>
                <p class="text-sm text-blue-200 mt-1">Panel Mahasiswa</p>
            </div>

            <nav class="flex-1 px-4">
                <ul>
                    <li class="mb-2">
                        <a href="{{ route('mahasiswa.dashboard') }}" 
                           class="block py-2 px-4 rounded hover:bg-blue-800 {{ request()->routeIs('mahasiswa.dashboard') ? 'bg-blue-800' : '' }}">
                            <span class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                </svg>
                                Dashboard
                            </span>
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('mahasiswa.krs') }}" 
                           class="block py-2 px-4 rounded hover:bg-blue-800 {{ request()->routeIs('mahasiswa.krs') ? 'bg-blue-800' : '' }}">
                            <span class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                                </svg>
                                Rencana Studi (KRS)
                            </span>
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('mahasiswa.jadwal') }}" 
                           class="block py-2 px-4 rounded hover:bg-blue-800 {{ request()->routeIs('mahasiswa.jadwal') ? 'bg-blue-800' : '' }}">
                            <span class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                                Jadwal Kuliah
                            </span>
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('mahasiswa.nilai') }}" 
                           class="block py-2 px-4 rounded hover:bg-blue-800 {{ request()->routeIs('mahasiswa.nilai') ? 'bg-blue-800' : '' }}">
                            <span class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                                Hasil Studi (Nilai)
                            </span>
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('mahasiswa.informasi') }}" 
                           class="block py-2 px-4 rounded hover:bg-blue-800 {{ request()->routeIs('mahasiswa.informasi') ? 'bg-blue-800' : '' }}">
                            <span class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                </svg>
                                Informasi Akun
                            </span>
                        </a>
                    </li>
                </ul>
            </nav>

            <div class="p-4 border-t border-blue-600">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" 
                            class="w-full py-2 px-4 bg-red-600 hover:bg-red-700 rounded text-white font-medium transition duration-200 flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <main class="flex-1 overflow-auto">
            <div class="bg-white shadow-sm px-6 py-4 border-b">
                <div class="flex items-center justify-between">
                    <h1 class="text-2xl font-bold text-gray-800">
                        {{ $title ?? 'Panel Mahasiswa' }}
                    </h1>
                    <div class="flex items-center space-x-4">
                        <span class="text-sm text-gray-600">
                            {{ now()->format('l, d F Y') }}
                        </span>
                        <div class="h-8 w-8 bg-blue-500 rounded-full flex items-center justify-center text-white font-semibold">
                            {{ strtoupper(substr(Auth::guard('mahasiswa')->user()->nama ?? 'M', 0, 1)) }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-6">
                @if(session('success'))
                    <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </div>
                @endif

                @yield('content')
            </div>
        </main>

    </div>

</body>
</html>