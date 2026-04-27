@extends('layouts.dashboard')
@section('title', 'Riwayat Persetujuan')
@section('header', 'Riwayat Persetujuan')
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
<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    <table class="w-full text-sm text-left">
        <thead class="text-gray-500 border-b bg-gray-50"><tr><th class="p-4">No. Surat</th><th class="p-4">Pemohon</th><th class="p-4">Jenis Surat</th><th class="p-4">Status</th><th class="p-4">Catatan</th></tr></thead>
        <tbody>
            @foreach($surats as $s)
            <tr class="border-b hover:bg-gray-50">
                <td class="p-4 font-mono text-xs">{{ $s->nomor_surat ?? '-' }}</td>
                <td class="p-4 font-medium">{{ $s->nama }}</td>
                <td class="p-4">{{ ucfirst(str_replace('_', ' ', $s->jenis_surat)) }}</td>
                <td class="p-4">
                    @if($s->status == 'selesai')
                        <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs font-semibold">Disetujui (TTD Digital)</span>
                    @else
                        <span class="bg-red-100 text-red-700 px-2 py-1 rounded text-xs font-semibold">Dikembalikan</span>
                    @endif
                </td>
                <td class="p-4 text-gray-500 text-xs">{{ $s->catatan_kades ?? '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection