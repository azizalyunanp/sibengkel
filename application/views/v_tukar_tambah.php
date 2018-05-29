<h3 align="center"> BELI BEKAS </h3>
<h4 align="right" id="totalbeli">Total Beli ke Konsumen : Rp <?php echo number_format($total,0,".","."); ?></h4>	
<form class="form-horizontal" role="form" method="post" action="<?php echo base_url();?>pembelian/add_cart">

	<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Nonota </label>
	<div class="col-sm-9">
		<input type="text" placeholder="nomor" class="col-xs-10 col-sm-5" name="nonota" value="AUTO" readonly="true" />
	</div>
	</div>

	<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Cari Barang yg Ada </label>
	<div class="col-sm-5">
	
		<button class="btn btn-primary" id="fil_brg_beli_tt" type="button"><i class="fa fa-plus"></i> Cari Barang</button>
	</div>
	</div>

	<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
	</form>
	<div class="space-4"></div>

<form method="post" action="#">	
	<!-- <input type="hidden" name="total" value="<?php echo $total;?>"> -->
	<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
	<!-- <button type="button" class="btn btn-danger" onclick="save_tt_beli()"><i class="fa fa-location-arrow"></i> Simpan Belanja</button> -->
	</form>	
<?php echo br(3);?>

<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th class="center" width="10%">No</th>
					<th class="center">Nama Barang</th>
					<th class="center">Harga</th>
					<th class="center">Jml Beli</th>
					<th class="center" width="40%">Actions</th>
				</tr>
			</thead>
			<tbody>
			<!-- PHP -->
				<?php 
				$no = 1;
				foreach ($cart as $items) { ?>
			<tr>
				<td class="center"><?php echo $no++ ;?></td>
				<td class="center"><?php echo $items->name;?></td>
				<td class="center" contenteditable="true" onBlur="update_tt_beli(this,'price','<?php echo $items->no; ?>')" onClick="showEdit(this);"><?php echo number_format($items->price,0,".",".");?></td>
				<td contenteditable="true" onBlur="update_tt_beli(this,'qty','<?php echo $items->no; ?>')" onClick="showEdit(this);"><?php echo $items->qty; ?></td>
				<td>
				<a href="<?php echo base_url();?>tukar_tambah/del_beli/<?php echo $items->no;?>" class="btn btn-danger"><i class="fa fa-close"></i> Delete</a>
				</td>
			</tr>

		<?php } ?>
			</tbody>
		</table>
		<br>

		<h3 align="center"> JUAL BARANG KE KONSUMEN </h3>
<h4 align="right">Total jual <input class="texttrans" readonly="readonly" value="<?php echo number_format($this->cart->total(),0,".",".");?>"></h4>
	<h4 align="right" id="totalbeli">
Bayar Rp <input id="all_total" class="texttrans" readonly="readonly" value="<?php echo number_format($all_total,0,".",".");?>"></h4>
<div class="col-xs-6">
<form class="form-horizontal" role="form" method="post">

	<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Nonota </label>
	<div class="col-sm-9">
		<input type="text" placeholder="nomor" class="col-sm-6" name="nonota" value="AUTO" readonly="true" />
	</div>
	</div>

	<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Cari Barang </label>
	<div class="col-sm-5">
		<button class="btn btn-primary" id="fil_brg_jual_tt" type="button"><i class="fa fa-plus"></i> Cari Barang</button>
	</div>
	</div>
</form>
<div class="space-4"></div>
</div>

<div class="col-xs-6">
<form method="post" class="form-horizontal" action="<?php echo base_url();?>tukar_tambah/save_TT">
	<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Nama Pelanggan </label>
	<div class="col-sm-9">
		<select class="select_nm_pel col-xs-10 col-sm-5" name="nama_pelanggan" id="pelanggan" style="width: 50%">
		<option> Nama Pelanggan </option>
		<?php foreach ($pelanggan as $p) { ?>
			<option value="<?php echo $p->no; ?>" data-alamat="<?php echo $p->alamat; ?>" data-hp="<?php echo $p->no_hp; ?>">
			<?php echo $p->nama; ?></option>
		<?php } ?>
		</select>
	</div>
	</div>

	<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Alamat </label>
	<div class="col-sm-9">
		<input type="text" class="col-xs-10 col-sm-5" name="alamat" required="true" id="alamat_pel" />
	</div>
	</div>

	<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> No HP </label>
	<div class="col-sm-9">
		<input type="text" class="col-xs-10 col-sm-5" name="no_hp" required="true" id="no_hp_pel" />
	</div>
	</div>

	<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Garansi </label>
	<div class="col-sm-9">
		<input type="text" class="col-xs-10 col-sm-5" name="garansi" required="true"  />
	</div>
	</div>

	<!--TOTALBAYAR-->
	<input type="hidden" id="totbayar" name="total" value="<?php echo number_format($this->cart->total(),0,".",".");?>">
	<!--TOTAL BAYAR-->

	<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Bayar </label>
	<div class="col-sm-6">
		<input type="text" id="bayar" class="form-control" required="true" onkeyup="showkembali_tt()">
	</div>
	</div>

	<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Kembalian </label>
	<div class="col-sm-6">
		<input type="text" id="kembalian" class="form-control" readonly="true">
	</div>
	</div>

	<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

	<div class="form-group">
	<div class="col-sm-6">
	<button type="submit" class="btn btn-success" id="save_tt_jual"><i class="fa fa-plus"></i> Simpan Belanja</button>
	</div>
	</div>

