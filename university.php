<!-- this page contains the profile of a university .. it displays all the classes in this university -->
<?php require 'includes/header.php';?>

<?php require 'includes/nav_bar.php';?>

<!-- main container -->
<div class="container container-classroom ">

	<?php
		$the_university_id = isset($_GET['id']) ? mysqli_real_escape_string($connection, $_GET['id']) : 0;
		$query = "SELECT * FROM universities WHERE university_id = '$the_university_id' ";
		$select_university = mysqli_query($connection, $query);
		confirmQuery($select_university);

		$result = mysqli_num_rows($select_university);
	?>

	<?php if ($result === 0): ?> <!-- the university does not exist in the db -->

		<div class="row justify-content-center">
			<div class="col-lg-12">
				<h1 class="alert alert-warning"> Oups! université pas trouvé! </h1>
			</div>
		</div>

	<?php else: ?> <!-- the university exists -->

		<?php $university_row = mysqli_fetch_assoc($select_university);?>

		<!-- profil of the unversity section -->
		<div class="row">
			<div class="col-xs-12 rounded bg-white university-profile-section">
				<img src="./pictures/universities_images/<?=$university_row['university_image'];?>" class="mx-auto d-block  img-thumbnail" alt="profil pic" width="1100" height="400">
				<h1>
					<a href="./university.php?id=<?=$the_university_id;?>">
						<img src="./pictures/icons/universityTitleIcon.png" alt="" class="img-fluid">
						<?= ucwords($university_row['university_name']);?>
					</a>
				</h1>
				<p> <?=$university_row['university_description'];?> </p>
			</div>
		</div> <!-- /profil of the unversity section -->


		<!-- row : sidebar + classes -->
		<div class="row">

			<!-- sidebar : other universities-->
			<?php

				$query = "SELECT * FROM universities WHERE university_id <> '$the_university_id' LIMIT 0,5";
				$select_universities = mysqli_query($connection, $query);
				confirmQuery($select_universities);
			?>

			<div class="col-lg-3 d-none d-xl-block d-none d-lg-block d-xl-none">
				<div class="row">
					<div class="col-lg-11 card" style="margin-top:10px;">
						<div class="card-body">
							<h5 class="card-title">Autres universités</h5>

							<?php while ($university_row = mysqli_fetch_assoc($select_universities)): ?>

								<p>
									<a href="./university.php?id=<?=$university_row['university_id'];?>" class="card-link">
										<img src="./pictures/icons/universityIcon.png">
										<?=ucwords($university_row['university_name']);?>
									</a>
								</p>

							<?php endwhile;?>

						</div>
					</div>
				</div>
			</div> <!-- /sidebar : other universities -->


			<!-- all classes -->
			<div class="col-lg-9 col-xs-12">
				<div class="row">

					<!-- create a class (only if we are conn) -->
					<div class="col-lg-12">

						<?php if (isset($_SESSION['user_firstname']) && $_SESSION['user_profile'] === 'professor' && $_SESSION['user_university_id'] === $the_university_id): ?>
							<br>
							<!-- <h1 class="alert alert-info">oui vous etes un prof dans cette université </h1> -->

							<!-- Trigger the modal with a button -->
							<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">+ créer une classe</button>

							<!-- Modal -->
							<div id="myModal" class="modal fade" role="dialog">
							  <div class="modal-dialog modal-lg">

							    <!-- Modal content-->
							    <div class="modal-content">

							      <div class="modal-header">
							      	<h3>Ajouter une classe</h3>
							        <button type="button" class="close" data-dismiss="modal">&times;</button>
							      </div>

							      <div class="modal-body">
							      	<form action="./includes/add_class.php" method="post">
							      		<input type="text" name="class_name" class="form-control" placeholder="nom de la classe" required>
										<br>

							      		<textarea name="class_description" class="form-control" placeholder="une description a propos du 	contenu de la classe" required=""></textarea>
										<br>
							      		<input type="hidden" id="" name="class_university_id" value="<?=$the_university_id;?>">


							      		<button type="submit" name="create_class" class="btn btn-primary">créer la classe</button>
							      	</form>

							      </div>

							    </div>

							  </div>
							</div>

						<?php else: ?>

							<!-- <h1 class="alert alert-danger">non vous n etes pas un prof dans cette université</h1> -->

						<?php endif;?>
					</div>
					<!-- /create a class (only if we are conn) -->



					<?php

						$query = "SELECT * FROM classes WHERE class_university_id = '$the_university_id' ";
						$select_classes = mysqli_query($connection, $query);
						confirmQuery($select_classes);
						$result = mysqli_num_rows($select_classes);
					?>

					<?php if ($result === 0): ?> <!-- this university has no classes -->

						<div class="col-lg-12 col-xs-12 rounded">
							<h1 class="alert alert-info">pas de classes pour cette université</h1>
						</div>

					<?php else: ?>

						<?php while ($class_row = mysqli_fetch_assoc($select_classes)): ?>

							<div class="col-lg-12 col-xs-12 rounded bg-white div-class">
								<a href="./class.php?id=<?=$class_row['class_id'];?>">
									<img src="./pictures/classes_images/<?=$class_row['class_image'];?>" class="img-fluid mx-auto d-block img-thumbnail">
									<h1> <?=ucwords($class_row['class_name']);?>  </h1>
								</a>
								<h4>crée par le prof <a href="<?=linkToUserProfile($class_row['class_professor_creator_id']);?>" class="bg-light text-dark text-capitalize"> <?=displayUserName($class_row['class_professor_creator_id']);?></a> </h4>
								<span style="color:#445252;">
									<img src="./pictures/icons/timeIcon.png">
									<small>le <?=$class_row['class_creation_date'];?></small>
								</span>
								
								<hr>
								<h6> <kbd> de quois parle cette classe ? </kbd> </h6>
								<p> <?=$class_row['class_description'];?> </p>


								<!-- following/unfollowing classes section -->
								<?php if (isset($_SESSION['user_firstname'])): ?>

									<?php if (classAlreadyFollowed($_SESSION['user_id'], $class_row['class_id'])): ?> <!--deja abboné avec cette class-->

										<p>
											<img src="./pictures/icons/unfollowIcon32px.png">
											<a href="<?=$class_row['class_id'];?>" class="follow_class h4" style="color: royalblue;">se desabonner</a>
										</p>

									<?php else: ?>

										<p>
											<img src="./pictures/icons/followIcon32px.png">
											<a href="<?=$class_row['class_id'];?>" class="follow_class h4">s'abonner</a>
										</p>

									<?php endif;?>

								<?php endif;?> <!-- /following/unfollowing classes section -->



							</div>

						<?php endwhile;?>


					<?php endif;?>


				</div>
			</div> <!-- /all classes -->

		</div><!--/sidebar + classes -->

	<?php endif;?>


</div> <!-- end of main container -->



<script>
	//following / unfollwing classes
	var following_links = document.querySelectorAll('.follow_class')

	for (var i = 0; i < following_links.length; i++) {

		following_links[i].addEventListener('click', function(e){
			e.preventDefault()

			link = this
			operation = link.textContent //follow or unfollow


			var xhr = new XMLHttpRequest()
			xhr.open('POST', './includes/follow_unfollow_class.php', true)
			xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')

			var class_id = link.getAttribute('href')

			var params = 'class_id=' + class_id + '&operation=' + operation

			xhr.onload = function(){
				if(this.status === 200){
					//alert(this.responseText)
				}
			}

			xhr.send(params)

			if(this.textContent === 's\'abonner' ){
				link.previousSibling.previousSibling.setAttribute('src', './pictures/icons/unfollowIcon32px.png')
				this.textContent = 'se desabonner'
				this.style.color = 'royalblue'
			}
			else if(this.textContent === 'se desabonner'){
				link.previousSibling.previousSibling.setAttribute('src', './pictures/icons/followIcon32px.png')
				this.textContent = 's\'abonner'
				this.style.color = 'black'
			}


		})
	}


</script>

<?php require 'includes/footer.php';?>
