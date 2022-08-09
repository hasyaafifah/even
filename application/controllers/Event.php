<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Event extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Event');
    }

    public function index()
    {

        $queryAllEvent = $this->M_Event->getData();
        $DATA = array('queryAllEvent' => $queryAllEvent);
        $data = generate_page('Event', 'Event/index', 'Admin');

        $data['content'] = $this->load->view('partial/Event/Event',  $DATA, true);
        $this->load->view('V_Event', $data);
    }

    

    public function halaman_tambah()
    {
        $this->load->view('partial/Event/Event');
    }

    public function halaman_edit($id)
    {
        $queryEventDetail = $this->M_Event->getDataDetail($id);
        $DATA = array('queryEventDetail' => $queryEventDetail);
        $data = generate_page('Event', 'Event/halaman_edit', 'Admin');
        $data['content'] = $this->load->view('partial/Event/Event_Edit',  $DATA, true);
        $this->load->view('V_Event', $data);
    }

    public function fungsiTambah()
    {
        $judul = $this->input->post('judul');
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
							redirect(base_url('Event/fungsiTambah/' . $judul . '/' . $id));
						} else {
							$gambar = $this->upload->data()['file_name'];
						}
					}
        
        $deskripsi = $this->input->post('deskripsi');
        $link = $this->input->post('link');
       
        
        $ArrInsert = array(
            'judul' => $judul,
            'gambar	' => $gambar,
            'deskripsi' => $deskripsi,
            'link' => $link
    
        );

        $this->M_Event->insertData($ArrInsert);
        $this->session->set_flashdata('msg_alert', 'Data Event berhasil ditambah');
        redirect(base_url('Event/index'));
    }


    public function fungsiEdit()
    {

        $judul = $this->input->post('judul');
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
							redirect(base_url('Event/fungsiTambah/' . $judul . '/' . $id));
						} else {
							$gambar = $this->upload->data()['file_name'];
						}
					}
        
        $deskripsi = $this->input->post('deskripsi');
        $link = $this->input->post('link');
        




        $ArrInsert = array(
            'judul' => $judul,
            'gambar	' => $gambar,
            'deskripsi' => $deskripsi,
            'link' => $link

        );

        $this->Event->insertData($ArrInsert);
        
        $this->session->set_flashdata('msg_alert', 'Data Mua berhasil ditambah');
        redirect(base_url('Event/index'));
    }

    public function fungsiDelete($id)
    {
        $this->M_Event->deleteData($id);
        $this->session->set_flashdata('msg_alert', 'Data Gedung berhasil dihapus');
        redirect(base_url('Event/index'));
    }
}

	

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */