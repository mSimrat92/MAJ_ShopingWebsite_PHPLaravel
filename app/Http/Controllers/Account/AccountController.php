<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    public function login()
    {
        return view( 'account.login' );
    }

    public function postLogin(Request $request)
    {
        var_dump( $request );
        return redirect()->route( 'dashboard' );
    }

    public function register()
    {
        return view( 'account.register' );
    }

    public function postRegister(Request $request)
    {
        var_dump( $request );
        return redirect()->route( 'login' );
    }
}