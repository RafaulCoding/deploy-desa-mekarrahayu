@extends('layouts.dashboard')
@section('title', 'Revisi Kades')
@section('header', 'Revisi dari Kades')
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
<div class="space-y-6">
    @forelse($surats as $s)
    <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-red-500">
        <div class="flex justify-between items-start mb-4">
            <div>
                <h3 class="font-bold text-gray-800 text-lg">{{ ucfirst(str_replace('_', ' ', $s->jenis_surat)) }} - {{ $s->nama }}</h3>
                <p class="text-sm text-gray-500">No. Surat: {{ $s->nomor_surat }}</p>
            </div>
        </div>
        
        <!-- Alasan Ditolak Kades -->
        <div class="bg-red-50 text-red-700 p-4 rounded-lg mb-4 text-sm">
            <strong><i class="fas fa-exclamation-triangle mr-1"></i> Alasan Kades:</strong><br>
            {{ $s->catatan_kades }}
        </div>

        <!-- Form Kirim Ulang -->
        <form action="/staff/revisi/kirim/{{ $s->id }}" method="POST" class="border-t pt-4">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Catatan Revisi Staff</label>
                <input type="text" name="catatan_staff" value="{{ $s->catatan_staff }}" class="w-full border rounded-lg p-2.5 focus:ring-2 focus:ring-green-500" required>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 text-sm font-semibold"><i class="fas fa-redo mr-1"></i> Perbaiki & Kirim Ulang ke Kades</button>
            </div>
        </form>
    </div>
    @empty
    <div class="bg-white rounded-xl p-12 text-center text-gray-400 shadow-sm">
        <i class="fas fa-check-circle text-4xl mb-3"></i>
        <p>Tidak ada surat yang perlu direvisi.</p>
    </div>
    @endforelse
</div>
@endsection