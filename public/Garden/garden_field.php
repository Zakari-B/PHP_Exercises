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
  <link href="/Garden/assets/field_style.css" media="screen" rel="stylesheet" type="text/css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
  <title>Garden</title>
</head>

<body>
  <div class="container">
    <header>
      <a id="home" href="/"><img src="../assets/img/home.png" alt="Home icon"></a>
      <h1>Field</h1>
      <a id="back" href="/Garden/"><img src="../assets/img/back.png" alt="Home icon" /></a>

    </header>
    <input type="checkbox" name="contrast" id="contrast" style="display: none" />
    <label class="contrastLabel" for="contrast">High-contrast</label>
    <main class="exercise">
      <div class="description">
        <div class="half-v">
          <div class="description-top">
            <h2>Stage <?= $stage ?></h2>
            <div class="nav-btn">
              <?php if ($stage > 1) : ?>
                <a href="?stage=<?= $stage - 1 ?>"> <- Prev</a>
                  <?php endif; ?>
                  <?php if ($stage < count($instructions)) : ?>
                    <a href="?stage=<?= $stage + 1 ?>"> Next -> </a>
                  <?php endif; ?>
            </div>
          </div>
          <p><?= nl2br($instructions[$stage]["desc"]) ?></p>
        </div>
        <div class="expectations">
          <div class="garden earth">
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
      </div>
      <div class="garden earth">
        <?php for ($cats = 1; $cats <= $stage; $cats++) : ?>
          <?php if ($cats < 7 && $stage != 23) : ?>
            <img src="./assets/img/cat.png" alt="A cat" class="cat" style="top : -112px; left: <?= ($cats - 1) * 100 ?>px" />
          <?php endif; ?>
          <?php if ($cats >= 7 && $cats < 13) : ?>
            <img src="./assets/img/cat.png" alt="A cat" class="cat" style="right : -108px; top: <?= ($cats - 7) * 100 ?>px; transform: rotate(90deg);" />
          <?php endif; ?>
          <?php if ($cats >= 13 && $cats < 19) : ?>
            <img src="./assets/img/cat.png" alt="A cat" class="cat" style="left : -108px; bottom: <?= ($cats - 13) * 100 ?>px; transform: rotate(-90deg);" />
          <?php endif; ?>
          <?php if ($cats >= 19 && $cats < 23 && $stage !== '23') : ?>
            <img src="./assets/img/cat.png" alt="A cat" class="cat" style="bottom : -112px; right: <?= ($cats - 19) * 170 ?>px; transform: rotate(180deg);" />
          <?php endif; ?>
        <?php endfor; ?>
        <?php if ($stage === '23') : ?>
          <img src="./assets/img/cat2.png" alt="A cat" class="cat" style="top : -238px; left: 50; height: 250px" />
          <?php for ($bossCats = 1; $bossCats <= 2; $bossCats++) : ?>
            <img src="./assets/img/cat.png" alt="A cat" class="cat" style="top : -112px; left: <?= ($bossCats - 1) * 100 ?>px" />
            <img src="./assets/img/cat.png" alt="A cat" class="cat" style="top : -112px; right: <?= ($bossCats - 1) * 100 ?>px" />
          <?php endfor; ?>
          <?php for ($bottomCats = 0; $bottomCats < 6; $bottomCats++) : ?>
            <img src="./assets/img/cat.png" alt="A cat" class="cat" style="bottom : -112px; right: <?= $bottomCats * 100 ?>px; transform: rotate(180deg);" />
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
    <footer>
      <a href="/contributors.html">
        <img class="logo" src="../assets/img/GitHub_Logo.png" alt="Link to contributors list" />
      </a>
    </footer>
  </div>
</body>

</html>