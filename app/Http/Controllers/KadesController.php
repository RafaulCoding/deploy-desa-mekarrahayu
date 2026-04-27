<?php
namespace App\Http\Controllers;
use App\Models\Surat;
use Illuminate\Http\Request;
use App\Helpers\DigitalSign;

class KadesController extends Controller
{
    public function dashboard()
    {
        $menunggu = Surat::where('status', 'menunggu_kades')->count();
        $selesai = Surat::where('status', 'selesai')->count();
        $ditolak = Surat::where('status', 'ditolak_kades')->count();
        return view('kades.dashboard', compact('menunggu', 'selesai', 'ditolak'));
    }

    public function menungguPersetujuan()
    {
        $surats = Surat::where('status', 'menunggu_kades')->latest()->get();
        return view('kades.menunggu', compact('surats'));
    }

    public function reviewSurat($id)
    {
        $surat = Surat::where('status', 'menunggu_kades')->findOrFail($id);
        // Generate preview untuk dilihat Kades (sebelum disetujui)
        $ttd = DigitalSign::generateSignature();
        $cap = DigitalSign::generateStamp();
        return view('kades.review', compact('surat', 'ttd', 'cap'));
    }

    public function setujuiSurat($id)
    {
        $surat = Surat::findOrFail($id);
        $surat->update([
            'status' => 'selesai',
            'tgl_persetujuan' => now(),
            'catatan_kades' => 'Disetujui dengan TTD Digital & Cap Otomatis'
        ]);
        return redirect()->route('kades.menunggu')->with('success', 'Surat berhasil disetujui dan TTD Digital diterapkan!');
    }

    public function tolakSurat(Request $request, $id)
    {
        $request->validate(['catatan_kades' => 'required']);
        $surat = Surat::findOrFail($id);
        $surat->update([
            'status' => 'ditolak_kades',
            'catatan_kades' => $request->catatan_kades
        ]);
        return redirect()->route('kades.menunggu')->with('error', 'Surat ditolak dan dikembalikan ke Staff.');
    }

    public function riwayat()
    {
        $surats = Surat::whereIn('status', ['selesai', 'ditolak_kades'])->latest()->get();
        return view('kades.riwayat', compact('surats'));
    }
}
