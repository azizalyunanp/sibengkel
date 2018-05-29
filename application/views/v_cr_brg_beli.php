<form method="post" action="#">
<?php 
if($this->session->userdata('level')=='owner' || $this->session->userdata('level')=='developer') {
	?>
<table id="dynatable" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th class="center" width="5%">No</th>
					<th class="center">Nama Barang</th>
					<th class="center">Kategori</th>
					<th class="center">Sub 1</th>
					<th class="center">Sub 2</th>
					<th class="center">Harga</th>
					<th class="center">Stok</th>
					<th class="center">Jml Beli</th>
					<th class="center">Action</th>
				</tr>
			</thead>
			<tbody>
			<!-- PHP -->
			<tr>
			<?php 
			$no = 1;
			foreach ($barang as $b ) {
			?>
				<td class="center"><?php echo $no++;?> <input type="hidden" id="cr_kd_brg_<?php echo $b->id;?>" value="<?php echo $b->id;?>"></td>
				<td><input style="border: 0" readonly="true" type="text" id="cr_nama_brg_<?php echo $b->id;?>" value="<?php echo $b->nama;?>"></td>
				<td><?php echo $b->kategori; ?> </td>
				<td><?php echo $b->sub_1; ?></td>
				<td><?php echo $b->sub_2; ?></td>
				<td><input style="border: 0" readonly="true" id="cr_hrg_brg_<?php echo $b->id;?>" value="<?php echo number_format($b->harga_beli,0,".",".");?>" size="5"> </td>
				<td><?php echo $b->stok; ?></td>
				<td><input type="number" class="form-control" style="width: auto;" name="qty" id="cr_qty_<?php echo $b->id;?>"></td>
				<td><button type="button" class="btn btn-success" onclick="add_beli(<?php echo $b->id;?>)"><i class="fa fa-plus"></i> Tambah</button></td>
				<!-- <a href="inventory/delete/<?php echo $b->id; ?>" class="btn btn-danger"><i class="fa fa-close"></i> Delete</a> -->
			</tr>
			<?php  } ?>
			</tbody>
		</table>
<?php } else { ?>
<table id="dynatable" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th class="center" width="5%">No</th>
					<th class="center">Nama Barang</th>
					<th class="center">Kategori</th>
					<th class="center">Sub 1</th>
					<th class="center">Sub 2</th>
					<th class="center">Stok</th>
					<th class="center">Jml Beli</th>
					<th class="center">Action</th>
				</tr>
			</thead>
			<tbody>
			<!-- PHP -->
			<tr>
			<?php 
			$no = 1;
			foreach ($barang as $b ) {
			?>
				<td class="center"><?php echo $no++;?> <input type="hidden" id="cr_kd_brg_<?php echo $b->id;?>" value="<?php echo $b->id;?>"></td>
				<td><input style="border: 0" readonly="true" type="text" id="cr_nama_brg_<?php echo $b->id;?>" value="<?php echo $b->nama;?>"></td>
				<td><?php echo $b->kategori; ?> </td>
				<td><?php echo $b->sub_1; ?></td>
				<td><?php echo $b->sub_2; ?></td>
				<input style="display: none;" readonly="true" id="cr_hrg_brg_<?php echo $b->id;?>" value="<?php echo number_format($b->harga_beli,0,".",".");?>" size="5"> 
				<td><?php echo $b->stok; ?></td>
				<td><input type="number" class="form-control" style="width: auto;" name="qty" id="cr_qty_<?php echo $b->id;?>"></td>
				<td><button type="button" class="btn btn-success" onclick="add_beli(<?php echo $b->id;?>)"><i class="fa fa-plus"></i> Tambah</button></td>
				<!-- <a href="inventory/delete/<?php echo $b->id; ?>" class="btn btn-danger"><i class="fa fa-close"></i> Delete</a> -->
			</tr>
			<?php  } ?>
			</tbody>
		</table>
	<?php } ?>
</form>

<script type="text/javascript">
	$('#dynatable').dynatable();
</script>