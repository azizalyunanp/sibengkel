<h2 align="right" id="totalbeli">
Rp <input id="total" class="texttrans" readonly="readonly" value="<?php echo number_format($this->cart->total(),0,".",".");?>"></h2>
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
		<button class="btn btn-primary" id="fil_brg" type="button"><i class="fa fa-plus"></i> Cari Barang</button>
	</div>
	</div>
</form>
<div class="space-4"></div>
</div>

<div class="col-xs-6">
<form method="post" class="form-horizontal" action="<?php echo base_url();?>penjualan/savecart"> 
	<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Nama Pelanggan </label>
	<div class="col-sm-9">
		<select class="select_nm_pel col-sm-6" name="nama_pelanggan" id="nama_pel">
		<option></option>
		<?php foreach ($pelanggan as $p) { ?>
			<option value="<?php echo $p->no; ?>" data-alamat="<?php echo $p->alamat; ?>" data-hp="<?php echo $p->no_hp; ?>">
			<?php echo $p->nama; ?></option>
		<?php } ?>
		</select>
		<button class="btn btn-primary" id="add_cust" type="button"><i class="fa fa-plus"></i> Tambah</button>
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
	<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Garansi</label>
	<div class="col-sm-9">
		<input type="text" class="col-xs-10 col-sm-5" name="garansi" placeholder="6 bulan / 12 bulan"/>
	</div>
	</div>

	<!-- <div class="form-group">
	<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Diskon </label>
	<div class="col-sm-9">
		<input type="number" class="col-xs-10 col-sm-5" id="diskon" name="diskon" required="true" onkeyup="showdiskon()" />
	</div>
	</div> -->

	<!--TOTALBAYAR-->
	<input type="hidden" id="totbayar" name="total" value="<?php echo number_format($this->cart->total(),0,".",".");?>">
	<!--TOTAL BAYAR-->


	<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Bayar </label>
	<div class="col-sm-6">
		<input type="text" id="bayar" class="form-control" required="true" onkeyup="showkembali()">
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
	<button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Simpan Belanja</button>
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
		foreach ($cart as $i => $items) { ?>
	<tr>
		<td class="center"><?php echo $no++ ;?></td>
		<td class="center"><?php echo $items['name'];?></td>
		<td class="center"><?php echo $items['price'];?></td>
		<td contenteditable="true" onBlur="updatepenjualan(this,'qty','<?php echo $cart[$i]['rowid']; ?>')" onClick="showEdit(this);"><?php echo $cart[$i]['qty']; ?></td>
		<td>
		<a href="<?php echo base_url();?>penjualan/del_cart/<?php echo $items['rowid'];?>" class="btn btn-danger"><i class="fa fa-close"></i> Delete</a>
		</td>
	</tr>
<?php } ?>
	</tbody>
		</table>

<!--OPEN MODAL ADD PELANGGAN-->
<div id="add-pel" class="modal fade" role="dialog">
<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
				<a href="<?php echo base_url();?>penjualan" class="close">&times;</a>
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
		<button type="button" class="btn btn-success" id="savecust"><i class="fa fa-save"></i> Simpan</button>
		<button type="reset" class="btn btn-danger"><i class="fa fa-close"></i> Reset</button>
		</div>
		<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
</form>
	</div>
</div>
</div>
<!--close modal add pelanggan-->

<script type="text/javascript">
//OPEN MODAL WHEN CARI BARANG PAS PENJUALAN 
	$('#fil_brg').click(function(){
			$('#cr-brg').modal('show');
			cr_brg();
	});
    $(".select_nm_pel").select2(); //select nama pelanggan
    $('#add_cust').click(function(){
		$('#add-pel').modal('show');
	});

    //MASK MONEY BAYAR
   	$('#bayar').maskMoney({
			thousands:'.', decimal:',', precision:0
	});
	
	//ADD CUSTOMERS WITH AJAX 
	$('#savecust').click(function(){
		var nama_pelanggan 	= $('#nama_pelanggan').val();
		var alamat 			= $('#alamat').val();
		var no_hp 			= $('#no_hp').val();

		$.ajax({
			type	: "POST",
			url 	: "<?php echo base_url()?>penjualan/simpan_pelanggan",
			data 	: 'nama_pelanggan='+nama_pelanggan+'&alamat='+alamat+'&no_hp='+no_hp+
			'&<?php echo $this->security->get_csrf_token_name(); ?>='+ '<?php echo $this->security->get_csrf_hash(); ?>',
			success: function(data) {
				refresh_cart()
			}
		});
	});


	$('.select_nm_pel').change(function(){
			var alamat 	= $('option:selected',this).attr('data-alamat');
			var no_hp	= $('option:selected',this).attr('data-hp');
			$('#alamat_pel').val(alamat);
			$('#no_hp_pel').val(no_hp);
	});
</script>