<?php

namespace App\Helpers;

class DigitalSign
{
    public static function generateSignature()
    {
        $w = 300; $h = 120;
        $img = imagecreatetruecolor($w, $h);
        imagesavealpha($img, true);
        $trans = imagecolorallocatealpha($img, 255, 255, 255, 127);
        imagefill($img, 0, 0, $trans);

        $color = imagecolorallocate($img, 10, 61, 31);
        imagesetthickness($img, 2);

        // Membuat pola tanda tangan manual (garis lengkung acak tapi fix)
        $points = [
            [20, 80], [40, 40], [60, 90], [80, 50], [100, 85],
            [120, 30], [140, 70], [160, 40], [180, 90], [200, 60],
            [220, 80], [240, 30], [260, 70], [280, 50]
        ];
        for ($i = 0; $i < count($points) - 1; $i++) {
            imageline($img, $points[$i][0], $points[$i][1], $points[$i+1][0], $points[$i+1][1], $color);
        }
        // Titik koma
        imagefilledellipse($img, 280, 85, 4, 4, $color);

        ob_start();
        imagepng($img);
        imagedestroy($img);
        return 'data:image/png;base64,' . base64_encode(ob_get_clean());
    }

    public static function generateStamp()
    {
        $w = 200; $h = 200;
        $img = imagecreatetruecolor($w, $h);
        imagesavealpha($img, true);
        $trans = imagecolorallocatealpha($img, 255, 255, 255, 127);
        imagefill($img, 0, 0, $trans);

        $red = imagecolorallocate($img, 200, 0, 0);
        $cx = 100; $cy = 100; $r = 85;

        // Lingkaran luar
        imageellipse($img, $cx, $cy, $r*2, $r*2, $red);
        imageellipse($img, $cx, $cy, $r*2 - 12, $r*2 - 12, $red);

        // Teks melengkung atas
        $text = "DESA MEKAR RAHAYU";
        for ($i = 0; $i < strlen($text); $i++) {
            $angle = -90 + ($i - (strlen($text)-1)/2) * 13;
            $rad = deg2rad($angle);
            $x = $cx + ($r - 18) * cos($rad);
            $y = $cy + ($r - 18) * sin($rad);
            imagestring($img, 3, $x - 3, $y - 4, $text[$i], $red);
        }

        // Teks melengkung bawah
        $textBot = "CIKANCUNG - BANDUNG";
        for ($i = 0; $i < strlen($textBot); $i++) {
            $angle = 90 + ($i - (strlen($textBot)-1)/2) * 13;
            $rad = deg2rad($angle);
            $x = $cx + ($r - 18) * cos($rad);
            $y = $cy + ($r - 18) * sin($rad);
            imagestring($img, 3, $x - 3, $y - 4, $textBot[$i], $red);
        }

        // Teks tengah
        imagestring($img, 4, $cx - 20, $cy - 5, "KADES", $red);

        ob_start();
        imagepng($img);
        imagedestroy($img);
        return 'data:image/png;base64,' . base64_encode(ob_get_clean());
    }
}
