<head>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" media="print">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace.min.css" class="ace-main-stylesheet" media="print">
	<script type="text/javascript">
		window.print();
	</script>
	<style media="print">
	@page {
  		size: auto;
  		margin : 5px;
	}

	table {
		font-size: 12px;
		font-family: 'SansSerif';
	}

	th,td {
		font-size: 12px;
		font-family: 'Calibri';
	}

	.detail {
	padding-top: 5px;
   -webkit-column-count: 2; /* Chrome, Safari, Opera */
   -moz-column-count: 2; /* Firefox */
   column-count: 2;
	}

	li {
	padding: 4px;
	font-size: 12px;
	font-family: 'Calibri';
	list-style: none;
	}
	</style>
</head>

<div class="detail">
	<ul>
		<li><strong>dr.AKI </strong> SPESIALIS AKI MOBIL & MOTOR - Outlet 102</li>
		<li>No Telp: 0822 100 30000 </li>
	</ul>

	<ul>
		<li><strong>Customer : </strong><?php echo $pelanggan->nama. ' ' .$pelanggan->alamat ;?></li>
		<li>No HP : <?php echo $pelanggan->no_hp;?></li>
	</ul>
	<ul>
		<li><strong>Nonota : </strong> <?=$nonota;?></li>
	</ul>
</div>

<body>
	<div class="row">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th class="center">#</th>
						<th>Nm Barang</th>
						<th>Jml Barang</th>
						<th>Harga</th>
						<th>Subtotal</th>
					</tr>
				</thead>

				<tbody>
					<tr>
				<?php 
				$no = 1 ;
				foreach ($nota as $n) {
				?>
						<td class="center"><?php echo $no++ ;?></td>

						<td>
							TT <?php echo $n->nama_brg . '('. $n->sub_1 . ',' . $n->sub_2 . ',' . $n->sub_3 . ')' ;?>
						</td>
						<td>
							<?php echo $n->jml_brg;?>
						</td>
						<td>.
							Rp <?php echo number_format($n->harga_brg,0,".",".") ;?>
						</td>
						<td>
							Rp <?=number_format($n->jml_brg * $n->harga_brg,0,".",".");?>
						</td>
					</tr>
				<?php } ?>
					<tr>
				<?php 
				$no = 1 ;
				foreach ($bekas as $b) {
				?>
						<td></td>
					<td>
						Bekas ( <?php echo $b->name . '('. $b->sub_1 . ',' . $b->sub_2 . ',' . $b->sub_3 . ')' ;?> )
					</td>
					<td>
						<?php echo $b->qty;?>
					</td>
					<td>
						Rp <?php echo number_format($b->price,0,".",".") ;?>
					</td>
					<td>
							Rp <?=number_format($b->qty * $b->price,0,".",".");?>
					</td>
					</tr>
				<?php } ?>
				<tr>
					<td></td>
					<td>Garansi <?=$garansi['garansi'];?></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				</tbody>
			</table>
			<div align="right" style="margin-right: 3cm;">
					Total Bayar <br>
					Rp <?php echo number_format($tambah,0,".",".");
					?>
			</div>
	</div>
</body>