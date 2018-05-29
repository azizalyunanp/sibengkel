
<?php 

class M_kategori extends CI_Model {

	function tampil() {
		return $this->db->get('tbl_kategori');
	}

	function tambah($data) {
		$this->db->insert('tbl_kategori',$data);
	}

	function delete($where) {
		$this->db->where($where);
		$this->db->delete('tbl_kategori');
	}

	function tampil_sub () {
		return $this->db->get('tbl_sub_kategori');
	}

	function edit_kat($where) {
		return $this->db->get_where('tbl_kategori',$where);
	}

	function update($where,$data) {
		$this->db->where($where);
		$this->db->update('tbl_kategori',$data);
	}

}