<div class="page-content">
	<div class="page-header">
	<h1>
		Lap. Stok Opname BERDASARKAN PERIODE 
		</h1>
	</div><!-- /.page-header -->
<div class="row">
	<a href="<?php echo base_url();?>laporan/ filter_brg_keluar/filter_hari" class="btn btn-primary" data-toggle="modal" data-target="#filter"><i class="fa fa-search"></i> Filter Harian</a>
	<a href="<?php echo base_url();?>laporan/filter_brg_keluar/filter_minggu" class="btn btn-warning" data-toggle="modal" data-target="#filter"><i class="fa fa-search"></i> Filter Mingguan</a>
	<a href="<?php echo base_url();?>laporan/filter_brg_keluar/filter_bulan" class="btn btn-success" data-toggle="modal" data-target="#filter"><i class="fa fa-search"></i> Filter Bulanan</a>
	<a href="<?php echo base_url();?>laporan/v_kat_brg_klr" class="btn btn-danger" data-toggle="modal" data-target="#filter"><i class="fa fa-search"></i> Filter Nama & Kategori</a>
	<div class="col-xs-12" id="print_brg_kel">
<br><br>
<div align="center">
	<h3>Lap. Stok Opname</h3><br>
	Per <?php 
	if(isset($per)) { echo $per; } 
	elseif(isset($mng)) { foreach ($mng as $m) 
	{
	echo date('d M Y',strtotime($m)).'&nbsp';
	}
	};?>
</div>
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th class="center">No</th>
			<th class="center">Tanggal</th>
			<th class="center">Nama Barang</th>
			<th class="center">Kategori</th>
			<th class="center">Sub 1</th>
			<th class="center">Sub 2</th>
			<th class="center">Sub 3</th>
			<th class="center">Stok Masuk</th>
			<th class="center">Stok Keluar</th>
			<th class="center">Stok Akhir</th>
		</tr>
	</thead>
	<tbody>
			<!-- PHP -->
		<tr>
			<?php 
			$total 		= 0;
			$tot_beli 	= 0;
			$tot_jual 	= 0;
			$tgl 		= '';
			$no 		= 1;
			foreach ($lap as $j ) {
		?>	
			<td class="center"><?=$no++ ;?></td>
			<td class="center"><?php if(isset($j->tanggal)) {
					echo date('d M Y',strtotime($j->tanggal));
			}
			?></td>
			<td class="center"><?php echo $j->nama_brg; ?></td>
			<td class="center"><?php echo $j->kategori; ?></td>
			<td class="center"><?php echo $j->sub_1; ?></td>
			<td class="center"><?php echo $j->sub_2; ?></td>
			<td class="center"><?php echo $j->sub_3; ?></td>
			<td class="center">
			<?php if(isset($j->beli)) { 
				echo $j->beli;
			}?>
			</td>
			<td class="center">
			<?php if(isset($j->jual)) { 
				echo $j->jual;
				}
			?></td>
				<td class="center">
			<?php if(isset($j->sisa)) { 
				echo $j->sisa;
			}
			?></td>
			</tr>
			<?php  	
			$total+= $j->sisa; 
			$tot_jual+= $j->jual;
			$tot_beli+= $j->beli;
			}  
			?>
			</tbody>
		<tr>
			<td class="center"><strong>Total</strong></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td class="center"><strong><?=$tot_beli; ?></strong></td>
			<td class="center"><strong><?=$tot_jual; ?></strong></td>
			<td class="center"><strong><?=$total; ?></strong></td>
		</tr>
		</table>
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
