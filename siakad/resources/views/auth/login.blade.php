<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login SIAKAD</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        .fade-in {
            animation: fadeIn 0.7s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to   { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>

<body class="bg-gradient-to-br from-grey-600 to-indigo-800 flex items-center justify-center min-h-screen">

    <div class="bg-white/90 backdrop-blur shadow-2xl p-8 rounded-xl w-96 fade-in">

        <h1 class="text-3xl font-bold text-center mb-1 text-gray-800">SIAKAD</h1>
        <p class="text-center text-gray-500 mb-6 text-sm">Silahkan login untuk melanjutkan</p>

        {{-- Error Messages --}}
        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-100 border border-red-400 text-red-700 rounded">
                {{ $errors->first() }}
            </div>
        @endif

        {{-- ✅ FIXED: Form dengan action dan method yang benar --}}
        <form action="{{ route('login') }}" method="POST">
            @csrf

            <!-- Username -->
            <label class="block mb-2 text-gray-700 font-semibold">Username</label>
            <div class="relative mb-4">
                <span class="absolute left-3 top-2.5 text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.25a8.25 8.25 0 1115 0v.75H4.5v-.75z" />
                    </svg>
                </span>
                <input type="text" name="username" value="{{ old('username') }}" 
                       class="w-full border p-2 pl-10 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" 
                       placeholder="NIM / NIDN / Username" required>
            </div>

            <!-- Password -->
            <label class="block mb-2 text-gray-700 font-semibold">Password</label>
            <div class="relative mb-6">
                <span class="absolute left-3 top-2.5 text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V7.5a4.5 4.5 0 10-9 0v3M6.75 10.5h10.5v9.75H6.75V10.5z" />
                    </svg>
                </span>

                <!-- INPUT PASSWORD -->
                <input id="passwordInput" type="password" name="password"
                       class="w-full border p-2 pl-10 pr-10 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none" 
                       placeholder="Masukkan password" required>

                <!-- ICON MATA -->
                <span class="absolute right-3 top-2.5 cursor-pointer text-gray-500" onclick="togglePassword()">
                    <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12s3.75-7.5 9.75-7.5S21.75 12 21.75 12s-3.75 7.5-9.75 7.5S2.25 12 2.25 12z" />
                        <path id="eyeBall" stroke-linecap="round" stroke-linejoin="round" d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                    </svg>
                </span>
            </div>

            <!-- Button -->
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition font-semibold tracking-wide shadow-md">
                Login
            </button>

        </form>

        <p class="text-center mt-4 text-gray-500 text-sm">
            © 2025 SIAKAD POLIWANGI
        </p>
    </div>


    <!-- SCRIPT SHOW/HIDE PASSWORD -->
    <script>
        function togglePassword() {
            const pw = document.getElementById('passwordInput');
            const eye = document.getElementById('eyeIcon');

            if (pw.type === "password") {
                pw.type = "text";
                eye.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 3l18 18M9.88 9.88A3 3 0 0114.12 14.12M6.18 6.18C4.09 7.75 2.25 12 2.25 12s3.75 7.5 9.75 7.5c1.96 0 3.76-.64 5.32-1.68M17.82 17.82C19.91 16.25 21.75 12 21.75 12s-3.75-7.5-9.75-7.5c-1.38 0-2.68.31-3.88.86" />
                `;
            } else {
                pw.type = "password";
                eye.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12s3.75-7.5 9.75-7.5S21.75 12 21.75 12s-3.75 7.5-9.75 7.5S2.25 12 2.25 12z" />
                    <path id="eyeBall" stroke-linecap="round" stroke-linejoin="round" d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                `;
            }
        }
    </script>

</body>
</html>