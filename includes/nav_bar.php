<!-- $place va contenir soit forum soit project , donc il va nous aider a determiner 'where we are' pour bien mettre et régler les liens dans le navbar -->
<!-- $place will contain either "forum" or "project", so it will helps know where we are so that we can write links correctly in the navbar -->

<?php
  	$connected = null;
  
  	if(isset($_SESSION['user_firstname'])){
		$connected = true;
  	}
?>

<?php $place = basename(dirname($_SERVER['PHP_SELF'])) ; ?>


<!-- we are ni the project -->
<?php if($place === 'project'): ?>

      <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color:#324f6c;" >
		<div class="container">
			<a class="navbar-brand" href="./index.php">
				<img src="./pictures/icons/753890-32.png" width="38" height="38" alt="websiteLogo">
				Site  
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="./index.php">
						Universités
						<span class="sr-only">(current)</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="forum/index.php">Forum</a>
					</li>

					<?php if($connected): ?>
						<li class="nav-item">
							<a class="nav-link" href="./university.php?id=<?= $_SESSION['user_university_id'] ?>">Mon Université</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="./followed_classes.php">classes suivis</a>
						</li>
						<li>
							<a class="nav-link" href="./profile.php?id=<?php echo $_SESSION['user_id'] ?> " > Mon Profile</a>
						</li>
					<?php endif; ?>
				</ul>
			
				<?php if( $connected ):  ?>

					<ul class="navbar-nav ml-auto">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<img src="./pictures/icons/studentIcon.png">
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="./profile.php?id=<?= $_SESSION['user_id'] ?> ">Mon Profil</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="./includes/deconnection.php">Se deconnecter</a>
							</div>
						</li>
					</ul>

				<?php else: ?>

					<div class="ml-auto">
						<button type="button" class="btn btn-outline-primary text-white" data-toggle="modal" data-target="#login_modal">se connecter</button>
						<button type="button" class="btn btn-outline-success text-white" data-toggle="modal" data-target="#registration_modal">s'inscrire</button>
					</div>

				<?php endif; ?>

			</div>
		</div>
    </nav>

    <?php include 'includes/modal_login_registration.php'; ?>



<!-- we ar in the forum -->
<?php elseif($place === 'forum'): ?>

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color:#324f6c;" >
		<div class="container">
			<a class="navbar-brand" href="../index.php">
				<img src="../pictures/icons/753890-32.png" width="38" height="38" alt="websiteLogo">
				Site  
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="../index.php">
							Universités
							<span class="sr-only">(current)</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="./index.php">Forum</a>
					</li>

					<?php if($connected): ?>
						<li class="nav-item">
							<a class="nav-link" href="../university.php?id=<?= $_SESSION['user_university_id'] ?>">Mon Université</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="../followed_classes.php">classes suivis</a>
						</li>
						<li>
							<a class="nav-link" href="../profile.php?id=<?php echo $_SESSION['user_id'] ?> ">Mon Profile</a>
						</li>
					<?php endif; ?>

				</ul>

				<?php if( $connected ):  ?>

					<ul class="navbar-nav ml-auto">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<img src="../pictures/icons/studentIcon.png">
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="../profile.php?id=<?= $_SESSION['user_id'] ?> ">Mon Profil</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="../includes/deconnection.php">Se deconnecter</a>
						</div>
					</li>
					</ul>

				<?php else: ?>

					<div class="ml-auto">
						<button type="button" class="btn btn-outline-primary text-white" data-toggle="modal" data-target="#login_modal">se connecter</button>
						<button type="button" class="btn btn-outline-success text-white" data-toggle="modal" data-target="#registration_modal">s'inscrire</button>
					</div>

				<?php endif; ?>

			</div>
		</div>
    </nav>
    
    <?php include '../includes/modal_login_registration.php' ; ?>

<?php endif; ?>








<script>
  
  // document.getElementById('validerr').addEventListener('click', function(e){
  //   e.preventDefault();
  //   alert('yeep');

  //   setTimeout(location.reload(), 2000);

  // });
</script>