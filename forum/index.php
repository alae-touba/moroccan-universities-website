<!-- forum's home page.. it lists all the topics -->
<?php  include 'includes/forum_header.php'; ?>
<?php include '../includes/nav_bar.php' ; ?>

<div class="container container-forum">
	


	<!-- add a topic (if the user is conn) -->
	<div class="row justify-content-center">
		<div class="col-sm-12 col-md-10 col-lg-6">

			<?php if(isset($_SESSION['user_firstname'])): ?>
						
				<p class="h4">
					<a href="#" data-toggle="modal" class="text-muted" data-target="#addTopicModal">
						<img src="../pictures/icons/iconWriteAnswer.png">
						ajouter une categorie
					</a>
				</p>
				
				<hr>

				<?php include './includes/modal_add_topic.php'; ?>

			<?php endif; ?>

		</div>
	</div> <!-- /add a topic (if the user is conn)-->







	<!-- search a topic form -->
	<div class="row justify-content-center">
		<div class="col-sm-12 col-md-10 col-lg-6">
			<form action="" method="post">
				<div class="input-group mb-3">
					<input type="text" class="form-control" placeholder="chercher un sujet" name="topic_wanted">
				 	<div class="input-group-append">
				  		<button type="submit" class="btn btn-primary" name="search_topic">chercher</button>
					</div>
				</div>
			</form>
			<hr>
		</div>
	</div> <!-- /search a topic form -->

	





	<!-- topics -->
	<div class="row justify-content-center">
		
		<?php
			$query = "";
			if(isset($_POST['search_topic'])){ //if we clicked on the button to search a particular topic
				$topic_wanted = htmlspecialchars( $_POST['topic_wanted'] );
				$query = "SELECT * FROM topics WHERE topic_name LIKE '%$topic_wanted%' ";
			}else{ //else, we display all the topics
				$query = "SELECT * FROM topics";
			}

			$select_topics = mysqli_query($connection, $query);

			confirmQuery($select_topics);
			$result = mysqli_num_rows($select_topics);
		?>

		<?php if($result === 0): ?> <!-- there is no topic in the db -->
			
			<h1>pas de résultat</h1>

		<?php else: ?> <!-- there are some topics -->
			
			<?php while( $topic_row = mysqli_fetch_assoc($select_topics) ): ?>

				<div class="col-lg-3 col-md-5 col-sm-12" style="margin:10px">
					<div class="card bg-light border-secondary" style="height: 370px;">

						<a href="./topic.php?id=<?= $topic_row['topic_id'] ?>">
						    <img class="card-img-top" src="../pictures/<?= displayTopicImageName($topic_row['topic_id']) ?>" alt="Card image cap" width="255" height="170">
						</a>

					    <div class="card-body">
					    	
				    		<h6 class="card-title text-capitalize font-weight-bold font-italic">
					      		<a href="./topic.php?id=<?= $topic_row['topic_id'] ?>">
					      			<?= $topic_row['topic_name'] ?>
					      		</a>
					      		<small class="text-muted"> <?= numFollowers($topic_row['topic_id']) . ' abbonés' ?> </small>
				      		</h6>
					    	
					      	
					      	<p class="card-text"> <?= strtolower(substr($topic_row['topic_description'], 0, 110)) ?>... </p>
					    </div>
					</div>
				</div>

			<?php endwhile; ?>

		<?php endif; ?>
		
	</div> <!-- /topics -->










</div>










<?php include 'includes/forum_footer.php'; ?>