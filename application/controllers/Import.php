<?php

class Import extends CI_Controller{
    public function index($nama = ' ')
    {
        $data["judul"] = "Import File Exel ke Database";
        $this->load->view("templates/header", $data);
        $this->load->view("import/index");
        $this->load->view("templates/footer");
    }
}