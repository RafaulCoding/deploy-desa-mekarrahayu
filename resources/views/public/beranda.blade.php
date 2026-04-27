@extends('layouts.public')
@section('content')

<!-- HERO SECTION (Dengan Foto Latar Belakang) -->
<div class="relative overflow-hidden pt-28 pb-32 text-white">
    
    <!-- FOTO LATAR BELAKANG (Ganti URL di bawah ini dengan foto asli desa Anda) -->
    <div class="absolute inset-0 bg-cover bg-center bg-no-repeat" 
         style="background-image: url('https://images.unsplash.com/photo-1605810230434-7631ac76ec81?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80');">
    </div>

    <!-- OVERLAY HIJAU GELAP (Agar tulisan terbaca) -->
    <div class="absolute inset-0 bg-gradient-to-br from-green-900/90 via-green-800/85 to-emerald-700/90"></div>
    
    <!-- Efek blur dekoratif -->
    <div class="absolute top-0 left-0 w-96 h-96 bg-green-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 -translate-x-1/2 -translate-y-1/2"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-yellow-500 rounded-full mix-blend-multiply filter blur-3xl opacity-10 translate-x-1/2 translate-y-1/2"></div>

    <!-- ISI TEKS HERO -->
    <div class="relative max-w-4xl mx-auto text-center px-4">
        <span class="inline-block bg-white/10 backdrop-blur-sm text-sm font-medium px-4 py-1 rounded-full mb-6 border border-white/20">Pemerintah Desa Mekarrahayu</span>
        <h1 class="text-5xl md:text-6xl font-extrabold mb-6 leading-tight tracking-tight">
            Layanan Digital <br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 to-yellow-500">Cepat & Transparan</span>
        </h1>
        <p class="text-green-100 text-lg max-w-2xl mx-auto mb-10">Urus kebutuhan administrasi desa Anda kapan saja dan di mana saja secara online tanpa harus datang ke kantor desa.</p>
        <a href="{{ route('login') }}" class="inline-flex items-center gap-2 bg-yellow-400 hover:bg-yellow-300 text-green-900 font-bold py-4 px-10 rounded-full shadow-2xl shadow-yellow-500/30 transition duration-300 hover:scale-105">
            Ajukan Surat Sekarang <i class="fas fa-arrow-right"></i>
        </a>
    </div>
</div>

<!-- STATISTIK SECTION (Glassmorphism) -->
<div class="max-w-6xl mx-auto px-4 -mt-16 relative z-10 mb-24">
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        <div class="bg-white/80 backdrop-blur-lg rounded-2xl shadow-xl p-6 text-center border border-white/20">
            <i class="fas fa-users text-green-600 text-3xl mb-3"></i>
            <h3 class="text-3xl font-extrabold text-gray-800">{{ number_format($penduduk, 0, ',', '.') }}</h3>
            <p class="text-sm text-gray-500 font-medium">Penduduk Jiwa</p>
        </div>
        <div class="bg-white/80 backdrop-blur-lg rounded-2xl shadow-xl p-6 text-center border border-white/20">
            <i class="fas fa-house-user text-blue-600 text-3xl mb-3"></i>
            <h3 class="text-3xl font-extrabold text-gray-800">{{ number_format($kk, 0, ',', '.') }}</h3>
            <p class="text-sm text-gray-500 font-medium">Kepala Keluarga</p>
        </div>
        <div class="bg-white/80 backdrop-blur-lg rounded-2xl shadow-xl p-6 text-center border border-white/20">
            <i class="fas fa-map-marked-alt text-yellow-600 text-3xl mb-3"></i>
            <h3 class="text-3xl font-extrabold text-gray-800">{{ number_format($luas_wilayah, 0, ',', '.') }} <span class="text-lg">Ha</span></h3>
            <p class="text-sm text-gray-500 font-medium">Luas Wilayah</p>
        </div>
        <div class="bg-white/80 backdrop-blur-lg rounded-2xl shadow-xl p-6 text-center border border-white/20">
            <i class="fas fa-school text-red-500 text-3xl mb-3"></i>
            <h3 class="text-3xl font-extrabold text-gray-800">{{ $fasum }}</h3>
            <p class="text-sm text-gray-500 font-medium">Fasilitas Umum</p>
        </div>
    </div>
</div>

<!-- ALUR PENGAJUAN SECTION -->
<div class="max-w-5xl mx-auto px-4 pb-24">
    <div class="text-center mb-16">
        <h2 class="text-3xl font-extrabold text-gray-800">Alur Pengajuan Surat</h2>
        <div class="w-20 h-1 bg-green-600 mx-auto mt-4 rounded-full"></div>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        <div class="text-center group">
            <div class="w-20 h-20 mx-auto mb-4 bg-green-100 text-green-600 rounded-2xl flex items-center justify-center text-3xl group-hover:bg-green-600 group-hover:text-white transition duration-300 shadow-md">
                <i class="fas fa-file-signature"></i>
            </div>
            <h3 class="font-bold text-gray-800 mb-2">Isi Formulir</h3>
            <p class="text-sm text-gray-500">Warga mengisi data dan upload berkas persyaratan.</p>
        </div>
        <div class="text-center group">
            <div class="w-20 h-20 mx-auto mb-4 bg-blue-100 text-blue-600 rounded-2xl flex items-center justify-center text-3xl group-hover:bg-blue-600 group-hover:text-white transition duration-300 shadow-md">
                <i class="fas fa-clipboard-check"></i>
            </div>
            <h3 class="font-bold text-gray-800 mb-2">Verifikasi Staff</h3>
            <p class="text-sm text-gray-500">Staff memeriksa keabsahan dan kelengkapan data.</p>
        </div>
        <div class="text-center group">
            <div class="w-20 h-20 mx-auto mb-4 bg-yellow-100 text-yellow-600 rounded-2xl flex items-center justify-center text-3xl group-hover:bg-yellow-600 group-hover:text-white transition duration-300 shadow-md">
                <i class="fas fa-user-tie"></i>
            </div>
            <h3 class="font-bold text-gray-800 mb-2">Persetujuan Kades</h3>
            <p class="text-sm text-gray-500">Kepala desa melakukan review dan persetujuan.</p>
        </div>
        <div class="text-center group">
            <div class="w-20 h-20 mx-auto mb-4 bg-emerald-100 text-emerald-600 rounded-2xl flex items-center justify-center text-3xl group-hover:bg-emerald-600 group-hover:text-white transition duration-300 shadow-md">
                <i class="fas fa-stamp"></i>
            </div>
            <h3 class="font-bold text-gray-800 mb-2">Selesai (TTD)</h3>
            <p class="text-sm text-gray-500">Surat otomatis ditandatangani digital & siap diunduh.</p>
        </div>
    </div>
</div>

@endsection