<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Index_Mua extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Mua');
    }

    

    public function index_Mua()
    {

        $queryAllMua = $this->M_Mua->getData();
        $DATA = array('queryAllMua' => $queryAllMua);
        $data = generate_page('Index_Mua', 'Mua/Index_Mua', 'Vendor');

        $data['content'] = $this->load->view('partial/Mua/Index_Mua',  $DATA, true);
        $this->load->view('V_Index_Mua', $data);
    }

    public function halaman_tambah()
    {
        $this->load->view('partial/Mua/Index_Mua');
    }

    public function halaman_edit($id)
    {
        $queryMuaDetail = $this->M_Mua->getDataDetail($id);
        $DATA = array('queryMuaDetail' => $queryMuaDetail);
        $data = generate_page('Index_Mua', 'Mua/halaman_edit', 'Vendor');
        $data['content'] = $this->load->view('partial/Mua/Index_Mua_Edit',  $DATA, true);
        $this->load->view('V_Index_Mua', $data);
    }

    public function fungsiTambah()
    {

        $nama_mua = $this->input->post('nama_mua');
        
        $alamat_mua = $this->input->post('alamat_mua');
        $harga = $this->input->post('harga');
        $instagram = $this->input->post('instagram');
        $whatsapp = $this->input->post('whatsapp');
        $dokumen = '';

        if ($this->security->xss_clean($_FILES["dokumen"]) && $_FILES['dokumen']['name']) {
            $config['upload_path']          = './uploads/dokumen/';
            $config['allowed_types']        = 'pdf|xlsx|doc|docx';
            $config['max_size']             = 20000;
            $config['file_name']            = ($_FILES["dokumen"]['name']);

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('dokumen') && !empty($_FILES['dokumen']['name'])) {
                $this->session->set_flashdata('msg_alert', $this->upload->display_errors());
                redirect(base_url('Index_Mua/fungsiTambah/' . $name . '/' . $id));
            } else {
                $dokumen = $this->upload->data()['file_name'];
            }
        }
        $deskripsi = $this->input->post('deskripsi');
        




        $ArrInsert = array(

            'nama_mua' => $nama_mua,
            'alamat_mua' => $alamat_mua,
            'harga' => $harga,
            'instagram' => $instagram,
            'whatsapp' => $whatsapp,
            'dokumen' => $dokumen,
            'deskripsi' => $deskripsi
            

        );

        $this->M_Mua->insertData($ArrInsert);
        $this->session->set_flashdata('msg_alert', 'Data Mua berhasil ditambah');
        redirect(base_url('Index_Mua/index'));
    }


    public function fungsiEdit()
    {

        $nama_mua = $this->input->post('nama_mua');
        
        $alamat_mua = $this->input->post('alamat_mua');
        $harga = $this->input->post('harga');
        $instagram = $this->input->post('instagram');
        $whatsapp = $this->input->post('whatsapp');
        $dokumen = '';

        if ($this->security->xss_clean($_FILES["dokumen"]) && $_FILES['dokumen']['name']) {
            $config['upload_path']          = './uploads/dokumen/';
            $config['allowed_types']        = 'pdf|xlsx|doc|docx';
            $config['max_size']             = 20000;
            $config['file_name']            = ($_FILES["dokumen"]['name']);

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('dokumen') && !empty($_FILES['dokumen']['name'])) {
                $this->session->set_flashdata('msg_alert', $this->upload->display_errors());
                redirect(base_url('Index_Mua/fungsiTambah/' . $name . '/' . $id));
            } else {
                $dokumen = $this->upload->data()['file_name'];
            }
        }
        $deskripsi = $this->input->post('deskripsi');
        




        $ArrInsert = array(

            'nama_mua' => $nama_mua,
            'alamat_mua' => $alamat_mua,
            
            'harga' => $harga,
            'instagram' => $instagram,
            'whatsapp' => $whatsapp,
            'dokumen' => $dokumen,
            'deskripsi' => $deskripsi
            

        );

        $this->M_Mua->insertData($ArrInsert);
        
        $this->session->set_flashdata('msg_alert', 'Data Mua berhasil ditambah');
        redirect(base_url('Index_Mua/index'));
    }

    public function fungsiDelete($id)
    {
        $this->M_Mua->deleteData($id);
        $this->session->set_flashdata('msg_alert', 'Data Gedung berhasil dihapus');
        redirect(base_url('Index_Mua/index'));
    }
}

	

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */