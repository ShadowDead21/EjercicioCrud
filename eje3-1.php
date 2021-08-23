<html>
<head>
<title>Arrays</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body bgcolor="lightblue"><font size="+1">
 <form action="eje3-2.php" method="POST">
 <p>
<div class="input-group">
	<label>Nombre</label>
	<input type="text" name="nombre" value="">
</div>
<div class="input-group">
	<label>Apellido</label>
	<input type="text" name="apellido" value="">
</div>
<div class="input-group">
	<label>Telefono</label>
	<input type="text" name="telefono" value="">
</div>
 <input type=submit name=guardar value="guardar">
 <input type=submit name=buscar value="buscar">
 </form>
 <?php
 include 'eje3-2.php';
 $conn=conectar();
 $results = mysqli_query($conn, "SELECT * FROM nombre  ORDER BY `id` ASC");  ?>
 <table>
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>Telefono</th>
			<th colspan="2">Acción</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['nombre']; ?></td>
			<td><?php echo $row['apellido']; ?></td>
			<td><?php echo $row['telefono']; ?></td>
			<td>
				<a href="mod.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Modificar</a>
			</td>
			<td>
				<a href="borrar.php?del=<?php echo $row['id']; ?>" class="del_btn">Borrar</a>
			</td>
		</tr>
	<?php } ?>
</table>
</body>
</html>
