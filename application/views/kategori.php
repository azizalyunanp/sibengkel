<div class="page-content">
	<div class="page-header">
		<h1>
		KATEGORI BARANG
		</h1>
	</div><!-- /.page-header -->
<div class="row">
	<div class="col-xs-12">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-kategori"><i class="fa fa-plus"></i> Tambah</button>
<br><br>
<table id="dynamic-table" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th class="center" width="10%">No</th>
					<th class="center" width="20%">Nama Kategori</th>
					<th class="center" width="40%" >Actions</th>
				</tr>
			</thead>
			<tbody>
			<!-- PHP -->
			<tr>
			<?php 
			$no = 1;
			foreach ($kategori as $k ) {
			?>
				<td class="center"><?php echo $no++;?></td>
				<td class="center"><?php echo $k->kategori; ?></td>
				<td class="center">
				<a href="kategori/edit_kat/<?php echo $k->id_kategori;?>" class="btn btn-primary" data-toggle="modal" data-target="#edit-kategori"><i class="fa fa-pencil"></i> Edit</a>
				<a href="kategori/delete/<?php echo $k->id_kategori; ?>" class="btn btn-danger"><i class="fa fa-close"></i> Delete</a>
			</tr>
			<?php  } ?>
			</tbody>
		</table>
</div>
</div>
</div>
<!-- FORM MODAL ADD PELAYANAN -->
<div id="add-kategori" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
				<a href="<?php echo base_url();?>kategori" class="close">&times;</a>
		Tambah Kategori
		</div>
		<form class="form-horizontal" method="post" role="form" action="<?php echo base_url();?>kategori/add_data">
		<div class="modal-body">
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nama Kategori</label>
				<div class="col-sm-9">
				<input type="text" id="form-field-1" class="col-xs-10 col-sm-8" name="nama" />
				</div>
			</div>
		</div>
		<div class="modal-footer">
		<button type="submit" class="btn btn-success" name="add-kategori"><i class="fa fa-save"></i> Simpan</button>
		<button type="reset" class="btn btn-danger"><i class="fa fa-close"></i> Reset</button>
		</div>
		<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
</form>
	</div>
</div>
</div>
<!-- CLOSE MODAL ADD PELAYANAN -->

<!-- FORM EDIT LAYANAN-->
<div id="edit-kategori" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static">
	<div class="modal-dialog">
	<div class="modal-content">
<!-- CLOSE MODAL EDIT LAYANAN -->