<div class="page-content">
	<div class="page-header">
	<h1>
		Lap. Pembelian
		</h1>
	</div><!-- /.page-header -->
<div class="row">
	<a href="<?php echo base_url();?>laporan/filter_beli/filter_hari" class="btn btn-primary" data-toggle="modal" data-target="#filter"><i class="fa fa-search"></i> Filter Harian</a>
	<a href="<?php echo base_url();?>laporan/filter_beli/filter_minggu" class="btn btn-warning" data-toggle="modal" data-target="#filter"><i class="fa fa-search"></i> Filter Mingguan</a>
	<a href="<?php echo base_url();?>laporan/filter_beli/filter_bulan" class="btn btn-success" data-toggle="modal" data-target="#filter"><i class="fa fa-search"></i> Filter Bulanan</a>
	<!-- <div class="pull-right">
		<a class="btn btn-app btn-light btn-xs" onclick="$('#forprint').printThis();">
			<i class="ace-icon fa fa-print bigger-160"></i>
			Print
		</a>
	</div> -->
	<div class="col-xs-12" id="forprint">
		<div align="center">
			<h3>Laporan Pembelian</h3><br>
			Per <?php 
			if(isset($per)) { echo $per; } 
				elseif(isset($mng)) { foreach ($mng as $m) 
					{
				echo date('d M Y',strtotime($m)).'&nbsp';
			}
			};?>
		</div>
	
<br><br>
<div class="table-responsive">
<table id="dynamic-table" class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th class="center" width="10%">No.</th>
			<th class="center">Tanggal</th>
			<th class="center">Nonota</th>
			<th class="center">Total</th>
			<th class="center">View</th>
	</tr>
	</thead>
	<tbody>
			<!-- PHP -->
		<tr>
		<?php 
		$no = 1;
		$total = 0;
		foreach ($lap as $j ) {
		?>
			<td class="center"><?php echo $no++ ;?></td>
			<td class="center">
			<?php 
				echo date('d F Y',strtotime($j->tanggal));
			?>
			</td>
			<td class="center"><?php echo $j->no_beli; ?></td>
			<td class="center">Rp <?php echo number_format($j->total,0,".","."); ?></td>
			<td class="center"><a href="<?php echo base_url(); ?>laporan/print_nota_beli/<?php echo $j->no_beli;?>" class="btn btn-primary"><i class="fa fa-location-arrow"></i> View</a>
			</td>
		</tr>
		<?php  $total+= $j->total; } ?>

		<tr>
			<td class="center"><strong>Total</strong></td>
			<td></td>
			<td></td>
		
			<td class="center"><strong>Rp <?=number_format($total,0,".",".");?></strong></td>
		</tr>
	</tbody>
</table>
</div>
</div>
</div>
</div>

<!--MODAL FILTER-->
<div id="filter" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static">
	<div class="modal-dialog">
	<div class="modal-content">
</div>
</div>
</div>
