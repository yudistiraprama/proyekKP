<?php

class Pendadaran_model extends CI_model{

    public function getAllPendadaran()
    {
        return $this->db->get('pendadaran')->result_array();
        
    }

    public function tambahJadwalPendadaran()
    {
        $data = array(
            'nim' => $this->input->post('nim', true),
            'nama' => $this->input->post('nama', true),     
            'dosen1' => $this->input->post('dosen1', true),
            'dosen2' => $this->input->post('dosen2', true),
            'judul' => $this->input->post('judul', true),
            'reviewer' => $this->input->post('reviewer', true),
            'ketuaPenguji' => $this->input->post('ketuaPenguji', true),
            'sekretarisPenguji' => $this->input->post('sekretarisPenguji', true),
            'tanggal' => $this->input->post('tanggal', true),
            'durasi' => $this->input->post('durasi', true),
            'ruang' => $this->input->post('ruang', true)
        );

        $this->db->insert('pendadaran', $data);
    }

    public function hapusJadwalPendadaran($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('pendadaran');
    }

    public function getPendadaranByID($id)
    {
        return $this->db->get_where('pendadaran', ['id' => $id])->row_array();
    }

    public function editJadwalPendadaran()
    {
        $data = array(
            'nim' => $this->input->post('nim', true),
            'nama' => $this->input->post('nama', true),     
            'dosen1' => $this->input->post('dosen1', true),
            'dosen2' => $this->input->post('dosen2', true),
            'judul' => $this->input->post('judul', true),
            'reviewer' => $this->input->post('reviewer', true),
            'ketuaPenguji' => $this->input->post('ketuaPenguji', true),
            'sekretarisPenguji' => $this->input->post('sekretarisPenguji', true),
            'tanggal' => $this->input->post('tanggal', true),
            'jamMulai' => $this->input->post('jamMulai', true),
            'jamSelesai' => $this->input->post('jamSelesai', true),
            'ruang' => $this->input->post('ruang', true)
        );
        
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('pendadaran', $data);
    }

    public function getPendadaran($limit, $start, $keyword = null)
    {
        if($keyword){
            $this->db->like('nama', $keyword);
            $this->db->or_like('nim', $keyword);
        }

        return $this->db->get('pendadaran', $limit, $start)->result_array();
    }

    public function countAllPendadaran()
    {
        return $this->db->get('pendadaran')->num_rows();
    }
    
    public function cekStatusPendadaran($nim){
        return $this->db->get_where('pendadaran',['nim'=>$nim])->row_array();
    }
}