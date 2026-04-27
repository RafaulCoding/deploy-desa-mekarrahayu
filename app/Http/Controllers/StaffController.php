<?php
namespace App\Http\Controllers;
use App\Models\Surat;
use Illuminate\Http\Request;

class StaffController extends Controller
{
        public function dashboard()
    {
        $masuk = Surat::where('status', 'menunggu_staff')->count();
        $proses = Surat::where('status', 'menunggu_kades')->count();
        $revisi = Surat::where('status', 'ditolak_kades')->count();
        
        // TAMBAHKAN BARIS INI: Mengambil 5 surat terakhir yang statusnya menunggu staff
        $surats = Surat::where('status', 'menunggu_staff')->latest()->take(5)->get();

        // TAMBAHKAN $surats DI DALAM COMPACT
        return view('staff.dashboard', compact('masuk', 'proses', 'revisi', 'surats'));
    }

    public function suratMasuk()
    {
        $surats = Surat::where('status', 'menunggu_staff')->latest()->get();
        return view('staff.masuk', compact('surats'));
    }

    public function prosesSurat(Request $request, $id)
    {
        $surat = Surat::findOrFail($id);
        $action = $request->input('action');

        if ($action == 'tolak') {
            $request->validate(['catatan_staff' => 'required']);
            $surat->update([
                'status' => 'ditolak_staff',
                'catatan_staff' => $request->catatan_staff
            ]);
            return back()->with('error', 'Surat ditolak.');
        } else {
            // Buat Nomor Surat Otomatis
            $kode = strtoupper(substr($surat->jenis_surat, 0, 3));
            $num = Surat::where('status', '!=', 'menunggu_staff')->count() + 1;
            $bulan = ['I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII'];
            $now = now();
            $nomor = sprintf("%03d/%s/%s/%d", $num, $kode, $bulan[$now->month-1], $now->year);

            $surat->update([
                'status' => 'menunggu_kades',
                'nomor_surat' => $nomor,
                'catatan_staff' => $request->catatan_staff
            ]);
            return back()->with('success', 'Surat divalidasi & dikirim ke Kades.');
        }
    }

    public function suratDiproses()
    {
        $surats = Surat::where('status', 'menunggu_kades')->latest()->get();
        return view('staff.diproses', compact('surats'));
    }

    public function suratRevisi()
    {
        $surats = Surat::where('status', 'ditolak_kades')->latest()->get();
        return view('staff.revisi', compact('surats'));
    }

    public function kirimRevisi(Request $request, $id)
    {
        $surat = Surat::findOrFail($id);
        $surat->update([
            'status' => 'menunggu_kades',
            'catatan_staff' => $request->catatan_staff,
            'catatan_kades' => null // Reset catatan kades lama
        ]);
        return back()->with('success', 'Revisi dikirim kembali ke Kades.');
    }
}