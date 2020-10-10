<!-- page that handls the login and registration -->
<?php include './db.php'; ?>
<?php include './functions.php' ?>
<?php session_start(); ?>

<?php $place = basename(dirname($_SERVER['PHP_SELF'])) ; ?>



<!-- login handling -->
<?php
	if ( isset($_POST['login_submit']) ){
		$user_email = mysqli_real_escape_string( $connection,$_POST['user_email'] );
		$user_password = $_POST['user_password'];

		$query = "SELECT * from users WHERE user_email = '$user_email' ";
		$select_query = mysqli_query($connection, $query);
		confirmQuery($select_query);


		if( mysqli_num_rows($select_query) === 1 ){

			$row = mysqli_fetch_assoc($select_query);

			if( password_verify($user_password, $row['user_password']) ){

				$_SESSION['user_id'] = $row['user_id'];
				$_SESSION['user_firstname'] = $row['user_firstname'] ;
				$_SESSION['user_lastname'] = $row['user_lastname'];
				$_SESSION['user_email'] = $row['user_email'];
				$_SESSION['user_sex'] = $row['user_sex'];
				$_SESSION['user_profile'] = $row['user_profile'];
				$_SESSION['user_university_id'] = $row['user_university_id'];

				
			 	header('Location: ../index.php');
			 
			}else{
				header('Location: ../index.php');
			}
		}else{
			header('Location: ../index.php');
		}

	}
	//else
	//	header('Location: ../index.php');
?>





<!-- registration login -->
<?php
	if( isset($_POST['registration_submit']) ){


		$user_firstname = mysqli_real_escape_string( $connection,$_POST['user_firstname'] );
		$user_lastname = mysqli_real_escape_string( $connection,$_POST['user_lastname'] );
		$user_email = mysqli_real_escape_string( $connection,$_POST['user_email'] );
		$user_sex = mysqli_real_escape_string( $connection,$_POST['user_sex'] );
		$user_profile = mysqli_real_escape_string( $connection,$_POST['user_profile'] );
		$user_university_id = mysqli_real_escape_string( $connection,$_POST['user_university'] );

		
		$user_password = password_hash($_POST['user_password'], PASSWORD_DEFAULT, ['cost' => 12]  ); 


		//handle image upload
		$user_image = '';

		if (isset($_FILES['user_image']) AND $_FILES['user_image']['error'] == 0){

		    if ($_FILES['user_image']['size'] <= 8000000){ // <= 8mb

	            $file_infos = pathinfo($_FILES['user_image']['name']);
	            $extension = $file_infos['extension'];
	            $allowed_extentions = ['jpg', 'jpeg', 'png'];

	            if (in_array($extension, $allowed_extentions)){
					// give the image a uniq image (to avoid names collisions)
	                $user_image =  md5( uniqid(rand(), true) ) . '.' . $extension ;

	                move_uploaded_file( $_FILES['user_image']['tmp_name'], '../pictures/users_images/' . $user_image );
	
	            }
		    }
		}


		
		$query = "INSERT INTO users(user_firstname, user_lastname, user_email, user_password ,user_sex, user_image, user_profile, 								user_university_id, user_inscription_date) 
				VALUES('$user_firstname', '$user_lastname', '$user_email', '$user_password', '$user_sex','$user_image' , '$user_profile', '$user_university_id' , now() ) ";

		$insert_user_query = mysqli_query($connection, $query);
		confirmQuery($insert_user_query); 

		// get the new user's id
		$query = "SELECT user_id FROM users WHERE user_email = '$user_email' AND user_password = '$user_password' ";
		$select_id_user_query = mysqli_query($connection, $query);
		confirmQuery($select_id_user_query);
		$result = mysqli_fetch_assoc($select_id_user_query);


		$_SESSION['user_id'] = $result['user_id'];
		$_SESSION['user_firstname'] = $user_firstname ;
		$_SESSION['user_lastname'] = $user_lastname;
		$_SESSION['user_email'] = $user_email;
		$_SESSION['user_sex'] = $user_sex;
		$_SESSION['user_image'] = $user_image;
		$_SESSION['user_profile'] = $user_profile;
		$_SESSION['user_university_id'] = $user_university_id;

	 	header('Location: ../index.php');



	}

