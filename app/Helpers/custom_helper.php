<?php

if (!function_exists('terbilang')) {
    function terbilang($angka)
    {
        $arr = ["", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas"];
        if ($angka < 12)
            return " " . $arr[$angka];
        elseif ($angka < 20)
            return terbilang($angka - 10) . " Belas";
        elseif ($angka < 100)
            return terbilang($angka / 10) . " Puluh" . terbilang($angka % 10);
        elseif ($angka < 200)
            return "Seratus" . terbilang($angka - 100);
        elseif ($angka < 1000)
            return terbilang($angka / 100) . " Ratus" . terbilang($angka % 100);
        elseif ($angka < 2000)
            return "Seribu" . terbilang($angka - 1000);
        elseif ($angka < 1000000)
            return terbilang($angka / 1000) . " Ribu" . terbilang($angka % 1000);
        elseif ($angka < 1000000000)
            return terbilang($angka / 1000000) . " Juta" . terbilang($angka % 1000000);
    }
}

if (!function_exists('konversi')) {
    function konversi($x)
    {

        $x = abs($x);
        $angka = ["", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas"];
        $temp = "";

        if ($x < 12) {
            $temp = " " . $angka[$x];
        } else if ($x < 20) {
            $temp = konversi($x - 10) . " Belas";
        } else if ($x < 100) {
            $temp = konversi($x / 10) . " Puluh" . konversi($x % 10);
        } else if ($x < 200) {
            $temp = " Seratus" . konversi($x - 100);
        } else if ($x < 1000) {
            $temp = konversi($x / 100) . " Ratus" . konversi($x % 100);
        } else if ($x < 2000) {
            $temp = " Seribu" . konversi($x - 1000);
        } else if ($x < 1000000) {
            $temp = konversi($x / 1000) . " Ribu" . konversi($x % 1000);
        } else if ($x < 1000000000) {
            $temp = konversi($x / 1000000) . " Juta" . konversi($x % 1000000);
        } else if ($x < 1000000000000) {
            $temp = konversi($x / 1000000000) . " Milyar" . konversi($x % 1000000000);
        }

        return $temp;
    }
}

if (!function_exists('tkoma')) {
    function tkoma($x)
    {
        $str = stristr($x, ".");
        $ex = explode('.', (float) $x);

        if (count($ex) < 2) {
            return false;
        }


        // echo "<pre>";
        // print_r($str);
        // echo "</pre>";
        // echo "<pre>";
        // print_r($ex);
        // echo "</pre>";
        // echo "<pre>";
        // print_r($ex[1]);
        // echo "</pre>";
        // die;

        $a = abs($ex[1]);
        // if (($ex[1] / 10) >= 1) {
        //     $a = abs($ex[1]);
        // }
        $string = ["Nol", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas"];
        $temp = "";

        $a2 = $ex[1] / 10;
        $pjg = strlen($str);
        $i = 1;


        if ($a >= 1 && $a < 12) {
            $temp .= " " . $string[$a];
        } else if ($a > 12 && $a < 20) {
            $temp .= konversi($a - 10) . " Belas";
        } else if ($a > 20 && $a < 100) {
            $temp .= konversi($a / 10) . " Puluh" . konversi($a % 10);
        } else {
            if ($a2 < 1) {

                while ($i < $pjg) {
                    $char = substr($str, $i, 1);
                    $i++;
                    $temp .= " " . $string[$char];
                }
            }
        }
        return $temp;
    }
}

if (!function_exists('terbilangdesimal')) {
    function terbilangdesimal($x)
    {
        if ($x < 0) {
            $hasil = "minus " . trim(konversi($x));
        } else {
            $poin = trim(tkoma($x));
            $hasil = trim(konversi($x));
        }

        if ($poin) {
            $hasil = $hasil . " Koma " . $poin;
        } else {
            $hasil = $hasil;
        }
        return $hasil . " Rupiah";
    }
}

if (!function_exists('fullnominal')) {
    function fullnominal($nominal)
    {
        return "Rp " . number_format($nominal, 2, '.', ',') . ",-";
    }
}

if (!function_exists('nominal')) {
    function nominal($nominal)
    {
        return "Rp " . number_format($nominal, fmod((float) $nominal, 1) ? 2 : 0, '.', ',');
    }
}

if (!function_exists('parse_multi')) {
    function parse_multi($data, $data1 = null)
    {
        if ($data1) {
            $d = explode(";", $data);
            $n = explode(";", $data1);
            $x = null;
            for ($i = 0; $i < count($d); $i++) {
                if ($d[$i]) {
                    $x .= $d[$i] . "  -  " . nominal((float) $n[$i], fmod((float) $n[$i], 1) ? 2 : 0) . "\n";
                }
            }
        } else {
            $x = str_replace(';', "\n", $data);
        }
        return $x;
    }
}

if (!function_exists('parse_sumberair')) {
    function parse_sumberair($data)
    {
        $x = null;
        if (intval($data) == 1) {
            $x = 'SUMUR';
        } elseif (intval($data) == '2') {
            $x = 'SUMUR BOR';
        } else {
            $x = 'PDAM';
        }
        return $x;
    }
}
