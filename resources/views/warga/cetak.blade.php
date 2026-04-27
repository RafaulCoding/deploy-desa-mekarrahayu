<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Cetak Surat - {{ $surat->jenis_surat }}</title>
    <style>
        /* CSS PRINTER FRIENDLY (Menghilangkan navbar dll saat di print) */
        @media print {
            body { margin: 0; padding: 0; }
            .no-print { display: none; }
        }

        body { font-family: 'Times New Roman', Times, serif; background-color: #f0f0f0; margin: 20px; }

        /* UKURAN KERTAS A4 */
        .kertas-surat {
            width: 210mm;
            min-height: 297mm;
            margin: 0 auto;
            background: white;
            padding: 25mm 30mm;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .header { text-align: center; border-bottom: 3px double black; padding-bottom: 10px; margin-bottom: 20px; }
        .header h2 { margin: 0; font-size: 14pt; }
        .header h1 { margin: 0; font-size: 16pt; text-transform: uppercase; }
        .header h3 { margin: 0; font-size: 12pt; }

        .judul-surat { text-align: center; margin: 20px 0 30px; }
        .judul-surat h3 { text-decoration: underline; font-size: 14pt; }

        .isi-surat { font-size: 12pt; line-height: 1.6; text-align: justify; }
        .isi-surat table { margin: 10px 0 10px 30px; }
        .isi-surat td { padding: 2px 10px; vertical-align: top; }

        .ttd-area {
            float: right;
            width: 250px;
            text-align: center;
            margin-top: 50px;
        }
        .ttd-area p { margin: 0; font-size: 12pt; }

        /* POSISI TTD DAN CAP MENUMPUK */
        .gambar-ttd {
            position: relative;
            height: 120px;
            margin: 10px 0;
        }
        .gambar-ttd img.ttd-img {
            position: absolute;
            top: 0; left: 0;
            width: 180px; height: auto;
            z-index: 2; /* TTD di atas */
        }
        .gambar-ttd img.cap-img {
            position: absolute;
            top: 20px; left: 20px;
            width: 120px; height: auto;
            opacity: 0.7;
            z-index: 1; /* Cap di bawah */
            transform: rotate(-15deg);
        }

        .qr-box { margin-top: 10px; }
        .qr-box img { width: 80px; height: 80px; }
        .qr-box p { font-size: 8pt; margin: 0; color: #555; }

        .tombol-cetak {
            text-align: center;
            margin-bottom: 20px;
        }
        .btn-print {
            background: #2e7d32; color: white; padding: 10px 30px; border: none; border-radius: 5px; font-size: 16px; cursor: pointer;
        }
        .btn-print:hover { background: #256029; }
    </style>
</head>
<body>

    <!-- TOMBOL CETAK (AKAN HILANG SAAT DI PRINT) -->
    <div class="tombol-cetak no-print">
        <button class="btn-print" onclick="window.print()">
            <i class="fas fa-print"></i> Cetak / Simpan PDF
        </button>
    </div>

    <!-- ISI KERTAS SURAT -->
    <div class="kertas-surat">
        <div class="header">
            <h2>PEMERINTAH KABUPATEN BANDUNG</h2>
            <h2>KECAMATAN MARGAASIH</h2>
            <h1>DESA MEKARRAHAYU</h1>
            <h3>Jl. Raya Mekarrahayu No. 123, Kode Pos 40394</h3>
        </div>

        <div class="judul-surat">
            <h3>SURAT KETERANGAN {{ strtoupper(str_replace('_', ' ', $surat->jenis_surat)) }}</h3>
            <p>Nomor: {{ $surat->nomor_surat ?? '-' }}</p>
        </div>

        <div class="isi-surat">
            <p>Yang bertanda tangan di bawah ini, Kepala Desa Mekarrahayu, Kecamatan Margaasih, Kabupaten Bandung, dengan ini menerangkan bahwa:</p>

            <table>
                <tr><td width="150">Nama</td><td>: {{ $surat->nama }}</td></tr>
                <tr><td>NIK</td><td>: {{ $surat->nik }}</td></tr>
                <tr><td>Tmp/Tgl Lahir</td><td>: {{ $surat->tempat_tgl_lahir }}</td></tr>
                <tr><td>Pekerjaan</td><td>: {{ $surat->pekerjaan }}</td></tr>
                <tr><td>Agama</td><td>: {{ $surat->agama }}</td></tr>
                <tr><td>Status Kawin</td><td>: {{ $surat->status_kawin }}</td></tr>
                <tr><td>Alamat</td><td>: {{ $surat->alamat }}</td></tr>
                <tr><td>Keperluan</td><td>: {{ $surat->keperluan }}</td></tr>
            </table>

            <p>Adalah benar warga kami yang berdomisili di Desa Mekarrahayu. Demikian surat keterangan ini dibuat untuk dapat dipergunakan sebagaimana mestinya.</p>
        </div>

        <!-- TTD, CAP, DAN QR CODE -->
        <div class="ttd-area">
            <div class="gambar-ttd">
            </div>

            <p style="font-weight: bold; text-decoration: underline;">( KEPALA DESA )</p>

            <div class="qr-box">
                <!-- QR CODE OTOMATIS -->
                <img src="{{ $qrImageUrl }}" alt="QR Code" style="width: 120px; height: 120px;">
                <p>*Tanda Tangan & Cap Digital Valid</p>
            </div>
        </div>
    </div>

</body>
</html>
