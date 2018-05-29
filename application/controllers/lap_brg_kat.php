	public function lap_brg_keluar_bln_kat() { // LAPORAN STOCK OPNAME BERDASARKAN MINGGU DAN PER KATEGORI
		$where 		= $this->input->post('bulan',TRUE);
		$thn			= $this->input->post('tahun',TRUE);
		$monthName 	= date("F", mktime(0, 0, 0, $where, 10));
		$kat 		= $this->input->post('kategori',TRUE);
		$s_kat   = $this->M_laporan->s_kategori($kat)->num_rows();
		$s_sub_1 = $this->M_laporan->s_sub_1($kat)->num_rows();
		$s_sub_2 = $this->M_laporan->s_sub_2($kat)->num_rows();
		$s_sub_3 = $this->M_laporan->s_sub_3($kat)->num_rows();

		if($s_kat>0) {
			$filter = array(
				'column' => 'kategori',
				'filter' => $kat 
			);
			$data = array(
			'judul' 	=> "Laporan STOCK OPNAME BENGKEL TANGGAL $where - KATEGORI : $filter[filter]",
			'lap' 	=> $this->M_laporan->get_brg_keluar_bln_kat($where,$thn,$filter)->result(),
			'title'	=> "Lap.Stok OPNAME"  
		);
		$this->setting_excel($data); //PRINT EXCEL
		}elseif($s_sub_1>0) {
			$filter = array(
				'column' => 'sub_1',
				'filter' => $kat 
			);
			$data = array(
			'judul' 	=> "Laporan STOCK OPNAME BENGKEL TANGGAL $where - KATEGORI : $filter[filter]",
			'lap' 	=> $this->M_laporan->get_brg_keluar_bln_kat($where,$thn,$filter)->result(),
			'title'	=> "Lap.Stok OPNAME"  
		);
		$this->setting_excel($data); //PRINT EXCEL
		}elseif ($s_sub_2>0) {
			$filter = array(
				'column' => 'sub_2',
				'filter' => $kat 
			);
			$data = array(
			'judul' 	=> "Laporan STOCK OPNAME BENGKEL TANGGAL $where - KATEGORI : $filter[filter]",
			'lap' 	=> $this->M_laporan->get_brg_keluar_bln_kat($where,$thn,$filter)->result(),
			'title'	=> "Lap.Stok OPNAME"  
		);
		$this->setting_excel($data); //PRINT EXCEL
		} elseif($s_sub_3>0) {
			$filter = array(
				'column' => 'sub_3',
				'filter' => $kat 
			);
			$data = array(
			'judul' 	=> "Laporan STOCK OPNAME BENGKEL TANGGAL $where - KATEGORI : $filter[filter]",
			'lap' 	=> $this->M_laporan->get_brg_keluar_bln_kat($where,$thn,$filter)->result(),
			'title'	=> "Lap.Stok OPNAME"  
		);
		$this->setting_excel($data); //PRINT EXCEL
		}
		
		$filename = "LAP STOCK OPNAME_$where.xls"; //save our workbook as this file name
	   header('Content-Type: application/vnd.ms-excel'); //mime type
	   header('Content-Disposition: attachment;filename="'.$filename.'"'); 
	   header('Cache-Control: max-age=0'); //no cache
	   $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
	   $objWriter->save('php://output');
	}

	public function lap_brg_keluar_minggu_kat() { // LAPORAN STOCK OPNAME BERDASARKAN MINGGU DAN PER KATEGORI
		$where = array(
		'tgl_1' => date('Y-m-d',strtotime($this->input->post('tanggal_1',TRUE))),
		'tgl_2' => date('Y-m-d',strtotime($this->input->post('tanggal_2',TRUE))),
	);
		$kat 		= $this->input->post('kategori',TRUE);
		$s_kat   = $this->M_laporan->s_kategori($kat)->num_rows();
		$s_sub_1 = $this->M_laporan->s_sub_1($kat)->num_rows();
		$s_sub_2 = $this->M_laporan->s_sub_2($kat)->num_rows();
		$s_sub_3 = $this->M_laporan->s_sub_3($kat)->num_rows();

		if($s_kat>0) {
			$filter = array(
				'column' => 'kategori',
				'filter' => $kat 
			);
			$data = array(
			'judul' 	=> "Laporan STOCK OPNAME BENGKEL TANGGAL $where[tgl_1] - $where[tgl_2] - KATEGORI : $filter[filter]",
			'lap' 	=> $this->M_laporan->get_brg_keluar_minggu_kat($where,$filter)->result(),
			'title'	=> "Lap.Stok OPNAME"  
		);
		$this->setting_excel($data); //PRINT EXCEL
		}elseif($s_sub_1>0) {
			$filter = array(
				'column' => 'sub_1',
				'filter' => $kat 
			);
			$data = array(
			'judul' 	=> "Laporan STOCK OPNAME BENGKEL TANGGAL $where[tgl_1] - $where[tgl_2] - KATEGORI : $filter[filter]",
			'lap' 	=> $this->M_laporan->get_brg_keluar_minggu_kat($where,$filter)->result(),
			'title'	=> "Lap.Stok OPNAME"  
		);
		$this->setting_excel($data); //PRINT EXCEL
		}elseif ($s_sub_2>0) {
			$filter = array(
				'column' => 'sub_2',
				'filter' => $kat 
			);
			$data = array(
			'judul' 	=> "Laporan STOCK OPNAME BENGKEL TANGGAL $where[tgl_1] - $where[tgl_2] - KATEGORI : $filter[filter]",
			'lap' 	=> $this->M_laporan->get_brg_keluar_minggu_kat($where,$filter)->result(),
			'title'	=> "Lap.Stok OPNAME"  
		);
		$this->setting_excel($data); //PRINT EXCEL
		} elseif($s_sub_3>0) {
			$filter = array(
				'column' => 'sub_3',
				'filter' => $kat 
			);
			$data = array(
			'judul' 	=> "Laporan STOCK OPNAME BENGKEL TANGGAL $where[tgl_1] - $where[tgl_2] - KATEGORI : $filter[filter]",
			'lap' 	=> $this->M_laporan->get_brg_keluar_minggu_kat($where,$filter)->result(),
			'title'	=> "Lap.Stok OPNAME"  
		);
		$this->setting_excel($data); //PRINT EXCEL
		}
		
		$filename = "LAP STOCK OPNAME.xls"; //save our workbook as this file name
	   header('Content-Type: application/vnd.ms-excel'); //mime type
	   header('Content-Disposition: attachment;filename="'.$filename.'"'); 
	   header('Cache-Control: max-age=0'); //no cache
	   $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
	   $objWriter->save('php://output');
	}
public function lap_brg_keluar_hari_kat() { // LAPORAN STOCK OPNAME BERDASARKAN HARI DAN PER KATEGORI
		$where 	= date('Y-m-d',strtotime($this->input->post('tanggal',TRUE)));
		$kat 		= $this->input->post('kategori',TRUE);
		$s_kat   = $this->M_laporan->s_kategori($kat)->num_rows();
		$s_sub_1 = $this->M_laporan->s_sub_1($kat)->num_rows();
		$s_sub_2 = $this->M_laporan->s_sub_2($kat)->num_rows();
		$s_sub_3 = $this->M_laporan->s_sub_3($kat)->num_rows();

		if($s_kat>0) {
			$filter = array(
				'column' => 'kategori',
				'filter' => $kat 
			);
			$data = array(
			'judul' 	=> "Laporan STOCK OPNAME BENGKEL TANGGAL $where - KATEGORI : $filter[filter]",
			'lap' 	=> $this->M_laporan->get_brg_keluar_hari_kat($where,$filter)->result(),
			'title'	=> "Lap.Stok OPNAME"  
		);
		$this->setting_excel($data); //PRINT EXCEL
		}elseif($s_sub_1>0) {
			$filter = array(
				'column' => 'sub_1',
				'filter' => $kat 
			);
			$data = array(
			'judul' 	=> "Laporan STOCK OPNAME BENGKEL TANGGAL $where - KATEGORI : $filter[filter]",
			'lap' 	=> $this->M_laporan->get_brg_keluar_hari_kat($where,$filter)->result(),
			'title'	=> "Lap.Stok OPNAME"  
		);
		$this->setting_excel($data); //PRINT EXCEL
		}elseif ($s_sub_2>0) {
			$filter = array(
				'column' => 'sub_2',
				'filter' => $kat 
			);
			$data = array(
			'judul' 	=> "Laporan STOCK OPNAME BENGKEL TANGGAL $where - KATEGORI : $filter[filter]",
			'lap' 	=> $this->M_laporan->get_brg_keluar_hari_kat($where,$filter)->result(),
			'title'	=> "Lap.Stok OPNAME"  
		);
		$this->setting_excel($data); //PRINT EXCEL
		} elseif($s_sub_3>0) {
			$filter = array(
				'column' => 'sub_3',
				'filter' => $kat 
			);
			$data = array(
			'judul' 	=> "Laporan STOCK OPNAME BENGKEL TANGGAL $where - KATEGORI : $filter[filter]",
			'lap' 	=> $this->M_laporan->get_brg_keluar_hari_kat($where,$filter)->result(),
			'title'	=> "Lap.Stok OPNAME"  
		);
		$this->setting_excel($data); //PRINT EXCEL
		}
		
		$filename = "LAP STOCK OPNAME_$where.xls"; //save our workbook as this file name
	   header('Content-Type: application/vnd.ms-excel'); //mime type
	   header('Content-Disposition: attachment;filename="'.$filename.'"'); 
	   header('Cache-Control: max-age=0'); //no cache
	   $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
	   $objWriter->save('php://output');
	}

	function get_barang() { //GET KATEGORI BARANG
		$kat 		= $this->input->post('kategori',TRUE);
		$s_kat   = $this->M_laporan->s_kat($kat)->num_rows();
		$s_sub_1 = $this->M_laporan->s_sub_1($kat)->num_rows();
		$s_sub_2 = $this->M_laporan->s_sub_2($kat)->num_rows();
		$s_sub_3 = $this->M_laporan->s_sub_3($kat)->num_rows();

		if($s_kat>0) {
			$filter = array(
				'column' => 'kategori',
				'filter' => $kat 
			);
		}elseif($s_sub_1>0) {
			$filter = array(
				'column' => 'sub_1',
				'filter' => $kat 
			);
		}elseif ($sub_2>0) {
			$filter = array(
				'column' => 'sub_2',
				'filter' => $kat 
			);
		} elseif($sub_3>0) {
			$filter = array(
				'column' => 'sub_3',
				'filter' => $kat 
			);
		}
	}
	public function lap_brg_keluar_kat() {
	if($this->session->userdata('level')=='admin') {
		$data = array('content' => "Maaf Tidak bisa masuk ke akses ini" );
		$this->load->view('notification/cant_access',$data);
	} else {
		if($this->session->has_userdata('username')) {
		$data = array(
		'sidebar'	=> "Laporan",
		'sidebar2'	=> "Lap.Barang Keluar",
		'menu'		=> "active open",
		);
		$this->load->view('template/header',$data);
		$this->load->view('template/sidebar',$data);
		$this->load->view('laporan/v_lap_barang_keluar_kat');
		$this->load->view('template/footer');
		}else {
			$this->load->view('login');
		}
	}
	}
	public function filter_brg_keluar_kat() {
		$data = array(
			'kat' 		=> $this->M_laporan->v_all_kat()->result(),
			'sub_1' 	=> $this->M_laporan->v_all_sub_1()->result(),
			'sub_2' 	=> $this->M_laporan->v_all_sub_2()->result(),
			'sub_3' 	=> $this->M_laporan->v_all_sub_3()->result(),
		);
		$status = $this->uri->segment(3);
		if($status=='filter_hari') {
			$this->load->view('modal/filter_brg_kel_hari_kat',$data);		
		}elseif($status=='filter_minggu') {
			$this->load->view('modal/filter_brg_kel_minggu_kat',$data);	
		} elseif($status=='filter_bulan') {
			$this->load->view('modal/filter_brg_kel_bln_kat',$data);	
		}
	}
