<!-- website's home page, it lists all universities -->
<?php  include 'includes/header.php'; ?>

<?php include 'includes/nav_bar.php' ; ?>

<div class="container container-classroom">
	
	<!-- search category form -->
	<div class="row justify-content-center">
		<div class="col-sm-12 col-md-10 col-lg-6">
			<form action="" method="post">
				<div class="input-group mb-3">
					<input type="text" class="form-control" placeholder="chercher une université" name="university_wanted">
				 	<div class="input-group-append">
				  		<button type="submit" class="btn btn-primary" name="search_university">chercher</button>
					</div>
				</div>
			</form>
		</div>
	</div> <!-- /search category form -->

	

	<!-- universities -->
	<div class="row justify-content-center">

		<?php
			$query = "";
			if(isset($_POST['search_university'])){
				$university_wanted = htmlspecialchars($_POST['university_wanted']);
				$query = "SELECT * FROM universities WHERE university_name LIKE '%$university_wanted%' ";
			}else{
				$query = "SELECT * FROM universities";
			}

			$select_universities = mysqli_query($connection, $query);
			confirmQuery($select_universities);

			$result = mysqli_num_rows($select_universities);
		?>

		<?php if($result===0): ?> <!-- no university in the db -->
			
			<div class="col-sm-10">
				<h1 class="alert alert-warning"> Rien a afficher! </h1>
			</div>

		<?php else: ?> <!-- there are some universities in the db -->

			<?php while($university_row = mysqli_fetch_assoc($select_universities)): ?>

				<?php
					//some infos about the university: number of students, number of profs
					$university_id = $university_row['university_id'];


					//number of profs
					$query = "SELECT * FROM users WHERE user_profile = 'professor' AND user_university_id = '$university_id' ";
					$select_profs = mysqli_query($connection, $query);
					confirmQuery($select_profs);
					$nbre_prof = mysqli_num_rows($select_profs);

					//number of students
					$query = "SELECT * FROM users WHERE user_profile = 'student' AND user_university_id = '$university_id' ";
					$select_students = mysqli_query($connection, $query);
					confirmQuery($select_students);
					$nbre_students = mysqli_num_rows($select_students);
				?>

				
				<div class="col-lg-3 col-md-5 col-sm-12" style="margin:10px;">
					<div class="card bg-light border-secondary" style="height: 340px";>
						<a href="./university.php?id=<?= $university_row['university_id'] ?>"> 
					    	<img class="card-img-top" src="./pictures/universities_images/<?= $university_row['university_image'] ?>" alt="Card image cap" width="255" height="115">
					    </a>
					    <div class="card-body">
					      	<h6 class="card-title text-capitalize font-weight-bold font-italic">
					      		<a href="./university.php?id=<?= $university_row['university_id'] ?>" > <?= $university_row['university_name'] ?> </a>  <br>
					      		<small class="text-muted"> <?= $nbre_students ?> etudiants <br> <?= $nbre_prof ?> profs</small>
					      	</h6>
					      	<p class="card-text"> <?= substr($university_row['university_description'], 0, 100) ?>... </p>
					      	
					    </div>
					</div>
				</div>

			<?php endwhile; ?>
			
		<?php endif; ?>

	
	</div> <!-- /universities -->






</div>










<?php include 'includes/footer.php'; ?>