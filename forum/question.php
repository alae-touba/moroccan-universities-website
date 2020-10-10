<!-- question profil -->

<?php  include 'includes/forum_header.php'; ?>
<?php include '../includes/nav_bar.php' ; ?>

<div class="container container-forum">
	<div class="row">
		


		<!-- QUESTION AND ITS ANSWERS SECTION -->
		<div class="col-lg-7 col-md-7 col-sm-12" style="margin-right: 20px;">
			<div class="row">

			
			<?php
				//selection des infos concernant la question (si elle existe) 
				$the_question_id = isset($_GET['id']) ? mysqli_real_escape_string($connection, $_GET['id']) : 0 ;
				$query = "SELECT * FROM questions WHERE question_id = '$the_question_id' ";
				$select_question = mysqli_query($connection, $query);
				confirmQuery($select_question);
				$result = mysqli_num_rows($select_question);

				$question_found = null; 
			?>	
			
			<?php if($result === 0 ): ?> <!-- question does not exist -->

				<?php $question_found = false; ?>

				<div class="col-sm-12 alert alert-warning rounded">
					<h1>question n'est pas trouvé!</h1>
				</div>
			
			<?php else: ?> <!-- the question exist -->
				
				<?php 
					$question_found = true;
					$question_row = mysqli_fetch_assoc($select_question); //the question's informations
				?>
				
				<!-- question section -->
				<div class="col-lg-12 col-md-12 col-sm-12 bg-white rounded div-answer">
					<h2 class="font-weight-bold"> <?= $question_row['question_content'] ?> </h2>
					<p>
						<span style="color:#445252;">
							<img src="../pictures/icons/timeIcon.png">
							<?= $question_row['question_creation_date'] ?>
						</span>
					</p>
					<p class="">par <a href="#" class=" text-capitalize font-weight-bold"> <?= displayUserName($question_row['question_user_id']) ?> </a> </p>
					

					<!-- add an answer (if the user is conn) -->
					<?php if(isset($_SESSION['user_firstname'])): ?>
						
						<p class="float-right h5">
							<a href="#" data-toggle="modal" class="text-muted" data-target="#writeAnswerModal">
								<img src="../pictures/icons/iconWriteAnswer.png">
								répondre
							</a>
						</p>
						
						<?php include './includes/modal_add_answer.php'; ?>

					<?php endif; ?> <!-- /add an answer (if the user is conn) -->

				</div> <!-- /question section -->
				



				<hr>
				
				
				<!-- answers section  -->
				<?php
					// selection all the question's anwsers
					$query = "SELECT * FROM answers WHERE answer_question_id = '$the_question_id' ";
					$select_answers = mysqli_query($connection, $query);
					confirmQuery($select_answers);
					$result = mysqli_num_rows($select_answers);
				?>
				
				<?php if( $result === 0 ): ?> <!-- no asnwer for this question -->

					<div class="col-sm-12 alert alert-warning">
						<h1>Oups! pas de reposne a cette question! soyer le premier a repondre!</h1>
					</div> 

				<?php else: ?> <!-- there are some answers for this question -->
					
					<?php while( $answer_row = mysqli_fetch_assoc($select_answers) ): ?> <!-- we loop through all answers to display them -->

						<!-- answers section -->
						<div class="col-lg-12 col-md-12 col-sm-12 bg-white rounded div-answer">
							<table class="table">
								<thead>
									<tr>
										<th style="width: 90px;">
											<img src="../pictures/<?= displayUserImageName($answer_row['answer_user_id']) ?>" class="img-fluid rounded img-profil"> 
										</th>
										<th>

											<h3 class="text-capitalize"> <a href="<?= linkToUserProfile($answer_row['answer_user_id']) ?>">  <?= displayUserName($answer_row['answer_user_id']) ?> </a></h3>
											<p>
												<span style="color:#445252;">
													<img src="../pictures/icons/timeIcon.png">
													<?= $answer_row['answer_creation_date'] ?>
												</span>
											</p>
										</th>
									</tr>
								</thead>
							</table>
							<p>
								<?= $answer_row['answer_content'] ?>
							</p>
						</div> <!-- /answers section -->

					<?php endwhile; ?>

				<?php endif; ?>

				
				
			
			<?php endif; ?>

				
			</div> <!--end of row QUESTION AND ITS ANSWERS SECTION -->
		</div> <!-- /QUESTION AND ITS ANSWERS SECTION -->
		
		









		<!-- (sidebar) related questions section -->
		<div class="col-lg-4 col-md-4 .d-sm-none .d-md-block .d-none .d-sm-block">
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">questions similaires</h5>

							<?php if(!$question_found): ?> <!-- question does not exist => we will display nothing -->
									
							<?php else: ?> <!-- question exists => display some similar questions (same topic) -->
								
								<?php

									//which topic?
									$query = "SELECT * FROM questions WHERE question_id = '$the_question_id' ";
									$select_question = mysqli_query($connection, $query);
									confirmQuery($select_question);
									$row = mysqli_fetch_assoc($select_question);

									$topic_id = $row['question_topic_id'] ;

									// selecting some questions of this topic (if they exist)
									$query = "SELECT * FROM questions WHERE ( question_topic_id = '$topic_id' ) AND ( question_id <> '$the_question_id' ) LIMIT 0,10 ";
									$select_similar_questions = mysqli_query($connection, $query);
									confirmQuery($select_similar_questions);
								?>
								
								<?php while( $question_row = mysqli_fetch_assoc($select_similar_questions) ): ?>

									<p>
										<a href="./question.php?id=<?= $question_row['question_id'] ?>" class="card-link"> <?= $question_row['question_content'] ?> </a>
									</p>

								<?php endwhile; ?>

							<?php endif; ?>

						</div>
					</div>	
				</div>

			</div> <!-- /row (sidebar) related questions section -->
		</div> 
		<!-- /related questions section -->
	




	</div> <!-- /main row -->
</div> <!-- /main container -->
	
<?php include 'includes/forum_footer.php'; ?>