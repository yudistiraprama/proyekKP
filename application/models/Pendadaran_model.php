<?php

class Pendadaran_model extends CI_model {

    public function getAllPendadaran() {
        return $this->db->get('pendadaran')->result_array();
    }

    public function tambahJadwalPendadaran() {
        $tanggal = $this->input->post('tanggal', true);
        $tgl = format_indo($tanggal);

        $data = array(
            'nim' => $this->input->post('nim', true),
            'nama' => $this->input->post('nama', true),
            'dosen1' => $this->input->post('dosen1', true),
            'dosen2' => $this->input->post('dosen2', true),
            'judul' => $this->input->post('judul', true),
            'reviewer' => $this->input->post('reviewer', true),
            'ketuaPenguji' => $this->input->post('ketuaPenguji', true),
            'sekretarisPenguji' => $this->input->post('sekretarisPenguji', true),
            'anggotaPenguji' => $this->input->post('anggotaPenguji', true),
            'tanggal' => $tgl,
            'durasi' => $this->input->post('durasi', true),
            'ruang' => $this->input->post('ruang', true),
            'keterangan' => $this->input->post('keterangan', true)
        );

        $this->db->insert('pendadaran', $data);
    }

    public function hapusJadwalPendadaran($id) {
        $this->db->where('id', $id);
        $this->db->delete('pendadaran');
    }

    public function getPendadaranByID($id) {
        return $this->db->get_where('pendadaran', ['id' => $id])->row_array();
    }

    public function editJadwalPendadaran() {
        $tanggal = $this->input->post('tanggal', true);
        $tgl = format_indo($tanggal);

        $data = array(
            'nim' => $this->input->post('nim', true),
            'nama' => $this->input->post('nama', true),
            'dosen1' => $this->input->post('dosen1', true),
            'dosen2' => $this->input->post('dosen2', true),
            'judul' => $this->input->post('judul', true),
            'reviewer' => $this->input->post('reviewer', true),
            'ketuaPenguji' => $this->input->post('ketuaPenguji', true),
            'sekretarisPenguji' => $this->input->post('sekretarisPenguji', true),
            'anggotaPenguji' => $this->input->post('anggotaPenguji', true),
            'tanggal' => $tgl,
            'durasi' => $this->input->post('durasi', true),
            'ruang' => $this->input->post('ruang', true),
            'keterangan' => $this->input->post('keterangan', true)
        );

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('pendadaran', $data);
    }

    public function getPendadaran($limit, $start, $keyword = null) {
        if ($keyword) {
            $this->db->like('nama', $keyword);
            $this->db->or_like('nim', $keyword);
        }

        return $this->db->get('pendadaran', $limit, $start)->result_array();
    }

    public function countAllPendadaran() {
        return $this->db->get('pendadaran')->num_rows();
    }

