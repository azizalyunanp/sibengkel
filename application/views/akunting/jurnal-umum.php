<div class="page-content">
	<div class="page-header">
	<h1>
		JURNAL UMUM
		</h1>
	</div><!-- /.page-header -->
<div class="row">
	<div class="col-xs-12">
		<button type="button" class="btn btn-primary" data-target="#add-ju" data-toggle="modal"><i class="fa fa-plus"></i> Tambah</button>
<br><br>
<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th class="center" width="10%">No.</th>
					<th class="center">Tanggal</th>
					<th class="center">Nama Perkiraan</th>
					<th class="center">Debet</th>
					<th class="center">Kredit</th>
					<th class="center">Keterangan</th>
					<th class="center">Hapus</th>
				</tr>
			</thead>
			<tbody>
			<!-- PHP -->
			<tr>
			<?php 
			$no  = 	1;
			$tgl = '';
			$ket = '';
			$jum = 1;
			foreach ($ju as $j ) {
			?>
				<td class="center"><?php echo $no++ ;?></td>
				<td class="center">
				<?php if($tgl != $j->tanggal) {
					$tgl = $j->tanggal;
					echo date('d F Y',strtotime($j->tanggal));
				} else {
					echo "";
				}  ?>
				</td>
				<td><?php 
				if($j->debet==0) { 
				echo nbs(10).$j->nama_perkiraan; 
				} else {
				echo $j->nama_perkiraan; 
				} ?>
				</td>
				<td class="center" contenteditable="true" onBlur="updateju(this,'debet','<?php echo $j->no; ?>')" onClick="showEdit(this);"><?php echo number_format($j->debet,0,".","."); ?></td>
				<td class="center" contenteditable="true" onBlur="updateju(this,'kredit','<?php echo $j->no; ?>')" onClick="showEdit(this);"><?php echo number_format($j->kredit,0,".","."); ?></td>
				<td class="center">
				<?php if($ket != $j->keterangan) {
					$ket = $j->keterangan;
					echo $j->keterangan;
				} else {
					echo "";
				}  ?>					
				</td>
				<td><a href="<?=site_url();?>akunting/hapus_ju/<?=$j->no;?>" class="btn btn-primary"><i class="fa fa-trash"></i> Hapus</a></td>
			</tr>
			<?php } ?>
			<!--GET TOTAL JURNAL UMUM-->
			<tr>
				<td class="center"><strong>Total</strong></td>
				<td></td>
				<td></td>
				<td title="total debet" class="center"><strong>Rp <?php echo number_format($total_debet->debet,0,".",".");?></strong></td>
				<td title="total kredit" class="center"><strong>Rp <?php echo number_format($total_kredit->kredit,0,".",".");?></strong></td>
				<td></td>
				<td></td>
			</tr>
			</tbody>
		</table>
</div>
</div>
</div>

<!-- FORM MODAL -->
<div id="add-ju" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
				<a href="<?php echo base_url();?>akunting/jurnal_umum" class="close">&times;</a>
		Tambah Jurnal Umum
		</div>
		<form class="form-horizontal" method="post" role="form" action="<?php echo base_url();?>akunting/tambah_ju">
		<div class="modal-body">
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Tanggal</label>
				<div class="col-sm-9">
				<input type="text" id="form-field-1" class="col-xs-10 col-sm-8" name="tanggal" data-field="date" required="true" data-format="dd-MM-yyyy" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nama Perkiraan</label>
				<div class="col-sm-9">
				<select class="col-xs-10 col-sm-8" name="akun">
				<option>Nama Perkiraan</option>
				<?php foreach ($ref as $r) {
				?>
				<option value="<?php echo $r->id;?>"><?php echo $r->nama_perkiraan;?></option>
				<?php } ?>

				<option value="b_hutang_dagang">Pembayaran Hutang Dagang</option>
				</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Biaya</label>
				<div class="col-sm-9">
				<input type="text" class="col-xs-10 col-sm-8" name="biaya" id="biaya" required="true" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Keterangan</label>
				<div class="col-sm-9">
				<input type="text" class="col-xs-10 col-sm-8" name="keterangan" />
				</div>
			</div>
		</div>
		<div class="modal-footer">
		<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
		<button type="reset" class="btn btn-danger"><i class="fa fa-close"></i> Reset</button>
		</div>
		<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
</form>
	</div>
</div>
</div>
<!-- CLOSE MODAL-->

<!--EDIT JURNAL UMUM MODAL-->
<div id="edit_ju" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog">
	<div class="modal-content"></div>
	</div>
</div>