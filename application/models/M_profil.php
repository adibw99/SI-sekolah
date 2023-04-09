<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_profil extends CI_Model {

	public function profilguru()
	{
		$this->db->select('*');
		$this->db->from('tbl_user');		
		$this->db->join('tbl_guru', 'tbl_guru.no_id = tbl_user.no_id', 'left');	
		$this->db->join('tbl_mapel', 'tbl_mapel.id_mapel = tbl_guru.id_mapel', 'left');
		$this->db->where('username', $this->session->userdata('username'));
		return $this->db->get()->row();
	}

	public function profilsiswa()
	{
		$this->db->select('*');
		$this->db->from('tbl_user');		
		$this->db->join('tbl_siswa', 'tbl_siswa.no_id = tbl_user.no_id', 'left');
		$this->db->where('username', $this->session->userdata('username'));
		return $this->db->get()->row();
	}

}

/* End of file ModelName.php */
