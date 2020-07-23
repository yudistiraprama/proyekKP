<?php

class Kolokium_model extends CI_model {

    public function getAllKolokium() {
        return $this->db->get('kolokium')->result_array();
    }

    public function tambahJadwalKolokium() {
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

    public function hapusJadwalKolokium($id) {
        $this->db->where('id', $id);
        $this->db->delete('kolokium');
    }

    public function getKolokiumByID($id) {
        return $this->db->get_where('kolokium', ['id' => $id])->row_array();
    }

    public function getKolokiumByNIM($nim) {
        return $this->db->get_where('kolokium', ['nim' => $nim])->row_array();
    }

    public function editJadwalKolokium() {
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

    public function getKolokium($limit, $start, $keyword = null) {
        if ($keyword) {
            $this->db->like('nama', $keyword);
            $this->db->or_like('nim', $keyword);
        }
        $this->db->order_by('id', 'DESC');
        return $this->db->get('kolokium', $limit, $start)->result_array();
    }

    public function countAllKolokium() {
        return $this->db->get('kolokium')->num_rows();
    }

    public function cekStatusKolokium($nim) {
        return $this->db->get_where('kolokium', ['nim' => $nim])->row_array();
    }

    public function cekBentrokKolokiumAll($dosen1, $dosen2, $reviewer) {
        $this->db->or_where('dosen1', $dosen1);
        $this->db->or_where('dosen1', $dosen2);
        $this->db->or_where('dosen1', $reviewer);
        $this->db->or_where('dosen2', $dosen1);
        $this->db->or_where('dosen2', $dosen2);
        $this->db->or_where('dosen2', $reviewer);
        $this->db->or_where('reviewer', $dosen1);
        $this->db->or_where('reviewer', $dosen2);
        $this->db->or_where('reviewer', $reviewer);

        return $this->db->get('kolokium')->result_array();
    }

    public function cekBentrokKolokiumAll2($dosen1, $reviewer) {
        $this->db->or_where('dosen1', $dosen1);
        $this->db->or_where('dosen1', $reviewer);
        $this->db->or_where('reviewer', $dosen1);
        $this->db->or_where('reviewer', $reviewer);

        return $this->db->get('kolokium')->result_array();
    }

    public function cekStatusRuang($tanggal, $durasi) {
        $this->db->where('tanggal', $tanggal);
        $this->db->where('durasi', $durasi);
        return $this->db->get('kolokium')->result_array();
    }

    public function cekStatusRuangEdit($tanggal, $durasi) {
        $this->db->or_where('tanggal', $tanggal);
        $this->db->or_where('durasi', $durasi);
        return $this->db->get('kolokium')->result_array();
    }

    public function getKolokiumReport() {
        $bln = $this->session->userdata('bulan');
        $dosen1 = $this->session->userdata('dosen1');
        $dosen2 = $this->session->userdata('dosen2');
        $reviewer = $this->session->userdata('reviewer');

        if ($bln != NULL && $dosen1 == NULL && $dosen2 == NULL && $reviewer == NULL) {
            $this->db->like('tanggal', $bln);
            return $this->db->get('kolokium')->result_array();
        } else if ($bln == NULL && $dosen1 != NULL && $dosen2 == NULL && $reviewer == NULL) {
            $this->db->like('dosen1', $dosen1);
            return $this->db->get('kolokium')->result_array();
        } else if ($bln == NULL && $dosen1 == NULL && $dosen2 != NULL && $reviewer == NULL) {
            $this->db->like('dosen2', $dosen2);
            return $this->db->get('kolokium')->result_array();
        } elseif ($bln == NULL && $dosen1 == NULL && $dosen2 == NULL && $reviewer != NULL) {
            $this->db->like('reviewer', $reviewer);
            return $this->db->get('kolokium')->result_array();
        } elseif ($bln != NULL && $dosen1 != NULL && $dosen2 == NULL && $reviewer == NULL) {
            $sql = "SELECT * FROM kolokium WHERE tanggal LIKE '%" . $bln . "%' AND dosen1 ='" . $dosen1 . "'";
            return $this->db->query($sql)->result_array();
        } elseif ($bln != NULL && $dosen1 == NULL && $dosen2 != NULL && $reviewer == NULL) {
            $sql = "SELECT * FROM kolokium WHERE tanggal LIKE '%" . $bln . "%' AND dosen2 ='" . $dosen2 . "'";
            return $this->db->query($sql)->result_array();
        } elseif ($bln != NULL && $dosen1 == NULL && $dosen2 == NULL && $reviewer != NULL) {
            $sql = "SELECT * FROM kolokium WHERE tanggal LIKE '%" . $bln . "%' AND reviewer ='" . $reviewer . "'";
            return $this->db->query($sql)->result_array();
        } elseif ($bln != NULL && $dosen1 != NULL && $dosen2 != NULL && $reviewer == NULL) {
            $sql = "SELECT * FROM kolokium WHERE tanggal LIKE '%" . $bln . "%' AND dosen1 ='" . $dosen1 . "' AND dosen2 ='" . $dosen2 . "'";
            return $this->db->query($sql)->result_array();
        } elseif ($bln != NULL && $dosen1 != NULL && $dosen2 == NULL && $reviewer != NULL) {
            $sql = "SELECT * FROM kolokium WHERE tanggal LIKE '%" . $bln . "%' AND dosen1 ='" . $dosen1 . "' AND reviewer ='" . $reviewer . "'";
            return $this->db->query($sql)->result_array();
        } elseif ($bln != NULL && $dosen1 == NULL && $dosen2 != NULL && $reviewer != NULL) {
            $sql = "SELECT * FROM kolokium WHERE tanggal LIKE '%" . $bln . "%' AND dosen2 ='" . $dosen2 . "' AND reviewer ='" . $reviewer . "'";
            return $this->db->query($sql)->result_array();
        } elseif ($bln == NULL && $dosen1 != NULL && $dosen2 != NULL && $reviewer == NULL) {
            $sql = "SELECT * FROM kolokium WHERE dosen1 ='" . $dosen1 . "' AND dosen2 ='" . $dosen2 . "'";
            return $this->db->query($sql)->result_array();
        } elseif ($bln == NULL && $dosen1 != NULL && $dosen2 == NULL && $reviewer != NULL) {
            $sql = "SELECT * FROM kolokium WHERE dosen1 ='" . $dosen1 . "' AND reviewer ='" . $reviewer . "'";
            return $this->db->query($sql)->result_array();
        } elseif ($bln == NULL && $dosen1 == NULL && $dosen2 != NULL && $reviewer != NULL) {
            $sql = "SELECT * FROM kolokium WHERE dosen2 ='" . $dosen2 . "' AND reviewer ='" . $reviewer . "'";
            return $this->db->query($sql)->result_array();
        } elseif ($bln == NULL && $dosen1 != NULL && $dosen2 != NULL && $reviewer != NULL) {
            $sql = "SELECT * FROM kolokium WHERE dosen1 ='" . $dosen1 . "' AND dosen2 ='" . $dosen2 . "'AND reviewer ='" . $reviewer . "'";
            return $this->db->query($sql)->result_array();
        } else {
            $sql = "SELECT * FROM kolokium WHERE tanggal LIKE '%" . $bln . "%' AND dosen1 ='" . $dosen1 . "'AND dosen2 ='" . $dosen2 . "'AND reviewer ='" . $reviewer . "'";
            return $this->db->query($sql)->result_array();
        }
    }
    
    public function getJumlahReport() {
        return count($this->getKolokiumReport());
    }

}
