<?php

class Kolokium extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Kolokium_model');
        $this->load->model('Mahasiswa_model');
        $this->load->model('Dosen_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['judul'] = "Jadwal Kolokium";

        $this->load->model('Kolokium_model', 'kolokium');

        $this->load->library('pagination');

        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        $this->db->like('nama', $data['keyword']);
        $this->db->or_like('nim', $data['keyword']);
        $this->db->from('kolokium');

        $config['base_url'] = 'http://localhost/proyekKP/kolokium/index';
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 10;

        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['kolokium'] = $this->kolokium->GetKolokium($config['per_page'], $data['start'], $data['keyword']);

        $this->load->view('templates/header', $data);
        $this->load->view('kolokium/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah($nim) {
        if ($this->Kolokium_model->cekStatusKolokium($nim) == NULL) {
            $data['judul'] = "Tambah Jadwal Kolokium";
            $data['jam'] = ['07.00-08.00', '08.00-09.00', '09.00-10.00', '10.00-11.00', '11.00-12.00', '12.00-13.00', '13.00-14.00', '14.00-15.00', '15.00-16.00', '16.00-17.00'];
            $data['ruang'] = ['Ruang Penelitian', 'Lab. Komputer Dasar', 'Lab. Basis Data', 'Lab. Jaringan Komputer'];
            $data['dosen'] = $this->Dosen_model->getAllDosen();
            $data['mahasiswa'] = $this->Mahasiswa_model->getMahasiswaByNIM($nim);

            $this->form_validation->set_rules('nama', 'Nama Mahasiswa', 'required');
            $this->form_validation->set_rules('nim', 'NIM Mahasiswa', 'required|numeric');
            $this->form_validation->set_rules('dosen1', 'Dosen Pembimbing 1', 'required');
            $this->form_validation->set_rules('dosen2', 'Dosen Pembimbing 2');
            $this->form_validation->set_rules('judul', 'Judul Tugas Akhir', 'required');
            $this->form_validation->set_rules('reviewer', 'Reviewer', 'required');
            $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('templates/header', $data);
                $this->load->view('kolokium/tambah', $data);
                $this->load->view('templates/footer');
            } else {
                $postData = $this->input->post();
                $dosen1 = $postData['dosen1'];
                $dosen2 = $postData['dosen2'];
                $reviewer = $postData['reviewer'];
                $ruang = $postData['ruang'];
                $tanggal = $postData['tanggal'];
                $durasi = $postData['durasi'];
                $cekDosen=$this->cekInputKolokium($dosen1, $dosen2, $reviewer);
                if($cekDosen==0){
                    $this->session->set_flashdata('dosen1Sama','Dosen pembimbing 1 tidak boleh sama dengan Dosen pembimbing 2');
                    redirect('kolokium');
                }elseif($cekDosen==1){
                    $this->session->set_flashdata('dosenReviewerSama','Dosen pembimbing tidak boleh sama dengan Dosen reviewer');
                    redirect('kolokium');
                }elseif($cekDosen==2){
                    $this->session->set_flashdata('dosen2Sama','Dosen pembimbing 2 tidak boleh sama dengan Dosen reviewer');
                    redirect('kolokium');
                }elseif($cekDosen==3){
                    if ($dosen2 == '') {
                        $hasil = $this->cekBentrok2($dosen1, $reviewer, $ruang, $tanggal, $durasi);
                    } else {
                        $hasil = $this->cekBentrok($dosen1, $dosen2, $reviewer, $ruang, $tanggal, $durasi);
                    }
                }
                if ($hasil == 0) {
                    $this->session->set_flashdata('bentrok', 'Jadwal Dosen Bertabrakan');
                    redirect('kolokium');
                } else {
                    $this->Kolokium_model->tambahJadwalKolokium();
                    $this->session->set_flashdata('flash', 'Ditambahkan');
                    redirect('kolokium');
                }
            }
        } else {
            $this->session->set_flashdata('terdaftar', 'Mahasiswa Telah terdaftar Kolokium');
            redirect('kolokium');
        }
    }

    public function cekBentrok($dosen1, $dosen2, $reviewer, $ruang, $tanggal, $durasi) {//ruang masih belum bisa dipakai
        $data1 = $this->Kolokium_model->cekBentrokKolokiumAll($dosen1, $dosen2, $reviewer);
        foreach ($data1 as $dt) {
            if ($dt['tanggal'] == $tanggal) {
                if ($dt['durasi'] == $durasi) {
                    return 0;
                }
            }
        }return 1;
    }

    public function cekBentrok2($dosen1, $reviewer, $ruang, $tanggal, $durasi) {//ruang masih belum bisa dipakai
        $data1 = $this->Kolokium_model->cekBentrokKolokiumAll2($dosen1, $reviewer);
        foreach ($data1 as $dt) {
            if ($dt['tanggal'] == $tanggal) {
                if ($dt['durasi'] == $durasi) {
                    return 0;
                }
            }
        }return 1;
    }

    public function cekInputKolokium($dosen1, $dosen2, $reviewer) {
        if ($dosen1 == $dosen2) {
            return 0;
        } elseif ($dosen1 == $reviewer) {
            return 1;
        } elseif ($dosen2 == $reviewer) {
            return 2;
        }else{
            return 3;
        }
    }

    public function inputNim() {
        $data['judul'] = "Tambah Jadwal Kolokium";
        $data['form'] = 'Form Tambah Jadwal Kolokium';
        $this->form_validation->set_rules('nim', 'NIM Mahasiswa', 'required|numeric');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/inputNim', $data);
            $this->load->view('templates/footer');
        } else {
            $postData = $this->input->post();
            $nim = $postData['nim'];
            if ($this->Mahasiswa_model->getMahasiswaByNIM($nim) != null) {
                $this->tambah($nim);
            } else {
                $this->session->set_flashdata('KolokiumtidakAda', 'Mahasiswa tidak ditemukan');
                redirect('kolokium/inputNim');
            }
        }
    }

    public function hapus($id) {
        $this->Kolokium_model->hapusJadwalKolokium($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('kolokium');
    }

    public function detail($id) {
        $data['judul'] = 'Detail  Jadwal Kolokium';
        $data['kolokium'] = $this->Kolokium_model->getKolokiumByID($id);
        $this->load->view('templates/header', $data);
        $this->load->view('kolokium/detail', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id) {
        $data['judul'] = "Edit Jadwal Kolokium";
        $data['jam'] = ['07.00-08.00', '08.00-09.00', '09.00-10.00', '10.00-11.00', '11.00-12.00', '12.00-13.00', '13.00-14.00', '14.00-15.00', '15.00-16.00', '16.0-17.00'];
        $data['ruang'] = ['Ruang Penelitian', 'Lab. Komputer Dasar', 'Lab. Basis Data', 'Lab. Jaringan Komputer'];
        $data['kolokium'] = $this->Kolokium_model->getKolokiumByID($id);
        $data['dosen']=$this->Dosen_model->getAllDosen();

        $this->form_validation->set_rules('nama', 'Nama Mahasiswa', 'required');
        $this->form_validation->set_rules('nim', 'NIM Mahasiswa', 'required|numeric');
        $this->form_validation->set_rules('dosen1', 'Dosen Pembimbing 1', 'required');
        $this->form_validation->set_rules('dosen2', 'osen Pembimbing 1');
        $this->form_validation->set_rules('judul', 'Judul Tugas Akhir', 'required');
        $this->form_validation->set_rules('reviewer', 'Reviewer', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('kolokium/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Kolokium_model->editJadwalKolokium();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('kolokium');
        }
    }

    public function pdf($id) {
        $this->load->library('dompdf_gen');
        $data['kolokium'] = $this->Kolokium_model->getKolokiumByID($id);
        $this->load->view('kolokium/detail_pdf', $data);

        $paper_size = 'A4';
        $oreintation = 'potrait';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $oreintation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream('Detail_Mahasiswa.pdf', array('Attachment' => 0));
    }

    public function undangan($id) {
        $this->load->library('dompdf_gen');
        $data['kolokium'] = $this->Kolokium_model->getKolokiumByID($id);
        $this->load->view('kolokium/undangan_pdf', $data);

        $paper_size = 'A4';
        $oreintation = 'potrait';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $oreintation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream('Undangan_Kolokium.pdf', array('Attachment' => 0));
    }

}
