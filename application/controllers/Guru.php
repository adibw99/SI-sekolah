<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_guru');
		$this->load->model('m_mapel');
	}
	
	public function index()
	{
		$data = array(
				'title'=>'SMA Negeri 2',
				'title1'=>'Admin',
				'title2'=>'Data Guru',
				'guru'=>$this->m_guru->lists(),
				'isi'=>'admin/guru/v_list'
				);
		
		$this->load->view('admin/layout/v_wrapper',$data,FALSE);
	}
	
	public function add()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');	
		$this->form_validation->set_rules('level', 'Level', 'required');
		$this->form_validation->set_rules('no_id', 'NIP', 'required|is_unique[tbl_user.no_id]');
		$this->form_validation->set_rules('nama_guru', 'Nama Guru', 'required');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('id_mapel', 'Mata Pelajaran', 'required');
		$this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required');
		
		if ($this->form_validation->run() == TRUE){
			$config['upload_path']='./foto_guru/';
			$config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 2000;
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('foto_guru'))
            {                
				$data = array(
						'title'=>'SMA Negeri 2',
						'title1'=>'Admin',
						'title2'=>'Tambah Data Guru',
						'error'=>$this->upload->display_errors(),
						'mapel'=>$this->m_mapel->lists(), 
						'isi'=>'admin/guru/v_add'
						);		
				$this->load->view('admin/layout/v_wrapper',$data,FALSE);
            }
            else
            {
                $upload_data = array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './foto_guru/'.$upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);
				
				$data = array(
						'no_id'			=>$this->input->post('no_id'),
						'nama_guru'		=>$this->input->post('nama_guru'),
						'tempat_lahir'	=>$this->input->post('tempat_lahir'),
						'tgl_lahir'		=>$this->input->post('tgl_lahir'),
						'id_mapel'		=>$this->input->post('id_mapel'),
						'pendidikan'	=>$this->input->post('pendidikan'),
						'foto_guru'		=>$upload_data['uploads']['file_name']
						);
				$datauser = array(
						'nama_user'		=>$this->input->post('nama_guru'),
						'no_id'			=>$this->input->post('no_id'),
						'username'		=>$this->input->post('username'),
						'password'		=>$this->input->post('password'),
						'level'			=>$this->input->post('level'),
						);	
				$this->m_guru->add($data);
				$this->m_guru->adduser($datauser);
				$this->session->set_flashdata('notifguru', 'Data Berhasil Ditambahkan');
				redirect('guru');
            }
		}
		
		$data = array(
				'title'=>'SMA Negeri 2',
				'title1'=>'Admin',
				'title2'=>'Tambah Data Guru',
				'mapel'=>$this->m_mapel->lists(), 
				'isi'=>'admin/guru/v_add'
				);		
		$this->load->view('admin/layout/v_wrapper',$data,FALSE);
		
		
	}
	
	public function edit($id_guru)
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('no_id', 'NIP', 'required');
		$this->form_validation->set_rules('nama_guru', 'Nama Guru', 'required');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('id_mapel', 'Mata Pelajaran', 'required');
		$this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required');
		
		if ($this->form_validation->run() == TRUE){
			$config['upload_path']='./foto_guru';
			$config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 2000;
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('foto_guru'))
            {                
				$data = array(
						'title'=>'SMA Negeri 2',
						'title1'=>'Admin',
						'title2'=>'Edit Data Guru',
						'error'=>$this->upload->display_errors(),
						'guru'=>$this->m_guru->detail($id_guru),
						'user'=>$this->m_guru->detailuser($id_guru),
						'mapel'=>$this->m_mapel->lists(), 
						'isi'=>'admin/guru/v_edit'
						);		
				$this->load->view('admin/layout/v_wrapper',$data,FALSE);
            }
            else
            {
                $upload_data = array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './foto_guru/'.$upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);
				
				$guru = $this->m_guru->detail($id_guru);
				if($guru->foto_guru !=""){
					unlink('./foto_guru/'.$guru->foto_guru);
				}
				
				$data = array(
						'no_id'			=>$this->input->post('no_id'),
						'id_guru'		=>$id_guru,
						'nama_guru'		=>$this->input->post('nama_guru'),
						'tempat_lahir'	=>$this->input->post('tempat_lahir'),
						'tgl_lahir'		=>$this->input->post('tgl_lahir'),
						'id_mapel'		=>$this->input->post('id_mapel'),
						'pendidikan'	=>$this->input->post('pendidikan'),
						'foto_guru'		=>$upload_data['uploads']['file_name']
						);
						
				$datauser = array(
						'nama_user'		=>$this->input->post('nama_guru'),
						'no_id'			=>$this->input->post('no_id'),
						'username'		=>$this->input->post('username'),
						'password'		=>$this->input->post('password'),
						);	
				$this->m_guru->edit($data);
				$this->m_guru->edituser($datauser);
				$this->session->set_flashdata('notifguru', 'Data Berhasil Diedit');
				redirect('guru');
            }
			
			$upload_data = array('uploads' => $this->upload->data());
			$config['image_library'] = 'gd2';
			$config['source_image'] = './foto_guru'.$upload_data['uploads']['file_name'];
			$this->load->library('image_lib', $config);
				
			$data = array(
					'no_id'			=>$this->input->post('no_id'),
					'id_guru'		=>$id_guru,
					'nama_guru'		=>$this->input->post('nama_guru'),
					'tempat_lahir'	=>$this->input->post('tempat_lahir'),
					'tgl_lahir'		=>$this->input->post('tgl_lahir'),
					'id_mapel'		=>$this->input->post('id_mapel'),
					'pendidikan'	=>$this->input->post('pendidikan')
					);
			$datauser = array(
					'nama_user'		=>$this->input->post('nama_guru'),
					'no_id'			=>$this->input->post('no_id'),
					'username'		=>$this->input->post('username'),
					'password'		=>$this->input->post('password'),
					);	
			$this->m_guru->edit($data);
			$this->m_guru->edituser($datauser);
			$this->session->set_flashdata('notifguru', 'Data Berhasil Diedit');
			redirect('guru');
		}
		
		$data = array(
				'title'=>'SMA Negeri 2',
				'title1'=>'Admin',
				'title2'=>'Edit Data Guru',
				'mapel'=>$this->m_mapel->lists(), 
				'guru'=>$this->m_guru->detail($id_guru),
				'user'=>$this->m_guru->detailuser($id_guru),
				'isi'=>'admin/guru/v_edit'
				);		
		$this->load->view('admin/layout/v_wrapper',$data,FALSE);
	}
	
	
	public function delete($no_id)
	{
		$guru = $this->m_guru->detail($no_id);
		if($guru->foto_guru !=""){
			unlink('./foto_guru/'.$guru->foto_guru);
		}
		$data=array('no_id'=>$no_id);
		$this->m_guru->delete($data);
		$this->m_guru->deleteuser($data);
		$this->session->set_flashdata('notifguru', 'Data Berhasil Dihapus');
		redirect('guru');
	}
}

?>
