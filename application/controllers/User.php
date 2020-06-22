<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_user');
        $this->load->helper('download');
        $this->load->helper('file');
    }

    public function index()
    {
        if ($this->session->userdata('status')) {
            if ($this->session->userdata('status') == 1) {
                $data['user']       = $this->db->get_where('user', ['id_user' => $this->session->userdata('id')])->row_array();
                $data['proposal']   = $this->db->get_where('proposal', ['username' => $this->session->userdata('username')])->result_array();
                $this->load->view('users/ukm', $data);
            } else {
                echo "access blocked";
            }
        } else {
            redirect('auth');
        }
    }

    public function izin()
    {
        if ($this->session->userdata('status')) {
            if ($this->session->userdata('status') == 1) {
                $data['user']       = $this->db->get_where('user', ['id_user' => $this->session->userdata('id')])->row_array();
                $this->load->view('users/izin', $data);
            } else {
                echo "access blocked";
            }
        } else {
            redirect('auth');
        }
    }

    public function kms()
    {
        if ($this->session->userdata('status')) {
            if ($this->session->userdata('status') == 2) {
                $data['user']       = $this->db->get_where('user', ['id_user' => $this->session->userdata('id')])->row_array();
                $data['proposal']   = $this->db->get('proposal')->result_array();
                $this->load->view('users/kms', $data);
            } else {
                echo "access blocked";
            }
        } else {
            redirect('auth');
        }
    }

    public function kaprodi()
    {
        if ($this->session->userdata('status')) {
            if ($this->session->userdata('status') == 3) {
                $data['user']       = $this->db->get_where('user', ['id_user' => $this->session->userdata('id')])->row_array();
                // $data['proposal']   = $this->db->get('proposal')->result_array();
                $data['proposal']   = $this->db->get_where('proposal', ['approval_kms' => 'Approved'])->result_array();
                $this->load->view('users/kaprodi', $data);
            } else {
                echo "access blocked";
            }
        } else {
            redirect('auth');
        }
    }

    public function lm()
    {
        if ($this->session->userdata('status')) {
            if ($this->session->userdata('status') == 4) {
                $data['user']       = $this->db->get_where('user', ['id_user' => $this->session->userdata('id')])->row_array();
                $data['proposal']   = $this->db->get_where('proposal', ['approval_kaprodi' => 'Approved'])->result_array();
                $this->load->view('users/lm', $data);
            } else {
                echo "access blocked";
            }
        } else {
            redirect('auth');
        }
    }

    public function addProposal()
    {
        $username    = $this->input->post('username');
        $namaProp   = $this->input->post('namaProp');
        $tanggal    = $this->input->post('tanggal');
        $fileProp   = $_FILES['fileProp'];

        if ($fileProp = '') {
        } else {
            $config['upload_path']      = './assets/files/proposal';
            $config['allowed_types']    = 'pdf';
            $config['max_size']         = '15360';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('fileProp')) {
                echo $this->upload->display_errors();
                die();
            } else {
                $fileProp = $this->upload->data('file_name');
            }
        }

        $data = array(
            'username'          => $username,
            'nama_proposal'     => $namaProp,
            'tgl_acara'         => $tanggal,
            'approval_kms'      => 'Pending',
            'approval_kaprodi'  => 'Pending',
            'file_proposal'     => $fileProp,
        );

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Proposal berhasil dimasukkan
            </div>');
        $this->m_user->addProposal($data, 'proposal');
        redirect('user');
    }


    public function addIzin()
    {
        $fileIzin   = $_FILES['fileIzin'];

        if ($fileIzin = '') {
        } else {
            // 
            // tambahin max size = min_size
            $config['upload_path']      = './assets/files/surat_izin';
            $config['allowed_types']    = 'pdf';
            $config['max_size']         = '15360';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('fileIzin')) {
                echo $this->upload->display_errors();
                die();
            } else {
                $fileIzin = $this->upload->data('file_name');
            }
        }

        $data = array(
            'file_izin'     => $fileIzin,
        );

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Surat izin berhasil dibuat
            </div>');
        $this->m_user->addIzin($data, 'proposal');
        redirect('user');
    }

    public function approve_kms($id_proposal)
    {
        $userData = $this->session->userdata('id');
        $this->m_user->approve_kms($id_proposal, $userData, 'proposal');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Proposal berhasil disetujui
        </div>');
        redirect('user/kms');
    }

    public function reject_kms($id_proposal)
    {
        $this->m_user->reject_kms($id_proposal, 'proposal');
        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
        Proposal berhasil ditolak
        </div>');
        redirect('user/kms');
    }

    public function approve_kaprodi($id_proposal)
    {
        $this->m_user->approve_kaprodi($id_proposal, 'proposal');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Proposal berhasil disetujui
        </div>');
        redirect('user/kaprodi');
    }

    public function reject_kaprodi($id_proposal)
    {
        $this->m_user->reject_kaprodi($id_proposal, 'proposal');
        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
        Proposal berhasil ditolak
        </div>');
        redirect('user/kaprodi');
    }

    public function download_propUkm($fileName)
    {
        // $name = $fileName;
        // // pake base_url
        // force_download('./assets/files/proposal/' . $name, NULL);
        // redirect('user');

        $filepath = './assets/files/proposal/' . $fileName;

        if (!file_exists($filepath)) {
            throw new Exception("File $filepath does not exist");
        }
        if (!is_readable($filepath)) {
            throw new Exception("File $filepath is not readable");
        }
        http_response_code(200);
        header('Content-Length: ' . filesize($filepath));
        header("Content-Type: application/pdf");
        header('Content-Disposition: inline; filename="Proposal.pdf"');
        readfile($filepath);


        exit;
    }

    public function download_izinUkm($fileName)
    {

        $filepath = './assets/files/surat_izin/' . $fileName;

        if (!file_exists($filepath)) {
            throw new Exception("File $filepath does not exist");
        }
        if (!is_readable($filepath)) {
            throw new Exception("File $filepath is not readable");
        }
        http_response_code(200);
        header('Content-Length: ' . filesize($filepath));
        header("Content-Type: application/pdf");
        header('Content-Disposition: inline; filename="Proposal.pdf"');
        readfile($filepath);


        exit;
    }

    public function download_izinKaprodi($fileName)
    {
        $name = $fileName;
        force_download('./assets/files/surat_izin/' . $name, NULL);
        redirect('user/kaprodi');
    }

    public function download_izinLm($fileName)
    {
        $name = $fileName;
        force_download('./assets/files/surat_izin/' . $name, NULL);
        redirect('user/lm');
    }

    public function download_propKms($fileName)
    {
        $name = $fileName;
        force_download('./assets/files/proposal/' . $name, NULL);
        redirect('kms');
    }

    public function delete($id_proposal)
    {
        $this->m_user->delete($id_proposal, 'proposal');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Proposal berhasil dihapus
        </div>');
        redirect('user');
    }



    public function logout()
    {
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have logged out!</div>');
        session_destroy();
        redirect(base_url());
    }
}
