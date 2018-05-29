<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {
	function __construct() {
		parent:: __construct();
		$this->load->model('M_pelanggan');
		$this->load->model('M_inventory');
	}

	public function index() {
		if($this->session->userdata('level')=='admin') {
		$data = array('content' => "Maaf Tidak bisa masuk ke akses ini" );
		$this->load->view('notification/warning',$data);
	} else {
		if($this->session->has_userdata('username')) {
		$data = array(
		'sidebar'	=> "Pelanggan",
		'pelanggan' => $this->M_pelanggan->tampil_all()->result(),
		'menu'		=> "active",
		);
		$this->load->view('template/header',$data);
		$this->load->view('template/sidebar',$data);
		$this->load->view('pelanggan',$data);
		$this->load->view('template/footer');
	} else {
		$this->load->view('login');
	}
	}
}
	
	public function simpan_pelanggan() {
		$data = array(
		'nama' 	 => $this->input->post('nama_pelanggan',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'no_hp'  => $this->input->post('no_hp',TRUE)
		);
		$this->M_pelanggan->savepelanggan($data,'tbl_pelanggan');
		$this->load->view('notification/success');
		echo "<meta http-equiv='refresh' content='2;url=index'>";
	}

	public function delete($id) {
		$where = array('no' => $id);
		$this->M_pelanggan->delcust($where,'tbl_pelanggan');
		redirect('pelanggan');
	}

	public function edit($id) {
		$where = array('no' => $id );
		$data['pel'] = $this->M_pelanggan->get_data($where,'tbl_pelanggan')->result();
		$this->load->view('modal/edit-cust',$data);
	}

	public function update() {
		$where = array('no' => $this->input->post('id',TRUE) );
		$data = array(
			'nama' 		=> $this->input->post('nama',TRUE),
			'alamat' 	=> $this->input->post('alamat',TRUE),
			'no_hp' 	=> $this->input->post('no_hp',TRUE), 
		);
		$this->M_pelanggan->updatedata($where,$data,'tbl_pelanggan');
		redirect('pelanggan');
	}
 }
