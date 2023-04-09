<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_siswa');
	}
	
	public function index()
	{
		$data = array(
				'title'		=>'SMA Negeri 2',
				'title1'	=>'Admin',
				'title2'	=>'Data Siswa',
				'siswa'		=>$this->m_siswa->lists(),
				'isi'		=>'admin/siswa/v_list'
				);
		
		$this->load->view('admin/layout/v_wrapper',$data,FALSE);
	}
	
	public function add()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');	
		$this->form_validation->set_rules('level', 'Level', 'required');
		$this->form_validation->set_rules('no_id', 'NIS', 'required|is_unique[tbl_user.no_id]');
		$this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'required');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('kelas', 'Kelas', 'required');
				
		if ($this->form_validation->run() == TRUE){
			$config['upload_path']='./foto_siswa/';
			$config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 2000;
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('foto_siswa'))
            {                
				$data = array(
						'title'=>'SMA Negeri 2',
						'title1'	=>'Admin',
						'title2'=>'Tambah Data Siswa',
						'error'=>$this->upload->display_errors(), 
						'isi'=>'admin/siswa/v_add'
						);		
				$this->load->view('admin/layout/v_wrapper',$data,FALSE);
            }
            else
            {
                $upload_data = array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './foto_siswa/'.$upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);
				
				$data = array(					
						'no_id'			=>$this->input->post('no_id'),
						'nama_siswa'	=>$this->input->post('nama_siswa'),
						'tempat_lahir'	=>$this->input->post('tempat_lahir'),
						'tgl_lahir'		=>$this->input->post('tgl_lahir'),
						'kelas'			=>$this->input->post('kelas'),
						'foto_siswa'	=>$upload_data['uploads']['file_name']
						);
				$datauser = array(
						'nama_user'		=>$this->input->post('nama_siswa'),
						'no_id'			=>$this->input->post('no_id'),
						'username'		=>$this->input->post('username'),
						'password'		=>$this->input->post('password'),
						'level'			=>$this->input->post('level'),
						);
				$this->m_siswa->add($data);
				$this->m_siswa->adduser($datauser);
				$this->session->set_flashdata('notifsiswa', 'Data Berhasil Ditambahkan');
				redirect('siswa');
            }
		}
		
		$data = array(
				'title'=>'SMA Negeri 2',
				'title1'=>'Admin',
				'title2'=>'Tambah Data Siswa',
				'isi'=>'admin/siswa/v_add'
				);		
		$this->load->view('admin/layout/v_wrapper',$data,FALSE);
				
	}
	
	public function edit($id_siswa)
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('no_id', 'NIS', 'required');
		$this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'required');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('kelas', 'Kelas', 'required');
		
		if ($this->form_validation->run() == TRUE){
			$config['upload_path']='./foto_siswa';
			$config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 2000;
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('foto_siswa'))
            {                
				$data = array(
						'title'=>'SMA Negeri 2',
						'title1'=>'Admin',
						'title2'=>'Edit Data Siswa',
						'error'=>$this->upload->display_errors(),
						'siswa'=>$this->m_siswa->detail($id_siswa),
						'user'=>$this->m_siswa->detailuser($id_siswa),
						'isi'=>'admin/siswa/v_edit'
						);		
				$this->load->view('admin/layout/v_wrapper',$data,FALSE);
            }
            else
            {
                $upload_data = array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './foto_siswa/'.$upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);
				
				$siswa = $this->m_siswa->detail($id_siswa);
				if($siswa->foto_siswa !=""){
					unlink('./foto_siswa/'.$siswa->foto_siswa);
				}
				
				$data = array(
						'id_siswa'		=>$id_siswa,
						'no_id'			=>$this->input->post('no_id'),
						'nama_siswa'	=>$this->input->post('nama_siswa'),
						'tempat_lahir'	=>$this->input->post('tempat_lahir'),
						'tgl_lahir'		=>$this->input->post('tgl_lahir'),
						'kelas'			=>$this->input->post('kelas'),
						'foto_siswa'	=>$upload_data['uploads']['file_name']
						);
				$datauser = array(
						'nama_user'		=>$this->input->post('nama_siswa'),
						'no_id'			=>$this->input->post('no_id'),
						'username'		=>$this->input->post('username'),
						'password'		=>$this->input->post('password'),
						);		
				$this->m_siswa->edit($data);
				$this->m_siswa->edituser($datauser);
				$this->session->set_flashdata('notifsiswa', 'Data Berhasil Diedit');
				redirect('siswa');
            }
			
			$upload_data = array('uploads' => $this->upload->data());
			$config['image_library'] = 'gd2';
			$config['source_image'] = './foto_siswa'.$upload_data['uploads']['file_name'];
			$this->load->library('image_lib', $config);
				
			$data = array(
					'id_siswa'		=>$id_siswa,
					'no_id'			=>$this->input->post('no_id'),
					'nama_siswa'	=>$this->input->post('nama_siswa'),
					'tempat_lahir'	=>$this->input->post('tempat_lahir'),
					'tgl_lahir'		=>$this->input->post('tgl_lahir'),
					'kelas'			=>$this->input->post('kelas')
					);
			$datauser = array(
					'nama_user'		=>$this->input->post('nama_siswa'),
					'no_id'			=>$this->input->post('no_id'),
					'username'		=>$this->input->post('username'),
					'password'		=>$this->input->post('password'),
					);		
			$this->m_siswa->edit($data);
			$this->m_siswa->edituser($datauser);
			$this->session->set_flashdata('notifsiswa', 'Data Berhasil Diedit');
			redirect('siswa');
		}
		
		$data = array(
				'title'=>'SMA Negeri 2',
				'title1'=>'Admin',
				'title2'=>'Edit Data Siswa',
				'siswa'=>$this->m_siswa->detail($id_siswa),
				'user'=>$this->m_siswa->detailuser($id_siswa),
				'isi'=>'admin/siswa/v_edit'
				);		
		$this->load->view('admin/layout/v_wrapper',$data,FALSE);
	}
	
	public function delete($no_id)
	{
		$siswa = $this->m_siswa->detail($no_id);
		if($siswa->foto_siswa !=""){
			unlink('./foto_siswa/'.$siswa->foto_siswa);
		}
		$data=array('no_id'=>$no_id);
		$this->m_siswa->delete($data);
		$this->m_siswa->deleteuser($data);
		$this->session->set_flashdata('notifsiswa', 'Data Berhasil Dihapus');
		redirect('siswa');
	}

} 

?>
