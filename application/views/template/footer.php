<div id="dtBox"></div><!--MODAL PERSEDIAAN AWAL -->
<div id="mod_pers_awal" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <a href="<?php echo base_url();?>akunting/lap_rugi_laba" class="close">&times;</a>
    Input Persediaan
    </div>
    <form class="form-horizontal" method="post" role="form" action="<?php echo base_url();?>akunting/pers_akhir">
    <div class="modal-body">
      <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Tanggal</label>
        <div class="col-sm-9">
        <input type="text" id="form-field-1" class="col-xs-10 col-sm-8" name="tanggal" data-field="date" required="true" data-format="dd-MM-yyyy" />
        </div>
      </div>
    </div>
    <div class="modal-footer">
    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
    <button type="reset" class="btn btn-danger"><i class="fa fa-close"></i> Reset</button>
    </div>
    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
</form>
  </div>
</div>
</div>

<!--MODAL INPUT MODAL AWAL-->
<div id="mod_neraca" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <a href="<?php echo base_url();?>akunting/neraca" class="close">&times;</a>
    Input Modal
    </div>
    <form class="form-horizontal" method="post" role="form" action="<?php echo base_url();?>akunting/save_modal">
    <div class="modal-body">
      <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Tanggal</label>
        <div class="col-sm-9">
        <input type="text" id="form-field-1" class="col-xs-10 col-sm-8" name="tanggal" data-field="date" required="true" data-format="dd-MM-yyyy" />
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Kas</label>
        <div class="col-sm-9">
        <input type="number" id="n_kas" class="col-xs-10 col-sm-8" name="kas" onchange="h_modal()">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Inventaris</label>
        <div class="col-sm-9">
        <input type="number" class="col-xs-10 col-sm-8" name="inventaris" required="true" id="n_inv"  onchange="h_modal()" />
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Persediaan Barang Dagangan</label>
        <div class="col-sm-9">
        <input type="number" class="col-xs-10 col-sm-8" name="persediaan" required="true" id="n_pers"  onchange="h_modal()"/>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Perlengkapan Toko</label>
        <div class="col-sm-9">
        <input type="number" class="col-xs-10 col-sm-8" name="perlengkapan" required="true" id="n_perl" onchange="h_modal()"/>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Kendaraan</label>
        <div class="col-sm-9">
        <input type="number" class="col-xs-10 col-sm-8" name="kendaraan" required="true" id="n_kend" onchange="h_modal()"/>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Total</label>
        <div class="col-sm-9">
        <input type="text" class="col-xs-10 col-sm-8" name="total" required="true" id="n_total" />
        </div>
      </div>

    </div>
    <div class="modal-footer">
    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
    <button type="reset" class="btn btn-danger"><i class="fa fa-close"></i> Reset</button>
    </div>
    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
</form>
  </div>
</div>
</div>

<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">Bengkel</span>
							Application &copy; 2017 
						</span>
					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div>

		<!--SWEET ALERT-->
		<script src="<?php echo base_url(); ?>assets/js/sweetalert.min.js"></script>
		<!--DT PICKER-->
		
    <!--PRINT THIS-->
    <script type="text/javascript" src="<?=base_url();?>assets/js/printThis.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/jquery-ui.custom.min.js"></script>

		<!-- ace scripts -->
		<script src="<?php echo base_url(); ?>assets/js/ace-elements.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/ace.min.js"></script>
		<!--REPOSITORY-->
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/select2.full.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.maskMoney.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.dynatable.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/highcharts.js"></script>

