<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_DataMaster extends CI_Model
{

	public function admin_list_all()
	{

		$this->db->select('*');
		$q = $this->db->get('tb_user')->result();
		return $q;
	}



	public function pegawai_list_all()
	{
		$q = $this->db->select('*')
			->from('tb_pegawai')
			->get();
		return $q->result();
	}



	public function get_data_admin($id)
	{
		$q = $this->db->select('*')->from('tb_user')->where('id', $id)->limit(1)->get();
		if ($q->num_rows() < 1) {
			redirect(base_url('/data_master/admin'));
		}
		return $q->row();
	}

	public function get_data_pegawai($id)
	{
		$q = $this->db->select('*')
			->from('tb_pegawai')
			->where('id', $id)
			->limit(1)
			->get();
		if ($q->num_rows() < 1) {
			redirect(base_url('/data_master/pegawai'));
		}
		return $q->row();
	}



	public function admin_update($id_user, $username, $email, $nama, $password, $type, $avatar, $portofolio, $followers, $jumlah_followers)
	{
		$role = 0;
		if ($type == 'admin') {
			$role = 1;
		} else if ($type == 'mua') {
			$role = 2;
		} else {
			$role = 3;
		}

		$d_t_d = array(
			'id' => $id_user,
			'username' => $username,
			'email' => $email,
			'nama' => $nama,
			'portofolio' => $portofolio,
			'followers' => $followers,
			'jumlah_followers' => $jumlah_followers,
			'id_role' => $role
		);

		if (!empty($password)) {
			$d_t_d['password'] = md5($password);
		}
		if (!empty($avatar)) {
			$d_t_d['avatar'] = $avatar;
		}
		$this->db->where('id', $id_user)->update('tb_user', $d_t_d);
		$this->session->set_flashdata('msg_alert', 'Data admin berhasil diubah');
	}



	public function admin_delete($id)
	{
		$this->db->delete('tb_user', array('id' => $id));
	}


	public function admin_add_new(
		$username,
		$nama,
		$password,
		$avatar = 0,
		$link_ig,
		$alamat,
		$no_hp,
		$jk,
		$email,
		$type
		
	) {
		$role = 0;
		if ($type == 'admin') {
			$role = 1;
		} else if ($type == 'mua') {
			$role = 2;
		} else {
			$role = 3;
		}
		$d_t_d = array(
			'username' => $username,
			'nama' => $nama,
			'password' => md5($password),
			'avatar' => $avatar,
			'link_ig' => $link_ig,
			'alamat' => $alamat,
			'no_hp' => $no_hp,
			'jk' => $jk,
			'email' => $email,
			'id_role' => $role
			
		);
		if (empty($avatar)) {
			$d_t_d['avatar'] = 'avatar.png';
		}
		$this->db->insert('tb_user', $d_t_d);
		$this->session->set_flashdata('msg_alert', $type . ' baru berhasil ditambahkan');
	}

	public function admin_add_new_mua(
		$username,
		$nama,
		$password,
		$avatar = 0,
		$link_ig,
		$alamat,
		$no_hp,
		$jk,
		$email,
		$type
		
	) {
		$role = 0;
		if ($type == 'admin') {
			$role = 1;
		} else if ($type == 'mua') {
			$role = 2;
		} else {
			$role = 3;
		}
		$d_t_d = array(
			'username' => $username,
			'nama' => $nama,
			'password' => md5($password),
			'avatar' => $avatar,
			'link_ig' => $link_ig,
			'alamat' => $alamat,
			'no_hp' => $no_hp,
			'jk' => $jk,
			'email' => $email,
			'id_role' => $role,
			
		);
		if (empty($avatar)) {
			$d_t_d['avatar'] = 'avatar.png';
		}
		$this->db->insert('tb_user', $d_t_d);
		$this->session->set_flashdata('msg_alert', $type . ' baru berhasil ditambahkan');
	}





	function getDataDetail($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('tb_pegawai');
		return $query->row();
	}
}

/* End of file M_DataMaster.php */
/* Location: ./application/models/M_DataMaster.php */