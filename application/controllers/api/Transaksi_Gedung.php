<?php
defined('BASEPATH') or exit('No direct script access allowed');

require 'vendor/autoload.php';

use chriskacerguis\RestServer\RestController;

class Transaksi_Gedung extends RestController
{

    public function index_get($id = 0)
    {
        $check_data = $this->db->get_where('tb_bookinggedung', ['id' => $id])->row_array();

        if ($id) {
            if ($check_data) {
                $data = $this->db->get_where('tb_bookinggedung', ['id' => $id])->row_array();

                $this->response($data, RestController::HTTP_OK);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'Data tidak ditemukan'
                ], 404);
            }
        } else {
            $data = $this->db->get('tb_bookinggedung')->result();

            $this->response($data, RestController::HTTP_OK);
        }
    }

    public function index_post()
    {
        $data = array(

            'nama' => $this->post('nama'),
            'email' => $this->post('email'),
            'tanggal' => $this->post('tanggal'),
            'no_hp' => $this->post('no_hp'),
            'keperluan' => $this->post('keperluan'),
            'harga' => $this->post('harga'),

        );
        $insert = $this->db->insert('tb_bookinggedung', $data);

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
