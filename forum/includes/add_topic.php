<!-- handling adding a topic to the db -->
<?php session_start(); ?>
<?php include '../../includes/db.php' ?>
<?php 
	mysqli_query($connection,"SET NAMES 'UTF8'");
	header('Content-Type: text/html; charset=UTF-8', true);
?>
<?php include '../../includes/functions.php'; ?>

<?php
	if(isset($_POST['submit_topic'])){

		if(isset($_POST['topic_name']) && isset($_POST['topic_description']) ){

			
			$topic_name = mysqli_real_escape_string( $connection, $_POST['topic_name'] );
			$topic_description = mysqli_real_escape_string($connection, $_POST['topic_description']);
			$user_id = $_SESSION['user_id'];

			//handle image upload
			$topic_image = '';

			if (isset($_FILES['topic_image']) AND $_FILES['topic_image']['error'] == 0){

			    if ($_FILES['topic_image']['size'] <= 8000000){ // <= 8mb

		            $file_infos = pathinfo($_FILES['topic_image']['name']);
		            $extension = $file_infos['extension'];
		            $allowed_extensions = array('jpg', 'jpeg', 'png');

		            if (in_array($extension, $allowed_extensions)){
						
						//giving the image a uniq name so that we can avoid names collisions
		                $topic_image =  md5( uniqid(rand(), true) ) . '.' . $extension ;

		                move_uploaded_file( $_FILES['topic_image']['tmp_name'], '../../pictures/topics_images/' . $topic_image );
		
		            }
			    }
			}


			$query = "INSERT INTO topics(topic_user_id, topic_name, topic_description,topic_image ,topic_creation_date, topic_following) VALUES('$user_id', '$topic_name', '$topic_description', '$topic_image', now(), 0 ) ";

			$insert_topic = mysqli_query($connection, $query);
			confirmQuery($insert_topic); 

			header('Location: ../index.php');
		}
	}
?>