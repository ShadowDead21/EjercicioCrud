<?php
include 'eje3-2.php';
$conn=conectar();
if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$result = mysqli_query($conn, "SELECT * FROM nombre WHERE id=$id");
		if (!empty($result) AND mysqli_num_rows($result) > 0 ){
			$row = mysqli_fetch_array($result);
			$id = $row['id'];
			$nombre = $row['nombre'];
			$apellido = $row['apellido'];
			$telefono = $row['telefono'];
			
		}
	}

?>
<html>
<head>
<title>Arrays</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body bgcolor="lightblue"><font size="+1">
 <form action="eje3-2.php" method="POST">
 <p>
<div class="input-group">
	<label>ID</label>
	<input type="text" name="id"  value="<?php echo $id ?>">
</div>
<div class="input-group">
	<label>Nombre</label>
	<input type="text" name="nombre" value="<?php echo $nombre ?>">
</div>
<div class="input-group">
	<label>Apellido</label>
	<input type="text" name="apellido" value="">
</div>
<div class="input-group">
	<label>Telefono</label>
	<input type="text" name="telefono" value="">
</div>
<input type=submit name=modificar value="modificar">
<input type=submit name=cancelar value="cancelar">
