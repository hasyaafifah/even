<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Gedung extends CI_Model
{

    function getData()
    {
        $query = $this->db->get('tb_gedung');
        return $query->result();
    }

    function insertData($data)
    {
        $this->db->insert('tb_gedung', $data);
        $this->session->set_flashdata('msg_alert', 'Data gedung berhasil ditambah');
    }

    function getDataDetail($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('tb_gedung');
        return $query->row();
    }

    function updateData($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('tb_gedung', $data);
        $this->session->set_flashdata('msg_alert', 'Data gedung berhasil diubah');
    }

    function deleteData($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_gedung');
        $this->session->set_flashdata('msg_alert', 'Data gedung berhasil dihapus');
    }
}
