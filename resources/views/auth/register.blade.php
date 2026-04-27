@extends('layouts.public')
@section('content')
<div class="min-h-[80vh] flex items-center justify-center py-12 px-4">
    <div class="max-w-md w-full bg-white rounded-xl shadow-lg p-8 border border-gray-100">
        <div class="text-center mb-8">
            <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-user-plus text-green-700 text-2xl"></i>
            </div>
            <h2 class="text-2xl font-bold text-gray-800">Daftar Akun Warga</h2>
            <p class="text-gray-500 text-sm mt-1">Buat akun untuk mengajukan surat secara online</p>
        </div>
        
        @if(session('success'))
        <div class="bg-green-50 text-green-700 p-3 rounded-lg text-sm mb-4"><i class="fas fa-check-circle mr-2"></i>{{ session('success') }}</div>
        @endif

        <!-- TAMBAHKAN INI: Notifikasi Error Jika Validasi Gagal -->
        @if ($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-4">
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- GANTI ACTION MENJADI ROUTE YANG BENAR -->
        <form action="/register" method="POST">
            @csrf
            
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name') }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-green-500" required>
            </div>

            <!-- DITAMBAHKAN: INPUT AGAMA -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Agama</label>
                <select name="agama" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-green-500 bg-white" required>
                    <option value="" disabled selected>-- Pilih Agama --</option>
                    <option value="Islam" {{ old('agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
                    <option value="Kristen" {{ old('agama') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                    <option value="Katolik" {{ old('agama') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                    <option value="Hindu" {{ old('agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                    <option value="Buddha" {{ old('agama') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                    <option value="Konghucu" {{ old('agama') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">NIK (16 Digit)</label>
                <input type="text" name="nik" value="{{ old('nik') }}" maxlength="16" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-green-500" required>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-green-500" required>
            </div>

            <div class="mb-4">
                <!-- DIPERBAIKI: TULISAN MIN 8 KARAKTER (SESUAI CONTROLLER) -->
                <label class="block text-sm font-medium text-gray-700 mb-1">Password (Min. 8 karakter)</label>
                <input type="password" name="password" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-green-500" required>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-green-500" required>
            </div>

            <button type="submit" class="w-full bg-green-700 hover:bg-green-800 text-white font-bold py-2.5 rounded-lg transition shadow">Daftar Sekarang</button>
        </form>

        <div class="mt-6 text-center text-sm text-gray-500">
            Sudah punya akun? <a href="{{ route('login') }}" class="text-green-700 font-semibold hover:underline">Masuk di sini</a>
        </div>
    </div>
</div>
@endsection