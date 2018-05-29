<div class="page-content">
	<div class="page-header">

	<h1>
		NERACA PERCOBAAN
		</h1>
	</div><!-- /.page-header -->
<div class="row">
	<div class="col-xs-12">
<br><br>
<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th class="center" width="10%">No.</th>
					<th class="center">Nama Perkiraan</th>
					<th class="center">Debet</th>
					<th class="center">Kredit</th>
				</tr>
			</thead>
			<tbody>
			<tr>
			<?php 
			$no  = 	1;
			foreach ($ner as $r ) {
			?>
				<td class="center"><?php echo $no++ ;?></td>
				<td><?php echo $r->nama_perkiraan; ?></td>
				<td class="center">Rp <?php if($r->saldo > 0)  { echo number_format($r->saldo,0,".","."); } ?></td>
				<td class="center">Rp <?php if($r->saldo < 0)  { echo number_format(str_replace("-","",$r->saldo),0,".","."); } ?></td>
			</tr>
			<?php  } ?>
			</tbody>
		</table>
</div>
</div>
</div>
