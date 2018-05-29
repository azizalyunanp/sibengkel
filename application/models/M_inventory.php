<?php
class M_inventory extends CI_Model {
	var $table = 'tbl_barang';
    var $column_order = array(null, 'nama','kategori','sub_1','sub_2','sub_3','harga_beli','harga_jual','stok'); //set column field database for datatable orderable
    var $column_search = array('nama','kategori','sub_1','sub_2','sub_3','harga_beli','harga_jual','stok'); //set column field database for datatable searchable 
    var $order = array('id' => 'asc'); // default order 

	function tampil() {
		$this->db->select('*');
		$this->db->from('tbl_barang');
		$this->db->order_by('id','DESC');
		return $this->db->get();
	}

	function stok_limit() {
		$this->db->select('*');
		$this->db->from('tbl_barang');
		$this->db->where('stok<','5');
		$query = $this->db->get();
		return $query;
	}

	function tampil_kategori() {
		return $this->db->get('tbl_kategori');
	}

	function tambah($data,$table) {
		$this->db->insert($table,$data);
	}

	function edit($data) {
		return $this->db->get_where('tbl_barang',$data);
	}

	function update($where,$data) {
		$this->db->where($where);
		$this->db->update('tbl_barang',$data);
	}

	function delete($where) {
		$this->db->where($where);
		$this->db->delete('tbl_barang');
	}

	function cari_kat($kat) {
		$this->db->select('*');
		$this->db->from('tbl_sub_kategori');
		$this->db->where('kategori',$kat);
		$query = $this->db->get();
		if($query->num_rows() > 0){
            return $query->result();
        } else {
            return FALSE;
        }
	}

	function x_kat($kat) {
		return $this->db->query("SELECT kategori FROM tbl_kategori WHERE kategori <> '$kat'");
	}

	function x_sub_1($sub_1) {
		return $this->db->query("SELECT DISTINCT(sub_1) FROM tbl_barang WHERE sub_1 <> '$sub_1'");
	}

	function x_sub_2($sub_2) {
		return $this->db->query("SELECT DISTINCT(sub_2) FROM tbl_barang WHERE sub_2 <> '$sub_2'");
	}

	function x_sub_3($sub_3) {
		return $this->db->query("SELECT DISTINCT(sub_3) FROM tbl_barang WHERE sub_3 <> '$sub_3'");
	}


	//SERVERSIDE DATATABLES
	private function _get_datatables_query()
    {
         
        $this->db->from($this->table);
 
        $i = 0;
     
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
 
}
