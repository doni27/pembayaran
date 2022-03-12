<?php

namespace App\Models;

use CodeIgniter\Model;

class PenggunaModel extends Model
{

    function __construct()
    {
        $this->db = db_connect();
    }
    
    function lihat()
    {
        return $this->db->table('pengguna')->getWhere(['role' => 'mahasiswa']);
    }
    function lihat_semua()
    {
        return $this->db->table('pengguna')->getWhere(['role' => 'mahasiswa']);
    }
    function simpan($data){
        return $this->db->table('pengguna')->insert($data);
    }
}
