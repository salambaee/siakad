<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard Dosen') - SIAKAD</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="flex h-screen">

        {{-- Sidebar --}}
        <aside class="w-64 bg-blue-700 text-white flex flex-col">
            <div class="p-6">
                <h2 class="text-2xl font-bold truncate">SIAKAD</h2>
                <p class="text-sm text-blue-200 mt-1">Panel Dosen</p>
            </div>

            <nav class="flex-1 px-4">
                <ul>
                    {{-- Nav Link: Dashboard --}}
                    <li class="mb-2">
                        <a href="{{ route('dosen.dashboard') }}" 
                            class="block py-2 px-4 rounded hover:bg-blue-800 {{ request()->routeIs('dosen.dashboard') ? 'bg-blue-800' : '' }}">
                            Dashboard
                        </a>
                    </li>
                    {{-- Nav Link: Jadwal Mengajar --}}
                    <li class="mb-2">
                        <a href="{{ route('dosen.jadwal') }}" 
                            class="block py-2 px-4 rounded hover:bg-blue-800 {{ request()->routeIs('dosen.jadwal') ? 'bg-blue-800' : '' }}">
                            Jadwal Mengajar
                        </a>
                    </li>
                    {{-- Nav Link: Kelola KRS --}}
                    <li class="mb-2">
                        <a href="{{ route('dosen.krs') }}" 
                            class="block py-2 px-4 rounded hover:bg-blue-800 {{ request()->routeIs('dosen.krs') ? 'bg-blue-800' : '' }}">
                            Kelola KRS
                        </a>
                    </li>
                    {{-- Nav Link: Presensi --}}
                    <li class="mb-2">
                        <a href="{{ route('dosen.presensi') }}" 
                            class="block py-2 px-4 rounded hover:bg-blue-800 {{ request()->routeIs('dosen.presensi') ? 'bg-blue-800' : '' }}">
                            Presensi
                        </a>
                    </li>
                    {{-- Nav Link: Input Nilai --}}
                    <li class="mb-2">
                        <a href="{{ route('dosen.nilai') }}" 
                            class="block py-2 px-4 rounded hover:bg-blue-800 {{ request()->routeIs('dosen.nilai') ? 'bg-blue-800' : '' }}">
                            Input Nilai
                        </a>
                    </li>
                </ul>
            </nav>

            {{-- Logout Button --}}
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

        {{-- Main Content --}}
        <main class="flex-1 overflow-auto">
            <div class="bg-white shadow-sm px-6 py-4 border-b">
                <div class="flex items-center justify-between">
                    <h1 class="text-2xl font-bold text-gray-800">
                        @yield('title', 'Dashboard Dosen')
                    </h1>
                    <div class="flex items-center space-x-4">
                        <span class="text-sm text-gray-600">
                            {{ now()->format('l, d F Y') }}
                        </span>
                        <div class="flex items-center space-x-2">
                            <span class="text-sm text-gray-600 font-medium hidden sm:inline">
                                {{ Auth::guard('dosen')->user()->nama ?? 'Dosen' }}
                            </span>
                            <div class="h-8 w-8 bg-blue-500 rounded-full flex items-center justify-center text-white font-semibold">
                                {{ strtoupper(substr(Auth::guard('dosen')->user()->nama ?? 'D', 0, 1)) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-6">
                {{-- Session Messages (consistent with mahasiswa layout) --}}
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