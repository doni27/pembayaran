<?php

namespace App\Controllers;
use App\Models\PenggunaModel;
class Mahasiswa extends BaseController
{
    public function index()
    {
      
        $mahasiswa = new PenggunaModel(); 
        $data['mahasiswas'] =  $mahasiswa->lihat()->getResult();
        return view('mahasiswa/lihat', $data);
    }
    public function tambah()
    {
      
        // $builder = $this->db->table('pembayaran');
         // $datas   = $builder->get()->getResult(); 
        // $builder = $this->db->query("SELECT * FROM pembayaran");
        // $datas   = $builder->getResult(); 
         return view('mahasiswa/tambah');
    }
    public function proses_tambah()
    {
        $data = [
            'nama'        => $this->request->getVar('nama'),
            'nim'         => $this->request->getVar('nim'),
            'jurusan'     => $this->request->getVar('jurusan'),
            'password'  => password_hash($this->request->getVar('nim'), PASSWORD_DEFAULT),
            'username'     => $this->request->getVar('nim'),
            'role'        => 'mahasiswa',
            
            
        ];


        $pengguna = new PenggunaModel();
        $simpan_pengguna = $pengguna->simpan($data); 
        return redirect()->to(site_url('mahasiswa'))->with('success','Data Berhasil Disimpan');
    }

    public function ubah($id = null)
    {
        if($id !=null){
            $query = $this->db->table('pembayaran')->getWhere(['id' => $id]);
            if($query->resultID->num_rows > 0){
                $data['datas'] = $query->getRow();
                return view('pembayaran/ubah', $data);
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

        $this->db->table('pembayaran')->where(['id'=> $id])->update($data);
        return redirect()->to(site_url('pembayaran'))->with('success', 'Data berhasil diubah'); 
    }
    public function delete($id)
    {
         $this->db->table('pembayaran')->where(['id'=> $id])->delete();
        return redirect()->to(site_url('pembayaran'))->with('success', 'Data berhasil dihapus'); 
    }

    public function get_all_pembayaran()
	{
		// $data = $this->m_pembayaran->lihat_nama_pembayaran($_POST['nama_pembayaran']);

        $builder = $this->db->table('pembayaran')->where(['nama_pembayaran'=> 'SPP']);
         $data   = $builder->get()->getResult(); 
        // $data =  $pembayaran->lihat_nama_pembayaran($_POST['nama_pembayaran'])->getResult();
		echo json_encode($data);
	}
}
