<div class="page-content">
	<div class="page-header">
	<h1>
		REFERENCE
		</h1>
	</div><!-- /.page-header -->
<div class="row">
	<div class="col-xs-12">
<br><br>
<table id="dynamic-table" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th class="center" width="10%">No.</th>
					<th class="center">No REF</th>
					<th class="center">Nama Perkiraan</th>
				</tr>
			</thead>
			<tbody>
			<!-- PHP -->
			<tr>
			<?php 
			$no = 1;
			foreach ($reference as $r ) {
			?>
				<td class="center"><?php echo $no++;?></td>
				<td class="center"><?php echo $r->no_ref; ?></td>
				<td class="center"><?php echo $r->nama_perkiraan; ?></td>
			</tr>
			<?php  } ?>
			</tbody>
		</table>
</div>
</div>
</div>
