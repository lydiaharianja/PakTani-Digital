<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {

        $auth = Auth::user();

        $data = [
            'auth' => $auth
        ];

        return view('pages.index', $data);
    }

    public function getHome()
    {
        Auth::home();
        return redirect()->route('home');
    }
}
