<?php
include 'eje3-2.php';
$conn=conectar();
if (isset($_GET['del'])) {
		$id = $_GET['del'];
		$update = true;
		$conn=conectar();
			$sql = "DELETE FROM `nombre` WHERE `nombre`.`id` = ".$id."";
			if ($conn->query($sql) === TRUE) {
			echo "Record deleted successfully";
			} else {
			echo "Error deleting record: " . $conn->error;
			}
		$conn->close();
		header("Location:eje3-1.php");
		}else{
			echo "no entro";
			}

