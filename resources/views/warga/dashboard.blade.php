@extends('layouts.dashboard')
@section('title', 'Beranda Warga')
@section('header', 'Beranda Warga')
@section('content')
@section('sidebar')
    <a href="{{ route('warga.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg transition {{ request()->routeIs('warga.dashboard') ? 'text-white bg-green-900/50 font-medium' : 'text-green-200 hover:bg-green-700 hover:text-white' }}">
        <i class="fas fa-tachometer-alt w-5 text-center"></i> Dashboard
    </a>
    <a href="{{ route('warga.pengajuan') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg transition {{ request()->routeIs('warga.pengajuan') ? 'text-white bg-green-900/50 font-medium' : 'text-green-200 hover:bg-green-700 hover:text-white' }}">
        <i class="fas fa-file-signature w-5 text-center"></i> Pengajuan Surat
    </a>
    <a href="{{ route('warga.riwayat') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg transition {{ request()->routeIs('warga.riwayat') ? 'text-white bg-green-900/50 font-medium' : 'text-green-200 hover:bg-green-700 hover:text-white' }}">
        <i class="fas fa-folder-open w-5 text-center"></i> Riwayat Saya
    </a>
@endsection
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-yellow-500"><div class="text-3xl font-bold text-gray-800">{{ $menunggu }}</div><div class="text-sm text-gray-500">Menunggu Validasi</div></div>
    <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-green-500"><div class="text-3xl font-bold text-gray-800">{{ $selesai }}</div><div class="text-sm text-gray-500">Selesai</div></div>
    <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-red-500"><div class="text-3xl font-bold text-gray-800">{{ $ditolak }}</div><div class="text-sm text-gray-500">Ditolak</div></div>
</div>
<div class="bg-white rounded-xl shadow-sm p-6">
    <div class="flex justify-between items-center mb-4"><h2 class="font-bold text-gray-800">Pengajuan Terbaru</h2><a href="{{ route('warga.pengajuan') }}" class="bg-green-700 text-white px-4 py-2 rounded-lg text-sm hover:bg-green-800"><i class="fas fa-plus mr-1"></i> Buat Surat</a></div>
    <table class="w-full text-sm text-left">
        <thead class="text-gray-500 border-b bg-gray-50"><tr><th class="p-3">Jenis Surat</th><th class="p-3">No. Surat</th><th class="p-3">Status</th><th class="p-3">Aksi</th></tr></thead>
        <tbody>
            @foreach($surats as $s)
            <tr class="border-b hover:bg-gray-50">
                <td class="p-3 font-medium">{{ ucfirst(str_replace('_', ' ', $s->jenis_surat)) }}</td>
                <td class="p-3 text-gray-500">{{ $s->nomor_surat ?? '-' }}</td>
                <td class="p-3">@if($s->status == 'menunggu_staff') <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded text-xs">Menunggu</span> @elseif($s->status == 'menunggu_kades') <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded text-xs">Proses Kades</span> @elseif($s->status == 'selesai') <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs">Selesai</span> @else <span class="bg-red-100 text-red-700 px-2 py-1 rounded text-xs">Ditolak</span> @endif</td>
                <td class="p-3">@if($s->status == 'selesai') <a href="{{ route('warga.cetak', $s->id) }}" target="_blank" class="text-blue-600 hover:underline"><i class="fas fa-print"></i> Cetak</a> @else - @endif</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection