<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Admin SIAKAD' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="flex">
        <!-- Sidebar -->
        <div class="w-64 h-screen bg-blue-700 text-white p-4">
            <h2 class="text-xl font-bold mb-4">Admin SIAKAD</h2>
            <ul>
                <li><a href="/admin" class="block py-2">Dashboard</a></li>
                <li><a href="/admin/mahasiswa" class="block py-2">Mahasiswa</a></li>
                <li><a href="/admin/dosen" class="block py-2">Dosen</a></li>
                <li><a href="/admin/matkul" class="block py-2">Mata Kuliah</a></li>
                <li><a href="/admin/kelas" class="block py-2">Kelas</a></li>
            </ul>
        </div>

        <!-- Content -->
        <div class="flex-1 p-6">
            @yield('content')
        </div>
    </div>

</body>
</html>
