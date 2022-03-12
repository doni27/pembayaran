<?php

namespace App\Controllers;
use App\Models\PenggunaModel;
class Pengguna extends BaseController
{
    public function index()
    {
      
        // $builder = $this->db->table('pengguna');
         // $datas   = $builder->get()->getResult(); 
        $builder = $this->db->query("SELECT * FROM pengguna");
        $datas   = $builder->getResult(); 
         return view('pengguna/lihat', compact('datas'));
    }
    public function tambah()
    {
      
        // $builder = $this->db->table('pengguna');
         // $datas   = $builder->get()->getResult(); 
        // $builder = $this->db->query("SELECT * FROM pengguna");
        // $datas   = $builder->getResult(); 
         return view('pengguna/tambah');
    }
    public function proses_tambah()
    {
        // $data = $this->request->getPost();
        $data = [
            'nama'          => $this->request->getVar('nama'),
            'username'        => $this->request->getVar('username'),
            'password'          => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'role'        => $this->request->getVar('role'),
        ];


        $this->db->table('pengguna')->insert($data);

        if($this->db->affectedRows()>0){
            // return redirect()->to(site_url('pengguna'));
            return redirect()->to(site_url('pengguna'))->with('success','Data Berhasil Disimpan');
        }
    }

    public function ubah($id = null)
    {
        if($id !=null){
            $query = $this->db->table('pengguna')->getWhere(['id' => $id]);
            if($query->resultID->num_rows > 0){
                $data['datas'] = $query->getRow();
                return view('pengguna/ubah', $data);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        }else{
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function proses_ubah($id)
    {
        $data = $this->request->getPost();
        unset($data['_method']);

        $this->db->table('pengguna')->where(['id'=> $id])->update($data);
        return redirect()->to(site_url('pengguna'))->with('success', 'Data berhasil diubah'); 
    }
    public function delete($id)
    {
         $this->db->table('pengguna')->where(['id'=> $id])->delete();
        return redirect()->to(site_url('pengguna'))->with('success', 'Data berhasil dihapus'); 
    }

    public function get_all_pembayaran()
	{
		// $data = $this->m_pembayaran->lihat_nama_pembayaran($_POST['nama_pembayaran']);

        $builder = $this->db->table('pengguna')->where(['nama_pembayaran'=> 'SPP']);
         $data   = $builder->get()->getResult(); 
        // $data =  $pengguna->lihat_nama_pembayaran($_POST['nama_pembayaran'])->getResult();
		echo json_encode($data);
	}
}
