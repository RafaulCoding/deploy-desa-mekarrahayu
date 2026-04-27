<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dashboard Desa Mekarrahayu')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Library Font Awesome untuk Ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 h-screen flex overflow-hidden">

    <!-- SIDEBAR -->
    <aside id="sidebar" class="w-64 bg-green-800 text-white flex-shrink-0 flex flex-col transition-all duration-300">
        <div class="p-4 border-b border-green-700 flex items-center space-x-3">
            <i class="fas fa-landmark text-yellow-400 text-2xl"></i>
            <div>
                <h1 class="font-bold text-lg leading-tight">Desa Mekarrahayu</h1>
                <p class="text-xs text-green-300">Sistem Administrasi</p>
            </div>
        </div>
        
        <nav class="flex-grow p-4 space-y-2 overflow-y-auto">
            @yield('sidebar')
        </nav>

        <div class="p-4 border-t border-green-700 text-xs text-green-300">
            &copy; 2026 Desa Mekarrahayu
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <!-- TOP NAVBAR -->
        <header class="bg-white shadow-sm p-4 flex justify-between items-center z-10">
            <h2 class="text-xl font-semibold text-gray-800">@yield('header', 'Dashboard')</h2>
            <div class="flex items-center space-x-4">
                <span class="text-sm text-gray-600">
                    <i class="fas fa-user-circle mr-1"></i> {{ Auth::user()->name }} 
                    <span class="bg-green-100 text-green-700 text-xs px-2 py-0.5 rounded-full ml-1">{{ ucfirst(Auth::user()->role) }}</span>
                </span>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-sm bg-red-50 text-red-600 px-3 py-1.5 rounded hover:bg-red-100 transition font-medium">
                        <i class="fas fa-sign-out-alt mr-1"></i> Logout
                    </button>
                </form>
            </div>
        </header>

        <!-- CONTENT AREA -->
        <main class="flex-1 overflow-y-auto p-6">
            @yield('content')
        </main>
    </div>

    <!-- SWEETALERT 2 SCRIPT (Penangkap Sinyal dari Controller) -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @if(session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                });
            @endif

            @if(session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Dibatalkan!',
                    text: '{{ session('error') }}',
                    showConfirmButton: true,
                });
            @endif
        });
    </script>

</body>
</html>