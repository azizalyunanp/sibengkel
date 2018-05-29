<?php 
if($this->session->userdata('level')=='owner' || $this->session->userdata('level')=='developer') {
	?>
<!--DATA INVENTORY-->
<table id="dynatable" class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th class="center" width="5%">No</th>
			<th class="center">Nama Barang</th>
			<th class="center">Kategori</th>
			<th class="center">Sub 1</th>
			<th class="center">Sub 2</th>
			<th class="center">Sub 3</th>
			<th class="center">Harga Beli</th>
			<th class="center">Harga Jual</th>
			<th class="center">Stok</th>
			<th class="center" width="20%">Actions</th>
		</tr>
	</thead>
	<tbody>

	</tbody>
</table>
<!--TAMBAH BARANG-->
	<?php echo br(2); ?>
	<h4>Tambah Barang Baru</h4>
		<table id="dynatable" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th class="center" width="5%">No</th>
					<th class="center">Nama Barang</th>
					<th class="center">Kategori</th>
					<th class="center">Sub 1</th>
					<th class="center">Sub 2</th>
					<th class="center">Sub 3</th>
					<th class="center">Harga Beli</th>
					<th class="center">Harga Jual</th>
					<th class="center">Stok</th>
					<th class="center" width="20%">Actions</th>
				</tr>
			</thead>
			<tbody>
			<tr>  
          	<td></td>  
            <td><div id="col_nama"  contenteditable="true" style="height: 55px;"></div></td>  
            <td><div id="col_kat"  style="height: 55px;">
            <select class="form-control" name="kategori" id="d_kat">
               <option>Pilih Kategori</option>
						<?php 
						foreach ($kategori as $k) {
						?>
					<option><?php echo $k->kategori;?></option>
						<?php } ?>
				</select>
               </div>
            </td>  
            <td>
            	<select class="form-control" id="d_sub_1">
            		<option></option>
            	</select>
            </td>  
            <td>
            	<select class="form-control" id="d_sub_2">
            		<option></option>
            	</select>
            </td>
            <td>
            	<select class="form-control" id="d_sub_3">
            		<option></option>
            	</select>
            </td>
            <td><div id="col_harga_b" contenteditable="true" style="height: 55px;"></div></td>  
            <td><div id="col_harga_j" contenteditable="true" style="height: 55px;"></div></td>
            <td><div id="col_stok" contenteditable="true" style="height: 55px;"></div></td>  
            <td><button type="button" name="btn_add" id="btn_add" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</button></td>  
        	</tr>
		</tbody>
	</table>
	<?php } else { ?>

	<table id="dynatable1" class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th class="center" width="5%">No</th>
			<th class="center">Nama Barang</th>
			<th class="center">Kategori</th>
			<th class="center">Sub 1</th>
			<th class="center">Sub 2</th>
			<th class="center">Sub 3</th>
			<th class="center">Harga Jual</th>
			<th class="center">Stok</th>
		</tr>
	</thead>
</table>
<?php } ?>

<script type="text/javascript">
	// $('#dynatable').dynatable();
	$('#dynatable').DataTable({ 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?=base_url('inventory/ajax_barang');?>",
            "type": "POST"
        },
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],

    });
	$('#dynatable1').DataTable({ 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?=base_url('inventory/ajax_barang_2');?>",
            "type": "POST"
        },
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
    });
	$('#d_kat').change(function(){ // CARI KATEGORI DYNAMIC 
		var kat = $(this).find('option:selected').text();
		$.ajax({
			url 	: '<?=base_url();?>inventory/cari_kat',
			type 	: 'POST',
			data 	: 'kat=' + kat + '&<?php echo $this->security->get_csrf_token_name(); ?>='+ '<?php echo $this->security->get_csrf_hash(); ?>',
			dataType: 'text',
			success:function(data) {
				$('#d_sub_1').html(data);
				$('#d_sub_2').html(data);
				$('#d_sub_3').html(data);
			}
		});
	});
</script>
