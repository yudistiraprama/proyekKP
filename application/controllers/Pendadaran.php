<?php

class Pendadaran extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Pendadaran_model');
        $this->load->model('Kolokium_model');
        $this->load->model('Dosen_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['judul'] = "Jadwal Pendadaran";

        $this->load->model('Pendadaran_model', 'pendadaran');

        $this->load->library('pagination');

        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        $this->db->like('nama', $data['keyword']);
        $this->db->or_like('nim', $data['keyword']);
        $this->db->from('pendadaran');

        $config['base_url'] = 'http://localhost/proyekKP/pendadaran/index';
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 20;

        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['pendadaran'] = $this->pendadaran->GetPendadaran($config['per_page'], $data['start'], $data['keyword']);

        $this->load->view('templates/header', $data);
        $this->load->view('pendadaran/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah($nim) {
        if ($this->Pendadaran_model->cekStatusPendadaran($nim) == NULL) {
            $data['judul'] = "Tambah Jadwal Pendadaran";
            $data['jam'] = ['07.00-09.00', '08.00-10.00', '09.00-11.00', '10.00-12.00', '11.00-13.00', '12.00-14.00', '13.00-15.00', '14.00-16.00', '15.00-17.00'];
            $data['ruang'] = ['Ruang Penelitian', 'Lab. Komputer Dasar', 'Lab. Basis Data', 'Lab. Jaringan Komputer'];
            $data['dosen'] = $this->Dosen_model->getAllDosen();
            $data['mahasiswa'] = $this->Kolokium_model->getKolokiumByNIM($nim);

            $this->form_validation->set_rules('nama', 'Nama Mahasiswa', 'required');
            $this->form_validation->set_rules('nim', 'NIM Mahasiswa', 'required|numeric');
            $this->form_validation->set_rules('dosen1', 'Dosen Pembimbing 1', 'required');
            $this->form_validation->set_rules('dosen2', 'Dosen Pembimbing 2');
            $this->form_validation->set_rules('judul', 'Judul Tugas Akhir', 'required');
            $this->form_validation->set_rules('reviewer', 'Reviewer', 'required');
            $this->form_validation->set_rules('ketuaPenguji', 'Ketua Penguji', 'required');
            $this->form_validation->set_rules('sekretarisPenguji', 'Sekretaris Penguji', 'required');
            $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('templates/header', $data);
                $this->load->view('pendadaran/tambah', $data);
                $this->load->view('templates/footer');
            } else {
                $postData = $this->input->post();
                $dosen1 = $postData['dosen1'];
                $dosen2 = $postData['dosen2'];
                $ketuaPenguji = $postData['ketuaPenguji'];
                $sekretarisPenguji = $postData['sekretarisPenguji'];
                $ruang = $postData['ruang'];
                $tanggal = $postData['tanggal'];
                $durasi = $postData['durasi'];
                if ($dosen2 == '') {
                    $hasil = $this->cekBentrok($dosen1, $dosen2, $ketuaPenguji, $sekretarisPenguji, $ruang, $tanggal, $durasi);
                } else {
                    $hasil = $this->cekBentrok2($dosen1, $dosen2, $ketuaPenguji, $sekretarisPenguji, $ruang, $tanggal, $durasi);
                }

                if ($hasil == 0) {
                    $this->session->set_flashdata('bentrok', 'Ada Bentrok Jadwal');
                    redirect('pendadaran');
                } else {
                    $this->Pendadaran_model->tambahJadwalPendadaran();
                    $this->session->set_flashdata('flash', 'Ditambahkan');
                    redirect('pendadaran');
                }
            }
        } else {
            $this->session->set_flashdata('terdaftar', 'Mahasiswa telah terdaftar untuk Pendadaran');
            redirect('pendadaran');
        }
    }

    public function cekBentrok($dosen1, $dosen2, $ketuaPenguji, $sekretarisPenguji, $ruang, $tanggal, $durasi) {//ruang masih belum bisa dipakai dan masih error lgi
        $data1 = $this->Pendadaran_model->cekBentrokPendadaranAll($dosen1, $dosen2, $ketuaPenguji, $sekretarisPenguji);
        foreach ($data1 as $dt) {
            if ($dt['tanggal'] == $tanggal) {
                if ($dt['durasi'] == $durasi) {
                    return 0;
                } else {
                    return 1;
                }
            }
        }
    }
    public function cekBentrok2($dosen1, $ketuaPenguji, $sekretarisPenguji, $ruang, $tanggal, $durasi){//ruang masih belum bisa dipakai dan masih error lgi
       $data1 = $this->Pendadaran_model->cekBentrokPendadaranAll2($dosen1, $ketuaPenguji, $sekretarisPenguji);
        foreach ($data1 as $dt) {
            if ($dt['tanggal'] == $tanggal) {
                if ($dt['durasi'] == $durasi) {
                    return 0;
                } else {
                    return 1;
                }
            }
        } 
    }

    public function inputNim() {
        $data['judul'] = "Tambah Jadwal Pendadaran";
        $data['form'] = 'Form Tambah Jadwal Pendadaran';
        $this->form_validation->set_rules('nim', 'NIM Mahasiswa', 'required|numeric');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/inputNim', $data);
            $this->load->view('templates/footer');
        } else {
            $postData = $this->input->post();
            $nim = $postData['nim'];
            if ($this->Kolokium_model->getKolokiumByNIM($nim) != null) {
                $this->tambah($nim);
            } else {
                $this->session->set_flashdata('PendadarantidakAda', 'Mahasiswa belum melakukan Kolokium');
                redirect('pendadaran/inputNim');
            }
        }
    }

    public function hapus($id) {
        $this->Pendadaran_model->hapusJadwalPendadaran($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('pendadaran');
    }

    public function detail($id) {
        $data['judul'] = 'Detail Jadwal Pendadaran';
        $data['pendadaran'] = $this->Pendadaran_model->getPendadaranByID($id);


        $this->load->view('templates/header', $data);
        $this->load->view('pendadaran/detail', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id) {
        $data['judul'] = "Edit Jadwal Pendadaran";
        $data['jam'] = ['07.00-08.00', '08.00-09.00', '09.00-10.00', '10.00-11.00', '11.00-12.00', '12.00-13.00', '13.00-14.00', '14.00-15.00', '15.00-16.00', '16.0-17.00'];
        $data['ruang'] = ['Ruang Penelitian', 'Lab. Komputer Dasar', 'Lab. Basis Data', 'Lab. Jaringan Komputer'];
        $data['pendadaran'] = $this->Pendadaran_model->getPendadaranByID($id);

        $this->form_validation->set_rules('nama', 'Nama Mahasiswa', 'required');
        $this->form_validation->set_rules('nim', 'NIM Mahasiswa', 'required|numeric');
        $this->form_validation->set_rules('dosen1', 'Dosen Pembimbing 1', 'required');
        $this->form_validation->set_rules('dosen2', 'osen Pembimbing 1');
        $this->form_validation->set_rules('judul', 'Judul Tugas Akhir', 'required');
        $this->form_validation->set_rules('reviewer', 'Reviewer', 'required');
        $this->form_validation->set_rules('ketuaPenguji', 'Ketua Penguji', 'required');
        $this->form_validation->set_rules('sekretarisPenguji', 'Sekretaris Penguji', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('pendadaran/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Pendadaran_model->editJadwalPendadaran();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('pendadaran');
        }
    }

    public function pdf($id) {
        $this->load->library('dompdf_gen');
        $data['pendadaran'] = $this->Pendadaran_model->getPendadaranById($id);
        $this->load->view('pendadaran/detail_pdf', $data);

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
        $data['pendadaran'] = $this->Pendadaran_model->getPendadaranById($id);
        $this->load->view('pendadaran/undangan_pdf', $data);

        $paper_size = 'A4';
        $oreintation = 'potrait';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $oreintation);
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream('Undangan_Pendadaran.pdf', array('Attachment' => 0));
    }

}
