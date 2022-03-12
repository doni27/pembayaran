<?php

namespace App\Models;

use CodeIgniter\Model;

class TagihanModel extends Model
{
function __construct()
{
    $this->db = db_connect();
}

function lihat()
{
    return $this->db->table('tagihan')->get(); 
}
function lihat_tagihan()
{
    $nama = session('nama');
    return $this->db->table('tagihan')->getWhere(['nama_mahasiswa' =>$nama]);
}
function simpan($data){
    return $this->db->table('tagihan')->insert($data);
}
}
