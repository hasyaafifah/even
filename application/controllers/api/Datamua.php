<?php
defined('BASEPATH') or exit('No direct script access allowed');

require 'vendor/autoload.php';

use chriskacerguis\RestServer\RestController;

class Datamua extends RestController
{

    public function index_get($id = 0)
    {
        $check_data = $this->db->get_where('tb_mua', ['id' => $id])->row_array();

        if ($id) {
            if ($check_data) {
                $data = $this->db->get_where('tb_mua', ['id' => $id])->row_array();

                $this->response($data, RestController::HTTP_OK);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'Data tidak ditemukan'
                ], 404);
            }
        } else {
            $data = $this->db->get('tb_mua')->result();

            $this->response($data, RestController::HTTP_OK);
        }
    }

    public function index_post()
    {
        $data = array(

        $nama_mua = $this->input->post('nama_mua'),
        
        $alamat_mua = $this->input->post('alamat_mua'),
        $harga = $this->input->post('harga'),
        $instagram = $this->input->post('instagram'),
        $whatsapp = $this->input->post('whatsapp'),
        $dokumen = ''

        );

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
        $deskripsi = $this->input->post('deskripsi');
        
        
        $insert = $this->db->insert('tb_mua', $data);

        if ($insert) {
            $this->response($data, RestController::HTTP_OK);
        } else {
            $this->response(array('status' => 'failed', 502));
        }
    }

    // public function index_put()
    // {
    //     $id = $this->put('id');

    //     $data = array(

    //         'username' => $this->put('username'),
    //         'nama' => $this->put('nama'),
    //         'password' => $this->put('password'),
    //         'nip' => $this->put('nip'),
    //         'avatar' => $this->put('avatar'),
    //         'id_role' => $this->put('id_role'),

    //     );

    //     $this->db->where('id', $id);
    //     $update = $this->db->update('tb_user', $data);

    //     if ($update) {
    //         $this->response($data, RestController::HTTP_OK);
    //     } else {
    //         $this->response(array('status' => 'failed', 502));
    //     }
    // }

    // public function index_delete()
    // {
    //     $id = $this->delete('id');
    //     $check_data = $this->db->get_where('tb_user', ['id' => $id])->row_array();

    //     if ($check_data) {
    //         $this->db->where('id', $id);
    //         $this->db->delete('tb_user');

    //         $this->response(array('status' => 'success'), 200);
    //     } else {
    //         $this->response(array('status' => 'data tidak ditemukan'), 404);
    //     }
    // }
}
