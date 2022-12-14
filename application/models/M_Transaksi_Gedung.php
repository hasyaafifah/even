<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Transaksi_Gedung extends CI_Model
{

    function getData()
    {
        $query = $this->db->get('tb_bookinggedung');
        return $query->result();
    }

    function insertData($data)
    {
        $this->db->insert('tb_bookinggedung', $data);
        $this->session->set_flashdata('msg_alert', 'Data Transaksi Gedung berhasil ditambah');
    }

    function getDataDetail($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('tb_bookinggedung');
        return $query->row();
    }

    function updateData($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('tb_bookinggedung', $data);
        $this->session->set_flashdata('msg_alert', 'Data Transaksi Gedung berhasil diubah');
    }

    
}
