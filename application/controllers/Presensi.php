<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Presensi extends CI_Controller {
	private $filename = "import_data";
	public function __construct() {
		parent::__construct();

		$this->load->model('PresensiModel');
        $this->load->library('excel');
    }

    public function index() {
      $data['presensi'] = $this->PresensiModel->view();

      $this->load->view('tampil',$data);
  }
  public function upload_file(){
    $this->load->view('upload_file');
}
public function import() {
    if(isset($_FILES["file"]["name"])) {
        $path = $_FILES["file"]["tmp_name"];
        $object = PHPExcel_IOFactory::load($path);


        
        foreach ($object ->getWorksheetIterator() as $worksheet) {

            $highestRow = $worksheet ->getHighestRow();
            $highestColumn = $worksheet ->getHighestColumn();

            $tahun_ajar = $worksheet ->getCellByColumnAndRow(1,2);
            $tahun_ajar_temp = explode(" T.A ",$tahun_ajar);
            // DAFTAR HADIR KULIAH TAHUN AKADEMIK 2019 / 2020 GENAP
            if($tahun_ajar_temp[1] == "") {
                $tahun_ajar_temp = explode(" TAHUN AKADEMIK ",$tahun_ajar);
            }
            $periode = $tahun_ajar_temp[1];
            $makulkelas = $worksheet->getCellByColumnAndRow(3, 4);
            $makulkelas_temp = explode(" / ",$makulkelas);
            $makul1 = $makulkelas_temp[0];
            $makul = strtoupper($makul1);
            $kelas = $makulkelas_temp[1];
            $dosen = $worksheet->getCellByColumnAndRow(6,4);
            $dosen = strtoupper($dosen);
            $dosen = addslashes($dosen);



            for ($row=7; $row <= $highestRow ; $row++) { 
                    # code...
                $nim = $worksheet ->getCellByColumnAndRow(2,$row) ->getValue();
                $nama = $worksheet ->getCellByColumnAndRow(4,$row) ->getValue();

                if($nim < 9) {

                }else{
                $data[] = array(
                    'Nim' => $nim,
                    'Nama' => $nama,
                    'Makul' =>$makul,
                    'Kelas' => $kelas,
                    'Dosen' => $dosen,
                    'TahunAjaran' => $periode
                );
            }
            }
        }
        $this->PresensiModel->insert($data);
    }
    redirect('presensi');
}




}
