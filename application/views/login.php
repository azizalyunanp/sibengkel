<?php
if($this->session->has_userdata('username')) {
  redirect('main');
}
?>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>Login Admin</title>
    <meta name="description" content="Login SoKu" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/DateTimePicker.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace.min.css" />
    <link href="<?php echo base_url();?>assets/fileinput/css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/sweetalert.css">
    <script src="<?php echo base_url(); ?>assets/js/sweetalert.min.js"></script>
  </head>

  <body class="login-layout">
    <div class="main-container">
      <div class="main-content">
        <div class="row">
          <div class="col-sm-10 col-sm-offset-1">
            <div class="login-container">
            <div class="center">
                <h1>
                  <i class="ace-icon fa fa-car green"></i>
                  <span class="red">Aplikasi</span>
                  <span class="white" id="id-text2">Bengkel</span>
                </h1>
                <h4 class="blue" id="id-company-text">&copy; dr. AKI</h4>
              </div>
            <br>
              <div class="space-6"></div>

              <div class="position-relative">
                <div id="login-box" class="login-box visible widget-box no-border">
                  <div class="widget-body">
                    <div class="widget-main">
                      <h4 class="header blue lighter bigger">
                        <i class="ace-icon fa fa-coffee green"></i>
                        Please Enter Your Information
                      </h4>

                      <div class="space-6"></div>

                      <form method="post" action="<?php echo base_url();?>main/login">
                        <fieldset>
                          <label class="block clearfix">
                            <span class="block input-icon input-icon-right">
                              <input type="text" class="form-control" placeholder="Username" name="username" autocomplete="off" />
                              <i class="ace-icon fa fa-user"></i>
                            </span>
                          </label>

                          <label class="block clearfix">
                            <span class="block input-icon input-icon-right">
                              <input type="password" class="form-control" placeholder="Password" name="password" autocomplete="off" />
                              <i class="ace-icon fa fa-lock"></i>
                            </span>
                          </label>
                          
                          <div class="space"></div>
                          <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                          <div class="clearfix">
                            <button type="submit" class="width-35 pull-right btn btn-sm btn-primary" name="login">
                              <i class="ace-icon fa fa-key"></i>
                              <span class="bigger-110">Login</span>
                            </button>
                          </div>

                          <div class="space-4"></div>
                        </fieldset>
                      </form>
                    </div><!-- /.widget-main -->
                  </div><!-- /.widget-body -->
                </div><!-- /.login-box -->
                </div>
              </div>
            </div>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.main-content -->
    </div><!-- /.main-container -->
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-latest.js" charset="UTF-8"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/DateTimePicker.js"></script>
    <script src="<?php echo base_url();?>assets/fileinput/js/fileinput.js" type="text/javascript"></script>
  </body>
  </body>
</form>

