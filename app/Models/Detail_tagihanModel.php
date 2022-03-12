<?php

namespace App\Models;

use CodeIgniter\Model;

class Detail_tagihanModel extends Model
{
function __construct()
{
    $this->db = db_connect();
}

function lihat()
{
    return $this->db->table('detail_tagihan')->get(); 
}
function simpan($data){
    return $this->db->table('detail_tagihan')->insert($data);
}
function detail_tagihan($id)
    {
        return $this->db->table('detail_tagihan')->getWhere(['no_tagihan' => $id]);
    }
}
