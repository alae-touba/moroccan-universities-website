<!-- creation of a class -->
<?php ob_start(); ?>
<?php session_start(); ?>
<?php include './db.php'; ?>
<?php 
	mysqli_query($connection,"SET NAMES 'UTF8'");
	header('Content-Type: text/html; charset=UTF-8', true);
?>
<?php include './functions.php'; ?>
<?php

	if(isset($_POST['create_class']) ){

		$class_creator = $_SESSION['user_id'];
		$class_name = mysqli_real_escape_string($connection, $_POST['class_name']);
		$class_description = mysqli_real_escape_string($connection, $_POST['class_description']);
		$class_university_id = mysqli_real_escape_string($connection, $_POST['class_university_id']);

		
		// add an image to this class 
		$pictures_tab = glob('../pictures/classes_images/*');
		$class_image = basename( $pictures_tab[ rand(0, sizeof($pictures_tab)-1 ) ] );



		$query = "INSERT INTO classes(class_name, class_university_id, class_creation_date, class_description, class_professor_creator_id, class_following, class_image) VALUES('$class_name', '$class_university_id', now(), '$class_description', '$class_creator', 0, '$class_image' ) ";

		$insert_class = mysqli_query($connection, $query);
		confirmQuery($insert_class);

		//l'id de cette classe?
		$query = "SELECT class_id FROM classes ORDER BY class_id DESC LIMIT 0,1";
		$select_id = mysqli_query($connection, $query);
		confirmQuery($select_id);

		$result_row = mysqli_fetch_assoc($select_id);
		$class_id = $result_row['class_id'];

		header('Location: ../class.php?id=' . $class_id);
		
	}
	
?>