<?php

class Ruangan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Ruangan_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['judul'] = "Daftar Ruangan Ujian";

        $this->load->model('Ruangan_model', 'ruangan');

        $this->load->library('pagination');

        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        $this->db->like('nama', $data['keyword']);
        $this->db->from('ruangan');

        $config['base_url'] = 'http://localhost/proyekKP/ruangan/index';
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 10;

        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['ruangan'] = $this->ruangan->GetRuangan($config['per_page'], $data['start'], $data['keyword']);

        $this->load->view('templates/header', $data);
        $this->load->view('ruangan/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah() {
        $data['judul'] = "Tambah Ruangan Ujian";

        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('ruangan/tambah');
            $this->load->view('templates/footer');
        } else {
            $postData = $this->input->post();
            $arraydata = array(
                'nama' => $postData['nama']
            );
            $this->session->set_userdata($arraydata);
            $ruangan = $this->Ruangan_model->getAllRuangan();
            foreach ($ruangan as $r) {
                if ($r['nama'] == $postData['nama']) {
                    $this->session->set_flashdata('flash', $postData['nama'] . ' sudah ada');
                    redirect('ruangan/tambah');
                }
            }
            $this->Ruangan_model->tambahDataRuangan();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('ruangan');
        }
    }

    public function hapus($id) {
        $this->Ruangan_model->hapusDataRuangan($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('ruangan');
    }

    public function edit($id) {
        $data['judul'] = "Edit Ruangan Ujian";
        $data['ruangan'] = $this->Ruangan_model->getRuanganByID($id);

        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('ruangan/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $postData = $this->input->post();
            $arraydata = array(
                'nama' => $postData['nama']
            );
            $this->session->set_userdata($arraydata);
            $ruangan = $this->Ruangan_model->getAllRuangan();
            $data['ruangan'] = $this->Ruangan_model->getRuanganByID($id);
            foreach ($ruangan as $r) {
                if ($r['nama'] == $postData['nama']) {
                    $this->session->set_flashdata('flash', $postData['nama'] . ' sudah ada');
                    redirect('ruangan/edit/' . $data['ruangan']['idRuangan']);
                }
            }
            $this->Ruangan_model->editDataRuangan();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('ruangan');
        }
    }

}
