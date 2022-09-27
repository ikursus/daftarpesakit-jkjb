<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    // fn () => view('authentication.template-login')
    public function borangLogin()
    {
        return view('authentication.template-login');
    }

    public function terimaData()
    {
        return 'DATA';
    }
}
