<?php
defined('BASEPATH') or exit('No direct script access allowed');

require 'vendor/autoload.php';

use chriskacerguis\RestServer\RestController;

class Dataadmin extends RestController
{

    public function index_get($id = 0)
    {
        $check_data = $this->db->get_where('tb_user', ['id' => $id])->row_array();

        if ($id) {
            if ($check_data) {
                $data = $this->db->get_where('tb_user', ['id' => $id])->row_array();

                $this->response($data, RestController::HTTP_OK);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'Data tidak ditemukan'
                ], 404);
            }
        } else {
            $data = $this->db->get('tb_user')->result();

            $this->response($data, RestController::HTTP_OK);
        }
    }

    public function index_post()
    {
        $data = array(

            'username' => $this->post('username'),
            'nama' => $this->post('nama'),
            'password' => $this->post('password'),
            'nip' => $this->post('nip'),
            'avatar' => $this->post('avatar'),
            'id_role' => $this->post('id_role'),

        );
        $insert = $this->db->insert('tb_user', $data);

        if ($insert) {
            $this->response($data, RestController::HTTP_OK);
        } else {
            $this->response(array('status' => 'failed', 502));
        }
    }

    public function index_put()
    {
        $id = $this->put('id');

        $data = array(

            'username' => $this->put('username'),
            'nama' => $this->put('nama'),
            'password' => $this->put('password'),
            'nip' => $this->put('nip'),
            'avatar' => $this->put('avatar'),
            'id_role' => $this->put('id_role'),

        );

        $this->db->where('id', $id);
        $update = $this->db->update('tb_user', $data);

        if ($update) {
            $this->response($data, RestController::HTTP_OK);
        } else {
            $this->response(array('status' => 'failed', 502));
        }
    }

    public function index_delete()
    {
        $id = $this->delete('id');
        $check_data = $this->db->get_where('tb_user', ['id' => $id])->row_array();

        if ($check_data) {
            $this->db->where('id', $id);
            $this->db->delete('tb_user');

            $this->response(array('status' => 'success'), 200);
        } else {
            $this->response(array('status' => 'data tidak ditemukan'), 404);
        }
    }
}
