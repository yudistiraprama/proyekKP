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
        $config['per_page'] = 10;

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
            $data['ruang'] = $this->db->get('ruangan')->result_array();
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
            $this->form_validation->set_rules('anggotaPenguji', 'Anggota Penguji');
            $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('templates/header', $data);
                $this->load->view('pendadaran/tambah', $data);
                $this->load->view('templates/footer');
            } else {
                $postData = $this->input->post();
                $dosen1 = $postData['dosen1'];
                $dosen2 = $postData['dosen2'];
                $reviewer = $postData['reviewer'];
                $ketuaPenguji = $postData['ketuaPenguji'];
                $sekretarisPenguji = $postData['sekretarisPenguji'];
                $anggotaPenguji = $postData['anggotaPenguji'];
                $ruang = $postData['ruang'];
                $tanggal = format_indo($postData['tanggal']);
                $durasi = $postData['durasi'];
                $cekInputDosen = $this->cekInputDosen($reviewer, $ketuaPenguji, $sekretarisPenguji, $anggotaPenguji);

                switch ($cekInputDosen) {
                    case 0:
                        $this->session->set_userdata('nim', $nim);
                        $this->session->set_flashdata('rks', 'Reviewer tidak bisa menjadi Ketua Penguji dan Sekretaris Penguji disaat bersama');
                        redirect('pendadaran/tambahGagal');
                        break;
                    case 1:$this->session->set_userdata('nim', $nim);
                        $this->session->set_flashdata('rka', 'Reviewer tidak bisa menjadi Ketua Penguji dan Anggota Penguji disaat bersama');
                        redirect('pendadaran/tambahGagal');
                        break;
                    case 2:$this->session->set_userdata('nim', $nim);
                        $this->session->set_flashdata('rksa', 'Reviewer tidak bisa menjadi Ketua Penguji, Sekretaris Penguji, dan Anggota Penguji disaat bersama');
                        redirect('pendadaran/tambahGagal');
                        break;
                    case 3:$this->session->set_userdata('nim', $nim);
                        $this->session->set_flashdata('rks', 'Reviewer tidak bisa menjadi Ketua Penguji dan Sekretaris Penguji disaat bersama');
                        redirect('pendadaran/tambahGagal');
                        break;
                    case 4:$this->session->set_userdata('nim', $nim);
                        $this->session->set_flashdata('rsa', 'Reviewer tidak bisa menjadi Sekretaris Penguji dan Anggota Penguji disaat bersama');
                        redirect('pendadaran/tambahGagal');
                        break;
                    case 5:$this->session->set_userdata('nim', $nim);
                        $this->session->set_flashdata('rksa', 'Reviewer tidak bisa menjadi Ketua Penguji, Sekretaris Penguji, dan Anggota Penguji disaat bersama');
                        redirect('pendadaran/tambahGagal');
                        break;
                    case 6:$this->session->set_userdata('nim', $nim);
                        $this->session->set_flashdata('rka', 'Reviewer tidak bisa menjadi Ketua Penguji dan Anggota Penguji disaat bersama');
                        redirect('pendadaran/tambahGagal');
                        break;
                    case 7:$this->session->set_userdata('nim', $nim);
                        $this->session->set_flashdata('rka', 'Reviewer tidak bisa menjadi Sekretaris Penguji dan Anggota Penguji disaat bersama');
                        redirect('pendadaran/tambahGagal');
                        break;
                    case 8:$this->session->set_userdata('nim', $nim);
                        $this->session->set_flashdata('rksa', 'Reviewer tidak bisa menjadi Ketua Penguji, Sekretaris Penguji, dan Anggota Penguji disaat bersama');
                        redirect('pendadaran/tambahGagal');
                        break;
                    default:
                        if ($dosen2 == '' && $anggotaPenguji == '') {
                            $hasil = $this->cekBentrok2($dosen1, $ketuaPenguji, $sekretarisPenguji, $ruang, $tanggal, $durasi);
                        } elseif ($dosen2 != '' && $anggotaPenguji == '') {
                            $hasil = $this->cekBentrok($dosen1, $dosen2, $ketuaPenguji, $sekretarisPenguji, $ruang, $tanggal, $durasi);
                        } elseif ($dosen2 == '' && $anggotaPenguji != '') {
                            $hasil = $this->cekBentrok3($dosen1, $ketuaPenguji, $sekretarisPenguji, $anggotaPenguji, $ruang, $tanggal, $durasi);
                        } else {
                            $hasil = $this->cekBentrok4($dosen1, $dosen2, $ketuaPenguji, $sekretarisPenguji, $anggotaPenguji, $ruang, $tanggal, $durasi);
                        }
                        break;
                }


                if ($hasil != NULL) {
                    $this->session->set_userdata('nim', $nim);
                    $this->session->set_flashdata('bentrok', $hasil);
                    redirect('pendadaran/tambahGagal');
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

    public function tambahGagal() {
        $data['judul'] = "Tambah Jadwal Pendadaran";
        $data['jam'] = ['07.00-09.00', '08.00-10.00', '09.00-11.00', '10.00-12.00', '11.00-13.00', '12.00-14.00', '13.00-15.00', '14.00-16.00', '15.00-17.00'];
        $data['ruang'] = $this->db->get('ruangan')->result_array();
        $data['dosen'] = $this->Dosen_model->getAllDosen();
        $nim = $this->session->userdata('nim');
        $data['mahasiswa'] = $this->Kolokium_model->getKolokiumByNIM($nim);

        $this->form_validation->set_rules('nama', 'Nama Mahasiswa', 'required');
        $this->form_validation->set_rules('nim', 'NIM Mahasiswa', 'required|numeric');
        $this->form_validation->set_rules('dosen1', 'Dosen Pembimbing 1', 'required');
        $this->form_validation->set_rules('dosen2', 'Dosen Pembimbing 2');
        $this->form_validation->set_rules('judul', 'Judul Tugas Akhir', 'required');
        $this->form_validation->set_rules('reviewer', 'Reviewer', 'required');
        $this->form_validation->set_rules('ketuaPenguji', 'Ketua Penguji', 'required');
        $this->form_validation->set_rules('sekretarisPenguji', 'Sekretaris Penguji', 'required');
        $this->form_validation->set_rules('anggotaPenguji', 'Anggota Penguji');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('pendadaran/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $postData = $this->input->post();
            $dosen1 = $postData['dosen1'];
            $dosen2 = $postData['dosen2'];
            $reviewer = $postData['reviewer'];
            $ketuaPenguji = $postData['ketuaPenguji'];
            $sekretarisPenguji = $postData['sekretarisPenguji'];
            $anggotaPenguji = $postData['anggotaPenguji'];
            $ruang = $postData['ruang'];
            $tanggal = format_indo($postData['tanggal']);
            $durasi = $postData['durasi'];
            $cekInputDosen = $this->cekInputDosen($reviewer, $ketuaPenguji, $sekretarisPenguji, $anggotaPenguji);

            switch ($cekInputDosen) {
                case 0:
                    $this->session->set_userdata('nim', $nim);
                    $this->session->set_flashdata('rks', 'Reviewer tidak bisa menjadi Ketua Penguji dan Sekretaris Penguji disaat bersama');
                    redirect('pendadaran/tambahGagal');
                    break;
                case 1:
                    $this->session->set_userdata('nim', $nim);
                    $this->session->set_flashdata('rka', 'Reviewer tidak bisa menjadi Ketua Penguji dan Anggota Penguji disaat bersama');
                    redirect('pendadaran/tambahGagal');
                    break;
                case 2:
                    $this->session->set_userdata('nim', $nim);
                    $this->session->set_flashdata('rksa', 'Reviewer tidak bisa menjadi Ketua Penguji, Sekretaris Penguji, dan Anggota Penguji disaat bersama');
                    redirect('pendadaran/tambahGagal');
                    break;
                case 3:
                    $this->session->set_userdata('nim', $nim);
                    $this->session->set_flashdata('rks', 'Reviewer tidak bisa menjadi Ketua Penguji dan Sekretaris Penguji disaat bersama');
                    redirect('pendadaran/tambahGagal');
                    break;
                case 4:
                    $this->session->set_userdata('nim', $nim);
                    $this->session->set_flashdata('rsa', 'Reviewer tidak bisa menjadi Sekretaris Penguji dan Anggota Penguji disaat bersama');
                    redirect('pendadaran/tambahGagal');
                    break;
                case 5:
                    $this->session->set_userdata('nim', $nim);
                    $this->session->set_flashdata('rksa', 'Reviewer tidak bisa menjadi Ketua Penguji, Sekretaris Penguji, dan Anggota Penguji disaat bersama');
                    redirect('pendadaran/tambahGagal');
                    break;
                case 6:
                    $this->session->set_userdata('nim', $nim);
                    $this->session->set_flashdata('rka', 'Reviewer tidak bisa menjadi Ketua Penguji dan Anggota Penguji disaat bersama');
                    redirect('pendadaran/tambahGagal');
                    break;
                case 7:
                    $this->session->set_userdata('nim', $nim);
                    $this->session->set_flashdata('rka', 'Reviewer tidak bisa menjadi Sekretaris Penguji dan Anggota Penguji disaat bersama');
                    redirect('pendadaran/tambahGagal');
                    break;
                case 8:
                    $this->session->set_userdata('nim', $nim);
                    $this->session->set_flashdata('rksa', 'Reviewer tidak bisa menjadi Ketua Penguji, Sekretaris Penguji, dan Anggota Penguji disaat bersama');
                    redirect('pendadaran/tambahGagal');
                    break;
                default:
                    if ($dosen2 == '' && $anggotaPenguji == '') {
                        $hasil = $this->cekBentrok2($dosen1, $ketuaPenguji, $sekretarisPenguji, $ruang, $tanggal, $durasi);
                    } elseif ($dosen2 != '' && $anggotaPenguji == '') {
                        $hasil = $this->cekBentrok($dosen1, $dosen2, $ketuaPenguji, $sekretarisPenguji, $ruang, $tanggal, $durasi);
                    } elseif ($dosen2 == '' && $anggotaPenguji != '') {
                        $hasil = $this->cekBentrok3($dosen1, $ketuaPenguji, $sekretarisPenguji, $anggotaPenguji, $ruang, $tanggal, $durasi);
                    } else {
                        $hasil = $this->cekBentrok4($dosen1, $dosen2, $ketuaPenguji, $sekretarisPenguji, $anggotaPenguji, $ruang, $tanggal, $durasi);
                    }
                    break;
            }


            if ($hasil != NULL) {
                $this->session->set_userdata('nim', $nim);
                $this->session->set_flashdata('bentrok', $hasil);
                redirect('pendadaran/tambahGagal');
            } else {
                var_dump($cekInputDosen);
                $this->Pendadaran_model->tambahJadwalPendadaran();
                $this->session->set_flashdata('flash', 'Ditambahkan');
                redirect('pendadaran');
            }
        }
    }

    public function cekBentrok($dosen1, $dosen2, $ketuaPenguji, $sekretarisPenguji, $ruang, $tanggal, $durasi) {//ruang masih belum bisa dipakai
        $data1 = $this->Pendadaran_model->cekBentrokPendadaranAll($dosen1, $dosen2, $ketuaPenguji, $sekretarisPenguji, $ruang);
        $detail = NULL;
        $detailBentrok = "Ada bentrok jadwal pendadaran Mahasiswa";
        foreach ($data1 as $value) {
            if ($value['tanggal'] == $tanggal) {
                if ($value['ruang'] == $ruang) {
                    if ($value['durasi'] == $durasi) {
                        $detailBentrok = $detailBentrok . " karena " . $value['ruang'] . " dipakai oleh NIM =" . $value['nim'] . " dosbing1 = " . $value['dosen1'] . " dosbing2 = " . $value['dosen2'] . " Ketua Penguji = "
                                . $value['ketuaPenguji'] . " Sekrterais Penguji = " . $value['sekretarisPenguji'] . " pada tanggal " . $value['tanggal'] . " Jam = " . $value['jam'] . "";
                        $detail = $detailBentrok;
                    }
                } else {
                    if ($value['durasi'] == $durasi) {
                        $detailBentrok = $detailBentrok . " dengan NIM =" . $value['nim'] . " dosbing1 = " . $value['dosen1'] . " dosbing2 = " . $value['dosen2'] . " Ketua Penguji = "
                                . $value['ketuaPenguji'] . " Sekrterais Penguji = " . $value['sekretarisPenguji'] . " pada tanggal " . $value['tanggal'] . " Jam = " . $value['jam'] . " di ruang " . $value['ruang'] . "";
                        $detail = $detailBentrok;
                    }
                }
            }
        }return $detail;
    }

    public function cekBentrok2($dosen1, $ketuaPenguji, $sekretarisPenguji, $ruang, $tanggal, $durasi) {//ruang masih belum bisa dipakai
        $data1 = $this->Pendadaran_model->cekBentrokPendadaranAll2($dosen1, $ketuaPenguji, $sekretarisPenguji, $ruang);
        $detail = NULL;
        $detailBentrok = "Ada bentrok jadwal pendadaran Mahasiswa";
        foreach ($data1 as $value) {
            if ($value['tanggal'] == $tanggal) {
                if ($value['ruang'] == $ruang) {
                    if ($value['durasi'] == $durasi) {
                        $detailBentrok = $detailBentrok . " karena " . $value['ruang'] . " dipakai oleh NIM =" . $value['nim'] . " dosbing1 = " . $value['dosen1'] . " Ketua Penguji = "
                                . $value['ketuaPenguji'] . " Sekrterais Penguji = " . $value['sekretarisPenguji'] . " pada tanggal " . $value['tanggal'] . " Jam = " . $value['jam'] . "";
                        $detail = $detailBentrok;
                    }
                } else {
                    if ($value['durasi'] == $durasi) {
                        $detailBentrok = $detailBentrok . " dengan NIM =" . $value['nim'] . " dosbing1 = " . $value['dosen1'] . " Ketua Penguji = "
                                . $value['ketuaPenguji'] . " Sekrterais Penguji = " . $value['sekretarisPenguji'] . " pada tanggal " . $value['tanggal'] . " Jam = " . $value['jam'] . " di ruang " . $value['ruang'] . "";
                        $detail = $detailBentrok;
                    }
                }
            }
        }return $detail;
    }

    public function cekBentrok3($dosen1, $ketuaPenguji, $sekretarisPenguji, $anggotaPenguji, $ruang, $tanggal, $durasi) {//ruang masih belum bisa dipakai
        $data1 = $this->Pendadaran_model->cekBentrokPendadaranAll4($dosen1, $ketuaPenguji, $sekretarisPenguji, $anggotaPenguji, $ruang);
        $detail = NULL;
        $detailBentrok = "Ada bentrok jadwal pendadaran Mahasiswa";
        foreach ($data1 as $value) {
            if ($value['tanggal'] == $tanggal) {
                if ($value['ruang'] == $ruang) {
                    if ($value['durasi'] == $durasi) {
                        $detailBentrok = $detailBentrok . " karena " . $vvalue['ruang'] . " dipakai oleh NIM =" . $value['nim'] . " dosbing1 = " . $value['dosen1'] . " Ketua Penguji = "
                                . $value['ketuaPenguji'] . " Sekrterais Penguji = " . $value['sekretarisPenguji'] . " Anggota Penguji = " . $value['anggotaPenguji'] . " pada tanggal " . $value['tanggal'] . " Jam = " . $value['jam'] . "";
                        $detail = $detailBentrok;
                    }
                } else {
                    if ($value['durasi'] == $durasi) {
                        $detailBentrok = $detailBentrok . " dengan NIM =" . $value['nim'] . " dosbing1 = " . $value['dosen1'] . " Ketua Penguji = "
                                . $value['ketuaPenguji'] . " Sekrterais Penguji = " . $value['sekretarisPenguji'] . " Anggota Penguji = " . $value['anggotaPenguji'] . " pada tanggal " . $value['tanggal'] . " Jam = " . $value['jam'] . " di ruang " . $value['ruang'] . "";
                        $detail = $detailBentrok;
                    }
                }
            }
        }return $detail;
    }

    public function cekBentrok4($dosen1, $dosen2, $ketuaPenguji, $sekretarisPenguji, $anggotaPenguji, $ruang, $tanggal, $durasi) {//ruang masih belum bisa dipakai
        $data1 = $this->Pendadaran_model->cekBentrokPendadaranAll4($dosen1, $dosen2, $ketuaPenguji, $sekretarisPenguji, $anggotaPenguji, $ruang);
        $detail = NULL;
        $detailBentrok = "Ada bentrok jadwal pendadaran Mahasiswa";
        foreach ($data1 as $value) {
            if ($value['tanggal'] == $tanggal) {
                if ($value['ruang' == $ruang]) {
                    if ($value['durasi'] == $durasi) {
                        $detailBentrok = $detailBentrok . " karena ".$value['ruang']." dipakai oleh NIM =" . $value['nim'] . " dosbing1 = " . $value['dosen1'] . " dosbing2 = " . $value['dosen2'] . " Ketua Penguji = "
                                . $value['ketuaPenguji'] . " Sekrterais Penguji = " . $value['sekretarisPenguji'] . " Anggota Penguji = " . $value['anggotaPenguji'] . " pada tanggal " . $value['tanggal'] . " Jam = " . $value['jam'] ."";
                        $detail = $detailBentrok;
                    }
                } else {
                    if ($value['durasi'] == $durasi) {
                        $detailBentrok = $detailBentrok . " dengan NIM =" . $value['nim'] . " dosbing1 = " . $value['dosen1'] . " dosbing2 = " . $value['dosen2'] . " Ketua Penguji = "
                                . $value['ketuaPenguji'] . " Sekrterais Penguji = " . $value['sekretarisPenguji'] . " Anggota Penguji = " . $value['anggotaPenguji'] . " pada tanggal " . $value['tanggal'] . " Jam = " . $value['jam'] . " di ruang " . $value['ruang'] . "";
                        $detail = $detailBentrok;
                    }
                }
            }
        }return $detail;
    }

    public function cekInputDosen($reviewer, $ketuaPenguji, $sekretarisPenguji, $anggotaPenguji) {
        if ($reviewer == $ketuaPenguji) {
            if ($reviewer == $sekretarisPenguji) {
                return 0;
            } elseif ($reviewer == $anggotaPenguji) {
                return 1;
            } elseif ($reviewer == $sekretarisPenguji && $reviewer == $anggotaPenguji) {
                return 2;
            } else {
                return 9;
            }
        } elseif ($reviewer == $sekretarisPenguji) {
            if ($reviewer == $ketuaPenguji) {
                return 3;
            } elseif ($reviewer == $anggotaPenguji) {
                return 4;
            } elseif ($reviewer == $ketuaPenguji && $reviewer == $anggotaPenguji) {
                return 5;
            } else {
                return 9;
            }
        } elseif ($reviewer == $anggotaPenguji) {
            if ($reviewer == $ketuaPenguji) {
                return 6;
            } elseif ($reviewer == $sekretarisPenguji) {
                return 7;
            } elseif ($reviewer == $ketuaPenguji && $reviewer == $sekretarisPenguji) {
                return 8;
            } else {
                return 9;
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
        $data['jam'] = ['07.00-09.00', '08.00-10.00', '09.00-11.00', '10.00-12.00', '11.00-13.00', '12.00-14.00', '13.00-15.00', '14.00-16.00', '15.00-17.00'];
        $data['ruang'] = $this->db->get('ruangan')->result_array();
        $data['pendadaran'] = $this->Pendadaran_model->getPendadaranByID($id);
        $data['dosen'] = $this->Dosen_model->getAllDosen();

        $this->form_validation->set_rules('nama', 'Nama Mahasiswa', 'required');
        $this->form_validation->set_rules('nim', 'NIM Mahasiswa', 'required|numeric');
        $this->form_validation->set_rules('dosen1', 'Dosen Pembimbing 1', 'required');
        $this->form_validation->set_rules('dosen2', 'osen Pembimbing 1');
        $this->form_validation->set_rules('judul', 'Judul Tugas Akhir', 'required');
        $this->form_validation->set_rules('reviewer', 'Reviewer', 'required');
        $this->form_validation->set_rules('ketuaPenguji', 'Ketua Penguji', 'required');
        $this->form_validation->set_rules('sekretarisPenguji', 'Sekretaris Penguji', 'required');
        $this->form_validation->set_rules('anggotaPenguji', 'Anggota Penguji');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('pendadaran/edit', $data);
            $this->load->view('templates/footer');
        } else {

            $postData = $this->input->post();
            $dosen1 = $postData['dosen1'];
            $dosen2 = $postData['dosen2'];
            $reviewer = $postData['reviewer'];
            $judul = $postData['judul'];
            $ketuaPenguji = $postData['ketuaPenguji'];
            $sekretarisPenguji = $postData['sekretarisPenguji'];
            $anggotaPenguji = $postData['anggotaPenguji'];
            $tanggal = $postData['tanggal'];
            $durasi = $postData['durasi'];
            $cekInputDosen = $this->cekInputDosen($reviewer, $ketuaPenguji, $sekretarisPenguji, $anggotaPenguji);

            switch ($cekInputDosen) {
                case 0:
                    $this->session->set_userdata('id', $id);
                    $this->session->set_flashdata('rks', 'Reviewer tidak bisa menjadi Ketua Penguji dan Sekretaris Penguji disaat bersama');
                    redirect('pendadaran/editGagal');
                    break;
                case 1:
                    $this->session->set_userdata('id', $id);
                    $this->session->set_flashdata('rka', 'Reviewer tidak bisa menjadi Ketua Penguji dan Anggota Penguji disaat bersama');
                    redirect('pendadaran/editGagal');
                    break;
                case 2:
                    $this->session->set_userdata('id', $id);
                    $this->session->set_flashdata('rksa', 'Reviewer tidak bisa menjadi Ketua Penguji, Sekretaris Penguji, dan Anggota Penguji disaat bersama');
                    redirect('pendadaran/editGagal');
                    break;
                case 3:
                    $this->session->set_userdata('id', $id);
                    $this->session->set_flashdata('rks', 'Reviewer tidak bisa menjadi Ketua Penguji dan Sekretaris Penguji disaat bersama');
                    redirect('pendadaran/editGagal');
                    break;
                case 4:
                    $this->session->set_userdata('id', $id);
                    $this->session->set_flashdata('rsa', 'Reviewer tidak bisa menjadi Sekretaris Penguji dan Anggota Penguji disaat bersama');
                    redirect('pendadaran/editGagal');
                    break;
                case 5:
                    $this->session->set_userdata('id', $id);
                    $this->session->set_flashdata('rksa', 'Reviewer tidak bisa menjadi Ketua Penguji, Sekretaris Penguji, dan Anggota Penguji disaat bersama');
                    redirect('pendadaran/editGagal');
                    break;
                case 6:
                    $this->session->set_userdata('id', $id);
                    $this->session->set_flashdata('rka', 'Reviewer tidak bisa menjadi Ketua Penguji dan Anggota Penguji disaat bersama');
                    redirect('pendadaran/editGagal');
                    break;
                case 7:
                    $this->session->set_userdata('id', $id);
                    $this->session->set_flashdata('rka', 'Reviewer tidak bisa menjadi Sekretaris Penguji dan Anggota Penguji disaat bersama');
                    redirect('pendadaran/editGagal');
                    break;
                case 8:
                    $this->session->set_userdata('id', $id);
                    $this->session->set_flashdata('rksa', 'Reviewer tidak bisa menjadi Ketua Penguji, Sekretaris Penguji, dan Anggota Penguji disaat bersama');
                    redirect('pendadaran/editGagal');
                    break;
                default:
                    if ($dosen2 == '' && $anggotaPenguji == '') {
                        $hasil = $this->cekBentrok2($dosen1, $ketuaPenguji, $sekretarisPenguji, $ruang, $tanggal, $durasi);
                    } elseif ($dosen2 != '' && $anggotaPenguji == '') {
                        $hasil = $this->cekBentrok($dosen1, $dosen2, $ketuaPenguji, $sekretarisPenguji, $ruang, $tanggal, $durasi);
                    } elseif ($dosen2 == '' && $anggotaPenguji != '') {
                        $hasil = $this->cekBentrok3($dosen1, $ketuaPenguji, $sekretarisPenguji, $anggotaPenguji, $ruang, $tanggal, $durasi);
                    } else {
                        $hasil = $this->cekBentrok4($dosen1, $dosen2, $ketuaPenguji, $sekretarisPenguji, $anggotaPenguji, $ruang, $tanggal, $durasi);
                    }
                    break;
            }

            if ($hasil != NULL) {
                $this->session->set_userdata('id', $id);
                $this->session->set_flashdata('bentrok', $hasil);
                redirect('pendadaran/editGagal');
            } else {
                $this->Pendadaran_model->editJadwalPendadaran();
                $this->session->set_flashdata('flash', 'Diubah');
                redirect('pendadaran');
            }
        }
    }

    public function editGagal() {
        $data['judul'] = "Edit Jadwal Pendadaran";
        $data['jam'] = ['07.00-09.00', '08.00-10.00', '09.00-11.00', '10.00-12.00', '11.00-13.00', '12.00-14.00', '13.00-15.00', '14.00-16.00', '15.00-17.00'];
        $data['ruang'] = $this->db->get('ruangan')->result_array();
        $id = $this->session->userdata('id');
        $data['pendadaran'] = $this->Pendadaran_model->getPendadaranByID($id);
        $data['dosen'] = $this->Dosen_model->getAllDosen();

        $this->form_validation->set_rules('nama', 'Nama Mahasiswa', 'required');
        $this->form_validation->set_rules('nim', 'NIM Mahasiswa', 'required|numeric');
        $this->form_validation->set_rules('dosen1', 'Dosen Pembimbing 1', 'required');
        $this->form_validation->set_rules('dosen2', 'osen Pembimbing 1');
        $this->form_validation->set_rules('judul', 'Judul Tugas Akhir', 'required');
        $this->form_validation->set_rules('reviewer', 'Reviewer', 'required');
        $this->form_validation->set_rules('ketuaPenguji', 'Ketua Penguji', 'required');
        $this->form_validation->set_rules('sekretarisPenguji', 'Sekretaris Penguji', 'required');
        $this->form_validation->set_rules('anggotaPenguji', 'Anggota Penguji');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('pendadaran/edit', $data);
            $this->load->view('templates/footer');
        } else {

            $postData = $this->input->post();
            $dosen1 = $postData['dosen1'];
            $dosen2 = $postData['dosen2'];
            $reviewer = $postData['reviewer'];
            $judul = $postData['judul'];
            $ketuaPenguji = $postData['ketuaPenguji'];
            $sekretarisPenguji = $postData['sekretarisPenguji'];
            $anggotaPenguji = $postData['anggotaPenguji'];
            $tanggal = $postData['tanggal'];
            $durasi = $postData['durasi'];
            $cekInputDosen = $this->cekInputDosen($reviewer, $ketuaPenguji, $sekretarisPenguji, $anggotaPenguji);

            switch ($cekInputDosen) {
                case 0:
                    $this->session->set_userdata('id', $id);
                    $this->session->set_flashdata('rks', 'Reviewer tidak bisa menjadi Ketua Penguji dan Sekretaris Penguji disaat bersama');
                    redirect('pendadaran/editGagal');
                    break;
                case 1:
                    $this->session->set_userdata('id', $id);
                    $this->session->set_flashdata('rka', 'Reviewer tidak bisa menjadi Ketua Penguji dan Anggota Penguji disaat bersama');
                    redirect('pendadaran/editGagal');
                    break;
                case 2:
                    $this->session->set_userdata('id', $id);
                    $this->session->set_flashdata('rksa', 'Reviewer tidak bisa menjadi Ketua Penguji, Sekretaris Penguji, dan Anggota Penguji disaat bersama');
                    redirect('pendadaran/editGagal');
                    break;
                case 3:
                    $this->session->set_userdata('id', $id);
                    $this->session->set_flashdata('rks', 'Reviewer tidak bisa menjadi Ketua Penguji dan Sekretaris Penguji disaat bersama');
                    redirect('pendadaran/editGagal');
                    break;
                case 4:
                    $this->session->set_userdata('id', $id);
                    $this->session->set_flashdata('rsa', 'Reviewer tidak bisa menjadi Sekretaris Penguji dan Anggota Penguji disaat bersama');
                    redirect('pendadaran/editGagal');
                    break;
                case 5:
                    $this->session->set_userdata('id', $id);
                    $this->session->set_flashdata('rksa', 'Reviewer tidak bisa menjadi Ketua Penguji, Sekretaris Penguji, dan Anggota Penguji disaat bersama');
                    redirect('pendadaran/editGagal');
                    break;
                case 6:
                    $this->session->set_userdata('id', $id);
                    $this->session->set_flashdata('rka', 'Reviewer tidak bisa menjadi Ketua Penguji dan Anggota Penguji disaat bersama');
                    redirect('pendadaran/editGagal');
                    break;
                case 7:
                    $this->session->set_userdata('id', $id);
                    $this->session->set_flashdata('rka', 'Reviewer tidak bisa menjadi Sekretaris Penguji dan Anggota Penguji disaat bersama');
                    redirect('pendadaran/editGagal');
                    break;
                case 8:
                    $this->session->set_userdata('id', $id);
                    $this->session->set_flashdata('rksa', 'Reviewer tidak bisa menjadi Ketua Penguji, Sekretaris Penguji, dan Anggota Penguji disaat bersama');
                    redirect('pendadaran/editGagal');
                    break;
                default:
                    if ($dosen2 == '' && $anggotaPenguji == '') {
                        $hasil = $this->cekBentrok2($dosen1, $ketuaPenguji, $sekretarisPenguji, $ruang, $tanggal, $durasi);
                    } elseif ($dosen2 != '' && $anggotaPenguji == '') {
                        $hasil = $this->cekBentrok($dosen1, $dosen2, $ketuaPenguji, $sekretarisPenguji, $ruang, $tanggal, $durasi);
                    } elseif ($dosen2 == '' && $anggotaPenguji != '') {
                        $hasil = $this->cekBentrok3($dosen1, $ketuaPenguji, $sekretarisPenguji, $anggotaPenguji, $ruang, $tanggal, $durasi);
                    } else {
                        $hasil = $this->cekBentrok4($dosen1, $dosen2, $ketuaPenguji, $sekretarisPenguji, $anggotaPenguji, $ruang, $tanggal, $durasi);
                    }
                    break;
            }

            if ($hasil != 1) {
                $this->session->set_userdata('id', $id);
                $this->session->set_flashdata('bentrok', $hasil);
                redirect('pendadaran/editGagal');
            } else {
                $this->Pendadaran_model->editJadwalPendadaran();
                $this->session->set_flashdata('flash', 'Diubah');
                redirect('pendadaran');
            }
        }
    }

    public function pdf($id) {
        $this->load->library('dompdf_gen');
        $data['pendadaran'] = $this->Pendadaran_model->getPendadaranById($id);
        $mahasiswa = $data['pendadaran']['nim'];
        $filename = 'Detail_Jadwal_Pendadaran_' . $mahasiswa . '.pdf';
        $this->load->view('pendadaran/detail_pdf', $data);
        $paper_size = 'A4';
        $oreintation = 'potrait';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $oreintation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream($filename, array('Attachment' => 0));
    }

    public function undangan($id) {
        $this->load->library('dompdf_gen');
        $data['pendadaran'] = $this->Pendadaran_model->getPendadaranById($id);
        $mahasiswa = $data['pendadaran']['nim'];
        $filename = 'Undangan_Pendadaran_' . $mahasiswa . '.pdf';
        $this->load->view('pendadaran/undangan_pdf', $data);

        $paper_size = 'A4';
        $oreintation = 'potrait';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $oreintation);
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream($filename, array('Attachment' => 0));
    }

    public function undangantxt($id) {
        $data['pendadaran'] = $this->Pendadaran_model->getPendadaranByID($id);
        $mahasiswa = $data['pendadaran']['nim'];
        $filename = 'Undangan_Pendadaran_' . $mahasiswa . '.txt';

        header('Content-type:text/plain');
        header('COntent-Disposition: attachment;filename=' . $filename);
        header('Cache-Control: no-store, no-chace, must-revalidate');
        header('Cache-Control: post-check=0, pre-check=0');
        header('Pragma: no-cache');
        header('Expires:0');

        $handle = fopen('php://output', 'w');

        $data['undangan'] = $this->load->view('pendadaran/undangan_txt', $data);
    }

    public function report() {
        $data['judul'] = 'Report  Jadwal Pendadaran';
        $data['bulan'] = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember',];
        $data['ruang'] = $this->db->get('ruangan')->result_array();
        $data['dosen'] = $this->Dosen_model->getAllDosen();
        $this->load->view('templates/header', $data);
        $this->load->view('pendadaran/report');
        $this->load->view('templates/footer');
    }

}
