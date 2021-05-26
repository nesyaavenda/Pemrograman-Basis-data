<?php

session_start();
include "../koneksi.php";
include "auth_user.php";
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Laman Mahasiswa</title>
	<!-- Library CSS -->
	<?php
	include "bundle_css.php";
	?>
</head>

<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		<?php
		include 'content_header.php';
		?>
		<!-- Left side column. contains the logo and sidebar -->
		<aside class="main-sidebar">
			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">
				<!-- Sidebar user panel -->
				<div class="user-panel">
					<div class="pull-left image">
						<p></p>
					</div>
				</div><!-- sidebar menu: : style can be found in sidebar.less -->
				<ul class="sidebar-menu">
					<li class="header">
						<h4><b>
								<center>Menu</center>
							</b></h4>
					</li>
					<li><a href="index.php"><i class="fa fa-home"></i><span>Dashboard</span></a></li>
					<li class="active"><a href="mahasiswa.php"><i class="fa fa-users"></i><span>Mahasiswa</span></a></li>
				</ul>
			</section>
			<!-- /.sidebar -->
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>
					Mahasiswa
				</h1>
				<ol class="breadcrumb">
					<li><i class="fa fa-users"></i> Mahasiswa</li>
				</ol>
			</section>

			<!-- Main content -->
			<section class="content">
				<div class="row">
					<div class="col-xs-12">
						<div class="box">
							<div class="box-header">

							</div><!-- /.box-header -->
							<div class="box-body">

								<table id="data" class="table table-bordered table-striped table-scalable">
									<?php
									include "dt_mahasiswa.php";
									?>
								</table>
							</div><!-- /.box-body -->
						</div><!-- /.box -->
					</div><!-- /.col -->
				</div><!-- /.row -->
			</section><!-- /.content -->

		</div><!-- /.content-wrapper -->
		<?php
		include	"content_footer.php";
		?>
	</div><!-- ./wrapper -->
	<!-- Library Scripts -->
	<?php
	include "bundle_script.php";
	?>
</body>

</html>