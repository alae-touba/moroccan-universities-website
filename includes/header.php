<?php ob_start(); ?>
<?php session_start(); ?>
<?php include './includes/db.php'; ?>
<?php 
	mysqli_query($connection,"SET NAMES 'UTF8'");
	header('Content-Type: text/html; charset=UTF-8', true);
?>
<?php include './includes/functions.php'; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<title></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/rtl.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	
