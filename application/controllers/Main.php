<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	function __construct() {
		parent::__construct();
			$this->load->model('M_inventory');
			$this->load->model('M_main');
			$this->load->model('M_akunting');
		
	}
	public function index() {

	if($this->session->userdata('level')=='admin') {
		$data = array('content' => "Maaf Tidak bisa masuk ke akses ini" );
		$this->load->view('notification/warning',$data);
	} else {
		if($this->session->has_userdata('username')) {
		$data = array(
			'sidebar' 	=> 'Inventory',
			'menu' 		=> 'active',
		);

		$this->load->view('template/header');
		$this->load->view('template/sidebar',$data);
		$this->load->view('inventory',$data);
		$this->load->view('template/footer');

	} else {
		$this->load->view('login');
	}
	}
	}

	public function login() {
		$username	= $this->input->post('username',TRUE);
		$password 	= $this->input->post('password',TRUE);
		$where 		= array(
		'username' => $username,
		);
		$get = $this->M_main->cek_login($where,'tbl_admin')->row_array();
		$cek = $this->M_main->cek_login($where,'tbl_admin')->num_rows();

		if($cek>0) {
			$hash 	= $get['password'];
		}

		if(password_verify($password,$hash)) {
			#CEK MODAL OWNER 
			$owner = $this->M_main->cek_modal()->num_rows();
			// if($owner == 0) { 	#JIKA BELUM INPUT MODAL 
			// 	$this->load->view('input_modal');
			// } else {

			$data = array(
				'username'  => $get['username'] ,
				'level' 	=> $get['level']
				);
				
			$session = $this->session->set_userdata($data);
			// echo $this->session->userdata("username");
				redirect('inventory');
		}else {
			redirect('main/gagal_login');
		}

	// } else {
	// 	redirect('main/gagal_login');
	// }
		}	

	public function gagal_login() {
		$data = array(
			'content' 	=> "Username atau Password Salah",
			'url' 		=> "main"
		);
		$this->load->view('notification/error',$data);
	}

	public function logout() {
		$this->session->unset_userdata('username');
		$this->session->sess_destroy();
		redirect('main');
	}


}
