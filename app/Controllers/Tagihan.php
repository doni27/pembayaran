<?php

namespace App\Controllers;
use App\Models\PenggunaModel;
use App\Models\TagihanModel;
use App\Models\PembayaranModel;
use App\Models\Detail_tagihanModel;
class Tagihan extends BaseController
{
    function __construct(){
        
    }
    public function index()
    {
         $tagihan = new TagihanModel();  
        $data['tagihan'] =  $tagihan->lihat()->getResult();

         return view('tagihan/lihat', $data);
    }
    public function tambah()
    {
        $mahasiswa = new PenggunaModel(); 
        $data['mahasiswas'] =  $mahasiswa->lihat()->getResult();
        $pembayaran = new PembayaranModel(); 
        $data['pembayaran'] =  $pembayaran->lihat()->getResult();
        return view('tagihan/tambah', $data);
    }
    public function tagihan_mahasiswa()
    {
        $tagihan = new TagihanModel();  
        $data['tagihan'] =  $tagihan->lihat_tagihan()->getResult();
        return view('tagihan/tagihan_mahasiswa', $data);
    }
    public function proses_tambah()
    {
        // $data = $this->request->getPost();
        $jumlah_barang_dibeli = count($this->request->getpost('nama_barang_hidden'));
        print_r($jumlah_barang_dibeli);
		$data_tagihan = [
			'no_tagihan' => $this->request->getpost('no_tagihan'),
			'nama_mahasiswa' => $this->request->getpost('nama_mahasiswa'),
			'semester' => $this->request->getpost('semester'),
			'total' => $this->request->getpost('total_hidden'),
            'status' => 'belum lunas',
		];
         
         $data_detail_tagihan = [];
         print_r($data_detail_tagihan);

        for($i=0; $i < $jumlah_barang_dibeli; $i++) {

            $data['no_tagihan']=$this->request->getpost('no_tagihan');
            $data['nama_tagihan']=$this->request->getpost('nama_barang_hidden')[$i];
            $data['sub_total']=$this->request->getpost('jumlah_hidden')[$i];

            // $this->multi_model->form_insert($data);
            $detailtgh = new Detail_tagihanModel();
            $simpan_detailtgh = $detailtgh->simpan($data); 
       
        }
         print_r($data_detail_tagihan);

        $this->db->table('tagihan')->insert($data_tagihan);
        if($this->db->affectedRows()>0){
            return redirect()->to(site_url('tagihan'))->with('success','Data Berhasil Disimpan');
        }
    }

    public function ubah($id = null)
    {
        if($id !=null){
            $query = $this->db->table('tagihan')->getWhere(['id' => $id]);
            if($query->resultID->num_rows > 0){
                $data['datas'] = $query->getRow();
                return view('tagihan/ubah', $data);
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

        $this->db->table('tagihan')->where(['id'=> $id])->update($data);
        return redirect()->to(site_url('tagihan'))->with('success', 'Data berhasil diubah'); 
    }
    public function lihat_detail($id)
    {
        $mahasiswa = new Detail_tagihanModel(); 
        $data['datas'] =  $mahasiswa->detail_tagihan($id)->getResult();

        // $query = $this->db->table('detail_tagihan')->getWhere(['id' => $id]);
        // $data['datas'] = $query->getRow();
            return view('tagihan/tagihan_detail', $data);
    }
    
    public function ubah_status($id)
    {
        $query = $this->db->table('tagihan')->getWhere(['id' => $id])->getRow();
        // $data = $this->request->getPost();

        $data_update = [
			'no_tagihan' => $query->no_tagihan,
			'nama_mahasiswa' =>$query->nama_mahasiswa,
			'semester' => $query->semester,
			'total' =>$query->total,
            'status' => 'lunas',
		];
        // print_r($query);

        $this->db->table('tagihan')->where(['id'=> $id])->update($data_update);
        return redirect()->to(site_url('tagihan/tagihan_mahasiswa'))->with('success', 'Data berhasil dibayar lunas'); 
    }
    
    public function delete($id)
    {
         $this->db->table('tagihan')->where(['id'=> $id])->delete();
        return redirect()->to(site_url('tagihan'))->with('success', 'Data berhasil dihapus'); 
    }

    public function get_all_pembayaran()
	{
		// $data = $this->m_pembayaran->lihat_nama_pembayaran($_POST['nama_pembayaran']);
        $pembayaran = new PembayaranModel(); 
        $data =  $pembayaran->lihat_nama_pembayaran($_POST['nama_pembayaran'])->getRowArray();
		echo json_encode($data);
	}
    public function keranjang_barang()
	{
        return view('tagihan/keranjang');
	}
}
