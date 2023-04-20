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
          <label class="contrastLabel" for="contrast"> → Click here for high-contrast mode</label>
          <p><?= nl2br($instructions[$stage]["desc"]) ?></p>
        </div>
        <div class="expectations">
          <div class="garden earth">
            <?php foreach ($instructions[$stage]["result"] as $row) : ?>
              <div class="garden-row">
                <?php foreach ($row as $rowItem) : ?>
                  <div class="garden-plot-mini" data-target="contrast">
                    <p><?= $rowItem ?? ' '; ?></p>
                  </div>
                <?php endforeach; ?>
              </div>
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

        <?php $rows = $columns = 10; ?>
        <?php for ($i = 0; $i < $rows; $i++) : ?>
          <div class="garden-row">
            <?php for ($j = 0; $j < $columns; $j++) : ?>
              <div class="garden-plot" data-target="contrast">
                <?php if (empty($errors)) : ?>
                  <p><?= $field[$i][$j] ?? ' '; ?></p>
                <?php endif; ?>
              </div>
            <?php endfor; ?>
          </div>
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