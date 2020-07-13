<?php

/**
 * 
 */
class Presensi_model extends CI_Model
{
	public function view() {
		return $this->db->get('presensi')->result_array();
	}
	public function insert($data) {
		$this->db->insert_batch('presensi',$data);
	}

	
}