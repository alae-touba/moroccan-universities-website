<!-- followed classes page -->
<?php require 'includes/header.php' ; ?>

<?php require 'includes/nav_bar.php' ; ?>

<?php
	if(!isset($_SESSION['user_firstname'])){
		header('Location: ./index.php');
	}
?>

<!-- main container -->
<div class="container container-classroom ">
	
	<diw class="row">
		<?php 
			$user_id = $_SESSION['user_id'];
			$query = "SELECT class_id FROM following_classes WHERE user_id = '$user_id' ";
			$select_followed_classes = mysqli_query($connection, $query);
			confirmQuery($select_followed_classes);

			$result = mysqli_num_rows($select_followed_classes);

		?>

		<?php if($result === 0): ?>
			
			<div class="col lg-10">
				<h1 class="alert alert-info">vous n'est pas abboné a aucune classe</h1>
			</div>

		<?php else: ?>

			<?php while($class_id_row = mysqli_fetch_assoc($select_followed_classes)): ?>
				
				<?php 
					$class_id = $class_id_row['class_id'];
					$query = "SELECT * FROM classes WHERE class_id = '$class_id' ";
					$select_classes = mysqli_query($connection, $query);
					confirmQuery($select_classes);
				?>

				<?php while($class_row = mysqli_fetch_assoc($select_classes)): ?>

					<div class="col-lg-5 col-xs-10 col-sm-10 col_md-8 followed-class-div">
						<h5 class="text-capitalize font-weight-bold"> 
							<a href="./class.php?id=<?= $class_row['class_id'] ?>">  <?= $class_row['class_name'] ?> </a>  
							( 
							<a href="./university.php?id=<?= $class_row['class_university_id'] ?>">  <?= displayUniversityName($class_row['class_university_id']) ?>  </a> 
							)
						</h5>
						<p> <?= $class_row['class_following'] ?> abbonés</p>
					</div>

				<?php endwhile; ?>

			<?php endwhile; ?>
	
		<?php endif; ?>
	</diw>


</div> <!-- /main container -->



<?php require 'includes/footer.php' ; ?>
