 <head>
 <script src="<?php echo base_url(); ?>assets/js/sweetalert.min.js"></script> <link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
 <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/sweetalert.css">
</head>

<body>
	<script>
	swal({   
		title: "Sorry",   
		text: "<?php echo $content;?>",   
		type: "error",   
		closeOnConfirm: false,   
		showLoaderOnConfirm: true, 
	}, 
		function(){   
			setTimeout(function(){     
				window.location = '<?php echo base_url().$url;?>';
			}, 1000); 
		});
	</script>
</body>