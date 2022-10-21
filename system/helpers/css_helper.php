<?php
    function css_1($panjang_karakter)
    {
        $karakter = 'abcdef123456';
        $string   = '';
        for ($i = 0; $i < $panjang_karakter; $i++) {
            $pos = rand(0, strlen($karakter) - 1);
            $string .= $karakter[$pos];
        }

        return $string;
    }
    function css_2($panjang_karakter)
    {
        $karakter = '654321fedcba';
        $string   = '';
        for ($i = 0; $i < $panjang_karakter; $i++) {
            $pos = rand(0, strlen($karakter) - 1);
            $string .= $karakter[$pos];
        }

        return $string;
    }
