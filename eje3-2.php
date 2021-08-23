
<?php
  extract($_REQUEST);
  $boton1="";
  $boton2="";
  $boton3="";
  $boton4="";
  $boton5="";
  $boton6="";
  
function conectar(){
$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password);
$db=mysqli_select_db($conn, "EJE");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully///   ";

if (!$db) {
    die ('No se puede usar foo : ' . mysql_error());
}
return $conn;
}
		
function guardar($conn){
	
	if (!$conn) {
	  die("Connection failed carga: " . mysqli_connect_error());
	}
	$sql = "INSERT INTO nombre (nombre, apellido, telefono)
	VALUES ('".$_POST['nombre']."', '".$_POST['apellido']."', '".$_POST['telefono']."')";
	if (mysqli_query($conn, $sql)) {
	  echo "New record created successfully";
	} else {
	  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);
	header("Location:eje3-1.php");	
}
function borrar($conn){
	conectar();
	$sql = "DELETE FROM `nombre` WHERE `nombre`.`nombre` = '".$_POST['nombre']."'";
	if ($conn->query($sql) === TRUE) {
	echo "Record deleted successfully";
	} else {
	echo "Error deleting record: " . $conn->error;
	}
$conn->close();
}
function mostrar($conn){
	$sql = "SELECT * FROM nombre";
	$result = mysqli_query($conn, $sql);	
	mysqli_close($conn);
	$id=$result['id'];
	return $id;
	}
function modificar($conn){
	if (!$conn) {
	  die("Connection failed carga: " . mysqli_connect_error());
	}
	$sql = "UPDATE `nombre` SET `nombre` = '".$_POST['nombre']."', `apellido` = '".$_POST['apellido']."', `telefono` = '".$_POST['telefono']."' WHERE `nombre`.`id` = ".$_POST['id']."";
	if (mysqli_query($conn, $sql)) {
	  echo "Record modify successfully";
	} else {
	  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	mysqli_close($conn);	
	header("Location:eje3-1.php");

}
function cancelar(){
		header("Location:eje3-1.php");
	}
if(isset($_POST['guardar']))$boton1=$_POST['guardar'];
if(isset($_POST['borrar']))$boton2=$_POST['borrar'];
if(isset($_POST['buscar']))$boton3=$_POST['buscar'];
if(isset($_POST['mostrar']))$boton4=$_POST['mostrar'];
if(isset($_POST['modificar']))$boton5=$_POST['modificar'];
if(isset($_POST['cancelar']))$boton6=$_POST['cancelar'];
if($boton1){
	$c=conectar();
	guardar($c);
	}
if($boton2){
	$c=conectar();
	borrar($c);
	}
if($boton3){
	$c=conectar();
	buscar($c);
	}
if($boton4){
	$c=conectar();
	mostrar($c);
	}
if($boton5){
	$c=conectar();
	modificar($c);
	}
if($boton6){
	cancelar();
	}
?>
