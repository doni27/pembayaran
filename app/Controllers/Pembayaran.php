<?php

namespace App\Controllers;

class Pembayaran extends BaseController
{
    public function index()
    {
        $builder = $this->db->query("SELECT * FROM pembayaran");
        $datas   = $builder->getResult(); 
         return view('pembayaran/lihat', compact('datas'));
    }
    public function tambah()
    {
         return view('pembayaran/tambah');
    }
    public function proses_tambah()
    {
        $data = [
            'nama_pembayaran' => $this->request->getVar('nama_pembayaran'),
            'jumlah'         => $this->request->getVar('jumlah'),
        ];


        $this->db->table('pembayaran')->insert($data);

        if($this->db->affectedRows()>0){
            return redirect()->to(site_url('pembayaran'))->with('success','Data Berhasil Disimpan');
        }
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
