<table id="dynatable" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th class="center" width="5%">No</th>
					<th class="center">Kategori</th>
					<th class="center">Sub Kategori</th>
					<th class="center" width="20%">Actions</th>
				</tr>
			</thead>
			<tbody>
			<!-- PHP -->
			<tr>
			<?php 
			$no = 1;
			foreach ($sub_kategori as $sk ) {
			?>
				<td class="center"><?php echo $no++;?></td>
				<td><div class="col_nama" onBlur="updatesub_kat(this,'kategori','<?php echo $sk->id; ?>')" contenteditable style="height: 55px;" onClick="showEdit(this);"><?php echo $sk->kategori; ?></div></td>
				<td><div class="col_kat" onBlur="updatesub_kat(this,'sub_kategori','<?php echo $sk->id; ?>')" contenteditable style="height: 55px;" onClick="showEdit(this);"><?php echo $sk->sub_kategori; ?></div></td>
				<td class="center">
				<button class="btn btn-danger" onClick="del_sub_kat(<?php echo $sk->id;?>)"><i class="fa fa-trash"></i> Delete</button></td>
			</tr>
			<?php  } ?>
		
			</tbody>
		</table>
		<?php echo br(2); ?>
		<h4>Tambah Sub Kategori</h4>
		<table class="table table-striped table-bordered table-hover">
		<thead>
				<tr>
					<th class="center" width="5%">No</th>
					<th class="center">Kategori</th>
					<th class="center">Sub Kategori</th>
					<th class="center" width="20%">Actions</th>
				</tr>
			</thead>
			<tbody>
			<tr>  
                <td></td>  
                <td class="center">
                <select name="kategori" id="s_kat" style="width: 200px;">
                		<option>Pilih Kategori</option>
						<?php 
						foreach ($kategori as $k) {
						?>
						<option><?php echo $k->kategori;?></option>
						<?php } ?>
					</select>
				</td>  
                <td class="center"><div id="col_sub_kat" contenteditable="true" style="height: 55px;"></div>
                </td>  
                <td><button type="button" name="btn_add" id="btn_add_sub_kat" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</button></td>  
           </tr>
           </tbody>
        </table>

<script type="text/javascript">
	$('#dynatable').dynatable();
</script>