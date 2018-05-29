<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('M_kategori');
		$this->load->model('M_inventory');
	}

	public function index() {
		if($this->session->has_userdata('username')) {
			$data = array(
				'kategori' => $this->M_kategori->tampil()->result(),
				'sidebar'  => "Kategori",
				'menu'		=> "active",
			);
			$this->load->view('template/header');
			$this->load->view('template/sidebar',$data);
			$this->load->view('kategori',$data);
			$this->load->view('template/footer');
		} else {
			$this->load->view('login');
		}
	} 

	public function add_data() {
		$nama 	= $this->input->post('nama',TRUE);
		$data 	= array('kategori' => $nama);
		$this->M_kategori->tambah($data,'tbl_kategori');
		redirect('kategori');
	}

	public function edit_kat($id) {
		$where = array('id_kategori' => $id );
		$data['kat'] = $this->M_kategori->edit_kat($where,'tbl_admin')->result();
		$this->load->view('modal/edit-kat',$data);
	}

	public function update() {
		$id 		= $this->input->post('id',TRUE);
		$kategori	= $this->input->post('kategori',TRUE);

		$data = array(	
		'kategori' 		=> $kategori,
		);
		
		$where = array('id_kategori' => $id );
		$this->M_kategori->update($where,$data,'tbl_kategori');
		redirect('kategori');
	}

	public function delete($id_kategori) {
		$where = array('id_kategori' => $id_kategori );
		$this->M_kategori->delete($where,'tbl_kategori');
		redirect('kategori');
	}

	public function sub_kat() {
		if($this->session->has_userdata('username')) {
		$data = array(
		'sidebar' 	=> "Kategori",
		'menu'		=> "active",
		'd_notif'	=> $this->M_inventory->stok_limit()->num_rows()
		);
			$this->load->view('template/header',$data);
			$this->load->view('template/sidebar',$data);
			$this->load->view('sub_kategori',$data);
			$this->load->view('template/footer');
		} else {
			$this->load->view('login');
		}
	}

	public function view_sub() {
		$data = array(
			'sub_kategori'	=> $this->M_kategori->tampil_sub()->result(),
			'kategori'		=> $this->M_kategori->tampil()->result()
			);
		$this->load->view('v_sub_kategori',$data);
	}

	public function add_sub_kat() {
		$data = array(
			'kategori' 		=> $this->input->post('kat',TRUE),
			'sub_kategori'  => $this->input->post('sub_kat',TRUE)
		);

		$this->db->insert('tbl_sub_kategori',$data);
	}

	public function edit_sub() {
		$id  		 = $this->input->post('id',TRUE);
		$text  		 = strip_tags($this->input->post('editval',TRUE));
		$col  		 = strip_tags($this->input->post('column',TRUE));
		$this->db->set($col,$text);
		$this->db->where('id',$id);
		$this->db->update('tbl_sub_kategori');
	}

	public function del_sub_kat($nomor) {
		$data = array('id' => $nomor );
		$this->db->delete('tbl_sub_kategori',$data);
		redirect('kategori/sub_kat');
	}

}