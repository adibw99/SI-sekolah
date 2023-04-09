<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_profil');
		$this->load->model('m_guru');
		$this->load->model('m_siswa');
		$this->load->model('m_mapel');
	}
	
	public function index()
	{
		$data = array(
			'title'=>'SMA Negeri 2',
			'title1'=>' ',
			'title2'=>'Profil',
			'pguru'=>$this->m_profil->profilguru(),
			'psiswa'=>$this->m_profil->profilsiswa(),
			'isi'=>'admin/v_profil'
		);
		
		$this->load->view('admin/layout/v_wrapper',$data,FALSE);
	}
	 
	
	public function editguru($id_guru)
	{
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
						'title1'=>'Guru',
						'title2'=>'Edit Data Guru',
						'error'=>$this->upload->display_errors(),
						'guru'=>$this->m_guru->detail($id_guru),
						'pguru'=>$this->m_profil->profilguru(),
						'mapel'=>$this->m_mapel->lists(), 
						'isi'=>'admin/v_editprofilguru'
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
						'id_guru'		=>$id_guru,
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
						);		
				$this->m_guru->edit($data);
				$this->m_guru->edituser($datauser);
				$this->session->set_flashdata('notifprofil', 'Data Berhasil Diedit');
				redirect('profil');
            }
			
			$upload_data = array('uploads' => $this->upload->data());
			$config['image_library'] = 'gd2';
			$config['source_image'] = './foto_guru'.$upload_data['uploads']['file_name'];
			$this->load->library('image_lib', $config);
				
			$data = array(
					'id_guru'		=>$id_guru,
					'no_id'			=>$this->input->post('no_id'),
					'nama_guru'		=>$this->input->post('nama_guru'),
					'tempat_lahir'	=>$this->input->post('tempat_lahir'),
					'tgl_lahir'		=>$this->input->post('tgl_lahir'),
					'id_mapel'		=>$this->input->post('id_mapel'),
					'pendidikan'	=>$this->input->post('pendidikan')
					);
			$datauser = array(
					'nama_user'		=>$this->input->post('nama_guru'),
					'no_id'			=>$this->input->post('no_id'),
					);		
			$this->m_guru->edit($data);
			$this->m_guru->edituser($datauser);
			$this->session->set_flashdata('notifprofil', 'Data Berhasil Diedit');
			redirect('profil');
		}
		
		$data = array(
				'title'=>'SMA Negeri 2',
				'title1'=>'Guru',
				'title2'=>'Edit Data Guru',
				'mapel'=>$this->m_mapel->lists(), 
				'guru'=>$this->m_guru->detail($id_guru),
				'pguru'=>$this->m_profil->profilguru(),
				'isi'=>'admin/v_editprofilguru'
				);		
		$this->load->view('admin/layout/v_wrapper',$data,FALSE);
	}

	public function editsiswa($id_siswa)
	{
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
						'title1'=>'Siswa',
						'title2'=>'Edit Data Siswa',
						'error'=>$this->upload->display_errors(),
						'siswa'=>$this->m_siswa->detail($id_siswa),
						'psiswa'=>$this->m_profil->profilsiswa(),
						'isi'=>'admin/v_editprofilsiswa'
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
						);		
				$this->m_siswa->edit($data);
				$this->m_siswa->edituser($datauser);
				$this->session->set_flashdata('notifprofil', 'Data Berhasil Diedit');
				redirect('profil');
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
					);		
			$this->m_siswa->edit($data);
			$this->m_siswa->edituser($datauser);
			$this->session->set_flashdata('notifprofil', 'Data Berhasil Diedit');
			redirect('profil');
		}
		
		$data = array(
				'title'=>'SMA Negeri 2',
				'title1'=>'Siswa',
				'title2'=>'Edit Data Siswa',
				'siswa'=>$this->m_siswa->detail($id_siswa),
				'psiswa'=>$this->m_profil->profilsiswa(),
				'isi'=>'admin/v_editprofilsiswa'
				);		
		$this->load->view('admin/layout/v_wrapper',$data,FALSE);
	}

}

/* End of file Controllername.php */
