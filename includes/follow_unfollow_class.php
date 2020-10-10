<?php ob_start(); ?>
<?php session_start(); ?>
<?php include './db.php'; ?>
<?php 
	//pour mettre l encodage a utf8
	mysqli_query($connection,"SET NAMES 'UTF8'");
	header('Content-Type: text/html; charset=UTF-8', true);
?>
<?php include './functions.php' ?>
<?php

	if(isset($_POST['class_id']) && isset($_POST['operation'])){

		$class_id = $_POST['class_id'];
		$user_id = $_SESSION['user_id'];
		$operation = $_POST['operation'];

		if($operation === 's\'abonner'){

			$query1 = "UPDATE classes SET class_following = class_following + 1 WHERE class_id = '$class_id' ";
			$query2 = "INSERT INTO following_classes(user_id, class_id) VALUES('$user_id', '$class_id') ";

		}elseif($operation === 'se desabonner'){

			$query1 = "UPDATE classes SET class_following = class_following - 1 WHERE class_id = '$class_id' ";
			$query2 = "DELETE FROM following_classes WHERE user_id = '$user_id' AND class_id = '$class_id' ";

		}

		$result1 = mysqli_query($connection, $query1);
		confirmQuery($result1);

		$result2 = mysqli_query($connection, $query2);
		confirmQuery($result2);

		
	}
	
?>