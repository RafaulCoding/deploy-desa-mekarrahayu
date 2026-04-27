@extends('layouts.dashboard')
@section('title', 'Surat Diproses')
@section('header', 'Surat Menunggu Persetujuan Kades')
@section('content')
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
<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    <table class="w-full text-sm text-left">
        <thead class="text-gray-500 border-b bg-gray-50"><tr><th class="p-4">Pemohon</th><th class="p-4">Jenis Surat</th><th class="p-4">No. Surat</th><th class="p-4">Catatan Staff</th><th class="p-4">Status</th></tr></thead>
        <tbody>
            @foreach($surats as $s)
            <tr class="border-b hover:bg-gray-50">
                <td class="p-4 font-medium">{{ $s->nama }}</td>
                <td class="p-4">{{ ucfirst(str_replace('_', ' ', $s->jenis_surat)) }}</td>
                <td class="p-4 text-blue-600 font-mono text-xs">{{ $s->nomor_surat }}</td>
                <td class="p-4 text-gray-500">{{ $s->catatan_staff ?? '-' }}</td>
                <td class="p-4"><span class="bg-blue-100 text-blue-700 px-2 py-1 rounded text-xs">Menunggu Kades</span></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection