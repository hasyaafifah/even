<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_Mua extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Transaksi_Mua');
    }

    public function index()
    {

        $queryAllTmua = $this->M_Transaksi_Mua->getData();
        $DATA = array('queryAllTmua' => $queryAllTmua);
        $data = generate_page('Transaksi_Mua', 'Transaksi_Mua/index', 'Admin');

        $data['content'] = $this->load->view('partial/Transaksi_Mua/Transaksi_Mua',  $DATA, true);
        $this->load->view('V_Transaksi_Mua', $data);
    }



    public function halaman_edit($id)
    {
        $queryTmuaDetail = $this->M_Transaksi_Mua->getDataDetail($id);
        $DATA = array('queryTmuaDetail' => $queryTmuaDetail);
        $data = generate_page('Transaksi_Mua', 'Transaksi_Mua/halaman_edit', 'Admin');
        $data['content'] = $this->load->view('partial/Transaksi_Mua/Transaksi_Mua_Edit',  $DATA, true);
        $this->load->view('V_Transaksi_Mua', $data);
    }




    public function fungsiEdit()
    {

        $nama = $this->input->post('nama');
        $harga = $this->input->post('harga');
        $status = $this->input->post('status');
        $jumlah_pax = $this->input->post('jumlah_pax');
        $timestamp = $this->input->post('timestamp');
        $alamat = $this->input->post('alamat');
        $nama_pemesan = $this->input->post('nama_pemesan');
        $jam = $this->input->post('jam');
        $no_hp = $this->input->post('no_hp');
        $gambar = '';

        // upload_gambar
					if ($this->security->xss_clean($_FILES["gambar"]) && $_FILES['gambar']['name']) {
						$config['upload_path']          = './uploads/transaksi_mua/';
						$config['allowed_types']        = 'jpg|jpeg|png';
						$config['max_size']             = 20000;
						$config['file_name']			= md5(time() . '_' . $_FILES["gambar"]['name']);

						$this->load->library('upload', $config);

						if (!$this->upload->do_upload('gambar') && !empty($_FILES['gambar']['name'])) {
							$this->session->set_flashdata('msg_alert', $this->upload->display_errors());
							redirect(base_url('Event/fungsiTambah/' . $nama . '/' . $id));
						} else {
							$gambar = $this->upload->data()['file_name'];
						}
					}




        $ArrInsert = array(

            'nama' => $nama,
            'harga' => $harga,
            'status' => $status,
            'jumlah_pax' => $jumlah_pax,
            'timestamp' => $timestamp,
            'alamat' => $alamat,
            'nama_pemesan' => $nama_pemesan,
            'jam' => $jam,
            'no_hp' => $no_hp,
            'gambar' => $gambar
            
            

        );

        $this->M_Transaksi_Mua->insertData($ArrInsert);
        
        $this->session->set_flashdata('msg_alert', 'Data Transaksi Mua berhasil ditambah');
        redirect(base_url('Transaksi_Mua/index'));
    }

   
}

	

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */