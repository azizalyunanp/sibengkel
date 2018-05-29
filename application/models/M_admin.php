<?php
class M_admin extends CI_Model {
	
	function tampil() {
		$this->db->select('*');
		$this->db->from('tbl_admin');
		$this->db->where('level','admin');
		$this->db->or_where('level','owner');
		return $this->db->get();
	}

	function tambah($data) {
		$this->db->insert('tbl_admin',$data);
	}

	function edit($where) {
		return $this->db->get_where('tbl_admin',$where);
	}

	function change($where) {
		return $this->db->get_where('tbl_admin',$where);
	}

	function changepass($where,$data) {
		$this->db->where($where);
		$this->db->update('tbl_admin',$data);

	}

	function delete($where) {
		$this->db->where($where);
		$this->db->delete('tbl_admin',$where);
	}

	function update($where,$data) {
		$this->db->where($where);
		$this->db->update('tbl_admin',$data);
	}
	
}