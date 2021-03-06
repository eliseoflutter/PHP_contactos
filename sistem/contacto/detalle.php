<?php
	session_start();
	$rut='../';
	$rut2='../../';
	$pagina='Detalle del Contacto';
	$padre='Contacto';
	$direc='contacto.php';
	require_once($rut.'0code.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?= $pagina.TIT; ?></title>
	<?php require_once($rut.'1styles.php'); ?>

	<?php
		$inf=null;

		require_once($rut2.DIRACT.$direc);
		$inf = detalle($rut2,$pid);

		if(isset($_SESSION['nombre'])){ $nombre = $_SESSION['nombre']; unset($_SESSION['nombre']); }else{ $nombre=null; }
		if(isset($_SESSION['correo'])){ $correo = $_SESSION['correo']; unset($_SESSION['correo']); }else{ $correo=null; }
		if(isset($_SESSION['telefono'])){ $telefono = $_SESSION['telefono']; unset($_SESSION['telefono']); }else{ $telefono=null; }
		if(isset($_SESSION['mensaje'])){ $mensaje = $_SESSION['mensaje']; unset($_SESSION['mensaje']); }else{ $mensaje=null; }
		if(isset($_SESSION['respuesta'])){ $respuesta = $_SESSION['respuesta']; unset($_SESSION['respuesta']); }else{ $respuesta=null; }

		require_once($rut.'0mens.php');
	?>
</head>
<body>
	<?php include_once($rut.'nav.php'); ?>

	<div class="container">
		<div class="row pb-5">
			<br>
		</div>

		<hr>
		
		<div class="row">
			<div class="col-sm-3 text-left">
				<a href="./" class="btn btn-secondary">Regresar</a>
			</div>
			<div class="col-sm-6 text-center">
				<h2><?= $pagina; ?></h2>
			</div>
			<div class="col-sm-3 text-right">
			</div>
		</div>
		
		<?php include_once($rut.'0error.php'); ?>
		
		<hr>

		<div class="row">
			<div class="col-sm-1"></div>
			<div class="col-sm-10">
				<form class="col-sm-12" method="post" enctype="multipart/form-data" action="<?= ACTI.$direc; ?>">
					<div class="card">
					  <div class="card-header">
					    Editar el <?= $padre; ?>
					  </div>
					  <div class="card-body">
					    <div class="form-group">
				            <label for="recipient-name" class="col-form-label">Nombre:</label>
				            <label class="form-control"><?= $nombre; ?></label>
				          </div>
				          <div class="form-group">
				            <label for="message-text" class="col-form-label">Correo:</label>
				            <label class="form-control"><?= $correo; ?></label>
				          </div>
				          <div class="form-group">
				            <label for="message-text" class="col-form-label">Tel??fono:</label>
				            <label class="form-control"><?= $telefono; ?></label>
				          </div>
				          <div class="form-group">
				          	<div class="card">
				          		<h2 class="title-card">Mensaje del Cliente:</h2>
				          		<div class="card-body">
				          			<?= $mensaje; ?>
				          		</div>
				          	</div>
				          </div>
				          <div class="form-group">
				          	<div class="card">
				          		<h2 class="title-card">Respuesta del Agente:</h2>
				          		<div class="card-body">
				          			<?= $respuesta; ?>
				          			<input type="hidden" name="respu_ant" value="<?= $respuesta; ?>">
				          		</div>
				          	</div>
				          </div>
				          <div class="form-group">
				            <label for="message-text" class="col-form-label">Nueva Respuesta:</label>
				            <textarea class="form-control ckeditor" id="ckeditor" name="respuesta"></textarea>
				          </div>
						  <hr>
				          <div class="form-group">
						    <a href="./" class="btn btn-secondary">Regresar</a>
						    <input type="hidden" name="pid" value="<?= base64_encode($pid); ?>">
						    <button type="submit" name="editar" class="btn btn-primary">Editar <i class="fa fa-edit"></i></button>
				          </div>
					  </div>
					</div>
				</form>
			</div>
			<div class="col-sm-1"></div>
		</div>
	</div>

	<?php require_once($rut.'2java.php'); ?>
	<?php require_once($rut.'3toastr.php'); ?>
</body>
</html>
<?php
	if (isset($_SESSION['Mysqli_Error'])) { unset($_SESSION['Mysqli_Error']); }
	if (isset($_SESSION['stat'])) { unset($_SESSION['stat']); }
?>