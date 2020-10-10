<?php include '../../includes/db.php'; ?>
<?php include '../../includes/functions.php' ?>

<?php
	
if(isset($_REQUEST['answer_id'])){
	$answer_id = $_REQUEST['answer_id'];
	$query = "SELECT * FROM answers WHERE answer_id = '$answer_id' ";
	$select_answer = mysqli_query($connection, $query);
	confirmQuery($select_answer);

	$answer_row = mysqli_fetch_assoc($select_answer);

	echo $answer_row['answer_content'];
}
