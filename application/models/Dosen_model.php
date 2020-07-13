<?php

class Dosen_model extends CI_model{

    public function getAllDosen()
    {
        return $this->db->get('dosen')->result_array();
        
    }

    public function tambahDataDosen()
    {
        $data = array(
            'nama' => $this->input->post('nama', true),
            'nip' => $this->input->post('nip', true)
        );

        $this->db->insert('dosen', $data);
    }

    public function hapusDataDosen($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('dosen');
    }

    public function getDosenByID($id)
    {
        return $this->db->get_where('dosen', ['id' => $id])->row_array();
    }

    public function editDataDosen()
    {
        $data = array(
            'nama' => $this->input->post('nama', true),
            'nip' => $this->input->post('nip', true)
        );
        
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('dosen', $data);
    }

    public function getDosen($limit, $start, $keyword = null)
    {
        if($keyword){
            $this->db->like('nama', $keyword);
            $this->db->or_like('nip', $keyword);
        }

        return $this->db->get('dosen', $limit, $start)->result_array();
    }

    public function countAllDosen()
    {
        return $this->db->get('dosen')->num_rows();
    }
}