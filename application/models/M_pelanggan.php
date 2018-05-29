<?php

class M_pelanggan extends CI_Model {
	
	function tampil_all() 	{
		return $this->db->get('tbl_pelanggan');
	}
	
	function savepelanggan($data) {
		$this->db->insert('tbl_pelanggan',$data);
	}

	function delcust($where) {
		$this->db->where($where);
		$this->db->delete('tbl_pelanggan');
	}

	function get_data($where) {
		return $this->db->get_where('tbl_pelanggan',$where);
	}

	function updatedata($where,$data) {
		$this->db->where($where);
		$this->db->update('tbl_pelanggan',$data);
	} 
}