<!-- script that adds a class's post to the db -->
<?php ob_start(); ?>
<?php session_start(); ?>
<?php include './db.php'; ?>
<?php 
	mysqli_query($connection,"SET NAMES 'UTF8'");
	header('Content-Type: text/html; charset=UTF-8', true);
?>
<?php include './functions.php'; ?>

<?php
	if(isset($_POST['add_post'])){

		if( isset($_POST['post_type'], $_POST['post_description'], $_POST['post_title']) ){

			$post_title = $_POST['post_title'];
			$post_description = $_POST['post_description'];
			$post_type = $_POST['post_type'];
			$post_class_id = $_POST['post_class_id'];
			$post_document_name = '';

			$the_class_id =  $_POST["class_id"];
			
			if (isset($_FILES['post_document_name']) AND $_FILES['post_document_name']['error'] == 0){
				
				if ($_FILES['post_document_name']['size'] <= 8000000){ // <= 8mb
					
		            $file_infos = pathinfo($_FILES['post_document_name']['name']);
		            $extension = $file_infos['extension'];
		            $allowed_extensions = ['pdf'];
					
		            if (in_array($extension, $allowed_extensions)){
						
						$post_document_name = basename( $_FILES['post_document_name']['name'] );
		                move_uploaded_file( $_FILES['post_document_name']['tmp_name'], "../documents_upload/$post_document_name" );
						
		            }
			    }
			}
			
			$query = "INSERT INTO posts(post_title, post_description, post_type, post_document_name, post_creation_date, post_class_id) VALUES('$post_title', '$post_description', '$post_type', '$post_document_name', now(), '$post_class_id')";
			$insert_post = mysqli_query($connection, $query );
			confirmQuery($insert_post);
			
			
			header('Location: ../class.php?id=' . $the_class_id);
		}
	}


?>