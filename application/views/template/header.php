<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php
	if(! isset($_SESSION['info']['uid'])) {
		redirect('login', 'location', 301);
	}
?>
<?php date_default_timezone_set('Asia/Dubai'); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Blue Mena - Booking System</title>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>/favicon.ico">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  
  <!-- Table Grid -->
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css" />
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />

<!--PQ Grid files-->    
  <link rel="stylesheet" href="<?php echo base_url(); ?>pqgrid.min.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>pqgrid.ui.min.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>pqgrid.bootstrap.min.css" />  
  <link rel="stylesheet" href="<?php echo base_url(); ?>themes/Office/pqgrid.css" />

  <!--jqueryui touch punch for touch devices-->
  <script type="text/javascript" src="<?php echo base_url(); ?>jsZip-2.5.0/jszip.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>pqgrid.min.js"></script>
  <!--PQ Grid Office theme-->
  <script src="<?php echo base_url(); ?>touch-punch/touch-punch.min.js"></script>
  <!-- jQuery 2.1.4 -->
  <!--UNCOMMENT IF NEEDED - it causes conflict for param grid JS pqgrid.min.js
    <script src="<?php echo base_url(); ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
  -->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>A</b>LT</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>BMG</b>Invoice</span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success">4</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 4 messages</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- start message -->
                        <a href="#">
                          <div class="pull-left">
                            <img src="<?php echo base_url(); ?>dist/img/avatar5.png" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            Support Team
                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li><!-- end message -->
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="<?php echo base_url(); ?>dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            AdminLTE Design Team
                            <small><i class="fa fa-clock-o"></i> 2 hours</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="<?php echo base_url(); ?>dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            Developers
                            <small><i class="fa fa-clock-o"></i> Today</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="<?php echo base_url(); ?>dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            Sales Department
                            <small><i class="fa fa-clock-o"></i> Yesterday</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="<?php echo base_url(); ?>dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            Reviewers
                            <small><i class="fa fa-clock-o"></i> 2 days</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
              </li>
              <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">10</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 10 notifications</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> 5 new members joined today
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the page and may cause design problems
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-red"></i> 5 new members joined
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-user text-red"></i> You changed your username
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
              </li>
              <!-- Tasks: style can be found in dropdown.less -->
              <li class="dropdown tasks-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-flag-o"></i>
                  <span class="label label-danger">9</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 9 tasks</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Design some buttons
                            <small class="pull-right">20%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">20% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Create a nice theme
                            <small class="pull-right">40%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">40% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Some task I need to do
                            <small class="pull-right">60%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">60% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Make beautiful transitions
                            <small class="pull-right">80%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">80% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                    </ul>
                  </li>
                  <li class="footer">
                    <a href="#">View all tasks</a>
                  </li>
                </ul>
              </li>
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url(); ?>dist/img/avatar5.png" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $_SESSION['info']['firstname'].' '.$_SESSION['info']['lastname']; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo base_url(); ?>dist/img/avatar5.png" class="img-circle" alt="User Image">
                    <p>
                      <?php echo $_SESSION['info']['firstname'].' '.$_SESSION['info']['lastname']; ?> - Web Developer
                      <small>Member since Feb. 2016</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="#" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url(); ?>dist/img/avatar5.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $_SESSION['info']['firstname'].' '.$_SESSION['info']['lastname']; ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <?php
              $str_year = NULL;
              if(isset($_GET['year'])) {
                $str_year = $_GET['year'];
              }
            ?>
            <?php foreach($company_year as $comp_year_nav): ?>
            <?php $year = $comp_year_nav->year; ?>          
            <li class="treeview <?php echo ($str_year == $year && ! in_array($active, array('business_setting', 'currencies', 'customers', 'product_category', 'product')) ? 'active' : ''); ?>">
              <a href="#">
                <i class="fa fa-share"></i> <span><?php echo $comp_year_nav->name.' '.$year; ?></span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>              
              <ul class="treeview-menu">
                <li class="<?php echo ($active == 'booking'.$year ? 'active' : ''); ?>"><a href="<?php echo site_url('booking?year='.$year); ?>"><i class="fa fa-book"></i> Booking</a></li>
                <li><a href="#"><i class="fa fa-money"></i> Revenue</a></li>
                <li><a href="#"><i class="fa fa-cart-plus"></i> Purchase</a></li>
                <li><a href="#"><i class="fa fa-newspaper-o"></i> Invoice</a></li>                
              </ul>
            </li>            
            <?php endforeach; ?>                     
            <li class="<?php echo (in_array($active, array('business_setting', 'currencies', 'customers', 'product_category', 'product')) ? 'active' : ''); ?>">
                  <a href="#"><i class="fa fa-wrench"></i> <span>General Settings</span> <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">   
                    <li class="<?php echo ($active == 'customers' ? 'active' : ''); ?>">
                      <a href="<?php echo site_url('customers'); ?>"><i class="fa fa-users"></i> Customers</a>
                    </li>
                    <li class="<?php echo ($active == 'currencies' ? 'active' : ''); ?>">
                      <a href="<?php echo site_url('settings/currencies'); ?>"><i class="fa fa-money"></i> Currencies</a>
                    </li>
                    <li class="<?php echo ($active == 'product_category' ? 'active' : ''); ?>">
                      <a href="<?php echo site_url('product_category'); ?>"><i class="fa fa-opencart"></i> Product Category</a>
                    </li>
                    <li class="<?php echo ($active == 'product' ? 'active' : ''); ?>">
                      <a href="<?php echo site_url('product'); ?>"><i class="fa fa-shopping-cart"></i> Product</a>
                    </li>                                                     
                    <li class="<?php echo ($active == 'business_setting' ? 'active' : ''); ?>">
                      <a href="<?php echo site_url('company_setting'); ?>"><i class="fa fa-building-o"></i> Business Setting</a>
                    </li>
                  </ul>
                </li>                                                   
          </ul>
		<li><a href="<?php echo site_url('login/logout'); ?>"><i class="fa fa-lock"></i> <span>Logout</span></a><li>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo $title; ?>
          </h1>
          <ol class="breadcrumb">
            <?php
              foreach($breadcrumbs as $key => $value) {
                ?>
                  <li class="<?php echo ($value == NULL ? 'active' : ''); ?>">
                    <?php if($value == NULL): ?>
                      <?php echo $key; ?>
                    <?php else: ?>
                    <a href="<?php echo $value; ?>">
                      <?php echo $key; ?>
                    </a>
                    <?php endif; ?>
                  </li>
                <?php
              }
            ?>  
          </ol>
          <?php if($message != NULL): ?>
            <?php $explode_msg = explode('|', $message); ?>
            <div class="alert alert-<?php echo $explode_msg[0]; ?> alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h4>  <i class="icon fa fa-check"></i> <?php echo $explode_msg[1]; ?></h4>
              <?php echo $explode_msg[2]; ?>
            </div>
          <?php endif; ?>
        </section>        
