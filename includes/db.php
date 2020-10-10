<?php

$connection = mysqli_connect('localhost', 'root', '', 'project');

if(!$connection){
	die('connection failed ! ' . mysqli_error($connection));
}




	