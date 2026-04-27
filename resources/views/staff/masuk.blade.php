@extends('layouts.dashboard')

@section('sidebar')
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

@section('title', 'Surat Masuk')
@section('header', 'Validasi Surat Masuk')

@section('content')
<div class="space-y-6">
    @forelse($surats as $s)
    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
        
        <!-- Header Kartu -->
        <div class="flex justify-between items-start mb-4">
            <div>
                <h3 class="font-bold text-gray-800 text-lg">{{ ucfirst(str_replace('_', ' ', $s->jenis_surat)) }}</h3>
                <p class="text-sm text-gray-500">Oleh: <strong>{{ $s->nama }}</strong> (NIK: {{ $s->nik }}) - {{ $s->created_at->format('d M Y') }}</p>
            </div>
            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-semibold">Menunggu</span>
        </div>
        
        <!-- Detail Data Warga -->
        <div class="grid md:grid-cols-2 gap-4 text-sm bg-gray-50 p-4 rounded-lg mb-4">
            <div><span class="text-gray-500">TTL:</span> <span class="font-medium">{{ $s->tempat_tgl_lahir }}</span></div>
            <div><span class="text-gray-500">Pekerjaan:</span> <span class="font-medium">{{ $s->pekerjaan }}</span></div>
            <div><span class="text-gray-500">Agama:</span> <span class="font-medium">{{ $s->agama }}</span></div>
            <div><span class="text-gray-500">Status Kawin:</span> <span class="font-medium">{{ $s->status_kawin }}</span></div>
            <div class="md:col-span-2"><span class="text-gray-500">Alamat:</span> <span class="font-medium">{{ $s->alamat }}</span></div>
            <div class="md:col-span-2"><span class="text-gray-500">Keperluan:</span> <span class="font-medium">{{ $s->keperluan }}</span></div>
        </div>

        <!-- FILE UPLOAD KTP & KK (YANG DITAMBAHKAN) -->
        <div class="flex flex-wrap gap-4 mb-4 p-3 bg-blue-50 rounded-lg border border-blue-100">
            <div class="flex items-center gap-2 text-sm">
                <i class="fas fa-id-card text-blue-600"></i>
                <span class="font-medium text-gray-700">KTP:</span>
                @if($s->file_ktp)
                    <a href="{{ asset('uploads/syarat/'.$s->file_ktp) }}" target="_blank" class="text-blue-600 hover:underline font-semibold">Lihat File</a>
                @else
                    <span class="text-gray-400 italic">Tidak ada</span>
                @endif
            </div>
            <div class="flex items-center gap-2 text-sm">
                <i class="fas fa-house-user text-blue-600"></i>
                <span class="font-medium text-gray-700">KK:</span>
                @if($s->file_kk)
                    <a href="{{ asset('uploads/syarat/'.$s->file_kk) }}" target="_blank" class="text-blue-600 hover:underline font-semibold">Lihat File</a>
                @else
                    <span class="text-gray-400 italic">Tidak ada</span>
                @endif
            </div>
        </div>

        <!-- FORM AKSI STAFF (SUDAH DIFIX RAPI) -->
        <form id="formAksi{{ $s->id }}" action="{{ route('staff.proses', $s->id) }}" method="POST">
            @csrf
            <div class="border-t pt-4 flex flex-col md:flex-row md:items-end justify-between gap-4">
                
                <!-- Input Catatan -->
                <div class="flex-grow">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Catatan Validasi</label>
                    <input type="text" name="catatan_staff" id="catatan{{ $s->id }}" class="w-full border rounded-lg p-2.5 focus:ring-2 focus:ring-green-500 focus:border-green-500 text-sm" placeholder="Isi alasan jika menolak...">
                </div>

                <!-- Tombol Aksi -->
                <div class="flex gap-3">
                    <button type="button" onclick="tolakSurat({{ $s->id }})" class="px-5 py-2.5 bg-red-600 text-white rounded-lg hover:bg-red-700 text-sm font-semibold shadow-sm">
                        <i class="fas fa-times mr-1"></i> Tolak
                    </button>
                    <button type="button" onclick="terimaSurat({{ $s->id }})" class="px-5 py-2.5 bg-green-700 text-white rounded-lg hover:bg-green-800 text-sm font-semibold shadow-sm">
                        <i class="fas fa-check mr-1"></i> Validasi & Kirim
                    </button>
                </div>
            </div>
        </form>

    </div>
    @empty
    <div class="bg-white rounded-xl p-12 text-center text-gray-400 shadow-sm">
        <i class="fas fa-inbox text-4xl mb-3"></i>
        <p class="text-lg">Tidak ada surat yang menunggu validasi.</p>
    </div>
    @endforelse
</div>

<!-- SCRIPT SWEETALERT UNTUK AKSI -->
<script>
function terimaSurat(id) {
    Swal.fire({
        title: 'Validasi Surat?',
        text: "Surat akan divalidasi dan dikirim langsung ke Kades.",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#15803d',
        cancelButtonColor: '#6b7280',
        confirmButtonText: 'Ya, Kirim ke Kades'
    }).then((result) => {
        if (result.isConfirmed) {
            // Buat input hidden untuk action
            var form = document.getElementById('formAksi' + id);
            var inputAction = document.createElement('input');
            inputAction.type = 'hidden';
            inputAction.name = 'action';
            inputAction.value = 'terima';
            form.appendChild(inputAction);
            form.submit();
        }
    });
}

function tolakSurat(id) {
    const catatan = document.getElementById('catatan' + id).value;
    if(!catatan) {
        Swal.fire('Perhatian', 'Anda wajib mengisi catatan alasan penolakan terlebih dahulu.', 'warning');
        return;
    }

    Swal.fire({
        title: 'Yakin ingin menolak?',
        text: "Warga akan diberitahu bahwa suratnya ditolak.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#dc2626',
        cancelButtonColor: '#6b7280',
        confirmButtonText: 'Ya, Tolak'
    }).then((result) => {
        if (result.isConfirmed) {
            var form = document.getElementById('formAksi' + id);
            var inputAction = document.createElement('input');
            inputAction.type = 'hidden';
            inputAction.name = 'action';
            inputAction.value = 'tolak';
            form.appendChild(inputAction);
            form.submit();
        }
    });
}
</script>
@endsection