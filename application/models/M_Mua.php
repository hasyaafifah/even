<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Mua extends CI_Model
{

    function getData()
    {
        $query = $this->db->get('tb_mua');
        return $query->result();
    }

    function insertData($data)
    {
        $this->db->insert('tb_mua', $data);
        $this->session->set_flashdata('msg_alert', 'Data mua berhasil ditambah');
    }

    function getDataDetail($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('tb_mua');
        return $query->row();
    }

    function updateData($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('tb_mua', $data);
        $this->session->set_flashdata('msg_alert', 'Data mua berhasil diubah');
    }

    function deleteData($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_mua');
        $this->session->set_flashdata('msg_alert', 'Data mua berhasil dihapus');
    }
}
