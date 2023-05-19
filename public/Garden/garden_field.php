<?php

/******************************/
//// DO NOT TOUCH THIS FILE ////
/*****************************/

include __DIR__ . '/../../src/fieldExercises.php';

$instructions = json_decode(file_get_contents("./assets/field_instructions.json"), true);

$stage = $_GET['stage'] ?? 1;
$currentField = 'field' . $stage;
$field = function_exists($currentField) ? $currentField() : [];

$errors = [];
if (count($field) > 10 || array_key_last($field) > 9) {
	$errors[] = "Did you try to plant too many things ?";
}
foreach ($field as $row) {
	if (count($row) > 10 || array_key_last($row) > 9) {
		$errors[] = "Did you try to plant too many things ?";
	}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link href="/assets/theme.css" media="screen" rel="stylesheet" type="text/css" />
	<link href="/Garden/assets/field_style.css" media="screen" rel="stylesheet" type="text/css" />
	<title>Field Exercise</title>
</head>

<body class="container">
	<input type="checkbox" name="contrast" id="contrast">
	<nav>
		<div class="brand">
			<a class="home" href="/">
				<svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
					<path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146ZM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5Z" />
				</svg>
			</a>
			<h1>Field</h1>
			<a class="back" href="/Garden">
				<svg xmlns=" http://www.w3.org/2000/svg" width="42" height="42" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 20 20">
					<path d="M18.271,9.212H3.615l4.184-4.184c0.306-0.306,0.306-0.801,0-1.107c-0.306-0.306-0.801-0.306-1.107,0
						L1.21,9.403C1.194,9.417,1.174,9.421,1.158,9.437c-0.181,0.181-0.242,0.425-0.209,0.66c0.005,0.038,0.012,0.071,0.022,0.109
						c0.028,0.098,0.075,0.188,0.142,0.271c0.021,0.026,0.021,0.061,0.045,0.085c0.015,0.016,0.034,0.02,0.05,0.033l5.484,5.483
						c0.306,0.307,0.801,0.307,1.107,0c0.306-0.305,0.306-0.801,0-1.105l-4.184-4.185h14.656c0.436,0,0.788-0.353,0.788-0.788
						S18.707,9.212,18.271,9.212z">
					</path>
				</svg>
			</a>
		</div>
		<label class="contrastLabel" for="contrast">High-contrast</label>
	</nav>

	<main class="exercise">
		<aside>
			<header>
				<h2>Stage <?= $stage ?></h2>
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
			<p><?= nl2br($instructions[$stage]["desc"]) ?></p>
			<div class="expectations">
				<div class="garden">
					<?php foreach ($instructions[$stage]["result"] as $row) : ?>
						<?php foreach ($row as $rowItem) : ?>
							<div class="garden-plot" data-target="contrast"><?= $rowItem ?? ' '; ?></div>
						<?php endforeach; ?>
					<?php endforeach ?>
				</div>
			</div>
			<?php if (!empty($errors)) : ?>
				<div class="errors">
					<p>There is at least one problem with the field:</p>
					<ul>
						<?php foreach ($errors as $error) : ?>
							<li>
								<p><?= $error ?></p>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endif; ?>
			<footer>
				<a href="/contributors.html">
					<img class="logo" src="../assets/img/GitHub_Logo.png" alt="Link to contributors list" />
				</a>
			</footer>
		</aside>

		<div class="sandbox garden">
			<?php for ($cats = 1; $cats <= $stage; $cats++) : ?>
				<?php if ($cats < 7 && $stage != 23) : ?>
					<img src="./assets/img/cat.png" alt="A cat" class="cat" style="top : -107px; left: <?= ($cats - 1) * 133 ?>px" />
				<?php endif; ?>
				<?php if ($cats >= 7 && $cats < 13) : ?>
					<img src="./assets/img/cat.png" alt="A cat" class="cat" style="right : -104px; top: <?= ($cats - 7) * 133 ?>px; transform: rotate(90deg);" />
				<?php endif; ?>
				<?php if ($cats >= 13 && $cats < 19) : ?>
					<img src="./assets/img/cat.png" alt="A cat" class="cat" style="left : -104px; bottom: <?= ($cats - 13) * 133 ?>px; transform: rotate(-90deg);" />
				<?php endif; ?>
				<?php if ($cats >= 19 && $cats < 23 && $stage !== '23') : ?>
					<img src="./assets/img/cat.png" alt="A cat" class="cat" style="bottom : -107px; right: <?= ($cats - 19) * 222 ?>px; transform: rotate(180deg);" />
				<?php endif; ?>
			<?php endfor; ?>
			<?php if ($stage === '23') : ?>
				<img src="./assets/img/cat2.png" alt="A cat" class="cat" style="top : -232px; left: calc(50% - 125px); height: 250px" />
				<?php for ($bossCats = 1; $bossCats <= 2; $bossCats++) : ?>
					<img src="./assets/img/cat.png" alt="A cat" class="cat" style="top : -107px; left: <?= ($bossCats - 1) * 100 ?>px" />
					<img src="./assets/img/cat.png" alt="A cat" class="cat" style="top : -107px; right: <?= ($bossCats - 1) * 100 ?>px" />
				<?php endfor; ?>
				<?php for ($bottomCats = 0; $bottomCats < 6; $bottomCats++) : ?>
					<img src="./assets/img/cat.png" alt="A cat" class="cat" style="bottom : -107px; right: <?= $bottomCats * 133 ?>px; transform: rotate(180deg);" />
				<?php endfor; ?>
			<?php endif; ?>
			<?php $rows = $columns = 10; ?>
			<?php for ($i = 0; $i < $rows; $i++) : ?>
				<?php for ($j = 0; $j < $columns; $j++) : ?>
					<div class="garden-plot" data-target="contrast">
						<?php if (empty($errors)) : ?>
							<p><?= $field[$i][$j] ?? ' '; ?></p>
						<?php endif; ?>
					</div>
				<?php endfor; ?>
			<?php endfor; ?>
		</div>
	</main>
</body>

</html>