<!-- script that add a comment to a post -->
<?php

if( isset( $_POST['submit_comment'] ) && !empty($_POST['comment_content']) ){
	$comment_user_id = $_SESSION['user_id'];
	$comment_content = mysqli_real_escape_string($connection, $_POST['comment_content']);

	$query = "INSERT INTO posts_comments(comment_user_id, comment_post_id, comment_content, comment_creation_date)
						VALUES('$comment_user_id', '$the_post_id', '$comment_content', now()) ";
	$insert_comment = mysqli_query($connection, $query);
	confirmQuery($insert_comment);

	header('Location: ./post.php?id=' . $the_post_id);
}
?>

<div class="col-lg-12 col-xs-12 rounded bg-white div-post">
	<form method="post" action="" class="form-group">
		<textarea class="form-control" name="comment_content" placeholder="donner un avis sur ce poste ..."></textarea><br>
		<button type="submit" class="btn btn-outline-primary" name="submit_comment">publier</button>
	</form>
</div>


