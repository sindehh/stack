<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">

	<title>Student ID System</title>
	<style>
		body {
			min-height: 100vh;
			display: flex;
			align-items: center;
			justify-content: center;
			background-image: url(image/popo.png);
			background-size: cover;

		}

		h2 {
			font-family: 'Roboto Slab', serif;
			display: flex;
			justify-content: center;
			margin-top: -425px;
			font-size: 100px;
			text-decoration: none;
			text-emphasis-color: #fff;
		}
	</style>

</head>

<body>

	<?php
	include 'functions.php';

	?>

	<?= template_header('Home') ?>

	<a href="create.php">
		<h2>REGISTER</h2>
	</a>



	<?= template_footer() ?>


</body>

</html>