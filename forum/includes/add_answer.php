<!-- handling posting an answer -->
<?php session_start(); ?>
<?php include '../../includes/db.php' ?>
<?php 
	mysqli_query($connection,"SET NAMES 'UTF8'");
	header('Content-Type: text/html; charset=UTF-8', true);
?>
<?php include '../../includes/functions.php'; ?>

<?php
	if(isset($_POST['submit_answer'])){

		if(isset($_POST['answer'])){

			$question_id = $_POST['submit_answer'];
			$answer_content = mysqli_real_escape_string($connection, $_POST['answer']);
			$user_id = $_SESSION['user_id'];

			$query = "INSERT INTO answers(answer_user_id, answer_question_id, answer_content, answer_creation_date) VALUES('$user_id', '$question_id', '$answer_content', now() ) ";

			$insert_answer = mysqli_query($connection, $query);
			confirmQuery($insert_answer); 

			header('Location: ../question.php?id=' . $question_id);
		}
	}
?>