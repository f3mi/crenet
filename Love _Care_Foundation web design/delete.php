<?php
require_once'pdo_connect.php';
if (isset($_GET['id'])) {
	try {
		$result = $db->prepare("DELETE FROM contact WHERE id=' . $edit . '");
		$result->execute();
		
	} catch (Exception $e) {
		echo "Error" .$e->getMessage();
	}
	echo "Deleted Successfully";
  }
	else {
	header("location: pdo_loop.php");
	}
?>