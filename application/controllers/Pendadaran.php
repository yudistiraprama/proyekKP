<?php

class Pendadaran extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pendadaran_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = "Jadwal Pendadaran";

        $this->load->model('Pendadaran_model', 'pendadaran');
        
        $this->load->library('pagination');

        if($this->input->post('submit')){
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        }else{
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

    public function tambah()
    {
        $data['judul'] = "Tambah Jadwal Pendadaran";
        $data['jam'] = ['07.00', '08.00', '09.00', '10.00', '11.00', '12.00', '13.00', '14.00', '15.00', '16.00', '17.00'];
        $data['ruang'] = ['Ruang Penelitian', 'Lab. Komputer Dasar', 'Lab. Basis Data', 'Lab. Jaringan Komputer'];

        $this->form_validation->set_rules('nama', 'Nama Mahasiswa', 'required');
        $this->form_validation->set_rules('nim', 'NIM Mahasiswa', 'required|numeric');
        $this->form_validation->set_rules('dosen1', 'Dosen Pembimbing 1', 'required');
        $this->form_validation->set_rules('dosen2', 'osen Pembimbing 1');
        $this->form_validation->set_rules('judul', 'Judul Tugas Akhir', 'required');
        $this->form_validation->set_rules('reviewer', 'Reviewer', 'required');
        $this->form_validation->set_rules('ketuaPenguji', 'Ketua Penguji', 'required');
        $this->form_validation->set_rules('sekretarisPenguji', 'Sekretaris Penguji', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        
        if( $this->form_validation->run() == FALSE ){
            $this->load->view('templates/header', $data);
            $this->load->view('pendadaran/tambah', $data);
            $this->load->view('templates/footer');
        }else{
            $this->Pendadaran_model->tambahJadwalPendadaran();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('pendadaran');
        }
        
    }

    public function hapus($id)
    {
        $this->Pendadaran_model->hapusJadwalPendadaran($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('pendadaran');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Jadwal Pendadaran';
        $data['pendadaran'] = $this->Pendadaran_model->getPendadaranByID($id);
        $this->load->view('templates/header', $data);
        $this->load->view('pendadaran/detail', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id)
    {
        $data['judul'] = "Edit Jadwal Pendadaran";
        $data['jam'] = ['07.00', '08.00', '09.00', '10.00', '11.00', '12.00', '13.00', '14.00', '15.00', '16.00', '17.00'];
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
        
        if( $this->form_validation->run() == FALSE ){
            $this->load->view('templates/header', $data);
            $this->load->view('pendadaran/edit', $data);
            $this->load->view('templates/footer');
        }else{
            $this->Pendadaran_model->editJadwalPendadaran();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('pendadaran');
        }
    }
}