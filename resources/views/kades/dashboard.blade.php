@extends('layouts.dashboard')
@section('title', 'Dashboard Kades')
@section('header', 'Dashboard Kepala Desa')
@section('content')
@section('sidebar')
    <a href="{{ route('kades.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg transition {{ request()->routeIs('kades.dashboard') ? 'text-white bg-green-900/50 font-medium' : 'text-green-200 hover:bg-green-700 hover:text-white' }}">
        <i class="fas fa-tachometer-alt w-5 text-center"></i> Dashboard
    </a>
    <a href="{{ route('kades.menunggu') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg transition {{ request()->routeIs('kades.menunggu') ? 'text-white bg-green-900/50 font-medium' : 'text-green-200 hover:bg-green-700 hover:text-white' }}">
        <i class="fas fa-file-signature w-5 text-center"></i> Menunggu Persetujuan
    </a>
    <a href="{{ route('kades.riwayat') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg transition {{ request()->routeIs('kades.riwayat') ? 'text-white bg-green-900/50 font-medium' : 'text-green-200 hover:bg-green-700 hover:text-white' }}">
        <i class="fas fa-history w-5 text-center"></i> Riwayat
    </a>
@endsection
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <a href="{{ route('kades.menunggu') }}" class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-yellow-500 hover:shadow-md transition">
        <div class="text-3xl font-bold text-gray-800">{{ $menunggu }}</div><div class="text-sm text-gray-500">Menunggu Persetujuan</div>
    </a>
    <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-green-500">
        <div class="text-3xl font-bold text-gray-800">{{ $selesai }}</div><div class="text-sm text-gray-500">Sudah Disetujui (Selesai)</div>
    </div>
    <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-red-500">
        <div class="text-3xl font-bold text-gray-800">{{ $ditolak }}</div><div class="text-sm text-gray-500">Dikembalikan ke Staff</div>
    </div>
</div>
@endsection