    public function cekStatusPendadaran($nim) {
        return $this->db->get_where('pendadaran', ['nim' => $nim])->row_array();
    }

//    public function cekBentrokPendadaranAll($dosen1, $dosen2, $ketuaPenguji, $sekretarisPenguji,$ruang) {
//        $this->db->or_where('dosen1', $dosen1);
//        $this->db->or_where('dosen1', $dosen2);
//        $this->db->or_where('dosen1', $ketuaPenguji);
//        $this->db->or_where('dosen1', $sekretarisPenguji);
//        $this->db->or_where('dosen2', $dosen1);
//        $this->db->or_where('dosen2', $dosen2);
//        $this->db->or_where('dosen2', $ketuaPenguji);
//        $this->db->or_where('dosen2', $sekretarisPenguji);
//        $this->db->or_where('ketuaPenguji', $dosen1);
//        $this->db->or_where('ketuaPenguji', $dosen2);
//        $this->db->or_where('ketuaPenguji', $ketuaPenguji);
//        $this->db->or_where('ketuaPenguji', $sekretarisPenguji);
//        $this->db->or_where('sekretarisPenguji', $dosen1);
//        $this->db->or_where('sekretarisPenguji', $dosen2);
//        $this->db->or_where('sekretarisPenguji', $ketuaPenguji);
//        $this->db->or_where('sekretarisPenguji', $sekretarisPenguji);
//        $this->db->where('ruang',$ruang);
//        return $this->db->get('pendadaran')->result_array();
//    }
//
//    public function cekBentrokPendadaranAll2($dosen1, $ketuaPenguji, $sekretarisPenguji,$ruang) {
//        $this->db->or_where('dosen1', $dosen1);
//        $this->db->or_where('dosen1', $ketuaPenguji);
//        $this->db->or_where('dosen1', $sekretarisPenguji);
//        $this->db->or_where('ketuaPenguji', $dosen1);
//        $this->db->or_where('ketuaPenguji', $ketuaPenguji);
//        $this->db->or_where('ketuaPenguji', $sekretarisPenguji);
//        $this->db->or_where('sekretarisPenguji', $dosen1);
//        $this->db->or_where('sekretarisPenguji', $ketuaPenguji);
//        $this->db->or_where('sekretarisPenguji', $sekretarisPenguji);
//        $this->db->where('ruang',$ruang);
//        return $this->db->get('pendadaran')->result_array();
//    }
//
//    public function cekBentrokPendadaranAll3($dosen1, $ketuaPenguji, $sekretarisPenguji,$anggotaPenguji,$ruang) {
//        $this->db->or_where('dosen1', $dosen1);      
//        $this->db->or_where('dosen1', $ketuaPenguji);
//        $this->db->or_where('dosen1', $sekretarisPenguji);      
//        $this->db->or_where('dosen1', $anggotaPenguji);      
//        $this->db->or_where('ketuaPenguji', $dosen1);       
//        $this->db->or_where('ketuaPenguji', $ketuaPenguji);
//        $this->db->or_where('ketuaPenguji', $sekretarisPenguji);
//        $this->db->or_where('ketuaPenguji', $anggotaPenguji);
//        $this->db->or_where('sekretarisPenguji', $dosen1);    
//        $this->db->or_where('sekretarisPenguji', $ketuaPenguji);
//        $this->db->or_where('sekretarisPenguji', $sekretarisPenguji);
//        $this->db->or_where('sekretarisPenguji', $anggotaPenguji);
//        $this->db->or_where('anggotaPenguji', $dosen1);    
//        $this->db->or_where('anggotaPenguji', $ketuaPenguji);
//        $this->db->or_where('anggotaPenguji', $sekretarisPenguji);
//        $this->db->or_where('anggotaPenguji', $anggotaPenguji);
//        $this->db->where('ruang',$ruang);
//        return $this->db->get('pendadaran')->result_array();
//    }
//    
//    public function cekBentrokPendadaranAll4($dosen1, $dosen2, $ketuaPenguji, $sekretarisPenguji,$anggotaPenguji,$ruang) {
//        $this->db->or_where('dosen1', $dosen1);
//        $this->db->or_where('dosen1', $dosen2);
//        $this->db->or_where('dosen1', $ketuaPenguji);
//        $this->db->or_where('dosen1', $sekretarisPenguji);
//        $this->db->or_where('dosen1', $anggotaPenguji);
//        $this->db->or_where('dosen2', $dosen1);
//        $this->db->or_where('dosen2', $dosen2);
//        $this->db->or_where('dosen2', $ketuaPenguji);
//        $this->db->or_where('dosen2', $sekretarisPenguji);
//        $this->db->or_where('dosen2', $anggotaPenguji);
//        $this->db->or_where('ketuaPenguji', $dosen1);
//        $this->db->or_where('ketuaPenguji', $dosen2);
//        $this->db->or_where('ketuaPenguji', $ketuaPenguji);
//        $this->db->or_where('ketuaPenguji', $sekretarisPenguji);
//        $this->db->or_where('ketuaPenguji', $anggotaPenguji);
//        $this->db->or_where('sekretarisPenguji', $dosen1);
//        $this->db->or_where('sekretarisPenguji', $dosen2);
//        $this->db->or_where('sekretarisPenguji', $ketuaPenguji);
//        $this->db->or_where('sekretarisPenguji', $sekretarisPenguji);
//        $this->db->or_where('sekretarisPenguji', $anggotaPenguji);
//        $this->db->or_where('anggotaPenguji', $dosen1);
//        $this->db->or_where('anggotaPenguji', $dosen2);
//        $this->db->or_where('anggotaPenguji', $ketuaPenguji);
//        $this->db->or_where('anggotaPenguji', $sekretarisPenguji);
//        $this->db->or_where('anggotaPenguji', $anggotaPenguji);
//        $this->db->where('ruang',$ruang);
//        return $this->db->get('pendadaran')->result_array();
//    }

    public function cekStatusRuang($durasi, $ruang) {
        $this->db->where('ruang', $ruang);
        $this->db->where('durasi', $durasi);
        return $this->db->get('pendadaran')->result_array();
    }

    public function cekStatusRuangEdit($durasi, $tanggal) {
        $this->db->or_where('ruang', $ruang);
        $this->db->or_where('durasi', $durasi);
        return $this->db->get('pendadaran')->result_array();
    }

}