<script type"text/javascript">
	$(document).ready(function() {
		$('#dynatable').dynatable();
		$('#dtBox').DateTimePicker();
		//mask money rupiah 
		$('#biaya').maskMoney({
			thousands:'.', decimal:',', precision:0
		});

		$('#harga_j').maskMoney({
			thousands:'.', decimal:',', precision:0
		});

		$('#harga_b').maskMoney({
			thousands:'.', decimal:',', precision:0
		});


	function fetch_data()  {  //VIEW INVENTORY
      $.ajax({  
            url:"<?php echo base_url();?>inventory/view_data",  
            method:"GET",  
            success:function(data){  
            	$('#live_data').html(data);  
            }  
         });  
      }  
      fetch_data();  

      function fetch_cart() { //VIEW CART  
         $.ajax({  
            url:"<?php echo base_url();?>penjualan/view_cart",  
            method:"GET",  
           success:function(data){  
               $('#view_cart').html(data);  
           }  
         });  
      }  
      fetch_cart();  

      function fetch_beli()  {  
         $.ajax({  
                url:"<?php echo base_url();?>pembelian/view_beli",  
                method:"GET",  
                success:function(data){  
                     $('#view_beli').html(data);  
                }  
           });  
      }  
      fetch_beli();  

       function fetch_sub_kat()  
     	{  
           $.ajax({  
                url:"<?php echo base_url();?>kategori/view_sub",  
                method:"GET",  
                success:function(data){  
                     $('#livedata').html(data);  
                }  
           });  
      }  
      fetch_sub_kat();

    function fetch_tt()  
     	{  
           $.ajax({  
                url:"<?php echo base_url();?>tukar_tambah/view_beli",  
                method:"GET",  
                success:function(data){  
                     $('#view_tt').html(data);  
                }  
           });  
    }  
    fetch_tt();  

   $(document).on('click', '#btn_add', function(){  
     var nama 	 = $('#col_nama').text(); 
     var kat 	 	 = $('#col_kat option:selected').text(); 
     var sub_1 	 = $('#d_sub_1 option:selected').text();  
     var sub_2 	 = $('#d_sub_2 option:selected').text(); 
     var sub_3 	 = $('#d_sub_3 option:selected').text(); 
     var harga_b 	 = $('#col_harga_b').text();  
     var harga_j 	 = $('#col_harga_j').text();  
     var stok 	 = $('#col_stok').text();  
     if(nama == '')  
     {  
          alert("Masukkan Nama Barang");  
          return false;  
     }  
     $.ajax({  
          url:"<?php echo base_url();?>inventory/add_data_ajax",  
          method:"POST",  
          data:"nama="+nama+"&kat="+kat+"&sub_1="+sub_1+"&sub_2="+sub_2+"&sub_3="+sub_3+"&harga_b="+harga_b+"&harga_j="+harga_j+"&stok="+stok+
  		'&<?php echo $this->security->get_csrf_token_name(); ?>='+ '<?php echo $this->security->get_csrf_hash(); ?>',
          dataType:"text",  
          success:function(data)  
          {  
               sweetAlert("Success", "Data berhasil Disimpan", "success");
               fetch_data();  
          }  
     })  
    });  

    $(document).on('click', '#btn_add_sub_kat', function(){  
           var kat 	 	 = $('#s_kat option:selected').text(); 
           var sub_kat 	 = $('#col_sub_kat').text(); 
          
           if(sub_kat == '')  
           {  
                alert("Masukkan Nama Barang");  
                return false;  
           }  
           $.ajax({  
                url:"<?php echo base_url();?>kategori/add_sub_kat",  
                method:"POST",  
                data:"kat="+kat+"&sub_kat="+sub_kat+
        		'&<?php echo $this->security->get_csrf_token_name(); ?>='+ '<?php echo $this->security->get_csrf_hash(); ?>',
                dataType:"text",  
                success:function(data)  
                {  
                     sweetAlert("Success", "Data berhasil Disimpan", "success");
                     fetch_sub_kat();
                }  
           })  
      });  

	});

	function refresh_data()  
     	{  
           $.ajax({  
                url:"<?php echo base_url();?>inventory/view_data",  
                method:"GET",  
                success:function(data){  
                     $('#live_data').html(data);  
                }  
           });  
    }  

   	function cr_brg()  //cari barang ketika penjualan
     	{  
           $.ajax({  
                url:"<?php echo base_url();?>penjualan/search_brg",  
                method:"GET",  
                success:function(data){  
                     $('#v_jual').html(data);  
                }  
           });  
    }

    function cr_brg_beli()  //cari barang ketika pembelian
     	{  
           $.ajax({  
                url:"<?php echo base_url();?>pembelian/search_brg",  
                method:"GET",  
                success:function(data){  
                     $('#v_beli').html(data);  
                }  
           });  
    }

   	function cr_brg_tt()  //cari barang ketika pembelian barang ke konsumen
     	{  
           $.ajax({  
                url:"<?php echo base_url();?>tukar_tambah/search_brg",  
                method:"GET",  
                success:function(data){  
                     $('#v_beli_tt').html(data);  
                }  
           });  
    }

    function cr_brg_jual_tt()  //cari barang ketika penjualan barang
     	{  
           $.ajax({  
                url:"<?php echo base_url();?>tukar_tambah/search_brg_jual",  
                method:"GET",  
                success:function(data){  
                     $('#v_jual_tt').html(data);  
                }  
           });  
    }

     function refresh_beli()  
     	{  
           $.ajax({  
                url:"<?php echo base_url();?>pembelian/view_beli",  
                method:"GET",  
                success:function(data){  
                     $('#view_beli').html(data);  
                }  
           });  
    }

	function convertToRupiah(angka) {

	    var rupiah = '';    
	    var angkarev = angka.toString().split('').reverse().join('');
	    
	    for(var i = 0; i < angkarev.length; i++) 
	      if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
	    
	    return rupiah.split('',rupiah.length-1).reverse().join('');
	
	}

	function showkembali() {
		var harga 	= $('#totbayar').val().replace(".", "");
		var bayar 	= $('#bayar').val().replace(".", "");
		var kembali = bayar-harga;
		$('#kembalian').val(convertToRupiah(kembali));
	}

  function h_modal() {
       var kas  = $('#n_kas').val();
       var inv  = $('#n_inv').val();
       var pers = $('#n_pers').val();
       var perl = $('#n_perl').val();
       var kend = $('#n_kend').val();
       var total= parseInt(kas) + parseInt(inv) + parseInt(pers) + parseInt(perl) + parseInt(kend) ;
       $('#n_total').val(convertToRupiah(total));
  }

	//OPEN EDIT INLINE TABLE WITH AJAX 
	function showEdit(editableObj) {
	$(editableObj).css("background","#FFF");
	} 

	function updatepenjualan(editableObj,column,id) {
	$(editableObj).css("background","#FFF url(<?php echo base_url()?>assets/loaderIcon.gif) no-repeat right");
	$.ajax({
		url: "<?php echo base_url()?>penjualan/updatebeli",
		type: "POST",
		data: 
        'column='+column+'&editval='+editableObj.innerHTML+'&id='+id+
        '&<?php echo $this->security->get_csrf_token_name(); ?>='+ '<?php echo $this->security->get_csrf_hash(); ?>',
		success: function(data){
		$(editableObj).css("background","#FDFDFD"),
		refresh_cart()    
		}
   		});
	}

	function delinv(nomor) {
	swal({   
		title: "Apakah anda yakin ??",   
		text: "Apakah anda yakin menghapus data ??",   
		type: "warning",   
		showCancelButton: true,   confirmButtonColor: "#DD6B55",   
		confirmButtonText: "Yes, delete it!",   closeOnConfirm: false }, 
	function(){   
	swal("Deleted!", "Data has been Deleted.", "success");
	window.location = '<?php echo base_url();?>inventory/delete/' + nomor ;
		});
	}

  function print_jual() {
    swal({   title: "Are you sure?",   
      text: "Sertakan Print atau tidak ???",   
      type: "warning",   
      showCancelButton: true,   
      confirmButtonColor: "#DD6B55",   
      confirmButtonText: "Ya , Print Nota",   
      cancelButtonText: "Tidak , Simpan saja",   
      closeOnConfirm: false,   
      closeOnCancel: false }, 

      function(isConfirm){   
        if (isConfirm) {     
           window.location = '<?=base_url();?>penjualan/print_nota';
        } else {     
          $.ajax({
            url   : '<?=base_url();?>penjualan/savecart',
            type  : 'POST',
            data  : 'nama_pelanggan=' + $('#nama_pel option:selected').val() + '&total=' + $('#totbayar').val() + 
            '&<?php echo $this->security->get_csrf_token_name(); ?>='+ '<?php echo $this->security->get_csrf_hash(); ?>',
            success:function(data) {
              swal("Good job!", "Order telah berhasil", "success");
              refresh_cart();
            }
          });
        } 
    });
  }

  function delcust(nomor) {
  swal({   
    title: "Apakah anda yakin ??",   
    text: "Apakah anda yakin menghapus data ??",   
    type: "warning",   
    showCancelButton: true,   confirmButtonColor: "#DD6B55",   
    confirmButtonText: "Yes, delete it!",   closeOnConfirm: false }, 
  function(){   
  swal("Deleted!", "Data has been Deleted.", "success");
  window.location = '<?php echo base_url();?>pelanggan/delete/' + nomor ;
    });
  }

	function del_sub_kat(nomor) {
	swal({   
		title: "Apakah anda yakin ??",   
		text: "Apakah anda yakin menghapus data ??",   
		type: "warning",   
		showCancelButton: true,   confirmButtonColor: "#DD6B55",   
		confirmButtonText: "Yes, delete it!",   closeOnConfirm: false }, 
	function(){   
	swal("Deleted!", "Data has been Deleted.", "success");
	window.location = '<?php echo base_url();?>kategori/del_sub_kat/' + nomor ;
		});
	}

	function updatepembelian(editableObj,column,id) {
	$(editableObj).css("background","#FFF url(<?php echo base_url()?>assets/loaderIcon.gif) no-repeat right");
	$.ajax({
		url: "<?php echo base_url()?>pembelian/updatecart",
		type: "POST",
		data: 
        'column='+column+'&editval='+editableObj.innerHTML+'&id='+id+
        '&<?php echo $this->security->get_csrf_token_name(); ?>='+ '<?php echo $this->security->get_csrf_hash(); ?>',
		success: function(data){
		$(editableObj).css("background","#FDFDFD"),
		window.location = '<?php echo base_url();?>pembelian'    
		}
   		});
	}

    function updateju(editableObj,column,id) {
  $(editableObj).css("background","#FFF url(<?php echo base_url()?>assets/loaderIcon.gif) no-repeat right");
  $.ajax({
    url: "<?php echo base_url()?>akunting/update_ju",
    type: "POST",
    data: 
        'column='+column+'&editval='+editableObj.innerHTML+'&id='+id+
        '&<?php echo $this->security->get_csrf_token_name(); ?>='+ '<?php echo $this->security->get_csrf_hash(); ?>',
    success: function(data){
    $(editableObj).css("background","#FDFDFD"),
    window.location = '<?php echo base_url();?>akunting/jurnal_umum'    
    }
      });
  }

  function update_tt_beli(editableObj,column,id) {
  $(editableObj).css("background","#FFF url(<?php echo base_url()?>assets/loaderIcon.gif) no-repeat right");
  $.ajax({
    url: "<?php echo base_url()?>tukar_tambah/updatebeli",
    type: "POST",
    data: 
        'column='+column+'&editval='+editableObj.innerHTML+'&id='+id+
        '&<?php echo $this->security->get_csrf_token_name(); ?>='+ '<?php echo $this->security->get_csrf_hash(); ?>',
    success: function(data){
    $(editableObj).css("background","#FDFDFD"),
    refresh_tt();
    }
      });
  }

	function updatesub_kat(editableObj,column,id) {
	$(editableObj).css("background","#FFF url(<?php echo base_url()?>assets/loaderIcon.gif) no-repeat right");
	$.ajax({
		url: "<?php echo base_url()?>kategori/edit_sub",
		type: "POST",
		data: 
        'column='+column+'&editval='+editableObj.innerHTML+'&id='+id+
        '&<?php echo $this->security->get_csrf_token_name(); ?>='+ '<?php echo $this->security->get_csrf_hash(); ?>',
		success: function(data){
		$(editableObj).css("background","#FDFDFD"),
		refresh_data()
		}
   		});
	}
	//CLOSE EDIT INLINE TABLE WITH AJAX

	//OPEN MODAL WHEN ADD PEMBELIAN
	$('#barang').change(function(){
		if($(this).val()=='addBrg') {
			$('#add-brg').modal('show');
		}
	});

	//SAVE CART 
	function add_cart(nomor) {
		var kd_brg      = $('#cr_kd_brg_' + nomor).val();
		var nama        = $('#cr_nama_brg_' + nomor).val();
		var harga       = $('#cr_hrg_brg_' + nomor).val();
		var jumlah_beli = $('#cr_qty_' + nomor).val();
		$.ajax({
			type	: "POST",
			url 	: "<?php echo base_url()?>penjualan/add_cart",
			data 	: 'kd_brg='+kd_brg+'&nama='+nama+'&harga='+harga+'&qty='+jumlah_beli+
			'&<?php echo $this->security->get_csrf_token_name(); ?>='+ '<?php echo $this->security->get_csrf_hash(); ?>',
			success: function(data) {
				refresh_cart(),
				$('#cr-brg').modal('hide')
			}
		});
	}

	//SAVE BELI 

	function add_beli(nomor) {
		var kd_brg 		    = $('#cr_kd_brg_' + nomor).val();
		var nama 		      = $('#cr_nama_brg_' + nomor).val();
		var harga 		    = $('#cr_hrg_brg_' + nomor).val();
		var jumlah_beli   = $('#cr_qty_' + nomor).val();
		$.ajax({
			type	: "POST",
			url 	: "<?php echo base_url()?>pembelian/add_cart",
			data 	: 'kd_brg='+kd_brg+'&nama='+nama+'&harga='+harga+'&qty='+jumlah_beli+
			'&<?php echo $this->security->get_csrf_token_name(); ?>='+ '<?php echo $this->security->get_csrf_hash(); ?>',
			success: function(data) {
				refresh_beli(),
				$('#cr-brg_beli').modal('hide');
			}
		});
	}

	function add_tt(nomor) {
    var kd_brg      = $('#cr_kd_brg_' + nomor).val();
    var nama        = $('#cr_nama_brg_' + nomor).val();
    var harga       = $('#cr_hrg_brg_' + nomor).val();
    var jumlah_beli = $('#cr_qty_' + nomor).val();
    $.ajax({
      type  : "POST",
      url   : "<?php echo base_url()?>tukar_tambah/add_beli",
      data  : 'kd_brg='+kd_brg+'&nama='+$('#cr_nama_brg_' + nomor).val()+'&harga='+harga+'&qty='+jumlah_beli+
      '&<?php echo $this->security->get_csrf_token_name(); ?>='+ '<?php echo $this->security->get_csrf_hash(); ?>',
      success: function(data) {
        refresh_tt(),
        $('#cr-brg').modal('toggle');
      }
    });
  }

	function add_tt_jual(nomor) {
		var kd_brg 		    = $('#cr_kd_brg_tt_' + nomor).val();
		var nama 		      = $('#cr_nama_brg_tt_' + nomor).val();
		var harga 		    = $('#cr_hrg_brg_tt_' + nomor).val();
		var jumlah_beli   = $('#cr_qty_tt_' + nomor).val();
		$.ajax({
			type	: "POST",
			url 	: "<?php echo base_url()?>tukar_tambah/add_jual",
			data 	: 'kd_brg='+kd_brg+'&nama='+$('#cr_nama_brg_tt_' + nomor).val()+'&harga='+harga+'&qty='+jumlah_beli+
			'&<?php echo $this->security->get_csrf_token_name(); ?>='+ '<?php echo $this->security->get_csrf_hash(); ?>',
			success: function(data) {
				refresh_tt(),
				$('#cr-brg_2').modal('toggle');
			}
		});
	}

	function refresh_cart()  
     	{  
           $.ajax({  
                url:"<?php echo base_url();?>penjualan/view_cart",  
                method:"GET",  
                success:function(data){  
                     $('#view_cart').html(data);  
                }  
           });  
      }  

    function refresh_beli()  
     	{  
           $.ajax({  
                url:"<?php echo base_url();?>pembelian/view_beli",  
                method:"GET",  
                success:function(data){  
                     $('#view_beli').html(data);  
                }  
           });  
      }  

   function refresh_tt()  
   {  
       $.ajax({  
            url:"<?php echo base_url();?>tukar_tambah/view_beli",  
            method:"GET",  
            success:function(data){  
                 $('#view_tt').html(data);  
            }  
       });  
   }  

    $('#d_kat').change(function(){ // CARI KATEGORI DYNAMIC 
    var kat = $(this).find('option:selected').text();
    $.ajax({
      url   : '<?=base_url();?>inventory/cari_kat',
      type  : 'POST',
      data  : 'kat=' + kat + '&<?php echo $this->security->get_csrf_token_name(); ?>='+ '<?php echo $this->security->get_csrf_hash(); ?>',
      dataType: 'text',
      success:function(data) {
        $('#d_sub_1').html(data);
        $('#d_sub_2').html(data);
        $('#d_sub_3').html(data);
      }
    });
  });
   
	</script>
</body>