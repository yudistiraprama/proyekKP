<?php

class Kolokium_model extends CI_model{
    

    public function getAllKolokium()
    {
        return $this->db->get('kolokium')->result_array();
        
    }

    public function tambahJadwalKolokium()
    {
        $tanggal = $this->input->post('tanggal', true);
        $tgl = format_indo($tanggal);
        
        $data = array(
            'nim' => $this->input->post('nim', true),
            'nama' => $this->input->post('nama', true),     
            'dosen1' => $this->input->post('dosen1', true),
            'dosen2' => $this->input->post('dosen2', true),
            'judul' => $this->input->post('judul', true),
            'reviewer' => $this->input->post('reviewer', true),
            'tanggal' => $tgl,
            'durasi' => $this->input->post('durasi', true),
            'ruang' => $this->input->post('ruang', true),
            'keterangan' => $this->input->post('keterangan', true)
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
        $tanggal = $this->input->post('tanggal', true);
        $tgl = format_indo($tanggal);
        
        $data = array(
            'nim' => $this->input->post('nim', true),
            'nama' => $this->input->post('nama', true),     
            'dosen1' => $this->input->post('dosen1', true),
            'dosen2' => $this->input->post('dosen2', true),
            'judul' => $this->input->post('judul', true),
            'reviewer' => $this->input->post('reviewer', true),
            'tanggal' => $tgl,
            'durasi' => $this->input->post('durasi', true),
            'ruang' => $this->input->post('ruang', true),
            'keterangan' => $this->input->post('keterangan', true)
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
    
    public function cekBentrokKolokiumAll($dosen1,$dosen2,$reviewer){
        $this->db->or_where('dosen1',$dosen1);
        $this->db->or_where('dosen1',$dosen2);
        $this->db->or_where('dosen1',$reviewer);
        $this->db->or_where('dosen2',$dosen1);
        $this->db->or_where('dosen2',$dosen2);
        $this->db->or_where('dosen2',$reviewer);
        $this->db->or_where('reviewer',$dosen1);
        $this->db->or_where('reviewer',$dosen2);
        $this->db->or_where('reviewer',$reviewer);
//        $this->db->where('ruang',$ruang);
        return $this->db->get('kolokium')->result_array();  
    }
    
    public function cekBentrokKolokiumAll2($dosen1,$reviewer){
        $this->db->or_where('dosen1',$dosen1);
        $this->db->or_where('dosen1',$reviewer);
        $this->db->or_where('reviewer',$dosen1);
        $this->db->or_where('reviewer',$reviewer);

//        $this->db->where('ruang',$ruang);
        return $this->db->get('kolokium')->result_array(); 
    }
}