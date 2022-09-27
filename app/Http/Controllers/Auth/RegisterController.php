<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //fn () => view('authentication.template-register')
    public function borangRegister()
    {
        return view('authentication.template-register');
    }

    public function terimaData()
    {
        return 'Data';
    }
}
