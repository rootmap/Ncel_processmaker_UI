<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /*
     * show pages
     * */
    public function index()
    {
        return view('layout.login-master');
    }


    /*
     * show pages
     * */
    public function login()
    {
        return 'success';
    }


    public function dashboard()
    {
        return view('backend.home');
    }


}
