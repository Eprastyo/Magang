<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_login');
		$this->load->model('M_data');
	}

	public function index()
	{
		$this->load->view('v_login');
	}

	public function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$level1 = "admin";
		$level2 = "staff";
		$level3 = "manager";

		if($where = array(
			'nama' => $username,
			'password' => $password,
			'level' => $level1
			)){

		$cek = $this->M_login->cek_login("t_data_user",$where)->num_rows();

			if($cek > 0){
				$data_session = array(
					'nama' => $username,
					'password' => $password,
					'status' => "admin"
					);
	 
				$this->session->set_userdata($data_session);
				redirect(base_url("Admin/admin"));
			}
		}

		if($where = array(
			'nama' => $username,
			'password' => $password,
			'level' => $level2
			)){
		
		$cek = $this->M_login->cek_login("t_data_user",$where)->num_rows();
			if($cek > 0){
				$data_session = array(
					'nama' => $username,
					'password' => $password,
					'status' => "staff", 
					);
				$this->session->set_userdata($data_session);
				redirect(base_url("Staff/staff"));
			}
		}

		if($where = array(
			'nama' => $username,
			'password' => $password,
			'level' => $level3
			)){

		$cek = $this->M_login->cek_login("t_data_user",$where)->num_rows();

			if($cek > 0){
				$data_session = array(
					'nama' => $username,
					'password' => $password,
					'status' => "manager"
					);
	 
				$this->session->set_userdata($data_session);
				redirect(base_url("Manager/manager"));
			}
		}
}

	public function cek_level(){
		$data['data_'] = $this->m_data->lihat_data()->result();
		$this->load->view('v_tampil',$data);
	}
 
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('Login'));
	}
}
