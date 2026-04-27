@extends('layouts.dashboard')
@section('title', 'Menunggu Persetujuan')
@section('header', 'Surat Menunggu Persetujuan')
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
        <thead class="text-gray-500 border-b bg-gray-50"><tr><th class="p-4">No. Surat</th><th class="p-4">Pemohon</th><th class="p-4">Jenis Surat</th><th class="p-4">Catatan Staff</th><th class="p-4">Aksi</th></tr></thead>
        <tbody>
            @forelse($surats as $s)
            <tr class="border-b hover:bg-gray-50">
                <td class="p-4 font-mono text-xs font-bold text-blue-600">{{ $s->nomor_surat }}</td>
                <td class="p-4 font-medium">{{ $s->nama }}</td>
                <td class="p-4">{{ ucfirst(str_replace('_', ' ', $s->jenis_surat)) }}</td>
                <td class="p-4 text-gray-500 text-xs">{{ $s->catatan_staff ?? '-' }}</td>
                <td class="p-4">
                    <a href="/kades/menunggu/{{ $s->id }}/review" class="bg-green-700 text-white px-4 py-2 rounded-lg text-sm hover:bg-green-800 font-semibold inline-block"><i class="fas fa-file-alt mr-1"></i> Lihat & Review</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="p-12 text-center text-gray-400">
                    <i class="fas fa-check-circle text-4xl mb-3 block"></i>
                    <p>Semua surat sudah diproses.</p>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection