<?php

namespace App\Ultilities;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StringGenerator
{
    public static function str_rand(int $length = 32){ // 64 = 32
        $length = ($length < 4) ? 4 : $length;
        return bin2hex(random_bytes(($length-($length%2))/2));
    }
}