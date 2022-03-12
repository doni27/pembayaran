<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function index()
    {
        return redirect()->to(site_url('login'));
    }

    public function login()
    {
        if(session('id_user')){
            return redirect()->to(site_url('home'));
        }
        return view('auth/login');
    }
    public function loginProcess()
    {
        $post = $this->request->getPost();
        $query =$this->db->table('pengguna')->getWhere(['username' => $post['username']]);
        $user = $query->getRow();
        if($user){
            if(password_verify($post['password'], $user->password)){
                // $params = ['id_user' => $user->id];
                // $params = ['role' => $user->role];
                //  $params = ['nama' => $user->nama];
                // $params = ['username' => $user->username];

                $params = [
                    'id_user'   =>  $user->id,
                    'role'     =>$user->role,
                    'username' => $user->username,
                    'nama'      => $user->nama,
                ];
                
                // $session->set($params);
                 session()->set($params);
                return redirect()->to(site_url('home'));
            } else{
                return redirect()->back()->with('error', 'password tidak sesuai');
            }
        }else{
            return redirect()->back()->with('error', 'username tidak ditemukan');
        }
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to(site_url('login'));
    }
}