</form>		
</div>

<table class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th class="center" width="10%">No</th>
			<th class="center">Nama Barang</th>
			<th class="center">Harga</th>
			<th class="center">Jml Beli</th>
			<th class="center" width="40%">Actions</th>
		</tr>
	</thead>
	<tbody>
	<!-- PHP -->
		<?php 
		$no = 1;
		foreach ($cart_j as $i => $items) { ?>
	<tr>
		<td class="center"><?php echo $no++ ;?></td>
		<td class="center"><?php echo $items['name'];?></td>
		<td class="center"><?php echo $items['price'];?></td>
		<td contenteditable="true" onBlur="updatepenjualan(this,'qty','<?php echo $cart_j[$i]['rowid']; ?>')" onClick="showEdit(this);"><?php echo $cart_j[$i]['qty']; ?></td>
		<td>
		<a href="<?php echo base_url();?>tukar_tambah/del_cart/<?php echo $items['rowid'];?>" class="btn btn-danger"><i class="fa fa-close"></i> Delete</a>
		</td>
	</tr>
<?php } ?>
	</tbody>
		</table>

<!--OPEN MODAL ADD PELANGGAN-->
<div id="add-pel_2" class="modal fade" role="dialog">
<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
				<a href="<?php echo base_url();?>tukar_tambah" class="close">&times;</a>
		Tambah Pelanggan
		</div>
		<form class="form-horizontal" method="post" role="form" action="#">
		<div class="modal-body">
			<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Nama Pelanggan </label>
	<div class="col-sm-9">
		<input type="text" class="col-xs-10 col-sm-5" name="nama_pelanggan" id="nama_pelanggan" required="true" />
	</div>
	</div>

	<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Alamat </label>
	<div class="col-sm-9">
		<input type="text" class="col-xs-10 col-sm-5" name="alamat" id="alamat" required="true" />
	</div>
	</div>

	<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> No HP </label>
	<div class="col-sm-9">
		<input type="text" class="col-xs-10 col-sm-5" name="no_hp" id="no_hp" required="true" />
	</div>
	</div>
		</div>
		<div class="modal-footer">
		<button type="button" class="btn btn-success" id="savecust_2"><i class="fa fa-save"></i> Simpan</button>
		<button type="reset" class="btn btn-danger"><i class="fa fa-close"></i> Reset</button>
		</div>
		<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
</form>
	</div>
</div>
</div>
<!--close modal add pelanggan-->
<script src="<?php echo base_url();?>assets/js/fuelux.wizard.min.js"></script>
<script type="text/javascript">
	$('#fil_brg_beli_tt').click(function(){
		$('#cr-brg').modal('show');
		cr_brg_tt();
	});

	$('#fil_brg_jual_tt').click(function(){
		$('#cr-brg_2').modal('show');
		cr_brg_jual_tt();
	});

   function save_tt_beli() {
    	$.ajax({
    		url:"<?php echo base_url();?>tukar_tambah/savebeli",
    		method : "GET",
    		success:function(data) {
    			sweetAlert("Success", "Data berhasil Disimpan", "success");
    			//next_refresh_tt()
    		}
    	});
   }

   	function save_tt_jual() {
    	$.ajax({
    		url:"<?php echo base_url();?>tukar_tambah/savebeli",
    		method : "GET",
    		success:function(data) {
    			sweetAlert("Success", "Data berhasil Disimpan", "success"),
    			get_refresh_tt()
    		}
    	});
   }

   //OPEN MODAL WHEN CARI BARANG PAS PENJUALAN 
	$('#fil_brg').click(function(){
			$('#cr-brg').modal('show');
			cr_brg();
	});
    $(".select_nm_pel").select2(); //select nama pelanggan

    $('.select_nm_pel').change(function(){
			var alamat 	= $('option:selected',this).attr('data-alamat');
			var no_hp	= $('option:selected',this).attr('data-hp');
			$('#alamat_pel').val(alamat);
			$('#no_hp_pel').val(no_hp);
	});

	function showkembali_tt() {
		var harga 	= $('#all_total').val().replace(".", "");
		var bayar 	= $('#bayar').val().replace(".", "");
		var kembali = bayar-harga;
		$('#kembalian').val(convertToRupiah(kembali));
	}
</script>