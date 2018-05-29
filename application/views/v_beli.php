<?php 
if($this->session->userdata('level')=='owner' || $this->session->userdata('level')=='developer') {
	?>
<h4 align="right" id="totalbeli">Total : Rp <?php echo number_format($total,0,".","."); ?></h4>	
<?php } ?>
<form class="form-horizontal" role="form" method="post" action="<?php echo base_url();?>pembelian/add_cart">

	<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Nonota </label>
	<div class="col-sm-9">
		<input type="text" placeholder="nomor" class="col-xs-10 col-sm-5" name="nonota" value="AUTO" readonly="true" />
	</div>
	</div>

	<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Cari Barang  </label>
	<div class="col-sm-5">
	
		<button class="btn btn-primary" id="fil_brg_beli" type="button"><i class="fa fa-plus"></i> Cari Barang</button>
	</div>
	</div>

	<!-- <div class="form-group">
	<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tambah Barang Baru </label>
	<div class="col-sm-5">
	
		<button class="btn btn-success" type="button" data-toggle="modal" data-target="#add-brg"><i class="fa fa-plus"></i> Tambah Barang</button>
	</div>
	</div> -->

	<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
	</form>
	<div class="space-4"></div>

</div>

<form method="post" action="<?php echo base_url();?>pembelian/b_tunai">	
	<input type="hidden" name="total" value="<?php echo $total;?>">
	<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
	<br>
	<button type="submit" class="btn btn-success"><i class="fa fa-location-arrow"></i> Bayar Tunai</button>
	<button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#m_kredit"><i class="fa fa-location-arrow"></i> Bayar Kredit</button>
	</form>	
<?php echo br(3);?>

<div class="table-responsive">

<?php 
if($this->session->userdata('level')=='owner' || $this->session->userdata('level')=='developer') {
	?>
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
				<td class="center"><?php echo number_format($items->price,0,".",".");?></td>
				<td contenteditable="true" onBlur="updatepembelian(this,'qty','<?php echo $items->id; ?>')" onClick="showEdit(this);"><?php echo $items->qty; ?></td>
				<td>
				<a href="<?php echo base_url();?>pembelian/del_cart/<?php echo $items->no;?>" class="btn btn-danger"><i class="fa fa-close"></i> Delete</a>
				</td>
			</tr>

		<?php } ?>
			</tbody>
		</table>
<?php } else { ?>
	<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th class="center" width="10%">No</th>
					<th class="center">Nama Barang</th>
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
				<td contenteditable="true" onBlur="updatepembelian(this,'qty','<?php echo $items->id; ?>')" onClick="showEdit(this);"><?php echo $items->qty; ?></td>
				<td>
				<a href="<?php echo base_url();?>pembelian/del_cart/<?php echo $items->no;?>" class="btn btn-danger"><i class="fa fa-close"></i> Delete</a>
				</td>
			</tr>

		<?php } ?>
			</tbody>
		</table>
<?php } ?>
</div>

<!-- FORM MODAL -->
<div id="m_kredit" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
				<a href="<?php echo base_url();?>pembelian" class="close">&times;</a>
		Pembelian Kredit
		</div>
		<form class="form-horizontal" method="post" role="form" action="<?php echo base_url();?>pembelian/b_kredit">
		<div class="modal-body">
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Hutang Dagang</label>
				<div class="col-sm-9">
				<input type="number" id="form-field-1" class="col-xs-10 col-sm-8" name="dp" />
				</div>
			</div>
		</div>
		<div class="modal-body">
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Keterangan</label>
				<div class="col-sm-9">
				<input type="text" id="form-field-1" class="col-xs-10 col-sm-8" name="keterangan" />
				</div>
			</div>
		</div>
		<div class="modal-footer">
		<button type="submit" class="btn btn-success" name="add-admin"><i class="fa fa-save"></i> Simpan</button>
		<button type="reset" class="btn btn-danger"><i class="fa fa-close"></i> Reset</button>
		</div>
		<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
</form>
	</div>
</div>
</div>
<!-- CLOSE MODAL -->

<script type="text/javascript">
	$('#fil_brg_beli').click(function(){
			$('#cr-brg_beli').modal('show');
			cr_brg_beli();
	});
</script>
