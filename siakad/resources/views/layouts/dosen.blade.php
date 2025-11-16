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

        <aside class="w-64 bg-blue-700 text-white p-6 flex flex-col">
            <h2 class="text-2xl font-bold mb-6">Dosen</h2>
            <nav class="flex-1">
                <ul>
                    <li class="mb-2">
                        <a href="/admin" class="block py-2 px-4 rounded hover:bg-blue-800">Dashboard</a>
                    </li>
                    <li class="mb-2">
                        <a href="/admin/mahasiswa" class="block py-2 px-4 rounded hover:bg-blue-800">Mahasiswa</a>
                    </li>
                    <li class="mb-2">
                        <a href="/admin/dosen" class="block py-2 px-4 rounded hover:bg-blue-800">Dosen</a>
                    </li>
                    <li class="mb-2">
                        <a href="/admin/matkul" class="block py-2 px-4 rounded hover:bg-blue-800">Mata Kuliah</a>
                    </li>
                    <li class="mb-2">
                        <a href="/admin/kelas" class="block py-2 px-4 rounded hover:bg-blue-800">Kelas</a>
                    </li>
                    <li class="mb-2">
                        <a href="/admin/presensi" class="block py-2 px-4 rounded hover:bg-blue-800">Presensi</a>
                    </li>
                </ul>
            </nav>
        </aside>

        <main class="flex-1 overflow-auto p-6">
            @yield('content')
        </main>

    </div>

</body>
</html>
