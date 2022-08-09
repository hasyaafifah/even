<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_Gedung extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Transaksi_Gedung');
    }

    public function index()
    {

        $queryAllTgdg = $this->M_Transaksi_Gedung->getData();
        $DATA = array('queryAllTgdg' => $queryAllTgdg);
        $data = generate_page('Transaksi_Gedung', 'Transaksi_Gedung/index', 'Admin');

        $data['content'] = $this->load->view('partial/Transaksi_Gedung/Transaksi_Gedung',  $DATA, true);
        $this->load->view('V_Transaksi_Gedung', $data);
    }



    public function halaman_edit($id)
    {
        $queryTgdgDetail = $this->M_Transaksi_Gedung->getDataDetail($id);
        $DATA = array('queryTgdgDetail' => $queryTgdgDetail);
        $data = generate_page('Transaksi_Gedung', 'Transaksi_Gedung/halaman_edit', 'Admin');
        $data['content'] = $this->load->view('partial/Transaksi_Gedung/Transaksi_Gedung_Edit',  $DATA, true);
        $this->load->view('V_Transaksi_Gedung', $data);
    }




    public function fungsiEdit()
    {

        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $no_hp = $this->input->post('no_hp');
        $keperluan = $this->input->post('keperluan');
        $nama_pemesan = $this->input->post('nama_pemesan');
        $harga = $this->input->post('harga');
        $tanggal = $this->input->post('tanggal');
        $gambar = '';

        // upload_gambar
					if ($this->security->xss_clean($_FILES["gambar"]) && $_FILES['gambar']['name']) {
						$config['upload_path']          = './uploads/transaksi_gedung/';
						$config['allowed_types']        = 'jpg|jpeg|png';
						$config['max_size']             = 20000;
						$config['file_name']			= md5(time() . '_' . $_FILES["gambar"]['name']);

						$this->load->library('upload', $config);

						if (!$this->upload->do_upload('gambar') && !empty($_FILES['gambar']['name'])) {
							$this->session->set_flashdata('msg_alert', $this->upload->display_errors());
							redirect(base_url('Transaksi_Gedung/fungsiTambah/' . $tanggal . '/' . $id));
						} else {
							$gambar = $this->upload->data()['file_name'];
						}
					}




        $ArrInsert = array(

            'nama' => $nama,
            'email' => $email,
            'no_hp' => $no_hp,
            'keperluan' => $keperluan,
            'nama_pemesan' => $nama_pemesan,
            'harga' => $harga,
            'tanggal' => $tanggal,
            'gambar' => $gambar
            
            

        );

        $this->M_Transaksi_Gedung->insertData($ArrInsert);
        
        $this->session->set_flashdata('msg_alert', 'Data Transaksi Gedung berhasil ditambah');
        redirect(base_url('Transaksi_Gedung/index'));
    }

   
}

	

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */