<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_siswa extends CI_Model
{
	public function lists()
	{
		$this->db->select('*');
		$this->db->from('tbl_siswa');
		$this->db->order_by('id_siswa', 'desc');
		return $this->db->get()->result();
	}
	
	public function detail($id_siswa)
	{
		$this->db->select('*');
		$this->db->from('tbl_siswa');
		$this->db->where('id_siswa', $id_siswa);
		return $this->db->get()->row();
	}
	
	public function detailuser($id_siswa)
	{		
		$this->db->select('*');
		$this->db->from('tbl_user');		
		$this->db->join('tbl_siswa', 'tbl_siswa.no_id = tbl_user.no_id', 'left');
		$this->db->where('id_siswa', $id_siswa);
		return $this->db->get()->row();
	}

	public function add($data)
	{
		$this->db->insert('tbl_siswa', $data);
	}
		
	public function adduser($datauser)
	{
		$this->db->insert('tbl_user', $datauser);
	}

	public function edit($data)
	{
		$this->db->where('id_siswa', $data['id_siswa']);
		$this->db->update('tbl_siswa', $data);
	}

	public function edituser($datauser)
	{	
		$this->db->where('no_id', $datauser['no_id']);	
		$this->db->update('tbl_user', $datauser);
	}
		
	public function delete($data)
	{
		$this->db->where('no_id', $data['no_id']);
		$this->db->delete('tbl_siswa', $data);
	}

	public function deleteuser($data)
	{
		$this->db->where('no_id', $data['no_id']);
		$this->db->delete('tbl_user', $data);
	}

	public function hitung()
	{
		$this->db->select('*');
		$this->db->from('tbl_siswa');
		return $this->db->num_rows();
	}
	
}

?>
 