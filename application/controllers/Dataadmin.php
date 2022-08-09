<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Dataadmin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_DataMaster');
        $this->m_datamaster = $this->M_DataMaster;
    }

    public function index()
    {

        $data = generate_page('Data Master Admin', 'data_master/admin', 'Admin');

        $data_content['title_page'] = 'Data Master Admin';
        $data['content'] = $this->load->view('partial/DataMasterAdmin/V_Admin_DataMasterAdmin_Read', $data_content, true);
        $this->load->view('V_DataMaster_Admin', $data);
    }

    public function halaman_tambah()
    {
        $this->load->view('partial/Statuspegawai/Statuspegawai');
    }

    public function halaman_edit($id)
    {
        $queryStatuspegawaiDetail = $this->M_Statuspegawai->getDataDetail($id);
        $DATA = array('queryStsDetail' => $queryStatuspegawaiDetail);
        $data = generate_page('Status Pegawai', 'Statuspegawai/halaman_edit', 'Admin');
        $data['content'] = $this->load->view('partial/Statuspegawai/Statuspegawai_Edit',  $DATA, true);
        $this->load->view('V_Statuspegawai', $data);
    }

    public function fungsiTambah()
    {

        $status = $this->input->post('status');
        $total = $this->input->post('total');




        $ArrInsert = array(

            'status' => $status,
            'total' => $total

        );

        $this->M_Statuspegawai->insertData($ArrInsert);
        $this->session->set_flashdata('msg_alert', 'Data Status Pegawai berhasil ditambah');
        redirect(base_url('Statuspegawai/index'));
    }


    public function fungsiEdit()
    {

        $id = $this->input->post('id');
        $status = $this->input->post('status');
        $total = $this->input->post('total');


        $ArrUpdate = array(
            'status' => $status,
            'total' => $total
        );

        $this->M_Statuspegawai->updateData($id, $ArrUpdate);
        $this->session->set_flashdata('msg_alert', 'Data Status pegawai berhasil diubah');
        redirect(base_url('Statuspegawai/index'));
    }

    public function fungsiDelete($id)
    {
        $this->M_Statuspegawai->deleteData($id);
        $this->session->set_flashdata('msg_alert', 'Data Status pegawai berhasil dihapus');
        redirect(base_url('Statuspegawai/index'));
    }

    public function admin_ajax()
    {
        json_dump(function () {
            $result = $this->m_datamaster->admin_list_all();
            $new_arr = array();
            $i = 1;
            foreach ($result as $key => $value) {
                $value->no = $i;
                $new_arr[] = $value;
                // $value->id_role = ($value->id_role == '1') ? "Admin" : "Vendor Gedung";
                $value->avatar = '<img src="' . uploads_url('avatar/' . $value->avatar) . '" alt="image" />';
                $i++;
            }
            return array('data' => $new_arr);
        });
    }


    public function edit()
    {
        $id = $this->uri->segment('4');
        $username = $this->security->xss_clean($this->input->post('username'));
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_user = $this->security->xss_clean($this->input->post('id_user'));
            
            $nama = $this->security->xss_clean($this->input->post('nama'));
            $password = $this->security->xss_clean($this->input->post('password'));
            // $avatar = '';
            // // avatar
            // if ($this->security->xss_clean($_FILES["avatar"]) && $_FILES['avatar']['name']) {
            //     $config['upload_path']          = './uploads/avatar/';
            //     $config['allowed_types']        = 'jpg|jpeg|png';
            //     $config['max_size']             = 2000;
            //     $config['file_name']            = md5(time() . '_' . $_FILES["avatar"]['name']);

            //     $this->load->library('upload', $config);

            //     if (!$this->upload->do_upload('avatar') && !empty($_FILES['avatar']['name'])) {
            //         $this->session->set_flashdata('msg_alert', $this->upload->display_errors());
            //         redirect(base_url('Dataadmin/edit/' . $name . '/' . $id));
            //     } else {
            //         $avatar = $this->upload->data()['file_name'];
            //     }
            // }
            $portofolio = $this->security->xss_clean($this->input->post('portofolio'));
            $followers = $this->security->xss_clean($this->input->post('followers'));
            $jumlah_followers = $this->security->xss_clean($this->input->post('jumlah_followers'));
            $type = $this->security->xss_clean($this->input->post('type'));
            // validasi
            // $this->form_validation->set_rules('id_user', 'id_user', 'required');
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('nama', 'Nama ', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('portofolio', 'Portofolio', 'required');
            $this->form_validation->set_rules('followers', 'Followers', 'required');
            $this->form_validation->set_rules('jumlah_followers', 'Jumlah Followers', 'required');
            $this->form_validation->set_rules('type', 'Type', 'required');
            $this->form_validation->set_rules('alamat', 'Alamat', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');

            if (!$this->form_validation->run()) {
                $this->session->set_flashdata('msg_alert', validation_errors());
                redirect(base_url('Dataadmin/edit/' . $id));
            }
            $this->m_datamaster->admin_update(
                $id_user,
                $username,
                $nama,
                $password,
                // $avatar,
                $portofolio,
                $followers,
                $jumlah_followers,
                $type
            );
            redirect(base_url('Dataadmin/index'));
        }


        $data = generate_page('Edit Data Master Admin', 'Dataadmin/edit/admin/' . $id, 'Admin');

        $data_content['title_page'] = 'Edit Data Master Admin';
        $data_content['data_admin'] = $this->m_datamaster->get_data_admin($id);
        $data['content'] = $this->load->view('partial/DataMasterAdmin/V_Admin_DataMasterAdmin_Edit', $data_content, true);
        $this->load->view('V_DataMaster_Admin', $data);
    }

    public function delete()
    {
        $id = $this->uri->segment('3');
        $this->m_datamaster->admin_delete($id);
        $this->session->set_flashdata('msg_alert', 'Akun admin berhasil dihapus');
        redirect(base_url('Dataadmin/'));
    }

    public function add_new()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $this->security->xss_clean($this->input->post('username'));
            $nama = $this->security->xss_clean($this->input->post('nama'));
            $password = $this->security->xss_clean($this->input->post('password'));
            $avatar = '';
            // avatar
            if ($this->security->xss_clean($_FILES["avatar"]) && $_FILES['avatar']['name']) {
                $config['upload_path']          = './uploads/avatar/';
                $config['allowed_types']        = 'jpg|jpeg|png';
                $config['max_size']             = 2000;
                $config['file_name']            = md5(time() . '_' . $_FILES["avatar"]['name']);

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('avatar') && !empty($_FILES['avatar']['name'])) {
                    $this->session->set_flashdata('msg_alert', $this->upload->display_errors());
                    redirect(base_url('data_master/edit/' . $name . '/' . $id));
                } else {
                    $avatar = $this->upload->data()['file_name'];
                }
            }
            $link_ig = $this->security->xss_clean($this->input->post('link_ig'));
            $alamat = $this->security->xss_clean($this->input->post('alamat'));
            
   
            $no_hp = $this->security->xss_clean($this->input->post('no_hp'));
            $jk = $this->security->xss_clean($this->input->post('jk'));
            $email = $this->security->xss_clean($this->input->post('email'));
     
            $type = $this->security->xss_clean($this->input->post('type'));
            
            // validasi
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('type', 'Type', 'required');
            if (!$this->form_validation->run()) {
                $this->session->set_flashdata('msg_alert', validation_errors());
                redirect(base_url('Dataadmin/add_new/'));
            }
            $this->m_datamaster->admin_add_new(
                $username,
                $nama,
                $password,
                $avatar,
                $link_ig,
                $alamat,
                $no_hp,
                $jk,
                $email,
                $type
                
            );
            redirect(base_url('Dataadmin/'));
        }
        $data = generate_page('Entry Data Master Admin', 'data_master/add_new/admin', 'Admin');

        $data_content['title_page'] = 'Entry Data Master Admin';
        $data['content'] = $this->load->view('partial/DataMasterAdmin/V_Admin_DataMasterAdmin_Create', $data_content, true);
        $this->load->view('V_DataMaster_Admin', $data);
    }

    public function add_new_mua()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $this->security->xss_clean($this->input->post('username'));
            $nama = $this->security->xss_clean($this->input->post('nama'));
            $password = $this->security->xss_clean($this->input->post('password'));
            $avatar = '';
            // avatar
            if ($this->security->xss_clean($_FILES["avatar"]) && $_FILES['avatar']['name']) {
                $config['upload_path']          = './uploads/avatar/';
                $config['allowed_types']        = 'jpg|jpeg|png';
                $config['max_size']             = 2000;
                $config['file_name']            = md5(time() . '_' . $_FILES["avatar"]['name']);

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('avatar') && !empty($_FILES['avatar']['name'])) {
                    $this->session->set_flashdata('msg_alert', $this->upload->display_errors());
                    redirect(base_url('data_master/add_new_mua/' . $name . '/' . $id));
                } else {
                    $avatar = $this->upload->data()['file_name'];
                }
            }
            $link_ig = $this->security->xss_clean($this->input->post('link_ig'));
            $alamat = $this->security->xss_clean($this->input->post('alamat'));
            $no_hp = $this->security->xss_clean($this->input->post('no_hp'));
            $jk = $this->security->xss_clean($this->input->post('jk'));
            
            $email = $this->security->xss_clean($this->input->post('email'));
            $type = $this->security->xss_clean($this->input->post('type'));
            
            
            
            // validasi
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('jk', 'Jenik Kelamin', 'required');
            $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('type', 'Type', 'required');
            $this->form_validation->set_rules('no_hp', 'no_hp', 'required');
            $this->form_validation->set_rules('link_ig', 'Link IG', 'required');
            $this->form_validation->set_rules('alamat', 'Alamat', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            if (!$this->form_validation->run()) {
                $this->session->set_flashdata('msg_alert', validation_errors());
                redirect(base_url('Dataadmin/add_new_mua/'));
            }
            $this->m_datamaster->admin_add_new_mua(
                $username,
                $nama,
                $password,
                $avatar,
                $link_ig,
                $alamat,
                $no_hp,
                $jk,
                $email,
                $type
            );
            redirect(base_url('Auth'));
        }
        $data = generate_page('Entry Data Master Admin', 'data_master/add_new_mua/admin', 'Admin');

        $data_content['title_page'] = 'Entry Data Master Admin';
        $data['content'] = $this->load->view('V_Register', $data_content, true);
        $this->load->view('V_Register', $data);
    }
}

	

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */