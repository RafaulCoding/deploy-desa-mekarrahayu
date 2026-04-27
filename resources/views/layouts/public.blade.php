<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Desa Mekar Rahayu')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-gray-50 font-sans">
    <!-- Navbar -->
    <nav class="bg-green-800 shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        <i class="fas fa-landmark text-yellow-400 text-2xl mr-3"></i>
                        <div>
                            <h1 class="text-white font-bold text-lg leading-tight">Desa Mekar Rahayu</h1>
                            <p class="text-green-300 text-xs">Kec. Margaasih, Kab. Bandung</p>
                        </div>
                    </div>
                    <div class="hidden md:block ml-10 space-x-1">
                        <a href="/" class="text-green-100 hover:bg-green-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Beranda</a>
                        <a href="/layanan" class="text-green-100 hover:bg-green-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Layanan</a>
                        <a href="/informasi" class="text-green-100 hover:bg-green-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Informasi</a>
                    </div>
                </div>
                <<div class="flex items-center gap-2">
    <a href="/register" class="text-yellow-300 hover:text-white font-medium px-3 py-2 rounded-md text-sm transition hidden sm:block">Daftar</a>
    <a href="/login" class="bg-yellow-500 hover:bg-yellow-400 text-green-900 font-bold px-4 py-2 rounded-md text-sm shadow transition"><i class="fas fa-sign-in-alt mr-1"></i> Masuk</a>
</div>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- Footer -->
    <footer class="bg-green-900 text-white mt-auto">
        <div class="max-w-7xl mx-auto px-4 py-10 grid md:grid-cols-3 gap-8">
            <div>
                <h3 class="font-bold text-lg mb-3"><i class="fas fa-landmark text-yellow-400 mr-2"></i>Desa Mekar Rahayu</h3>
                <p class="text-green-300 text-sm">Melayani masyarakat dengan sepenuh hati untuk Desa Mekar Rahayu yang lebih maju.</p>
            </div>
            <div>
                <h3 class="font-bold text-lg mb-3">Kontak</h3>
                <p class="text-green-300 text-sm"><i class="fas fa-map-marker-alt w-5"></i> Jl. Cicukang No. 131, RT 001 RW 024</p>
                <p class="text-green-300 text-sm"><i class="fas fa-phone w-5"></i> (022) 5423781</p>
            </div>
            <div>
                <h3 class="font-bold text-lg mb-3">Jam Pelayanan</h3>
                <p class="text-green-300 text-sm">Senin - Jumat: 08.00 - 16.00</p>
                <p class="text-green-300 text-sm">Sabtu,Minggu,Tanggal merah: Libur </p>
            </div>
        </div>
        <div class="border-t border-green-800 text-center py-4 text-green-400 text-xs">&copy; 2026 Kantor Desa Mekar Rahayu. Hak Cipta Dilindungi.</div>
    </footer>
</body>
</html>