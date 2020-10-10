<!-- this page is dedicated to a class's post -->
<?php require 'includes/header.php' ; ?>

<?php require 'includes/nav_bar.php'; ?>

<!-- main container -->
<div class="container container-classroom ">
	
	<?php 
		$the_post_id = isset($_GET['id']) ? mysqli_real_escape_string($connection, $_GET['id']) : 0;
		$query = "SELECT * FROM posts WHERE post_id = '$the_post_id' ";
		$select_post = mysqli_query($connection, $query);
		confirmQuery($select_post);
		$result = mysqli_num_rows($select_post); 
	?>

	<?php if($result === 0): ?> <!-- the post does not exist -->

		<div class="row">
			<div class="xs-12 col-lg-12">
				<h1 class="alert alert-warning">Ouos! publication non trouvé!</h1>
			</div>
		</div>

	<?php else: ?> <!-- the post exist -->
		
		<?php $post_row = mysqli_fetch_assoc($select_post); ?> 
		

		<!-- class profile section -->
		<?php
			$the_class_id = $post_row['post_class_id']; 
			$query = "SELECT * FROM classes WHERE class_id = '$the_class_id' ";
			$select_class = mysqli_query($connection, $query);
			confirmQuery($select_class);
			$class_row = mysqli_fetch_assoc($select_class);

		?>
		<div class="row">
			<div class="col-xs-12 col-lg-12 rounded bg-white class-profile-section" style="background-image: url('./pictures/classes_images/<?= $class_row['class_image'] ?>');">
				<br><br><br><br><br><br><br><br>
				<h1> 
					<a href="./class.php?id=<?= $the_class_id ?>&posts_type=all_posts">
						<img src="./pictures/icons/iconfinder_Closed_Book_Icon_1741323.png" alt="" class="img-fluid">
						<?= ucwords($class_row['class_name']) ?>
					</a> 
				</h1>
				<p class="h5"> <?= $class_row['class_description'] ?> </p>
			</div>
			
		</div> <!-- /class profile section -->
		



		<!-- row : sidebar + post bloc + comments + add a comment -->
		<div class="row">
				

			<!-- sidebar: links to specific posts (courses, home works, ..) -->
			<div class="col-lg-3 .d-none .d-lg-block .d-xl-none">
				<div class="row">
					<div class="col-lg-11 card" style="margin-top:10px;">
						<div class="card-body">
							<p> 
								<a href="./class.php?id=<?= $the_class_id ?>&posts_type=course" class="card-link">
									<img src="./pictures/icons/courseIcon.png" alt="courses icon">
									Cours
								</a> 
							</p>
							<p> 
								<a href="./class.php?id=<?= $the_class_id ?>&posts_type=home_work" class="card-link">
									<img src="./pictures/icons/homeworkIcon.png" alt="homeworks icon">
									Devoirs
								</a> 
							</p>
							<p> 
								<a href="./class.php?id=<?= $the_class_id ?>&posts_type=announcement" class="card-link">
									<img src="./pictures/icons/announcementIcon.png" alt="announcements icon">
									Annonecs
								</a> 
							</p>
						</div>
					</div>
				</div>
			</div> <!-- /sidebar: links to specific posts (courses, home works, ..) -->
				




			<!-- post block + comments + add a comment-->
			<div class="col-lg-9 col-xs-12">
				<div class="row">	

					<!-- post block -->
					<div class="col-lg-12 col-xs-12 rounded bg-white div-post">

						<table class="table">
							<thead>
								<tr>
									<th width="65px">
										<img src="./pictures/<?= displayUserImageName($class_row['class_professor_creator_id']) ?>" width="65" height="65" alt="user image">
									</th>
									<th>
										<h4>
										prof : <a href="<?= linkToUserProfile($class_row['class_professor_creator_id']) ?>" class="text-capitalize bg-light text-dark"> <?= displayUserName($class_row['class_professor_creator_id']) ?> </a> <br>
										<span style="color:#445252;">
											<img src="./pictures/icons/timeIcon.png" alt="time icon">
											<small> le <?= $post_row['post_creation_date'] ?> </small>
										</span>
										</h4>
									</th>
								</tr>
							</thead>
							<tbody>
								<td colspan="2">
									<!-- <hr> -->
									<h3><?= ucwords(displayPostTypeInFrench($post_row['post_type'])) ?> : <?= $post_row['post_title'] ?> </h3>
									<p> <?= $post_row['post_description'] ?> </p>


									<!-- display the pdf document -->
									<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myDocumentModal">
										<?= $post_row['post_document_name'] ?>
									</button>

									<!-- The Modal -->
									<div class="modal fade" id="myDocumentModal">
									  <div class="modal-dialog modal-xl">
									    <div class="modal-content">

									      <!-- Modal body -->
									      <div class="modal-body">
									        <div>
									        	<embed src="./documents_upload/<?= $post_row['post_document_name'] ?>" width="1100" height="1000" type='application/pdf'></embed>
									        </div>
									      </div>

									    </div>
									  </div>
									</div> <!-- /display the pdf document -->
								</td>
							</tbody>
						</table>
						
						
						


					</div> <!-- /post block -->
					



					<!-- posts's comments -->
					<?php
						$query = "SELECT * FROM posts_comments WHERE comment_post_id = '$the_post_id' ";
						$select_comments = mysqli_query($connection, $query);
						confirmQuery($select_comments);
						$comments_number = mysqli_num_rows($select_comments);
					?>

					<div class="col-lg-12 col-xs-12 rounded bg-white div-post">				
						<h5> <kbd><?= $comments_number ?> commentaires</kbd> </h5>
						<div class="table-responsive">
							<table class="table ">
								<tbody>
									
									<?php while($comment_row = mysqli_fetch_assoc($select_comments)): ?>

										<tr>
											<td style="width: 65px;">
												<img src="./pictures/<?= displayUserImageName($comment_row['comment_user_id']) ?>" width="65" height="65" alt="user image">
											</td>
											<td>
												<p> 
													<a href="<?= linkToUserProfile($comment_row['comment_user_id']) ?>" class="text-primary font-weight-bold text-capitalize"> <?= displayUserName($comment_row['comment_user_id']) ?> </a>
													<div class="bg-light rounded">
														<?= $comment_row['comment_content'] ?>
													</div>
													<p class="float-sm-right">
														<span style="color:#445252;">
															<img src="./pictures/icons/timeIcon.png" style="padding-left: 10px";>
															<small> le <?= $comment_row['comment_creation_date'] ?> </small>
														</span>
													</p>
												</p>
											</td>								
										</tr>

									<?php endwhile; ?>
									
								</tbody>
							</table>
						</div>
					</div> <!-- /post's comments -->
					




					<!-- add a comment form (if we are conn) -->
					<?php if(isset($_SESSION['user_firstname'])): ?>

						<?php include './includes/add_comment.php'; ?>

					<?php endif; ?>
					<!-- /add a comment form (if we are conn) -->




				</div>
			</div> <!-- /post block + comments + add a comment -->




		</div> <!--  /row : sidebar + post bloc + comments + add a comment -->


	<?php endif; ?>


</div><!-- /main container -->


<?php require 'includes/footer.php'; ?>