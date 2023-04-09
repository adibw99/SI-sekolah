<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_guru');
		$this->load->model('m_mapel');
		$this->load->model('m_siswa');
	}

	public function index()
	{
		$data = array(
			'title'=>'Beranda',
			'isi'=>'v_home'
		);
		
		$this->load->view('layout/v_wrapperhome',$data,FALSE);
	}

	public function guru()
	{
		$data = array(
			'title1'=>'Guru',
			'guru'=>$this->m_guru->lists(),
			'isi'=>'v_guru'
		);
		
		$this->load->view('layout/v_wrapper',$data,FALSE);
	}

	public function siswa()
	{
		$data = array(
			'title1'=>'Siswa',
			'siswa'=>$this->m_siswa->lists(),
			'isi'=>'v_siswa'
		);
		
		$this->load->view('layout/v_wrapper',$data,FALSE);
	}
}

?>
