<!-- this page is dedicated to a university class.. it displays all the posts published the prof of the class .. -->
<?php require 'includes/header.php' ; ?>

<?php require 'includes/nav_bar.php' ; ?>

<!-- main container -->
<div class="container container-classroom ">
	
	<?php 
		$the_class_id = isset($_GET['id']) ? mysqli_real_escape_string($connection, $_GET['id']) : 0;
		$query = "SELECT * FROM classes WHERE class_id = '$the_class_id' ";
		$select_class = mysqli_query($connection, $query);
		confirmQuery($select_class);
		$result = mysqli_num_rows($select_class);
	?>

	<?php if($result === 0): ?> <!-- the class does not exist -->
		
		<div class="row">
			<div class="col-xs-12 col-lg-12">
				<h1 class="alert alert-warning"> Oups! la classe que vous cherchez n'exsites pas! </h1>
			</div>
		</div>

	<?php else: ?> <!-- the class exist -->

		<?php $class_row = mysqli_fetch_assoc($select_class); ?>

		<!-- class's profile section -->
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
			
		</div> <!-- /class's profile section  -->
		


		<!-- sidbar + posts -->
		<div class="row">



			<!-- sidebar : links to specific posts (homeworks, courses, ..)-->
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
									<img src="./pictures/icons/announcementIcon.png" alt="announcement icon">
									Annonecs
								</a> 
							</p>
						</div>
					</div>
				</div>
			</div> <!-- /sidebar : links to specific posts (homeworks, courses, ..) -->
			

			
			<!-- listing all the posts -->
			<div class="col-lg-9">
				<div class="row">
					
					<div class="col-lg-12">
						
						<!-- add a post (only if the user is conn and he is the creator of the class) -->
						<?php
							$query = "SELECT class_professor_creator_id FROM classes WHERE class_id = '$the_class_id' ";
							$select_class_prof = mysqli_query($connection, $query);
							confirmQuery($select_class_prof);

							$row = mysqli_fetch_assoc($select_class_prof);
							$result = $row['class_professor_creator_id'];
						?>
						
						<?php if( isset($_SESSION['user_firstname']) AND $_SESSION['user_id']== $result ): ?>
							<br>
							<button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">+ ajouter une publication</button>
							<br>

							<!-- Modal -->
							<div id="myModal" class="modal fade" role="dialog">
								<div class="modal-dialog modal-lg">

									<!-- Modal content-->
									<div class="modal-content">

									<div class="modal-header">
										<h3>Ajouter une publication</h3>
										<button type="button" class="close" data-dismiss="modal">&times;</button>
									</div>

									<div class="modal-body">
										<form action="./includes/add_post.php" method="post" enctype="multipart/form-data">
											titre:
											<input type="text" name="post_title" class="form-control" placeholder="titre du publication">
											<br>

											description
											<input type="text" name="post_description" class="form-control" placeholder="description">
											<br>
											
											<!-- class_id -->
											<input name="post_class_id" type="hidden" value="<?= $the_class_id ?>">

											type:
											<select name="post_type" class="custom-select">
												<option value="course">cours</option>
												<option value="home_work">devoir</option>
												<option value="announcement">announce</option>
											</select>
											<br>
											<br>

											un document:
											<input type="file" class="form-control-file border" name="post_document_name">
											<br>



											<button type="submit" name="add_post" class="btn btn-primary">ajouter la publication</button>	
										</form>
										
									</div>

									
									</div>

								</div>
							</div>

						<?php endif; ?>
						
						
						<?php
						// in all cases, we display all posts
						$query = "SELECT * FROM posts WHERE post_class_id = '$the_class_id' ";

						$posts_type = null;

						// specifying the type of posts to display
						if(isset($_GET['posts_type']) && $_GET['posts_type'] != 'all_posts' ){
							   $posts_type = mysqli_real_escape_string($connection, $_GET['posts_type'] );
							   $query .= " AND post_type = '$posts_type' ";
						}

						$select_posts = mysqli_query($connection, $query);
						confirmQuery($select_posts);
						$result = mysqli_num_rows($select_posts);
						?>

						<?php if($result == 0): ?>
							<br>
							<h1 class="alert alert-warning"> pas de publications dans cette classe</h1>
						<?php endif; ?>
					</div>

					<?php if($result > 0): ?>
						<?php while($post_row = mysqli_fetch_assoc($select_posts)): ?>

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
											<h3> <?= ucwords($post_row['post_title']) ?> </h3>
											<p> <?= $post_row['post_description'] ?> </p>

											<p> <?= $post_row['post_document_name'] ?> </p>
											<!-- <button class="btn btn-primary">aller au publication <img src="pictures/1954526-16.png"></button> -->
											<a href="./post.php?id=<?= $post_row['post_id'] ?>" class="btn btn-primary">aller au publication <img src="./pictures/icons/1954526-16.png" alt="go to post icon"> </a>
											
										</td>
									</tbody>
								</table>
								
							</div>

						<?php endwhile; ?>
					<?php endif; ?>

				</div>

			</div>
			<!-- /listing all the posts -->	
			
				

		</div> <!-- end of sidbar + liste des poste --> 


	<?php endif; ?>



</div> <!-- end of main container -->


<?php require 'includes/footer.php' ; ?>