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
        $config['per_page'] = 20;

        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['kolokium'] = $this->kolokium->GetKolokium($config['per_page'], $data['start'], $data['keyword']);

        $this->load->view('templates/header', $data);
        $this->load->view('kolokium/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah($nim) {
        $data['judul'] = "Tambah Jadwal Kolokium";
        $data['jam'] = ['07.00', '08.00', '09.00', '10.00', '11.00', '12.00', '13.00', '14.00', '15.00', '16.00', '17.00'];
        $data['ruang'] = ['Ruang Penelitian', 'Lab. Komputer Dasar', 'Lab. Basis Data', 'Lab. Jaringan Komputer'];
        $data['dosen']=$this->Dosen_model->getAllDosen();
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
            $this->Kolokium_model->tambahJadwalKolokium();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('kolokium');
        }
    }

    public function inputNim() {
        $data['judul'] = "Tambah Jadwal Kolokium";
        $this->form_validation->set_rules('nim', 'NIM Mahasiswa', 'required|numeric');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('kolokium/inputNim', $data);
            $this->load->view('templates/footer');
        } else {
            $postData = $this->input->post();
            $nim = $postData['nim'];
            $this->tambah($nim);
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
        $data['jam'] = ['07.00', '08.00', '09.00', '10.00', '11.00', '12.00', '13.00', '14.00', '15.00', '16.00', '17.00'];
        $data['ruang'] = ['Ruang Penelitian', 'Lab. Komputer Dasar', 'Lab. Basis Data', 'Lab. Jaringan Komputer'];
        $data['kolokium'] = $this->Kolokium_model->getKolokiumByID($id);

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

}
