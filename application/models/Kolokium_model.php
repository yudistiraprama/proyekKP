<?php

class Kolokium_model extends CI_model{

    public function getAllKolokium()
    {
        return $this->db->get('kolokium')->result_array();
        
    }

    public function tambahJadwalKolokium()
    {
        $data = array(
            'nim' => $this->input->post('nim', true),
            'nama' => $this->input->post('nama', true),     
            'dosen1' => $this->input->post('dosen1', true),
            'dosen2' => $this->input->post('dosen2', true),
            'judul' => $this->input->post('judul', true),
            'reviewer' => $this->input->post('reviewer', true),
            'tanggal' => $this->input->post('tanggal', true),
            'durasi' => $this->input->post('durasi', true),
            'ruang' => $this->input->post('ruang', true)
        );

        $this->db->insert('kolokium', $data);
    }

    public function hapusJadwalKolokium($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('kolokium');
    }

    public function getKolokiumByID($id)
    {
        return $this->db->get_where('kolokium', ['id' => $id])->row_array();
    }

    public function getKolokiumByNIM($nim){
        return $this->db->get_where('kolokium',['nim'=>$nim])->row_array();
    }
    
    public function editJadwalKolokium()
    {
        $data = array(
            'nim' => $this->input->post('nim', true),
            'nama' => $this->input->post('nama', true),     
            'dosen1' => $this->input->post('dosen1', true),
            'dosen2' => $this->input->post('dosen2', true),
            'judul' => $this->input->post('judul', true),
            'reviewer' => $this->input->post('reviewer', true),
            'tanggal' => $this->input->post('tanggal', true),
            'durasi' => $this->input->post('durasi', true),
            'ruang' => $this->input->post('ruang', true)
        );
        
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('kolokium', $data);
    }

    public function getKolokium($limit, $start, $keyword = null)
    {
        if($keyword){
            $this->db->like('nama', $keyword);
            $this->db->or_like('nim', $keyword);
        }

        return $this->db->get('kolokium', $limit, $start)->result_array();
    }

    public function countAllKolokium()
    {
        return $this->db->get('kolokium')->num_rows();
    }
    public function cekStatusKolokium($nim){
       return $this->db->get_where('kolokium',['nim'=>$nim])->row_array();
        
    }
}