<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_guru extends CI_Model
{
	public function lists()
	{
		$this->db->select('*');
		$this->db->from('tbl_guru');
		$this->db->join('tbl_mapel', 'tbl_mapel.id_mapel = tbl_guru.id_mapel', 'left');
		$this->db->order_by('id_guru', 'desc');
		return $this->db->get()->result();
	}
	
	public function detail($id_guru)
	{
		$this->db->select('*');
		$this->db->from('tbl_guru');
		$this->db->join('tbl_mapel', 'tbl_mapel.id_mapel = tbl_guru.id_mapel', 'left');
		$this->db->where('id_guru', $id_guru);
		return $this->db->get()->row();
	}

	public function detailuser($id_guru)
	{		
		$this->db->select('*');
		$this->db->from('tbl_user');		
		$this->db->join('tbl_guru', 'tbl_guru.no_id = tbl_user.no_id', 'left');	
		$this->db->join('tbl_mapel', 'tbl_mapel.id_mapel = tbl_guru.id_mapel', 'left');
		$this->db->where('id_guru', $id_guru);
		return $this->db->get()->row();
	}
	
	public function add($data)
	{
		$this->db->insert('tbl_guru', $data);
	}

	public function adduser($datauser)
	{
		$this->db->insert('tbl_user', $datauser);
	}
	
	public function edit($data)
	{
		$this->db->where('id_guru', $data['id_guru']);
		$this->db->update('tbl_guru', $data);
	}
	
	public function edituser($datauser)
	{	
		$this->db->where('no_id', $datauser['no_id']);	
		$this->db->update('tbl_user', $datauser);
	}
			
	public function delete($data)
	{
		$this->db->where('no_id', $data['no_id']);
		$this->db->delete('tbl_guru', $data);
	}

	public function deleteuser($data)
	{
		$this->db->where('no_id', $data['no_id']);
		$this->db->delete('tbl_user', $data);
	}
	
}

?>
 