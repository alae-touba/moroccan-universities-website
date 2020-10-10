<!-- topic's profile -->
<?php  include 'includes/forum_header.php'; ?>
<?php include '../includes/nav_bar.php' ; ?>


<div class="container-fluid" id="container-question-page">

	<div class="row justify-content-center">
		
		

		<!-- followed topics -->
		<div class="col-lg-2 d-none d-xl-block d-none d-lg-block d-xl-none">
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-body">

							<h5 class="card-title">Abbonées</h5>
							
							<!-- seleting the topics followed by the user(if he is conn) -->
							<?php if( isset($_SESSION['user_firstname']) ): ?>
								
								<?php  
									$user_id = $_SESSION['user_id'];
									$query = "SELECT topic_id FROM following_topics WHERE user_id = '$user_id' ";
									$select_followed_topics = mysqli_query($connection, $query);
									confirmQuery($select_followed_topics);

									$result = mysqli_num_rows($select_followed_topics);
								?>

								<?php if($result === 0): ?> <!-- does not follow any topic -->

									<p class="text-info">
										<img src="../pictures/icons/infoIcon24px.png">
										vous n'étes pas abboné a aucune categorie
									</p>

								<?php else: ?> 
								
									<?php while( $select_topics_ids_row = mysqli_fetch_assoc($select_followed_topics) ): ?>

										<?php
											$topic_id = $select_topics_ids_row['topic_id'];
											$query = "SELECT * FROM topics WHERE topic_id = '$topic_id' ";
											$select_topics = mysqli_query($connection, $query);
											confirmQuery($select_topics); 
											$topic_row = mysqli_fetch_assoc($select_topics);
										?>
										
										<p> 
											<a href="./topic.php?id=<?= $topic_id ?>" class="card-link">
												<img src="../pictures/<?= displayTopicImageName($topic_row['topic_id']) ?>" class="rounded img-sidebar" alt="topic img">
												<?= $topic_row['topic_name'] ?>
											</a> 
										</p>

									<?php endwhile; ?>

								<?php endif; ?>

							<?php endif; ?>

						</div>	
					</div>
				</div>
			</div>
		</div> 
		<!-- /followed topics -->

		
		
		
		

		<!-- content = topic + questions and answers -->
		<div class="col-lg-7 col-md-12 col-sm-12">

		
			<!-- TOPIC section -->
			<?php
				// selecting the topic from the db (if it exists)
				$the_topic_id = isset($_GET['id']) ? mysqli_real_escape_string($connection, $_GET['id']) : 0;

				$query = "SELECT * FROM topics WHERE topic_id = '$the_topic_id' ";
				$select_topic_query = mysqli_query($connection, $query);
				confirmQuery($select_topic_query);

				$result = mysqli_num_rows($select_topic_query);
			?>

			<?php if($result === 0): ?> <!-- topic does not exist -->

				<div class="alert alert-warning">
					<h1 class="text-conter">Oups! cette catégorie n'existe pas!</h1>	
				</div>
					
			<?php else: ?> <!-- topic exists -->

				<?php $topic_row = mysqli_fetch_assoc($select_topic_query); ?>
					
					<!-- topic infos -->
					<div class="row bg-white rounded" id="div-topic-section">
						<div class="col-lg-4 col-md-3 col-sm-12">
							<h2 class="font-weight-bold text-italic"> <?= $topic_row['topic_name'] ?> </h2>
							<img src="../pictures/<?= displayTopicImageName($topic_row['topic_id']) ?>" class="rounded img-thumbnail img-fluid" width="260" height="180" alt="topic img">
						</div>
						<div class="col-lg-8 col-md-8 col-sm-12">
							<!-- l'ancienne place du titre du topic-->
							<p>
								<?= $topic_row['topic_description'] ?>
							</p>
							
							<!-- following/unfollwing topic section + add a question section -->
							<?php if(isset($_SESSION['user_firstname'])): ?>
								
								<!-- following/unfollowing section -->
								<?php if( topicAlreadyFollowed($_SESSION['user_id'], $the_topic_id) ): ?> <!--already following the topic-->

									<p>
										<a href="#" id="follow_unfollow_click">
											<img src="../pictures/icons/unfollowIcon20px.png" id="follow_unfollow_img">
											<span style="color: royalblue;font-size: 19px;">unfollow</span>
											<span id="num_followers" class="text-muted"><?= numFollowers($the_topic_id) ?> abbonnés</span>
										</a>
									</p>

								<?php else: ?>

									<p>
										<a href="#" id="follow_unfollow_click">
											<img src="../pictures/icons/followIcon20px.png" id="follow_unfollow_img">
											<span style="font-size: 19px;">follow</span>
											<span id="num_followers" class="text-muted"><?= numFollowers($the_topic_id) ?> abbonés </span>
										</a>
									</p>

								<?php endif; ?> <!-- /following/unfollowing section -->
								


								<!-- add une question section-->
								<p class="h5">
									<a href="#" data-toggle="modal" class="text-muted" data-target="#writeQuestionModal">
										<img src="../pictures/icons/iconWriteAnswer.png" alt="write answer">
										poser une question
									</a>
								</p>
								
								<?php include './includes/modal_add_question.php'; ?>
								<!-- /add a question section-->


							<?php endif; ?> <!-- /following/unfollwing topic section + add a question section -->


						</div>
					</div> 
					<!--/topic infos -->
					


					<hr>
					




					<!-- QUESTIONS AND ANSWERS SECTION -->
					<?php 
						// selecting the topic's questions
						$query = "SELECT * FROM questions WHERE question_topic_id = '$the_topic_id' ";
						$select_questions_query = mysqli_query($connection, $query);
						confirmQuery($select_questions_query);

						$result = mysqli_num_rows($select_questions_query);
					?>
					
					<?php if($result === 0): ?> <!-- no question for this topic -->

						<div class="alert alert-warning">
							<h1>Oups! pas de questions touvé pour cette categorie!</h1>
						</div>

					<?php else: ?> <!-- there some questions for this topic -->

						<?php while($question_row = mysqli_fetch_assoc($select_questions_query)): ?>

							<?php 
								$question_id = $question_row['question_id'];
								$question_content = $question_row['question_content'];
								
								//selecting the last question's answer (if one exists)  
								$query = "SELECT * FROM answers WHERE answer_question_id = '$question_id' ORDER BY answer_creation_date ASC LIMIT 0,1";
								$select_answer = mysqli_query($connection, $query);
								confirmQuery($select_answer);

								$result = mysqli_num_rows($select_answer);
							?>
							
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 bg-white rounded div-question">
									<h2> <a href="./question.php?id=<?= $question_id ?>" class="font-weight-bold text-capitalize"> <?= $question_content ?> </a></h2>
									
									<?php if($result === 0): ?> <!-- no answers for this question -->

										<div class="alert alert-warning">Oups! pas de reposne a cette questions! soyer le premier a répondre! </div>

									<?php else: ?> <!-- there are some answers for this question -->

										<?php $answer_row  = mysqli_fetch_assoc($select_answer) ?>

										<table class="table">
											<thead>
												<tr>
													<th style="width: 90px;">
														<img src="../pictures/<?= displayUserImageName($answer_row['answer_user_id']) ?>" class="img-fluid rounded img-profil" alt="user img"> 
													</th>
													<th>
														<h3 class="text-capitalize"> <a href="<?= linkToUserProfile($answer_row['answer_user_id']) ?>"> <?= displayUserName($answer_row['answer_user_id']) ?> </a> </h3>
														<p>
															<span style="color:#445252;">
																<img src="../pictures/icons/timeIcon.png">
																<?= $answer_row['answer_creation_date']; ?>
															</span>
														</p>
													</th>
												</tr>
											</thead>
										</table>
										<p>
											<?= substr($answer_row['answer_content'], 0, 200 ) ?>...
											<a href="<?= $answer_row['answer_id'] ?>" class="text-primary read-more">(lire la suite)</a>
										</p>

									<?php endif; ?>

								</div>
							</div>

						<?php endwhile; ?>

					<?php endif; ?>
			
			<?php endif; ?>
			
		</div> 
		<!-- /content = topic + questions and answers -->






		

		<!-- other topics (sorted based on followers number (desc)) -->
		<div class="col-lg-2 d-none d-xl-block d-none d-lg-block d-xl-none">
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Autres catégories</h5>



							<?php if(isset($_SESSION['user_firstname'])): ?>
								<?php
									$user_id = $_SESSION['user_id'];
									

									// number of topics followed by the user
									$query = "SELECT * FROM following_topics WHERE user_id = '$user_id' ";
									$select_followed_by_user = mysqli_query($connection, $query);
									confirmQuery($select_followed_by_user);
									$followed_by_user_number = mysqli_num_rows($select_followed_by_user);

								
									// number of topics in the db
									$query = "SELECT * FROM topics";
									$select_topics = mysqli_query($connection, $query); 
									confirmQuery($select_topics);
									$topics_number = mysqli_num_rows($select_topics);									
								?>
								
								<!-- follows some topics but not all of them -->
								<?php if($followed_by_user_number > 0 && $topics_number > $followed_by_user_number ): ?>
									<?php
										// selecting the topics that the user follows
										$query = "SELECT * FROM following_topics WHERE user_id = '$user_id' ";
										$select_followed_by_user = mysqli_query($connection, $query);
										confirmQuery($select_followed_by_user);

										$tab = []; //an array that wil hold the ids for these topics 
										while ($row = mysqli_fetch_assoc($select_followed_by_user)){
											$tab[] = $row['topic_id'];
										}
										$tab[] = $the_topic_id;

									?>
									<?php
										//now i have to dipslay the topics that he does not follow 
										$query = "SELECT * FROM topics WHERE topic_id NOT IN ( ";
										
										for($i=0; $i < count($tab); $i++){
											if($i == count($tab) - 1){
												$query .= $tab[$i] . " )";
											} else {
												$query .= $tab[$i] . ", ";
											}
										}
										
										$select_not_followed_by_user = mysqli_query($connection, $query);
										confirmQuery($select_not_followed_by_user);
									?>
									<?php while($topic_row = mysqli_fetch_assoc($select_not_followed_by_user)): ?>
											
										<p> 
											<a href="./topic.php?id=<?= $topic_row['topic_id'] ?>" class="card-link">
												<img src="../pictures/<?= displayTopicImageName($topic_row['topic_id']) ?>" class="rounded img-sidebar">
												<?= $topic_row['topic_name'] ?>
											</a> 
										</p>


									<?php endwhile; ?>
										
								<!-- follow all topics -->
								<?php elseif($followed_by_user_number > 0 && $followed_by_user_number === $topics_number): ?>

									<p class="text-info">
										<img src="../pictures/icons/infoIcon24px.png">
										vous etes abbonées a tous les topics
									</p>
								
								<?php else: ?>

									<!-- does not follow any topic -->
									<?php
										$query = "SELECT * FROM topics WHERE topic_id <> '$the_topic_id' ORDER BY topic_following DESC LIMIT 0,10";
										$select_topics = mysqli_query($connection, $query);
										confirmQuery($select_topics);
									?>

									<?php while($topic_row = mysqli_fetch_assoc($select_topics)): ?>
										
										<p> 
											<a href="./topic.php?id=<?= $topic_row['topic_id'] ?>" class="card-link">
												<img src="../pictures/<?= displayTopicImageName($topic_row['topic_id']) ?>" class="rounded img-sidebar">
												<?= $topic_row['topic_name'] ?>
											</a> 
										</p>

									<?php endwhile; ?>

								<?php endif; ?>
								

							<?php else: ?> <!-- user not connected -->

								<?php
									$query = "SELECT * FROM topics WHERE topic_id <> '$the_topic_id' ORDER BY topic_following DESC LIMIT 0,10";
									$select_topics = mysqli_query($connection, $query);
									confirmQuery($select_topics);
								?>

								<?php while($topic_row = mysqli_fetch_assoc($select_topics)): ?>
									
									<p> 
										<a href="./topic.php?id=<?= $topic_row['topic_id'] ?>" class="card-link">
											<img src="../pictures/<?= displayTopicImageName($topic_row['topic_id']) ?>" class="rounded img-sidebar" alt="topic img">
											<?= $topic_row['topic_name'] ?>
										</a> 
									</p>

								<?php endwhile; ?>

							<?php endif; ?>

						</div>
					</div>
				</div>
			</div>
		</div> 
		<!-- /other topics (sorted based on followers number (desc)) ->



	</div> <!-- end main row -->

