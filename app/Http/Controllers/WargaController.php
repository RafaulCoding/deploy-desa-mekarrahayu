<?php
namespace App\Http\Controllers;
use App\Models\Surat;
use Illuminate\Http\Request;
use App\Helpers\DigitalSign;

class WargaController extends Controller
{
    public function dashboard()
    {
        $menunggu = Surat::where('user_id', Auth()->id())->where('status', 'menunggu_staff')->count();
        $selesai = Surat::where('user_id', Auth()->id())->where('status', 'selesai')->count();
        $ditolak = Surat::where('user_id', Auth()->id())->where('status', 'like', 'ditolak_%')->count();
        $surats = Surat::where('user_id', Auth()->id())->latest()->take(5)->get();
        return view('warga.dashboard', compact('menunggu', 'selesai', 'ditolak', 'surats'));
    }

    public function formPengajuan()
    {
        return view('warga.pengajuan');
    }

        public function submitPengajuan(Request $request)
    {
        $request->validate([
            'jenis_surat' => 'required',
            'nik' => 'required',
            'nama' => 'required',
            'keperluan' => 'required',
            'file_ktp' => 'required|mimes:jpg,jpeg,png,pdf|max:2048', // Maksimal 2MB
            'file_kk'  => 'required|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        // PROSES UPLOAD FILE KTP
        $fileKtp = $request->file('file_ktp');
        $namaKtp = time() . '_KTP_' . $fileKtp->getClientOriginalName();
        $fileKtp->move(public_path('uploads/syarat'), $namaKtp);

        // PROSES UPLOAD FILE KK
        $fileKk = $request->file('file_kk');
        $namaKk = time() . '_KK_' . $fileKk->getClientOriginalName();
        $fileKk->move(public_path('uploads/syarat'), $namaKk);

        $nomorUrut = Surat::count() + 1; 
        $nomorSurat = sprintf("%03d/SURAT/%s/%d", $nomorUrut, date('m'), date('Y')); 

        Surat::create([
            'user_id' => auth()->id(),
            'nomor_surat' => $nomorSurat, 
            'jenis_surat' => $request->jenis_surat,
            'nama' => $request->nama,
            'nik' => $request->nik,
            'tempat_tgl_lahir' => $request->tempat_tgl_lahir,
            'pekerjaan' => $request->pekerjaan,
            'agama' => $request->agama,
            'status_kawin' => $request->status_kawin,
            'alamat' => $request->alamat,
            'keperluan' => $request->keperluan,
            'data_tambahan' => $request->data_tambahan ?? [],
            'status' => 'menunggu_staff', 
            'file_ktp' => $namaKtp, // SIMPAN NAMA FILE-NYA
            'file_kk' => $namaKk   // SIMPAN NAMA FILE-NYA
        ]);

        return redirect()->route('warga.riwayat')->with('success', 'Pengajuan surat berhasil dikirim!');
    }

    public function riwayat()
    {
        $surats = Surat::where('user_id', auth()->id())->latest()->get();
        return view('warga.riwayat', compact('surats'));
    }

        public function cetakSurat($id)
    {
        $surat = Surat::where('id', $id)->where('user_id', Auth()->id())->where('status', 'selesai')->firstOrFail();

        // CARA AMAN TANPA PACKAGE: Menggunakan API QR Server (100% tanpa error extension PHP)
        $teksQr = 'Surat Sah - Desa Mekarrahayu - No: ' . $surat->nomor_surat;
        $qrImageUrl = 'https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=' . urlencode($teksQr);

        $ttd = DigitalSign::generateSignature();
        $cap = DigitalSign::generateStamp();

        // KIRIM $qrImageUrl BUKAN $qrBase64
        return view('warga.cetak', compact('surat', 'ttd', 'cap', 'qrImageUrl'));
    }
}