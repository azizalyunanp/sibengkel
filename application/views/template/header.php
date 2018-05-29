<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="utf-8" />
	<title>i-BENGKEL</title>
	<meta name="description" content="Aplikasi Administrasi Bengkel" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
	<!-- bootstrap & fontawesome -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" />
	<!-- text fonts -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/fonts/fonts.googleapis.com.css" />
	<!-- ace styles -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace.min.css" class="ace-main-stylesheet"/>
	<!--DATE TIME PICKER-->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/DateTimePicker.css">
	<!--SWEET ALERT-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/sweetalert.css">
	<!--SELECT 2 -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/select2.min.css">
	<!--MY STYLES-->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/mystyle.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery.dynatable.css">
	<link rel="stylesheet" href="<?=base_url('assets/css/jquery.dataTables.min.css');?>">
	<!--JQUERY-->
	<script src="<?php echo base_url(); ?>assets/js/jquery-3.1.0.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/DateTimePicker.js"></script>
	<script type="text/javascript" src="<?=base_url('assets/js/jquery.dataTables.min.js');?>"></script>
	<style>
		.p_table {
			font-family: 'Calibri';
			font-size: 11;
		}
	</style>
</head>
	<body class="no-skin">
	<div id="navbar" class="navbar navbar-default">
		<div class="navbar-container" id="navbar-container">
			<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
				<span class="sr-only">Toggle sidebar</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>

			<div class="navbar-header pull-left">
				<a href="#" class="navbar-brand">
					<small>
						<i class="fa fa-car"></i>
						i-BENGKEL
					</small>
				</a>
			</div>

			<div class="navbar-buttons navbar-header pull-right" role="navigation">
				<ul class="nav ace-nav">
					<li class="light-blue">
						<a data-toggle="dropdown" href="#" class="dropdown-toggle">
							<img class="nav-user-photo" src="<?php echo base_url();?>assets/images/user.png" />
							<span class="user-info">
								<small>Welcome,</small>
								<?php echo $this->session->userdata('level'); ?>
							</span>

							<i class="ace-icon fa fa-caret-down"></i>
						</a>

						<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">

							<li class="divider"></li>

							<li>
								<a href="<?php echo base_url(); ?>main/logout">
									<i class="ace-icon fa fa-power-off"></i>
									Logout
								</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div><!-- /.navbar-container -->
	</div>



				