</div> <!-- end main container -->






<!-- follow / unfolow topic script -->
<?php if(isset($_SESSION['user_firstname'])): ?> <!-- this script will not execute unless we are connected-->

	<script>
		document.getElementById('follow_unfollow_click').addEventListener('click', function(e){
			e.preventDefault();


			var childs = this.childNodes

			var span = childs[3] //span (follow / unfollow)
			var img = childs[1] //icon		


			var xhr = new XMLHttpRequest()
			xhr.open('POST', './includes/follow_unfollow_treatment.php', true)
			xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')

			var operation = span.textContent

			var params = 'topic_id=<?= $the_topic_id ?>&user_id=<?= $_SESSION['user_id'] ?>&operation=' + operation
	 
			xhr.onload = function(){
				if(this.status === 200)
					document.getElementById('num_followers').textContent = this.responseText + ' abbonés'
			}

			xhr.send(params)


			if(span.textContent === 'follow' && img.getAttribute('src') === '../pictures/icons/followIcon20px.png'){ //following treatement
				span.textContent = 'unfollow'
				span.style.color = 'royalblue'
				img.setAttribute('src' , '../pictures/icons/unfollowIcon20px.png')
			}else{ 
				span.textContent = 'follow'
				span.style.color = 'black'
				img.setAttribute('src' , '../pictures/icons/followIcon20px.png')
			}

		})
	</script>

<?php endif; ?>  <!-- follow / unfolow topic script -->




<!-- read more link treatment -->
<script>
	
	var links = document.querySelectorAll('.read-more')

	for (var i = 0; i < links.length; i++) {

		links[i].addEventListener('click', function(e){
			e.preventDefault()

			var link = this 

			var xhr = new XMLHttpRequest()
			xhr.open('POST', './includes/read_more_answer.php', true)
			xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')

			var answer_id = link.getAttribute('href')

			var params = 'answer_id='+answer_id  
	 
			xhr.onload = function(){
				if(this.status === 200){
					link.parentNode.textContent = this.responseText
				}
			}

			xhr.send(params)

			
		})
	}
</script> <!-- end of read more link treatment -->




<?php include 'includes/forum_footer.php'; ?>



















