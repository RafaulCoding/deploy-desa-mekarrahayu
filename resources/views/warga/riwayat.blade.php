@extends('layouts.dashboard')
@section('title', 'Riwayat Pengajuan')
@section('header', 'Riwayat Pengajuan')
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
<div class="bg-white rounded-xl shadow-sm p-6">
    <table class="w-full text-sm text-left">
        <thead class="text-gray-500 border-b bg-gray-50"><tr><th class="p-3">ID</th><th class="p-3">Jenis Surat</th><th class="p-3">No. Surat</th><th class="p-3">Tanggal</th><th class="p-3">Status</th><th class="p-3">Aksi</th></tr></thead>
        <tbody>
            @foreach($surats as $s)
            <tr class="border-b hover:bg-gray-50">
                <td class="p-3 font-mono text-xs">#{{ $s->id }}</td>
                <td class="p-3">{{ ucfirst(str_replace('_', ' ', $s->jenis_surat)) }}</td>
                <td class="p-3 text-gray-500">{{ $s->nomor_surat ?? '-' }}</td>
                <td class="p-3 text-gray-500">{{ $s->created_at->format('d M Y') }}</td>
                <td class="p-3">@if($s->status == 'selesai') <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs">Selesai</span> @elseif($s->status == 'ditolak_staff' || $s->status == 'ditolak_kades') <span class="bg-red-100 text-red-700 px-2 py-1 rounded text-xs">Ditolak</span> @else <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded text-xs">Proses</span> @endif</td>
                <td class="p-3">
    @if($s->status == 'selesai')
        <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs font-semibold">Selesai</span>
    @elseif($s->status == 'ditolak_staff')
        <span class="bg-red-100 text-red-700 px-2 py-1 rounded text-xs font-semibold">Ditolak Staff</span>
    @elseif($s->status == 'ditolak_kades')
        <span class="bg-red-100 text-red-700 px-2 py-1 rounded text-xs font-semibold">Ditolak Kades</span>
    @elseif($s->status == 'menunggu_kades')
        <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded text-xs font-semibold">Menunggu Kades</span>
    @else
        <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded text-xs font-semibold">Menunggu Staff</span>
    @endif
</td>
            </tr>   
            @endforeach
        </tbody>
    </table>
</div>
@endsection