@extends('layouts.public')
@section('content')
<div class="min-h-[80vh] flex items-center justify-center py-12 px-4">
    <div class="max-w-md w-full bg-white rounded-xl shadow-lg p-8 border border-gray-100">
        <div class="text-center mb-8">
            <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-user-shield text-green-700 text-2xl"></i>
            </div>
            <h2 class="text-2xl font-bold text-gray-800">Masuk ke Sistem</h2>
            <p class="text-gray-500 text-sm mt-1">Silakan masuk untuk mengakses layanan</p>
        </div>
        
        @if(session('error'))
        <div class="bg-red-50 text-red-700 p-3 rounded-lg text-sm mb-4"><i class="fas fa-times-circle mr-2"></i>{{ session('error') }}</div>
        @endif

        <form action="/login" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-green-500" required>
            </div>
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" name="password" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-green-500" required>
            </div>
            <button type="submit" class="w-full bg-green-700 hover:bg-green-800 text-white font-bold py-2.5 rounded-lg transition shadow">Masuk</button>
        </form>

                <div class="mt-6 text-center text-sm text-gray-500">
            Belum punya akun? <a href="/register" class="text-green-700 font-semibold hover:underline">Daftar sebagai Warga</a>
        </div>

        <div class="mt-4 bg-blue-50 p-4 rounded-lg">
            <p class="text-xs font-bold text-blue-800 mb-2">Akun Demo:</p>
            <div class="text-xs text-blue-700 space-y-1">
                <p><strong>Warga:</strong> warga@gmail.com / warga123</p>
                <p><strong>Staff:</strong> staff@gmail.com / staff123</p>
                <p><strong>Kades:</strong> kades@gmail.com / kades123</p>
            </div>
        </div>
    </div>
</div>
@endsection