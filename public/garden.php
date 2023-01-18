<?php

/******************************/
//// DO NOT TOUCH THIS FILE ////
/*****************************/

include __DIR__ . '/../src/exercices.php';
$stage = $_GET['stage'] ?? 1;
$garden = $gardens[$stage] ?? [];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="/assets/style.css" media="screen" rel="stylesheet" type="text/css" />
  <link href="/assets/garden.css" media="screen" rel="stylesheet" type="text/css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
  <title>Garden</title>
</head>

<body>
  <header>
    <h1>My garden</h1>
    <a class="btn" href="/index.php">Index</a>
  </header>
  <main class="exercise">
    <div class="description">
      <div class="half-v">
        <div class="title">
          <h2>Stage <?= $stage ?></h2>
          <div>
            <?php if ($stage > 1) : ?>
              <a href="?stage=<?= $stage - 1 ?>"> <- Prev</a>
                <?php endif; ?>
                <?php if ($stage < 6) : ?>
                  <a href="?stage=<?= $stage + 1 ?>"> Next -> </a>
                <?php endif; ?>

          </div>
        </div>
        <p>Reproduce the image below</p>
      </div>
      <img src="./assets/img/examples/0<?= $stage ?>.png" alt="Image of stage" class="example-img" />
    </div>
    <div class="garden earth">
      <?php for ($i = 1; $i <= $stage; $i++) : ?>
        <img src="./assets/img/cat.png" alt="A cat" class="cat" />
      <?php endfor; ?>

      <?php $rows = $columns = 10; ?>
      <?php for ($i = 0; $i < $rows; $i++) : ?>
        <div class="garden-row">
          <?php for ($j = 0; $j < $columns; $j++) : ?>
            <div class="garden-plot">
              <?= $garden[$i][$j] ?? ' '; ?>
            </div>
          <?php endfor; ?>
        </div>
      <?php endfor; ?>
    </div>
  </main>
  <footer>
    <a href="https://github.com/Zakari-B">
      <img class="logo" src="./assets/img/GitHub_Logo.png" alt="Github profile link" />
    </a>
  </footer>
</body>

</html>