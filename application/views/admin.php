<div class="page-content">
	<div class="page-header">
		<h1>
		ADMIN
		</h1>
	</div><!-- /.page-header -->
<div class="row">
	<div class="col-xs-12">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-admin"><i class="fa fa-plus"></i> Tambah</button>
<br><br>
<table id="dynamic-table" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th class="center" width="10%">No</th>
					<th class="center">Username</th>
					<th class="center">Nama Lengkap</th>
					<th class="center">Status</th>
					<th class="center" width="40%">Actions</th>
				</tr>
			</thead>
			<tbody>
			<!-- PHP -->
			<tr>
			<?php 
			$no = 1;
			foreach ($admin as $a ) {
			?>
				<td class="center"><?php echo $no++;?></td>
				<td class="center"><?php echo $a->username; ?></td>
				<td class="center"><?php echo $a->nama_lengkap; ?></td>
				<td class="center"><?php echo $a->level; ?></td>
				<td class="center">
				<a href="<?php echo base_url();?>admin/edit/<?php echo $a->id;?>" class="btn btn-primary" data-toggle="modal" data-target="#edit-admin"><i class="fa fa-pencil"></i> Edit</a>
				<a href="<?php echo base_url();?>admin/change/<?php echo $a->id;?>" class="btn btn-warning" data-toggle="modal" data-target="#edit-pass"><i class="fa fa-pencil"></i> Change Password</a>
				<a href="<?php echo base_url();?>admin/delete/<?php echo $a->id; ?>" class="btn btn-danger"><i class="fa fa-close"></i> Delete</a>
			</tr>
			<?php  } ?>
			</tbody>
		</table>
</div>
</div>
</div>
<!-- FORM MODAL -->
<div id="add-admin" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
				<a href="<?php echo base_url();?>admin" class="close">&times;</a>
		Tambah Admin
		</div>
		<form class="form-horizontal" method="post" role="form" action="<?php echo base_url();?>admin/add_data">
		<div class="modal-body">
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Username</label>
				<div class="col-sm-9">
				<input type="text" id="form-field-1" class="col-xs-10 col-sm-8" name="username" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nama Lengkap</label>
				<div class="col-sm-9">
				<input type="text" id="form-field-1" class="col-xs-10 col-sm-8" name="nama" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Password</label>
				<div class="col-sm-9">
				<input type="password" id="form-field-1" class="col-xs-10 col-sm-8" name="password" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Status</label>
				<div class="col-sm-9">
				<select class="col-xs-10 col-sm-8" name="level">
					<option value="admin">ADMIN</option>
					<option value="owner">OWNER</option>
				</select>
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

<!-- FORM EDIT admin-->
<div id="edit-admin" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static">
	<div class="modal-dialog">
	<div class="modal-content">
</div>
</div>
</div>

<div id="edit-pass" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static">
	<div class="modal-dialog">
	<div class="modal-content">

<!-- CLOSE MODAL EDIT admin -->