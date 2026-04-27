@extends('layouts.public')
@section('content')

<div class="bg-gradient-to-b from-gray-50 to-white min-h-screen pt-28 pb-24">
    <div class="max-w-6xl mx-auto px-4">
        <!-- Header -->
        <div class="text-center mb-16">
            <span class="text-green-600 font-semibold text-sm uppercase tracking-widest">Layanan Kami</span>
            <h2 class="text-4xl font-extrabold text-gray-800 mt-2">Jenis Pengajuan Surat</h2>
            <p class="text-gray-500 mt-4 max-w-xl mx-auto">Pilih jenis surat administrasi yang Anda butuhkan. Proses cepat, transparan, dan dapat dipantau secara real-time.</p>
        </div>

        <!-- Grid Layanan -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($jenis as $item)
            <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100 hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 group">
                <div class="w-16 h-16 bg-green-100 text-green-600 rounded-2xl flex items-center justify-center text-2xl mb-6 group-hover:bg-green-600 group-hover:text-white transition duration-300">
                    <i class="fas fa-file-alt"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3">{{ $item }}</h3>
                <p class="text-gray-500 text-sm leading-relaxed mb-6">Layanan pembuatan {{ $item }} secara digital. Pastikan persyaratan yang diminta sudah lengkap untuk mempercepat proses verifikasi.</p>
                <a href="{{ route('login') }}" class="inline-flex items-center gap-2 text-green-600 font-semibold text-sm hover:text-green-800 transition">
                    Ajukan Sekarang 
                    <i class="fas fa-arrow-right text-xs group-hover:translate-x-1 transition-transform"></i>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection