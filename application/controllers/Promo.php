<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Promo extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Promo');
    }

    public function index()
    {

        $queryAllPromo = $this->M_Promo->getData();
        $DATA = array('queryAllPromo' => $queryAllPromo);
        $data = generate_page('Promo', 'Promo/index', 'Admin');

        $data['content'] = $this->load->view('partial/Promo/Promo',  $DATA, true);
        $this->load->view('V_Promo', $data);
    }

    

    public function halaman_tambah()
    {
        $this->load->view('partial/Promo/Promo');
    }

    public function halaman_edit($id)
    {
        $queryPromoDetail = $this->M_Promo->getDataDetail($id);
        $DATA = array('queryPromoDetail' => $queryPromoDetail);
        $data = generate_page('Promo', 'Promo/halaman_edit', 'Admin');
        $data['content'] = $this->load->view('partial/Promo/Promo_Edit',  $DATA, true);
        $this->load->view('V_Promo', $data);
    }

    public function fungsiTambah()
    {
        $gambar = '';
					// upload_gambar
					if ($this->security->xss_clean($_FILES["gambar"]) && $_FILES['gambar']['name']) {
						$config['upload_path']          = './uploads/event/';
						$config['allowed_types']        = 'jpg|jpeg|png';
						$config['max_size']             = 20000;
						$config['file_name']			= md5(time() . '_' . $_FILES["gambar"]['name']);

						$this->load->library('upload', $config);

						if (!$this->upload->do_upload('gambar') && !empty($_FILES['gambar']['name'])) {
							$this->session->set_flashdata('msg_alert', $this->upload->display_errors());
							redirect(base_url('Event/fungsiTambah/' . $gambar . '/' . $id));
						} else {
							$gambar = $this->upload->data()['file_name'];
						}
					}
    
       
        
        $ArrInsert = array(
            
            'gambar	' => $gambar,
            
    
        );

        $this->M_Promo->insertData($ArrInsert);
        $this->session->set_flashdata('msg_alert', 'Data Promo berhasil ditambah');
        redirect(base_url('Promo/index'));
    }


    public function fungsiEdit()
    {

        
        $gambar = '';
					// upload_gambar
					if ($this->security->xss_clean($_FILES["gambar"]) && $_FILES['gambar']['name']) {
						$config['upload_path']          = './uploads/gedung/';
						$config['allowed_types']        = 'jpg|jpeg|png';
						$config['max_size']             = 20000;
						$config['file_name']			= md5(time() . '_' . $_FILES["gambar"]['name']);

						$this->load->library('upload', $config);

						if (!$this->upload->do_upload('gambar') && !empty($_FILES['gambar']['name'])) {
							$this->session->set_flashdata('msg_alert', $this->upload->display_errors());
							redirect(base_url('Event/fungsiTambah/' . $gambar . '/' . $id));
						} else {
							$gambar = $this->upload->data()['file_name'];
						}
					}


        $ArrInsert = array(
            
            'gambar	' => $gambar,
            
        );

        $this->Promo->insertData($ArrInsert);
        
        $this->session->set_flashdata('msg_alert', 'Data Promo berhasil ditambah');
        redirect(base_url('Promo/index'));
    }

    public function fungsiDelete($id)
    {
        $this->M_Promo->deleteData($id);
        $this->session->set_flashdata('msg_alert', 'Data Promo berhasil dihapus');
        redirect(base_url('Promo/index'));
    }
}

	

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */