<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Mahasiswa - SIAKAD</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        /* Style untuk link sidebar aktif */
        .sidebar-link.active {
            background-color: #dbeafe; /* bg-blue-100 */
            color: #2563eb; /* text-blue-700 */
            font-weight: 600;
        }
        .sidebar-link {
            display: block;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            color: #374151; /* text-gray-700 */
            font-weight: 500;
        }
        .sidebar-link:hover {
            background-color: #f3f4f6; /* bg-gray-100 */
        }
    </style>
</head>
<body class="bg-gray-100 font-sans">
    <div class="flex h-screen">

        {{-- Penambahan 'flex flex-col' agar 'mt-auto' pada logout berfungsi --}}
        <aside class="w-64 bg-white shadow-lg p-6 flex flex-col">
            <h1 class="text-2xl font-bold text-blue-600 mb-8">SIAKAD</h1>
            
            <nav class="space-y-2">
                <a href="{{ route('mahasiswa.dashboard') }}" class="sidebar-link {{ request()->routeIs('mahasiswa.dashboard') ? 'active' : '' }}">
                    <span>Dashboard</span>
                </a>
                
                <a href="{{ route('mahasiswa.krs') }}" class="sidebar-link {{ request()->routeIs('mahasiswa.krs') ? 'active' : '' }}">
                    <span>Rencana Studi (KRS)</span>
                </a>
                
                <a href="{{ route('mahasiswa.jadwal') }}" class="sidebar-link {{ request()->routeIs('mahasiswa.jadwal') ? 'active' : '' }}">
                    <span>Jadwal Kuliah</span>
                </a>
                
                <a href="{{ route('mahasiswa.nilai') }}" class="sidebar-link {{ request()->routeIs('mahasiswa.nilai') ? 'active' : '' }}">
                    <span>Hasil Studi (Nilai)</span>
                </a>
            </nav>
            
            <div class="mt-auto pt-6">
                 <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="sidebar-link text-red-600 hover:bg-red-50 w-full text-left">
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <main class="flex-1 p-8 overflow-y-auto">
            @yield('content')
        </main>
        
    </div>
</body>
</html>