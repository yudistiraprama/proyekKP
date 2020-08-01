<?php

class Pendadaran_model extends CI_model {

    public function getAllPendadaran() {
        return $this->db->get('pendadaran')->result_array();
    }

    public function tambahJadwalPendadaran() {
//        $tanggal = $this->input->post('tanggal', true);
//        $tgl = format_indo($tanggal);

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
            'tanggal' => $this->input->post('tanggal', true),
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

    public function getPendadaranByNIM($nim) {
        return $this->db->get_where('pendadaran', ['nim' => $nim])->row_array();
    }

    public function getPendadaranByID($id) {
        return $this->db->get_where('pendadaran', ['id' => $id])->row_array();
    }

    public function editJadwalPendadaran() {
//        $tanggal = $this->input->post('tanggal', true);
//        $tgl = format_indo($tanggal);

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
            'tanggal' => $this->input->post('tanggal', true),
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
        $this->db->order_by('id', 'DESC');
        return $this->db->get('pendadaran', $limit, $start)->result_array();
    }

    public function countAllPendadaran() {
        return $this->db->get('pendadaran')->num_rows();
    }

    public function cekStatusPendadaran($nim) {
        return $this->db->get_where('pendadaran', ['nim' => $nim])->row_array();
    }

    public function cekStatusRuang($tanggal) {
        $this->db->where('tanggal', $tanggal);
//        $this->db->where('durasi', $durasi);
        return $this->db->get('pendadaran')->result_array();
    }

    public function cekStatusRuangEdit($tanggal, $durasi) {
        $this->db->or_where('tanggal', $tanggal);
        $this->db->or_where('durasi', $durasi);
        return $this->db->get('pendadaran')->result_array();
    }
    
    public function cekStatusRuangEdit2($tanggal,$durasi,$ruang){
        $this->db->where('tanggal',$tanggal);
        $this->db->where('durasi',$durasi);
        $this->db->where('ruang',$ruang);
        return $this->db->get('pendadaran')->result_array();
    }
    public function cekStatusRuangEdit3($tanggal,$ruang){
        $this->db->where('tanggal',$tanggal);
        $this->db->where('ruang',$ruang);
        return $this->db->get('pendadaran')->result_array();
    }

    public function getPendadaranReport($statement) {
        $query = " SELECT * FROM pendadaran WHERE " . $statement;

        return $this->db->query($query)->result_array();
    }

    public function getJumlahReport($statement) {
        return count($this->getPendadaranReport($statement));
    }

}
