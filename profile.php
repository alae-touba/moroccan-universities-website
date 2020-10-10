<!-- page du profil  -->
<?php include './includes/header.php'; ?>
<?php include './includes/nav_bar.php'; ?>

<div class="container container-classroom bg-white">


	<?php
		$the_user_id = isset($_GET['id']) ?  mysqli_real_escape_string($connection, $_GET['id']) : 0 ; 


		//selection user informations

		$query = "SELECT * FROM users WHERE user_id = '$the_user_id' ";
		$select_user = mysqli_query($connection, $query);
		confirmQuery($select_user);

		$result = mysqli_num_rows($select_user); 
	?>

		<?php if($result === 0): ?>	 <!-- user does not exist -->
			
			<div class="row">
				<div class="col-sm-12 alert alert-warning">
					<h1 class="">Oups! cet utilisateur n'existes pas !</h1>
				</div>
			</div>
			
		<?php else: ?> <!-- /user does not exist -->

			<?php $row = mysqli_fetch_assoc($select_user) ?>

			<!-- picture and name section -->
			<div class="row justify-content-center" style="padding-top: 10px;">
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<img src="./pictures/<?= displayUserImageName($row['user_id']) ?>" class="img-fluid mx-auto d-block rounded" alt="user img">	
				</div>

				<div class="col-lg-8 col-md-8 col-sm-4 col-xs-12">
					<h2 class="text-capitalize font-weight-bold font-italic"> <?= displayUserName($row['user_id']) ?> <span class="text-muted font-italic h5"> [ <?= displayUserProfileInFrench($row['user_profile']) ?> ] </span> </h2>
					<h5> <?= displayUniversityName($row['user_university_id']) ?> </h5>
					<h5>inscrit le <?= $row['user_inscription_date'] ?> </h5>	
				</div>

			</div>

			<hr>
			

			<div class="row">

				<?php include './includes/profile_includes/user_forum_stats.php'; ?>

				<!-- sidebar -->
				<div class="col-lg-4 col-md-4">
					<div class="row">
						<div class="col-lg-10 col-md-10">
							<table class="table">
								<thead>
									<tr>
										<th class="h4 text-capitalize">flux</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<!-- <a href="profile.php?source=profile&id=<?= $the_user_id ?>" class="text-muted text-capitalize">profil</a> -->
											<a href="profile.php?id=<?= $the_user_id ?>" class="text-muted text-capitalize">profil</a>

										</td>
									</tr>
									<tr>
										<td>
											<a href="profile.php?source=questions&id=<?= $the_user_id ?>" class="text-muted text-capitalize">questions <?= $questions_number ?>  </a>
										</td>
									</tr>
									<tr>
										<td>
											<a href="profile.php?source=answers&id=<?= $the_user_id ?>" class="text-muted text-capitalize">reponses <?= $answers_number ?> </a>
										</td>
									</tr>
									<tr>
										<td>
											<a href="profile.php?source=topics&id=<?= $the_user_id ?>" class="text-muted text-capitalize">topics <?= $followed_topics_number ?> </a>
										</td>
									</tr>
								</tbody>
							</table>	
						</div>
					</div>	
				</div>
				

				<!-- content -->
				<div class="col-lg-8 col-md-8">
					<div class="row">
						<div class="col-lg-10 col-md-10">
								
							<?php
								$source = isset( $_GET['source'] ) ? $_GET['source'] : '' ;
								
								switch ($source) {
									// case 'profile':
									// 	include 'includes/profile_includes/view_profile.php';
									// 	break;
									case 'questions':
										include 'includes/profile_includes/view_own_questions.php'; 
										break;
									case 'answers':
										include 'includes/profile_includes/view_own_answers.php'; 
										break;
									case 'topics':
										include 'includes/profile_includes/view_followed_topics.php'; 
										break;
									default:
										include 'includes/profile_includes/view_profile.php';
										break;
								}
							?>
							
						</div>
					</div>
				</div>
			</div>

		<?php endif; ?>

</div> <!-- end container -->



<?php include './includes/footer.php'; ?>