@extends('layouts.dashboard')
@section('title', 'Review Surat')
@section('header', 'Review & Persetujuan Surat')
@section('content')
<div class="max-w-4xl mx-auto bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    
    <!-- Header Info -->
    <div class="p-6 bg-gray-50 border-b flex justify-between items-center">
        <div>
            <h2 class="font-bold text-lg text-gray-800">{{ ucfirst(str_replace('_', ' ', $surat->jenis_surat)) }}</h2>
            <p class="text-sm text-gray-500">No. Surat: <span class="font-mono font-bold text-blue-600">{{ $surat->nomor_surat }}</span> | Pemohon: {{ $surat->nama }}</p>
        </div>
    </div>

    <!-- Preview Surat (Sama seperti template cetak warga) -->
    <div class="p-8 border-b" style="font-family: 'Times New Roman', Times, serif; background: #fff;">
        <div class="text-center border-b-4 border-double border-black pb-4 mb-6">
            <p style="font-size: 12px; margin:0;">PEMERINTAH KABUPATEN BANDUNG</p>
            <h2 style="font-size: 18px; margin:4px 0; letter-spacing: 2px;">DESA MEKAR RAHAYU</h2>
            <h3 style="font-size: 13px; margin:2px 0; font-weight:normal;">KECAMATAN MARGAASIH</h3>
            <p style="font-size: 11px; margin:0;">Jl. Raya Mekar Rahayu No. 1, Kec. Margaasih, Kab. Bandung 40218</p>
        </div>

        <div class="text-center mb-6"><strong>SURAT KETERANGAN {{ strtoupper(str_replace('_', ' ', $surat->jenis_surat)) }}</strong></div>
        <div class="mb-4" style="font-size: 13px;">Nomor: {{ $surat->nomor_surat }}</div>
        
        <p style="font-size: 13px; margin-bottom: 12px;">Yang bertanda tangan di bawah ini, Kepala Desa Mekar Rahayu, menerangkan bahwa:</p>
        
        <table style="font-size: 13px; margin-left: 30px; margin-bottom: 20px; line-height: 1.6;">
            <tr><td style="width:160px; vertical-align:top;">Nama</td><td>: {{ $surat->nama }}</td></tr>
            <tr><td style="vertical-align:top;">NIK</td><td>: {{ $surat->nik }}</td></tr>
            <tr><td style="vertical-align:top;">Tempat/Tgl Lahir</td><td>: {{ $surat->tempat_tgl_lahir }}</td></tr>
            <tr><td style="vertical-align:top;">Pekerjaan</td><td>: {{ $surat->pekerjaan }}</td></tr>
            <tr><td style="vertical-align:top;">Agama</td><td>: {{ $surat->agama }}</td></tr>
            <tr><td style="vertical-align:top;">Status Kawin</td><td>: {{ $surat->status_kawin }}</td></tr>
            <tr><td style="vertical-align:top;">Alamat</td><td>: {{ $surat->alamat }}</td></tr>
        </table>
        
        <p style="font-size: 13px; margin-bottom: 10px;">Adalah benar warga Desa Mekar Rahayu. Surat keterangan ini diberikan untuk keperluan <em>{{ $surat->keperluan }}</em>.</p>
        <p style="font-size: 13px;">Demikian surat keterangan ini dibuat dengan sebenarnya untuk dipergunakan sebagaimana mestinya.</p>

        <!-- TTD DAN CAP DIGITAL PREVIEW -->
        <div style="text-align: right; margin-top: 40px; position: relative;">
            <p style="font-size: 13px;">Mekar Rahayu, {{ date('d F Y') }}</p>
            <p style="font-size: 13px; font-weight:bold;">Kepala Desa Mekar Rahayu</p>
            
            <div style="height: 80px; position: relative; margin: 5px 0;">
                <!-- TTD Digital -->
                <img src="{{ $ttd }}" style="height: 60px; margin-right: -20px; filter: drop-shadow(1px 1px 1px rgba(0,0,0,0.2));" alt="TTD Digital">
                <!-- Cap Digital -->
                <img src="{{ $cap }}" style="position: absolute; top: -20px; right: 20px; width: 100px; height: 100px; opacity: 0.8;" alt="Cap Digital">
            </div>
            
            <p style="font-size: 13px; font-weight:bold; text-decoration:underline;">H. Iip Saripullog S.Sos</p>
            <p style="font-size: 10px;">NIP. 197001011995031001</p>
        </div>
    </div>

    <!-- Form Aksi Kades -->
    <div class="p-6 bg-gray-50">
        <div class="bg-blue-50 border border-blue-200 text-blue-800 p-4 rounded-lg mb-4 text-sm">
            <i class="fas fa-info-circle mr-2"></i><strong>Perhatian:</strong> Jika Anda menyetujui surat ini, TTD Digital, Cap, dan QR Code akan langsung otomatis diterapkan dan surat dikirim ke warga.
        </div>
        
        <div class="flex flex-col md:flex-row justify-end gap-4 items-end">
            <!-- Form Tolak -->
            <form action="{{ route('kades.menunggu') }}/{{ $surat->id }}/tolak" method="POST" class="flex gap-2 items-end w-full md:w-auto">
                @csrf
                <div>
                    <input type="text" name="catatan_kades" class="border rounded-lg p-2.5 text-sm w-full md:w-64 focus:ring-2 focus:ring-red-500" placeholder="Alasan penolakan..." required>
                </div>
                <button type="submit" class="px-4 py-2.5 bg-red-600 text-white rounded-lg hover:bg-red-700 text-sm font-semibold whitespace-nowrap" onclick="return confirm('Yakin menolak dan kembalikan ke staff?')"><i class="fas fa-times mr-1"></i> Tolak</button>
            </form>

            <!-- Form Setujui -->
            <form action="{{ route('kades.menunggu') }}/{{ $surat->id }}/setujui" method="POST">
                @csrf
                <button type="submit" class="w-full md:w-auto px-6 py-2.5 bg-green-700 text-white rounded-lg hover:bg-green-800 text-sm font-bold whitespace-nowrap shadow" onclick="return confirm('Setujui surat ini? TTD Digital akan langsung diterapkan.')"><i class="fas fa-stamp mr-1"></i> Setujui & Terapkan TTD Digital</button>
            </form>
        </div>
    </div>
</div>
@endsection