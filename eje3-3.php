<html>
<head>
<title>Arrays</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body bgcolor="lightblue"><font size="+1">
<?php
function buscar($conn){
	if(isset($_POST['nombre']) && $_POST['nombre']!=""){
			$nom= " `nombre` LIKE '".$_POST['nombre']."'";
			$b=1;
		}
	if(b==1){
		if(isset($_POST['apellido']) && $_POST['apellido']!=""){
			$apellido= " and `apellido` LIKE '".$_POST['apeliido']."'"
		}else{
			$apellido= "`apellido` LIKE '".$_POST['apeliido']."'";
			$b==1;
			}
		}
	if(b==1){
		if(isset($_POST['telefono']) && $_POST['telefono']!=""){
			$telefono= "and `telefono` LIKE '".$_POST['telefono']."'"
			}
		}else{
			$telefono= "`telefono` LIKE '".$_POST['telefono']."'";
			$b==1;
			}	

	$sql = "SELECT * FROM `nombre` WHERE `nombre` LIKE '".$_POST['nombre']."' ";
	$result = mysqli_query($conn, $sql);
	if (!empty($result) AND mysqli_num_rows($result) > 0){
		?><html>
		 <table>
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>Telefono</th>
			<th colspan="2">Acción</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($result)) { ?>
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
		
		</html>
		<?php
	} else {
	echo "0 results";
	echo $sql;
	}	
	mysqli_close($conn);
		return $result;
	}
?>	
</body>
</html>
