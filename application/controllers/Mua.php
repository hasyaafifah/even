<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mua extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Mua');
    }

    public function index()
    {

        $queryAllMua = $this->M_Mua->getData();
        $DATA = array('queryAllMua' => $queryAllMua);
        $data = generate_page('Mua', 'Mua/index', 'Admin');

        $data['content'] = $this->load->view('partial/Mua/Mua',  $DATA, true);
        $this->load->view('V_Mua', $data);
    }

    

    public function halaman_tambah()
    {
        $this->load->view('partial/Mua/Mua');
    }

    public function halaman_edit($id)
    {
        $queryMuaDetail = $this->M_Mua->getDataDetail($id);
        $DATA = array('queryMuaDetail' => $queryMuaDetail);
        $data = generate_page('Mua', 'Mua/halaman_edit', 'Admin');
        $data['content'] = $this->load->view('partial/Mua/Mua_Edit',  $DATA, true);
        $this->load->view('V_Mua', $data);
    }

    public function fungsiTambah()
    {

        $nama_mua = $this->input->post('nama_mua');
        $alamat_mua = $this->input->post('alamat_mua');
        $harga = $this->input->post('harga');
        $instagram = $this->input->post('instagram');
        $whatsapp = $this->input->post('whatsapp');
        $gambar = '';

        if ($this->security->xss_clean($_FILES["gambar"]) && $_FILES['gambar']['name']) {
            $config['upload_path']          = './uploads/data_mua/';
            $config['allowed_types']        = 'jpg|jpeg|png';
            $config['max_size']             = 20000;
            $config['file_name']			= md5(time() . '_' . $_FILES["gambar"]['name']);

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar') && !empty($_FILES['gambar']['name'])) {
                $this->session->set_flashdata('msg_alert', $this->upload->display_errors());
                redirect(base_url('Mua/fungsiTambah/' . $nama_mua . '/' . $id));
            } else {
                $gambar = $this->upload->data()['file_name'];
            }
        }
        $deskripsi = $this->input->post('deskripsi');
        




        $ArrInsert = array(

            'nama_mua' => $nama_mua,
            'alamat_mua' => $alamat_mua,
            'harga' => $harga,
            'instagram' => $instagram,
            'whatsapp' => $whatsapp,
            'gambar' => $gambar,
            'deskripsi' => $deskripsi
            

        );

        $this->M_Mua->insertData($ArrInsert);
        $this->session->set_flashdata('msg_alert', 'Data Mua berhasil ditambah');
        redirect(base_url('Mua/index'));
    }


    public function fungsiEdit()
    {

        $nama_mua = $this->input->post('nama_mua');
        
        $alamat_mua = $this->input->post('alamat_mua');
        $harga = $this->input->post('harga');
        $instagram = $this->input->post('instagram');
        $whatsapp = $this->input->post('whatsapp');
        $gambar = '';

        if ($this->security->xss_clean($_FILES["gambar"]) && $_FILES['gambar']['name']) {
            $config['upload_path']          = './uploads/data_mua/';
            $config['allowed_types']        = 'jpg|jpeg|png';
            $config['max_size']             = 20000;
            $config['file_name']			= md5(time() . '_' . $_FILES["gambar"]['name']);

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar') && !empty($_FILES['gambar']['name'])) {
                $this->session->set_flashdata('msg_alert', $this->upload->display_errors());
                redirect(base_url('Mua/fungsiEdit/' . $nama_mua . '/' . $id));
            } else {
                $gambar = $this->upload->data()['file_name'];
            }
        }
        $deskripsi = $this->input->post('deskripsi');
        




        $ArrInsert = array(

            'nama_mua' => $nama_mua,
            'alamat_mua' => $alamat_mua,
            'harga' => $harga,
            'instagram' => $instagram,
            'whatsapp' => $whatsapp,
            'gambar' => $gambar,
            'deskripsi' => $deskripsi
            

        );

        $this->M_Mua->insertData($ArrInsert);
        
        $this->session->set_flashdata('msg_alert', 'Data Mua berhasil ditambah');
        redirect(base_url('Mua/index'));
    }

    public function fungsiDelete($id)
    {
        $this->M_Mua->deleteData($id);
        $this->session->set_flashdata('msg_alert', 'Data Mua berhasil dihapus');
        redirect(base_url('Mua/index'));
    }
}

	

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */