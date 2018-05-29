<body>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace.min.css" class="ace-main-stylesheet"/>
	<script type="text/javascript">
		window.print();
	</script>

	<div class="row">
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
		<div class="space-6"></div>

		<div class="row">
			<div class="col-sm-10 col-sm-offset-1">
				<div class="widget-box transparent">
					<div class="widget-header widget-header-large">
						<h3 class="widget-title grey lighter">
							<i class="ace-icon fa fa-leaf green"></i>
							<?php echo $status; ?>
						</h3>

						<div class="widget-toolbar no-border invoice-info">
							<span class="invoice-info-label">Invoice:</span>
							<span class="red"><?php echo $this->uri->segment(3); ?></span>

							<br />
							<span class="invoice-info-label">Date:</span>
							<span class="blue"><?php echo $tgl->tanggal; ?></span>
						</div>

						<div class="widget-toolbar hidden-480">
							<a href="#">
								<i class="ace-icon fa fa-print"></i>
							</a>
						</div>
					</div>

<div class="widget-body">
	<div class="widget-main padding-24">
		<div class="row">
			<div class="col-sm-6">
				<div class="row">
					<div class="col-xs-11 label label-lg label-info arrowed-in arrowed-right">
						<b>Company Info</b>
					</div>
				</div>
				<div>
						<ul class="list-unstyled spaced">
						<li>
							<i class="ace-icon fa fa-caret-right blue"></i>dr.AKI
						</li>

						<li>
							<i class="ace-icon fa fa-caret-right blue"></i>SPESIALIS AKI MOBIL & MOTOR
						</li>

						<li>
							<i class="ace-icon fa fa-caret-right blue"></i>Outlet - 102 
						</li>

						<li>
							<i class="ace-icon fa fa-caret-right blue"></i>
Phone:
							<b class="red">0822 100 30000</b>
						</li>

						<li class="divider"></li>
					</ul>
				</div>
			</div><!-- /.col -->

			<div class="col-sm-6">
				<div class="row">
					<div class="col-xs-11 label label-lg label-success arrowed-in arrowed-right">
						<b>Customer Info</b>
					</div>
				</div>

				<div>
					<ul class="list-unstyled  spaced">
						<li>
							<i class="ace-icon fa fa-caret-right green"></i><?php echo $pelanggan->nama;?>
						</li>

						<li>
							<i class="ace-icon fa fa-caret-right green"></i><?php echo $pelanggan->alamat;?>
						</li>

						<li>
							<i class="ace-icon fa fa-caret-right green"></i><?php echo $pelanggan->no_hp;?>
						</li>
						<li class="divider"></li>
					</ul>

				</div>
			</div><!-- /.col -->
		</div><!-- /.row -->

		<div class="space"></div>

		<div>
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th class="center">#</th>
						<th>Nm Barang</th>
						<th>Jml Barang</th>
						<th>Harga</th>
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
						<td>
							Rp <?php echo number_format($n->harga_brg,0,".",".") ;?>
						</td>
					</tr>
				<?php } ?>

				<tr>
				<?php 
				foreach ($bekas as $b) {
				?>
						<td class="center"></td>

						<td>
							Bekas ( <?php echo $b->name . '('. $b->sub_1 . ',' . $b->sub_2 . ',' . $b->sub_3 . ')' ;?> )
						</td>
						<td>
							<?php echo $b->qty;?>
						</td>
						<td>
							Rp <?php echo number_format($b->price,0,".",".") ;?>
						</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>

		<div class="hr hr8 hr-double hr-dotted"></div>

		<div class="row">
			<div class="col-sm-5 pull-right">
				<h4 class="pull-right">
					 Total Rp
					 <span class="red">Rp
					 <?=number_format($tambah,0,".",".");?>
					 </span>
					 <!-- <br><br>
					 Diskon : 
					 <span class="red">
					<?php
						echo $total->diskon .' %';
					 ?></span> -->
					 <!-- <br><br>
					 Total Bayar : 
					 <span class="red">Rp 
					<?php
						echo number_format($total->total,0,".",".");
					 ?></span> -->
				</h4>
			</div>
		</div>

		<div class="space-6"></div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- PAGE CONTENT ENDS -->
	</div><!-- /.col -->
</div><!-- /.row -->
</body>