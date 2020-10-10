<?php include '../../includes/db.php'; ?>
<?php include '../../includes/functions.php' ?>
<?php
	
	if(isset($_POST['topic_id']) && isset($_POST['user_id']) && isset($_POST['operation'])){

		$topic_id = $_POST['topic_id'];
		$user_id = $_POST['user_id'];
		$operation = $_POST['operation'];

		if($operation === 'follow'){

			$query1 = "UPDATE topics SET topic_following = topic_following + 1 WHERE topic_id = '$topic_id' ";
			$query2 = "INSERT INTO following_topics(user_id, topic_id) VALUES('$user_id', '$topic_id') ";

		}elseif($operation === 'unfollow'){

			$query1 = "UPDATE topics SET topic_following = topic_following - 1 WHERE topic_id = '$topic_id' ";
			$query2 = "DELETE FROM following_topics WHERE user_id = '$user_id' AND topic_id = '$topic_id' ";

		}

		mysqli_query($connection, $query1);
		mysqli_query($connection, $query2);

		// selecting the number of this topic's followers
		$query = "SELECT topic_following FROM topics WHERE topic_id = '$topic_id' ";
		$select_following_num = mysqli_query($connection, $query);
		$topic_row = mysqli_fetch_assoc($select_following_num);

		echo numFollowers($topic_id);

	}
	
?>