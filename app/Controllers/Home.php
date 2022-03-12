<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        if(!session('id_user')){
            return redirect()->to(site_url('login'));
        }
        return view('home');

     
    }
}
