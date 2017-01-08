<?php
/**
 * Created by PhpStorm.
 * User: sergio
 * Date: 06/01/17
 * Time: 23:50
 */

namespace PopTroco\OAuth2;

use Illuminate\Support\Facades\Auth;

class PasswordGrantVerifier
{
    public function verify($username, $password)
    {
        $credentials = [
            'code'    => $username,
            'password' => $password,
        ];

        if (Auth::once($credentials)) {
            return Auth::user()->id;
        }

        return false;
    }
}