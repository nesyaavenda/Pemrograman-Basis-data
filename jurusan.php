<?php

session_start();
include "../koneksi.php";
include "auth_user.php";
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Laman Admin</title>
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
					<li><a href="user.php"><i class="fa fa-user-circle-o"></i><span>User</span></a></li>
					<li><a href="dosen.php"><i class="fa fa-user"></i><span>Dosen</span></a></li>
					<li><a href="mahasiswa.php"><i class="fa fa-users"></i><span>Mahasiswa</span></a></li>
					<li class="active"><a href="jurusan.php"><i class="fa fa-university"></i><span>Program Studi</span></a></li>
				</ul>
			</section>
			<!-- /.sidebar -->
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>
					Program Studi
				</h1>
				<ol class="breadcrumb">
					<li><i class="fa fa-university"></i> Program Studi</li>
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
								<a href="#"><button class="btn btn-success" type="button" data-target="#ModalAdd" data-toggle="modal"><i class="fa fa-plus"></i> Add</button></a>
								<br></br>
								<table id="data" class="table table-bordered table-striped table-scalable">
									<?php
									include "dt_jurusan.php";
									?>
								</table>
							</div><!-- /.box-body -->
						</div><!-- /.box -->
					</div><!-- /.col -->
				</div><!-- /.row -->
			</section><!-- /.content -->

			<!-- Modal Popup Dosen -->
			<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Tambah Jurusan</h4>
						</div>
						<div class="modal-body">
							<form action="jurusan_add.php" name="modal_popup" enctype="multipart/form-data" method="post">
								<div class="form-group">
									<label>Kode Program Studi</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-university"></i>
										</div>
										<input name="Kode_Jurusan" type="text" class="form-control" placeholder="Kode PS" />
									</div>
								</div>
								<div class="form-group">
									<label>Nama Program Studi</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-university"></i>
										</div>
										<input name="Nama_Jurusan" type="text" class="form-control" placeholder="Nama PS" />
									</div>
								</div>
								<div class="form-group">
									<label>Jenjang</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-graduation-cap"></i>
										</div>
										<select name="Kode_Jenjang_Jrs" class="form-control">
											<?php
											$queryjenjang = "SELECT * FROM jenjang";
											$stmt = $konek->prepare($queryjenjang);
											$stmt->execute();

											if ($queryjenjang == false) {
												die("Terjadi Kesalahan : ");
											}
											while ($jenjang  = $stmt->fetch()) {
												echo "
														<option value='$jenjang[Kode_Jenjang]'>$jenjang[Nama_Jenjang]</option>";
											}
											?>
										</select>
									</div>
								</div>
								<div class="modal-footer">
									<button class="btn btn-success" type="submit">
										Add
									</button>
									<button type="reset" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">
										Cancel
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

			<!-- Modal Popup Dosen Edit -->
			<div id="ModalEditJurusan" class="modal fade" tabindex="-1" role="dialog"></div>

			<!-- Modal Popup untuk delete-->
			<div class="modal fade" id="modal_delete">
				<div class="modal-dialog">
					<div class="modal-content" style="margin-top:100px;">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title" style="text-align:center;">Are you sure to delete this information ?</h4>
						</div>
						<div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
							<a href="#" class="btn btn-danger" id="delete_link">Delete</a>
							<button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
						</div>
					</div>
				</div>
			</div>

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