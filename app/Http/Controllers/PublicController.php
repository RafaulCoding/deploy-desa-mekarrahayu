<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class PublicController extends Controller
{
        public function beranda()
    {
        // ANGKA INI BISA ANDA UBAH SESUAI DATABASE DESA
        // (Untuk sekarang saya samakan seperti di gambar Anda)
        $penduduk = 4856;
        $kk = 1243;
        $luas_wilayah = 385; // Dalam Hektar
        $fasum = 8;          // Fasilitas Umum

        return view('public.beranda', compact('penduduk', 'kk', 'luas_wilayah', 'fasum'));
    }

    public function layanan()
    {
        $jenis = ['domisili' => 'Surat Keterangan Domisili', 'sktm' => 'Surat Keterangan Tidak Mampu', 'sku' => 'Surat Keterangan Usaha', 'skck' => 'Surat Pengantar SKCK', 'lahir' => 'Surat Keterangan Lahir', 'kematian' => 'Surat Keterangan Kematian'];
        return view('public.layanan', compact('jenis'));
    }

    public function informasi()
    {
        return view('public.informasi');
    }
}