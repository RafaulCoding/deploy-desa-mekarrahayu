@extends('layouts.dashboard')

@section('sidebar')
    {{-- Fungsi: Jika route sama, beri class abu-abu (active), jika tidak beri class biasa --}}
    
    <a href="{{ route('staff.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg transition {{ request()->routeIs('staff.dashboard') ? 'text-white bg-green-900/50 font-medium' : 'text-green-200 hover:bg-green-700 hover:text-white' }}">
        <i class="fas fa-tachometer-alt w-5 text-center"></i> Dashboard
    </a>
    <a href="{{ route('staff.masuk') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg transition {{ request()->routeIs('staff.masuk') ? 'text-white bg-green-900/50 font-medium' : 'text-green-200 hover:bg-green-700 hover:text-white' }}">
        <i class="fas fa-inbox w-5 text-center"></i> Surat Masuk
    </a>
    <a href="{{ route('staff.diproses') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg transition {{ request()->routeIs('staff.diproses') ? 'text-white bg-green-900/50 font-medium' : 'text-green-200 hover:bg-green-700 hover:text-white' }}">
        <i class="fas fa-spinner w-5 text-center"></i> Surat Diproses
    </a>
    <a href="{{ route('staff.revisi') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg transition {{ request()->routeIs('staff.revisi') ? 'text-white bg-green-900/50 font-medium' : 'text-green-200 hover:bg-green-700 hover:text-white' }}">
        <i class="fas fa-redo w-5 text-center"></i> Revisi dari Kades
    </a>
@endsection

@section('title', 'Dashboard Staff')
@section('header', 'Dashboard Staff')

@section('content')
<!-- ISI KONTEN Kartu Statistik -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    
    <!-- Kartu Surat Masuk -->
    <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-blue-500 hover:shadow-md transition">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500 font-medium">Surat Masuk (Menunggu)</p>
                <h2 class="text-3xl font-extrabold text-gray-800 mt-1">{{ $masuk }}</h2>
            </div>
            <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center">
                <i class="fas fa-inbox text-blue-600 text-xl"></i>
            </div>
        </div>
    </div>

    <!-- Kartu Menunggu Kades -->
    <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-yellow-500 hover:shadow-md transition">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500 font-medium">Menunggu Persetujuan Kades</p>
                <h2 class="text-3xl font-extrabold text-gray-800 mt-1">{{ $proses }}</h2>
            </div>
            <div class="w-14 h-14 bg-yellow-100 rounded-full flex items-center justify-center">
                <i class="fas fa-user-tie text-yellow-600 text-xl"></i>
            </div>
        </div>
    </div>

    <!-- Kartu Revisi -->
    <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-red-500 hover:shadow-md transition">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500 font-medium">Revisi dari Kades</p>
                <h2 class="text-3xl font-extrabold text-gray-800 mt-1">{{ $revisi }}</h2>
            </div>
            <div class="w-14 h-14 bg-red-100 rounded-full flex items-center justify-center">
                <i class="fas fa-exclamation-triangle text-red-600 text-xl"></i>
            </div>
        </div>
    </div>

</div>

<!-- Tabel Surat Terbaru (Opsional Tambahan Biar tidak kosong) -->
<div class="mt-8 bg-white rounded-xl shadow-sm p-6">
    <h3 class="text-lg font-bold text-gray-800 mb-4">5 Surat Terakhir Masuk</h3>
    <table class="w-full text-sm text-left">
        <thead class="text-gray-500 border-b bg-gray-50">
            <tr>
                <th class="p-3">Pemohon</th>
                <th class="p-3">Jenis Surat</th>
                <th class="p-3">Tanggal</th>
                <th class="p-3">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($surats as $s)
            <tr class="border-b hover:bg-gray-50">
                <td class="p-3 font-medium">{{ $s->nama }}</td>
                <td class="p-3">{{ ucfirst(str_replace('_', ' ', $s->jenis_surat)) }}</td>
                <td class="p-3 text-gray-500">{{ $s->created_at->format('d M Y') }}</td>
                <td class="p-3">
                    <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded text-xs font-semibold">Menunggu Staff</span>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="p-6 text-center text-gray-400 italic">Belum ada surat masuk.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection