<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gedung extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Gedung');
    }

    public function index()
    {

        $queryAllGedung = $this->M_Gedung->getData();
        $DATA = array('queryAllGdg' => $queryAllGedung);
        $data = generate_page('Gedung', 'Gedung/index', 'Admin');

        $data['content'] = $this->load->view('partial/Gedung/Gedung',  $DATA, true);
        $this->load->view('V_Gedung', $data);
    }

    public function halaman_tambah()
    {
        $this->load->view('partial/Gedung/Gedung');
    }

    public function halaman_edit($id)
    {
        $queryGedungDetail = $this->M_Gedung->getDataDetail($id);
        $DATA = array('queryGdgDetail' => $queryGedungDetail);
        $data = generate_page('Gedung', 'Gedung/halaman_edit', 'Admin');
        $data['content'] = $this->load->view('partial/Gedung/Gedung_Edit',  $DATA, true);
        $this->load->view('V_Gedung', $data);
    }

    public function fungsiTambah()
    {

        $nama_gedung = $this->input->post('nama_gedung');
        
        $alamat_gedung = $this->input->post('alamat_gedung');
        $luas_gedung = $this->input->post('luas_gedung');
        $tipe_vanue = $this->input->post('tipe_vanue');
        $fasilitas =  implode(',', $this->input->post( 'fasilitas' , TRUE ) );
        $harga_gedung = $this->input->post('harga_gedung');
        $dokumen = '';

        // file
        if ($this->security->xss_clean($_FILES["dokumen"]) && $_FILES['dokumen']['name']) {
            $config['upload_path']          = './uploads/dokumen/';
            $config['allowed_types']        = 'pdf|xlsx|doc|docx';
            $config['max_size']             = 20000;
            $config['file_name']            = ($_FILES["dokumen"]['name']);

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('dokumen') && !empty($_FILES['dokumen']['name'])) {
                $this->session->set_flashdata('msg_alert', $this->upload->display_errors());
                redirect(base_url('Gedung/fungsiTambah/' . $name . '/' . $id));
            } else {
                $dokumen = $this->upload->data()['file_name'];
            }
        }


        // $gambar = '';
		// 			// upload_gambar
		// 			if ($this->security->xss_clean($_FILES["gambar"]) && $_FILES['gambar']['name']) {
		// 				$config['upload_path']          = './uploads/gedung/';
		// 				$config['allowed_types']        = 'jpg|jpeg|png';
		// 				$config['max_size']             = 20000;
		// 				$config['file_name']			= md5(time() . '_' . $_FILES["gambar"]['name']);

		// 				$this->load->library('upload', $config);

		// 				if (!$this->upload->do_upload('gambar') && !empty($_FILES['gambar']['name'])) {
		// 					$this->session->set_flashdata('msg_alert', $this->upload->display_errors());
		// 					redirect(base_url('Gedung/fungsiTambah/' . $nama_gedung . '/' . $id));
		// 				} else {
		// 					$gambar = $this->upload->data()['file_name'];
		// 				}
		// 			}
            




        $ArrInsert = array(

            'nama_gedung' => $nama_gedung,
            'alamat_gedung' => $alamat_gedung,
            'luas_gedung' => $luas_gedung,
            'tipe_vanue' => $tipe_vanue,
            'fasilitas' => $fasilitas,
            'harga_gedung' => $harga_gedung,
            'dokumen' => $dokumen
            // 'gambar' => $gambar
            

        );

        $this->M_Gedung->insertData($ArrInsert);
        $this->fasilitas = implode(',',$post["fasilitas"]);
        $this->session->set_flashdata('msg_alert', 'Data Gedung berhasil ditambah');
        redirect(base_url('Gedung/index'));
    }


    public function fungsiEdit()
    {

        $id = $this->input->post('id');
        $nama_gedung = $this->input->post('nama_gedung');
        
        $alamat_gedung = $this->input->post('alamat_gedung');
        $luas_gedung = $this->input->post('luas_gedung');
        $tipe_vanue = $this->input->post('tipe_vanue');
        $fasilitas =  implode(',', $this->input->post( 'fasilitas' , TRUE ) );
        $harga_gedung = $this->input->post('harga_gedung');

        $dokumen = '';

        // file
        if ($this->security->xss_clean($_FILES["dokumen"]) && $_FILES['dokumen']['name']) {
            $config['upload_path']          = './uploads/dokumen/';
            $config['allowed_types']        = 'pdf|xlsx|doc|docx';
            $config['max_size']             = 20000;
            $config['file_name']            = ($_FILES["dokumen"]['name']);

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('dokumen') && !empty($_FILES['dokumen']['name'])) {
                $this->session->set_flashdata('msg_alert', $this->upload->display_errors());
                redirect(base_url('Gedung/fungsiTambah/' . $nama_gedung . '/' . $id));
            } else {
                $dokumen = $this->upload->data()['file_name'];
            }
        }


        // $upload_gambar = '';
		// 			// upload_gambar
		// 			if ($this->security->xss_clean($_FILES["upload_gambar"]) && $_FILES['upload_gambar']['name']) {
		// 				$config['upload_path']          = './uploads/gedung/';
		// 				$config['allowed_types']        = 'jpg|jpeg|png';
		// 				$config['max_size']             = 50000;
		// 				$config['file_name']			= md5(time() . '_' . $_FILES["upload_gambar"]['name']);

		// 				$this->load->library('upload', $config);

		// 				if (!$this->upload->do_upload('upload_gambar') && !empty($_FILES['upload_gambar']['name'])) {
		// 					$this->session->set_flashdata('msg_alert', $this->upload->display_errors());
		// 					redirect(base_url('data_master/edit/' . $name . '/' . $id));
		// 				} else {
		// 					$upload_gambar = $this->upload->data()['file_name'];
		// 				}
		// 			}





        $ArrUpdate = array(
            'nama_gedung' => $nama_gedung,
            'alamat_gedung' => $alamat_gedung,
            'luas_gedung' => $luas_gedung,
            'tipe_vanue' => $tipe_vanue,
            'fasilitas' => $fasilitas,
            'harga_gedung' => $harga_gedung,
            'dokumen' => $dokumen
            // 'upload_gambar' => $upload_gambar
        );

        $this->M_Gedung->updateData($id, $ArrUpdate);
        $this->fasilitas = implode(',',$post["fasilitas"]);
        $this->session->set_flashdata('msg_alert', 'Data Gedung berhasil diubah');
        redirect(base_url('Gedung/index'));
    }

    public function fungsiDelete($id)
    {
        $this->M_Gedung->deleteData($id);
        $this->session->set_flashdata('msg_alert', 'Data Gedung berhasil dihapus');
        redirect(base_url('Gedung/index'));
    }
}

	

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */