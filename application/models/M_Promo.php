<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Promo extends CI_Model
{

    function getData()
    {
        $query = $this->db->get('tb_promo');
        return $query->result();
    }

    function insertData($data)
    {
        $this->db->insert('tb_promo', $data);
        $this->session->set_flashdata('msg_alert', 'Data promo berhasil ditambah');
    }

    function getDataDetail($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('tb_promo');
        return $query->row();
    }

    function updateData($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('tb_promo', $data);
        $this->session->set_flashdata('msg_alert', 'Data promo berhasil diubah');
    }

    function deleteData($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_promo');
        $this->session->set_flashdata('msg_alert', 'Data promo berhasil dihapus');
    }
}
