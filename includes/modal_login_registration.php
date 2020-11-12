<?php
// link to the page dedicated to data handling .. the link is resolved dynamicaly depending on wether in project or the forum
$treatment_data_relative_link = null;

if ($place === 'project') {
    $treatment_data_relative_link = './includes/login_registration.php';
} elseif ($place === 'forum') {
    $treatment_data_relative_link = '../includes/login_registration.php';
}

?>


<!-- login modal -->
<div class="modal fade" id="login_modal">
	<div class="modal-dialog modal-dialog-scrollable">
		<div class="modal-content">

		<!-- Modal Header -->
		<div class="modal-header">
			<h4 class="modal-title">Authentification : </h4>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
		</div>

		<!-- Modal body -->
		<div class="modal-body">

			<form method="post" action="<?=$treatment_data_relative_link;?>" class="form-group">
				<input type="email" name="user_email" class="form-control" placeholder="email" required>
				<br>

				<input type="password" name="user_password" class="form-control" placeholder="password" required>
				<br>

				<button type="submit" class="btn btn-primary" name="login_submit" >valider</button>
			</form>

		</div>

		<!-- Modal footer -->
		<div class="modal-footer">
			<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
		</div>

		</div>
	</div>
</div>



<!--  registration modal -->
<div class="modal fade" id="registration_modal">
  	<div class="modal-dialog modal-dialog-scrollable">
    	<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Inscription : </h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">

				<form method="post" action="<?=$treatment_data_relative_link?>" class="form-group" enctype="multipart/form-data" >
					<input type="text" name="user_firstname" class="form-control" placeholder="prenom" required>
					<br>

					<input type="text" name="user_lastname" class="form-control" placeholder="nom" required>
					<br>

					<input type="email" name="user_email" class="form-control" placeholder="email" required>
					<br>

					<input type="password" name="user_password" class="form-control" placeholder="mot de passe" required>
					<br>

					photo du profil
					<input type="file" class="form-control-file border" name="user_image">
					<br>

					choisir sex :
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" name="user_sex" id="homme" value="homme" required>
						<label class="custom-control-label" for="homme">homme</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" name="user_sex" id="femme" value="femme" required>
						<label class="custom-control-label" for="femme">femme</label>
					</div>
					<br><br>

					choisir profil :
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" name="user_profile" id="student" value="student" required>
						<label class="custom-control-label" for="student">etudiant</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" name="user_profile" id="professor" value="professor" required>
						<label class="custom-control-label" for="professor">professeur</label>
					</div>
					<br><br>

					choix de l'université
					<select name="user_university" class="custom-select" required>
						<option selected>votre université :</option>
							<?php
							$query = "SELECT * FROM universities";
							$select_universties = mysqli_query($connection, $query);
							confirmQuery($query);
							?>
						<?php while ($university_row = mysqli_fetch_assoc($select_universties)): ?>
							<option value="<?=$university_row['university_id']?>"> <?=$university_row['university_name']?> </option>
						<?php endwhile;?>
					</select>
					<br>

					<br>
					<button type="submit" class="btn btn-primary" name="registration_submit" >valider</button>
				</form>

			</div>

			<!-- Modal footer -->
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			</div>

    	</div>
  	</div>
</div>
