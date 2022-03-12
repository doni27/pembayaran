<?php

namespace App\Models;

use CodeIgniter\Model;

class PembayaranModel extends Model
{

    function __construct()
    {
        $this->db = db_connect();
    }
    
    function lihat()
    {
        return $this->db->table('pembayaran')->get();
    }
    function lihat_nama_pembayaran($nama_pembayaran)
    {
        return $this->db->table('pembayaran')->getWhere(['nama_pembayaran' => $nama_pembayaran]);
    }

}
