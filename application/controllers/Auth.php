<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        // ganti
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('pwd', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Login";
            $this->load->view('auth/login2', $data);
        } else {
            $this->_login();
        }
    }

    private function _login()
    {

        $username = $this->input->post('username');
        $pwd = $this->input->post('pwd');

        $user = $this->db->get_where('user', ['username' => $username])->row_array();

        //user ada
        if ($user) {
            if (password_verify($pwd, $user['pwd'])) {
                if ($user['status'] == '1') { //UKM/
                    $data = [
                        'id' => $user['id_user'],
                        'username' => $user['username'],
                        'name' => $user['nama'],
                        'status' => $user['status']
                    ];
                    $this->session->set_userdata($data);
                    redirect('user');
                } else if ($user['status'] == '2') { //KEMAHASISWAAN
                    $data = [
                        'id' => $user['id_user'],
                        'name' => $user['nama'],
                        'status' => $user['status']
                    ];
                    $this->session->set_userdata($data);
                    redirect('user/kms');
                } else if ($user['status'] == '3') { //Kaprodi
                    $data = [
                        'id' => $user['id_user'],
                        'name' => $user['nama'],
                        'status' => $user['status']
                    ];
                    $this->session->set_userdata($data);
                    redirect('user/kaprodi');
                } else if ($user['status'] == '4') { //Layanan Mahasiswa
                    $data = [
                        'id' => $user['id_user'],
                        'name' => $user['nama'],
                        'status' => $user['status']
                    ];
                    $this->session->set_userdata($data);
                    redirect('user/lm');
                }
            } else { //PASSWORD SALAH
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
              ID and Password do not match!
              </div>');
                redirect();
            }
        } else { //user tidak ada
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            ID do not exist!
            </div>');
            redirect();
        }
    }
}
