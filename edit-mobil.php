<?php
	session_start();
	include 'dbconf.php';
	if (!isset($_SESSION['login']))
		header('Location: login-ui.php');
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $_SESSION['judul'];?> | <?php echo $_SESSION['desc'];?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="lte/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="lte/dist/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="lte/dist/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="lte/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="lte/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition fixed skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b><?php echo $_SESSION['judul'];?></b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b><?php echo $_SESSION['judul'];?></b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="lte/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo ucwords($_SESSION['user']);?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="lte/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php 
					  echo ucwords($_SESSION['user']);?> - <?php echo ucwords($_SESSION['level']);
					  $date = date_create($_SESSION['since']);
				  ?> 
				  <small>Member Since, <?php echo date_format($date, 'd M Y');?></small>
                </p>
              </li>
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <!--a href="#" class="btn btn-default btn-flat">Profile</a-->
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Logout</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="lte/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo ucwords($_SESSION['user']);?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
         <li>
          <a href="dashboard-ui.php">
            <i class="fa fa-windows"></i> <span>Dashboard</span>
          </a>
        </li>
		<li class="treeview active">
          <a href="#">
            <i class="fa fa-truck"></i> <span>Mobil</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="mobil.php"><i class="fa fa-circle-o"></i> Data Mobil</a></li>
            <?php if($_SESSION['level']!='admin gudang'){?>
			<li><a href="daftar-mobil.php"><i class="fa fa-circle-o"></i> Daftar Baru</a></li>
			<?php } ?>
          </ul>
        </li>
		<?php if($_SESSION['level']=='admin gudang'){?>
		<li>
          <a href="muat.php">
            <i class="fa fa-plus-square"></i> <span>Muat</span>
          </a>
        </li>
		<li>
          <a href="keluar.php">
            <i class="fa fa-check-square"></i> <span>Keluar</span>
          </a>
        </li>
		<?php } ?>
        <?php if($_SESSION['level']=='admin'){?>
		<li>
          <a href="cetak.php">
            <i class="fa fa-print"></i> <span>Cetak Laporan</span>
          </a>
        </li>
		<li>
          <a href="user.php">
            <i class="fa fa-users"></i> <span>Data User</span>
          </a>
        </li>
		<?php } ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small><?php echo $_SESSION['desc'];?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard-ui.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="daftar-mobil.php">Daftar Mobil</a></li>
        <li class="active">Edit Mobil</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title text-primary"><i class="fa fa-bus"> </i> Edit Mobil</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <!--button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button-->
          </div>
        </div>
        <!-- form start -->
            <form class="form-horizontal" method="post" action="edit.php?id=<?php echo $_GET['id'];?>">
              <div class="row">
			   <div class="col-lg-6 col-xs-12">
			  <div class="box-body">
					<?php 
						$result = $mysqli->query("SELECT *  FROM `mobil` WHERE `id_mobil` = ".$_GET['id']."");
								while ($row = $result->fetch_assoc()) {
					?>
                <div class="form-group">
                  <label for="ekspedisi" class="col-sm-2 control-label">Ekspedisi</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="ekspedisi" id="ekspedisi" value="<?php echo $row['ekspedisi'];?>" placeholder="Nama Ekspedisi" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="Jenis Mobil" class="col-sm-2 control-label">Jenis</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="jenis" id="jenis" value="<?php echo $row['jenis'];?>" placeholder="Jenis Mobil" />
                  </div>
                </div>
				<div class="form-group">
                  <label for="nopol" class="col-sm-2 control-label">No. Polisi</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nopol" id="nopol" value="<?php echo $row['nopol'];?>" placeholder="No. Polisi" />
                  </div>
                </div>
				<div class="form-group">
                  <label for="supir" class="col-sm-2 control-label">Supir</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="supir" id="supir" value="<?php echo $row['supir'];?>" placeholder="Nama Supir" />
                  </div>
                </div>
				<div class="form-group">
                  <label for="hp" class="col-sm-2 control-label">No. HP</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="hp" id="hp" value="<?php echo $row['hp'];?>" placeholder="No. HP" />
                  </div>
                </div>
				<div class="form-group">
                  <label for="tujuan" class="col-sm-2 control-label">Tujuan</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="tujuan" id="tujuan" value="<?php echo $row['tujuan'];?>" placeholder="Tujuan" />
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
				<a type="button" class="btn btn-danger" href="mobil.php">Cancel</a>
                <button type="submit" class="btn btn-primary pull-right">Update Data</button>
              </div>
              <!-- /.box-footer -->
			  </div>
		  </div><!-- row -->
			<?php 
				}
			?>
            </form>
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> <?php echo $_SESSION['judul'].".".date('Y').".a"?>
    </div>
    <strong>Copyright &copy; <?php echo date('Y');?></strong> <?php echo $_SESSION['creator']?>. All rights
    reserved.
  </footer>

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
<script src="lte/plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="lte/bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="lte/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="lte/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="lte/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="lte/dist/js/demo.js"></script>
</body>
</html>
