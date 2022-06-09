<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Palintang extends Controller
{
    public static function makeHash($input,$length=5){
        $hash_base64 = base64_encode(hash( 'sha256', $input, true ) );
        $hash_urlsafe = strtr( $hash_base64, '+/-', '___' );
        $hash_urlsafe = rtrim( $hash_urlsafe, '=' );
        return substr($hash_urlsafe, 0, $length );
    }
}
