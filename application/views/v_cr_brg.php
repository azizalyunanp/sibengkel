<form method="post" action="#">
<table id="dynatable" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th class="center" width="5%">No</th>
					<th class="center">Nama Barang</th>
					<th class="center">Kategori</th>
					<th class="center">Sub 1</th>
					<th class="center">Sub 2</th>
					<th class="center">Sub 3</th>
					<th class="center">Harga</th>
					<th class="center">Stok</th>
					<th class="center">Jml Beli</th>
					<th class="center">Action</th>
				</tr>
			</thead>
		</table>
</form>

<script type="text/javascript">
	$('#dynatable').DataTable({ 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?=base_url('penjualan/ajax_barang');?>",
            "type": "POST"
        },
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],

    });
</script>