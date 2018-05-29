<!DOCTYPE html>
<html>
<head>
  <title>INPUT MODAL</title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace.min.css" class="ace-main-stylesheet"/>
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/DateTimePicker.css">
  <script src="<?php echo base_url(); ?>assets/js/jquery-3.1.0.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/DateTimePicker.js"></script>
  <script type="text/javascript">
  $(document).ready(function() {
    $('#dtBox').DateTimePicker();
  });
  </script>
</head>
<body>
  <center><h3>INPUT MODAL OWNER</h3>
  <br><br>
  <form class="form-horizontal" method="post" role="form" action="<?php echo base_url();?>akunting/save_modal">
    <div class="modal-body">
      <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Tanggal</label>
        <div class="col-sm-9">
        <input type="text" id="form-field-1" class="col-xs-10 col-sm-8" name="tanggal" data-field="date" required="true" data-format="dd-MM-yyyy" />
        <div id="dtBox"></div>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Kas</label>
        <div class="col-sm-9">
        <input type="number" id="n_kas" class="col-xs-10 col-sm-8" name="kas" >
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Inventaris</label>
        <div class="col-sm-9">
        <input type="number" class="col-xs-10 col-sm-8" name="inventaris" required="true" id="n_inv"   />
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Persediaan Barang Dagangan</label>
        <div class="col-sm-9">
        <input type="number" class="col-xs-10 col-sm-8" name="persediaan" required="true" id="n_pers"  />
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Perlengkapan Toko</label>
        <div class="col-sm-9">
        <input type="number" class="col-xs-10 col-sm-8" name="perlengkapan" required="true" id="n_perl" />
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Kendaraan</label>
        <div class="col-sm-9">
        <input type="number" class="col-xs-10 col-sm-8" name="kendaraan" required="true" id="n_kend" />
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Total</label>
        <div class="col-sm-9">
        <input type="text" class="col-xs-10 col-sm-8" name="total" required="true" id="n_total" />
        </div>
      </div>

    </div>
    <div class="form-group">
    <div class="col-sm-8">
      <button type="button" class="btn btn-primary" onclick="hitung_modal()"><i class="fa fa-money"></i> HITUNG !!</button>
      <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
      <button type="reset" class="btn btn-danger"><i class="fa fa-close"></i> Reset</button>
    </div>
    </div>
    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
</form>
  </div>
</div>
</div>
<script type="text/javascript">
  function hitung_modal() {
    var kas  = $('#n_kas').val();
    var inv  = $('#n_inv').val();
    var pers = $('#n_pers').val();
    var perl = $('#n_perl').val();
    var kend = $('#n_kend').val();
    var total= parseInt(kas) + parseInt(inv) + parseInt(pers) + parseInt(perl) + parseInt(kend) ;
    $('#n_total').val(convertToRupiah(total))
  }
</script>
</body>
</html>