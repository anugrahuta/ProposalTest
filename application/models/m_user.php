<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{

    public function getProposal($id = null)
    {
        if ($id === null) {
            return $this->db->get('proposal')->result_array();
        } else {
            return $this->db->get_where('proposal', ['id_proposal' => $id])->result_array();
        }
    }

    public function addProposal($data)
    {
        $this->db->insert('proposal', $data);
        return $this->db->affected_rows();
    }

    public function addIzin($data)
    {
        // ganti
        $this->db->where('id_proposal', $this->uri->segment('3'));
        $this->db->update('proposal', $data);
    }

    public function delete($id_proposal)
    {
        $this->db->where('id_proposal', $id_proposal);
        $this->db->delete('proposal');
        return $this->db->affected_rows();
    }

    public function updateProposal($data, $id)
    {
        $this->db->update('proposal', $data, ['id_proposal' => $id]);
        return $this->db->affected_rows();
    }

    public function approve_kms($id_proposal, $userData)
    {
        $data = array(
            'approval_kms'   => 'Approved',
        );
        $this->db->where('id_proposal', $id_proposal);
        $this->db->update('proposal', $data);


        $data2 = array(
            'id_proposal'   => $id_proposal,
            'id_user'       => $userData,
        );
        $this->db->insert('approved', $data2);
    }

    public function reject_kms($id_proposal)
    {
        $data = array(
            'approval_kms'   => 'Rejected',
        );
        $this->db->where('id_proposal', $id_proposal);
        $this->db->update('proposal', $data);
    }

    public function approve_kaprodi($id_proposal)
    {
        $data = array(
            'approval_kaprodi'   => 'Approved',
        );
        $this->db->where('id_proposal', $id_proposal);
        $this->db->update('proposal', $data);
    }

    public function reject_kaprodi($id_proposal)
    {
        $data = array(
            'approval_kaprodi'   => 'Rejected',
        );
        $this->db->where('id_proposal', $id_proposal);
        $this->db->update('proposal', $data);
    }
}
