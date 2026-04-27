@extends('layouts.public')
@section('content')

<div class="bg-gray-50 min-h-screen pt-28 pb-24">
    <div class="max-w-6xl mx-auto px-4">
        <!-- Header -->
        <div class="text-center mb-16">
            <span class="text-green-600 font-semibold text-sm uppercase tracking-widest">Profil Desa</span>
            <h2 class="text-4xl font-extrabold text-gray-800 mt-2">Informasi Desa Mekarrahayu</h2>
        </div>

        <!-- Grid Utama: Sejarah & Pemerintahan -->
        <div class="grid lg:grid-cols-3 gap-8 mb-16">
            
            <!-- Sejarah (Lebar) -->
            <div class="lg:col-span-2 bg-white rounded-2xl p-8 shadow-sm border border-gray-100">
                <h3 class="text-2xl font-bold text-gray-800 mb-6 flex items-center gap-2">
                    <i class="fas fa-landmark text-green-600"></i> Sejarah Desa
                </h3>
                <div class="space-y-4 text-gray-600 text-sm leading-relaxed max-h-[400px] overflow-y-auto pr-4">
                    <p>Pada awalnya Desa Mekarrahayu merupakan bagian dari wilayah Desa Rahayu Kecamatan Margaasih Kabupaten Bandung. Akan tetapi mengingat luas dan letak geografis saat itu, dirasakan perlu untuk diadakan pemekaran.</p>
                    <p>Maka pada tanggal <strong>13 Oktober 1982</strong>, Desa Rahayu dipecah menjadi Desa Rahayu dan <strong>Desa Mekarrahayu</strong>, dengan luas wilayah +299,644 Ha.</p>
                    <p>Batas Wilayah: Utara (Desa Rahayu), Timur (Desa Margahayu Selatan), Selatan (Desa Pameuntasan/Sungai Citarum), Barat (Desa Cigondewah Hilir/Nanjung).</p>
                    <p>Sejak diresmikan, Desa Mekarrahayu telah mengalami beberapa kali pergantian Kepala Desa, diantaranya M. Solih, Koko Rachman, A. Sudradjat RC, H. Nandang, Herry Heryadi, dan sekarang dipimpin oleh <strong>H. Iip Saripuloh, S.Sos</strong>.</p>
                </div>
            </div>

            <!-- Struktur Pemerintahan (Sempit) -->
            <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100">
                <h3 class="text-2xl font-bold text-gray-800 mb-6 flex items-center gap-2">
                    <i class="fas fa-users text-blue-600"></i> Struktur Pemerintahan
                </h3>
                <div class="space-y-4">
                    <div class="flex items-center gap-4 p-3 bg-gray-50 rounded-xl hover:bg-green-50 transition">
                        <div class="w-12 h-12 bg-green-100 text-green-600 rounded-full flex items-center justify-center shadow-sm">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400 uppercase">Kepala Desa</p>
                            <p class="font-bold text-gray-800 text-sm">H. Iip Saripuloh, S.Sos</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4 p-3 bg-gray-50 rounded-xl hover:bg-blue-50 transition">
                        <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center shadow-sm">
                            <i class="fas fa-user"></i>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400 uppercase">Sekretaris</p>
                            <p class="font-bold text-gray-800 text-sm">Maharani</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4 p-3 bg-gray-50 rounded-xl hover:bg-yellow-50 transition">
                        <div class="w-12 h-12 bg-yellow-100 text-yellow-600 rounded-full flex items-center justify-center shadow-sm">
                            <i class="fas fa-user-edit"></i>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400 uppercase">Staff Administrasi</p>
                            <p class="font-bold text-gray-800 text-sm">Ahmad Busyaeri</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Data Geografis (Modern Cards) -->
        <div class="grid md:grid-cols-3 gap-6">
            <div class="bg-gradient-to-br from-green-600 to-green-700 text-white rounded-2xl p-6 shadow-lg">
                <div class="flex items-center gap-3 mb-4">
                    <i class="fas fa-map-pin text-yellow-300 text-xl"></i>
                    <h4 class="font-bold">Kecamatan</h4>
                </div>
                <p class="text-3xl font-extrabold">Margaasih</p>
            </div>
            <div class="bg-gradient-to-br from-blue-600 to-blue-700 text-white rounded-2xl p-6 shadow-lg">
                <div class="flex items-center gap-3 mb-4">
                    <i class="fas fa-city text-yellow-300 text-xl"></i>
                    <h4 class="font-bold">Kabupaten</h4>
                </div>
                <p class="text-3xl font-extrabold">Bandung</p>
            </div>
            <div class="bg-gradient-to-br from-purple-600 to-purple-700 text-white rounded-2xl p-6 shadow-lg">
                <div class="flex items-center gap-3 mb-4">
                    <i class="fas fa-mail-bulk text-yellow-300 text-xl"></i>
                    <h4 class="font-bold">Kode Pos</h4>
                </div>
                <p class="text-3xl font-extrabold">40218</p>
            </div>
        </div>

    </div>
</div>

@endsection