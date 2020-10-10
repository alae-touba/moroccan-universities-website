<!-- handling posting a question in this topic -->
<?php session_start(); ?>
<?php include '../../includes/db.php' ?>
<?php 
	mysqli_query($connection,"SET NAMES 'UTF8'");
	header('Content-Type: text/html; charset=UTF-8', true);
?>
<?php include '../../includes/functions.php'; ?>

<?php
	if(isset($_POST['submit_question'])){

		if( isset($_POST['question']) && isset($_POST['tags']) ){

			$topic_id = $_POST['submit_question'];

			$question_tags = mysqli_real_escape_string($connection, $_POST['tags']);
			$question_content = mysqli_real_escape_string($connection, $_POST['question']);
			$user_id = $_SESSION['user_id'];

			$query = "INSERT INTO questions(question_user_id, question_topic_id, question_content, question_creation_date, question_tags) VALUES('$user_id','$topic_id' , '$question_content', now(), '$question_tags' ) ";

			$insert_question = mysqli_query($connection, $query);

			confirmQuery($insert_question); 

			header('Location: ../topic.php?id=' . $topic_id);
		}
	}
?>
