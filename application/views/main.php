<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Choose Company</title>
	<link rel="shortcut icon" href="<?php echo base_url(); ?>/favicon.ico">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<style>
		body {
			background: #3781AC;
		}
		
		.box-title {
			font-weight: 700;
		}
		
	</style>
  </head>
  <body class="hold-transition">
    <div class="row" style="margin-top: 15%;">
			<div class="col-md-3"></div><!-- ./col -->
            <div class="col-md-6">
              <div class="box box-solid">
                <div class="box-header with-border">
                  <i class="fa fa-fw fa-suitcase"></i>
                  <h3 class="box-title">Select Company</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table width="100%">
					<tr align="center">
						<td>
							<a href="<?php echo site_url('main/set_company/as'); ?>">							
								<img title="Altitude Software" alt="Altitude Software" src="<?php echo base_url('images'); ?>/altitude.png">								
							</a>
						</td>
						<td>
							<a href="<?php echo site_url('main/set_company/bmg'); ?>">
								<img title="Blue Mena Group" alt="Blue Mena Group" src="<?php echo base_url('images'); ?>/blue_mena.jpg">								
							</a>
						</td>
					</tr>
				  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- ./col -->
            <div class="col-md-3"></div><!-- ./col -->
          </div>

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url(); ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url(); ?>bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url(); ?>plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
