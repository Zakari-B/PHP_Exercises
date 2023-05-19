<?php

/******************************/
//// DO NOT TOUCH THIS FILE ////
/*****************************/

$instructions = ["see comment below"];
// $instructions = json_decode(file_get_contents("PATH_TO_JSON_FOR_THIS_EXERCISE.JSON"), true);

$stage = $_GET['stage'] ?? 1;

$errors = [];

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<!-- Stylesheets for the base template and the specifics to apply to current level -->
	<link href="/assets/theme.css" media="screen" rel="stylesheet" type="text/css" />
	<link href="/Template/exercise-css.css" media="screen" rel="stylesheet" type="text/css" />
	<title>Template</title>
</head>

<body class="container">
	<!-- Button for high-contrast mode, use if appropriate -->
	<!-- <input type="checkbox" name="contrast" id="contrast"> -->
	<nav>
		<div class="brand">
			<a class="home" href="/">
				<svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
					<path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146ZM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5Z" />
				</svg>
			</a>
			<h1>Exercise Name</h1>
		</div>
		<!-- High-contrast mode label, paired with the button above -->
		<!-- <label class="contrastLabel" for="contrast">High-contrast</label> -->
	</nav>

	<main class="exercise">

		<!-- The aside on the left contains the current stage, navigation buttons and the instructions for the exercise (and errors if any). -->
		<aside>
			<header>
				<!-- PHP code to output current stage -->
				<h2>Stage <?= $stage ?></h2>
				<!-- PHP code to create back / next buttons depending on current stage -->
				<?php if ($stage > 1) : ?>
					<a class="btn" href="?stage=<?= $stage - 1 ?>">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
							<path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
						</svg>
						Prev
					</a>
				<?php endif; ?>
				<?php if ($stage < count($instructions)) : ?>
					<a class="btn" href="?stage=<?= $stage + 1 ?>">
						Next
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
							<path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
						</svg>
					</a>
				<?php endif; ?>
			</header>
			<!-- PHP code to output the instructions for this level from the appropriate JSON file goes here -->
			<div class="expectations">
			</div>
			<!-- PHP code to output errors, should there be any, goes here.-->
			<div class="errors">
			</div>
			<footer>
				<a href="/contributors.html">
					<img class="logo" src="../assets/img/GitHub_Logo.png" alt="Link to contributors list" />
				</a>
			</footer>
		</aside>

		<!-- The content of the right part, the actual exercise, goes here -->
		<div class="sandbox">
		</div>
	</main>
</body>

</html>