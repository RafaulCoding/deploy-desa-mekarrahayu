@extends('layouts.dashboard')

@section('sidebar')
    <a href="{{ route('warga.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg text-green-200 hover:bg-green-700 hover:text-white transition"><i class="fas fa-tachometer-alt w-5 text-center"></i> Dashboard</a>
    <a href="{{ route('warga.pengajuan') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg text-white bg-green-900/50 font-medium transition"><i class="fas fa-file-signature w-5 text-center"></i> Pengajuan Surat</a>
    <a href="{{ route('warga.riwayat') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg text-green-200 hover:bg-green-700 hover:text-white transition"><i class="fas fa-folder-open w-5 text-center"></i> Riwayat Saya</a>
@endsection

@section('title', 'Form Pengajuan')
@section('header', 'Buat Pengajuan Surat')

@section('content')
<div class="max-w-4xl bg-white rounded-xl shadow-sm p-8">
    <!-- WAJIB: enctype untuk upload -->
    <form action="/warga/pengajuan" method="POST" enctype="multipart/form-data">
        @csrf
        
        <h3 class="text-lg font-bold text-gray-800 mb-4 border-b pb-2"><i class="fas fa-user mr-2 text-green-600"></i>Data Diri Pemohon</h3>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">NIK</label>
                <input type="text" name="nik" value="{{ auth()->user()->nik }}" class="w-full border rounded-lg px-4 py-2 bg-gray-100" readonly>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                <input type="text" name="nama" value="{{ auth()->user()->name }}" class="w-full border rounded-lg px-4 py-2 bg-gray-100" readonly>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Tempat, Tanggal Lahir <span class="text-red-500">*</span></label>
                <input type="text" name="tempat_tgl_lahir" class="w-full border rounded-lg px-4 py-2" placeholder="Contoh: Bandung, 12-05-2000" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Pekerjaan <span class="text-red-500">*</span></label>
                <input type="text" name="pekerjaan" class="w-full border rounded-lg px-4 py-2" placeholder="Contoh: Swasta / Pelajar" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Agama <span class="text-red-500">*</span></label>
                <select name="agama" class="w-full border rounded-lg px-4 py-2" required>
                    <option value="">-- Pilih Agama --</option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Buddha">Buddha</option>
                    <option value="Konghucu">Konghucu</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Status Perkawinan <span class="text-red-500">*</span></label>
                <select name="status_kawin" class="w-full border rounded-lg px-4 py-2" required>
                    <option value="">-- Pilih Status --</option>
                    <option value="Belum Kawin">Belum Kawin</option>
                    <option value="Kawin">Kawin</option>
                    <option value="Cerai Hidup">Cerai Hidup</option>
                    <option value="Cerai Mati">Cerai Mati</option>
                </select>
            </div>
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">Alamat Lengkap <span class="text-red-500">*</span></label>
                <textarea name="alamat" rows="2" class="w-full border rounded-lg px-4 py-2" placeholder="Masukkan alamat lengkap sesuai KTP" required></textarea>
            </div>
        </div>

        <h3 class="text-lg font-bold text-gray-800 mb-4 border-b pb-2"><i class="fas fa-file-alt mr-2 text-green-600"></i>Detail Pengajuan Surat</h3>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Surat <span class="text-red-500">*</span></label>
                <select name="jenis_surat" class="w-full border rounded-lg px-4 py-2" required>
                    <option value="">-- Pilih Jenis Surat --</option>
                    <option value="sktm">Surat Keterangan Tidak Mampu</option>
                    <option value="sku">Surat Keterangan Usaha</option>
                    <option value="skd">Surat Keterangan Domisili</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Keperluan <span class="text-red-500">*</span></label>
                <input type="text" name="keperluan" class="w-full border rounded-lg px-4 py-2" placeholder="Contoh: Untuk melamar kerja / pengajuan KIP" required>
            </div>
        </div>

        <h3 class="text-lg font-bold text-gray-800 mb-4 border-b pb-2"><i class="fas fa-upload mr-2 text-green-600"></i>Upload Persyaratan (JPG/PDF)</h3>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Scan/Foto KTP <span class="text-red-500">*</span></label>
                <input type="file" name="file_ktp" accept=".jpg,.jpeg,.png,.pdf" class="w-full border border-dashed border-gray-400 rounded-lg p-3 text-sm" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Scan/Foto Kartu Keluarga (KK) <span class="text-red-500">*</span></label>
                <input type="file" name="file_kk" accept=".jpg,.jpeg,.png,.pdf" class="w-full border border-dashed border-gray-400 rounded-lg p-3 text-sm" required>
            </div>
        </div>

        <button type="submit" class="w-full bg-green-700 hover:bg-green-800 text-white font-bold py-3 rounded-lg transition shadow-md">
            <i class="fas fa-paper-plane mr-2"></i>Kirim Pengajuan
        </button>
    </form>
</div>
@endsection