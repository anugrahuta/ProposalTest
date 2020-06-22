<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Api extends RestController
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_user', 'm');
    }

    public function proposal_get()
    {
        $id = $this->get('id_proposal');

        if ($id === null) {
            $proposal = $this->m->getProposal();
        } else {
            $proposal = $this->m->getProposal($id);
        }

        if ($proposal) {
            $this->response([
                'status'    => true,
                'data'      => $proposal
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status'    => false,
                'message'   => 'Proposal tidak ditemukan'
            ], RestController::HTTP_NOT_FOUND);
        }
    }

    public function proposal_delete()
    {
        $id = $this->delete('id_proposal');

        if ($id === null) {
            $this->response([
                'status'    => false,
                'message'   => 'Masukkan ID proposal'
            ], RestController::HTTP_BAD_REQUEST);
        } else {
            if ($this->m->delete($id) > 0) {
                // ok
                $this->response([
                    'status'           => true,
                    'id_proposal'      => $id,
                    'message'          => 'Proposal berhasil dihapus'
                ], RestController::HTTP_OK);
            } else {
                // id gak ada
                $this->response([
                    'status'    => false,
                    'message'   => 'Proposal tidak ditemukan'
                ], RestController::HTTP_BAD_REQUEST);
            }
        }
    }

    public function proposal_post()
    {
        $data = [
            'username'          => $this->post('username'),
            'nama_proposal'     => $this->post('nama_proposal'),
            'file_proposal'     => $this->post('file_proposal'),
            'file_izin'         => $this->post('file_izin'),
            'tgl_acara'         => $this->post('tgl_acara'),
            'approval_kms'      => 'Pending',
            'approval_kaprodi'  => 'Pending'
        ];

        if ($this->m->addProposal($data) > 0) {
            $this->response([
                'status'           => true,
                'message'          => 'Proposal berhasil dibuat'
            ], RestController::HTTP_CREATED);
        } else {
            $this->response([
                'status'    => false,
                'message'   => 'Proposal gagal dibuat'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function proposal_put()
    {
        $id = $this->put('id_proposal');
        $data = [
            'username'          => $this->put('username'),
            'nama_proposal'     => $this->put('nama_proposal'),
            'file_proposal'     => $this->put('file_proposal'),
            'file_izin'         => $this->put('file_izin'),
            'tgl_acara'         => $this->put('tgl_acara'),
            // 'approval_kms'      => $this->put('approval_kms'),
            // 'approval_kaprodi'  => $this->put('approval_kaprodi'),
        ];

        if ($this->m->updateProposal($data, $id) > 0) {
            $this->response([
                'status'           => true,
                'message'          => 'Proposal berhasil diubah'
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status'    => false,
                'message'   => 'Proposal gagal diubah'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }
}
