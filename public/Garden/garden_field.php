<?php

/******************************/
//// DO NOT TOUCH THIS FILE ////
/*****************************/

include __DIR__ . '/../../src/fieldExercises.php';

$gardens[1] = plantFirstGarden();
$gardens[2] = plantSecondGarden();
$gardens[3] = plantThirdGarden();
$gardens[4] = plantFourthGarden();
$gardens[5] = plantFifthGarden();
$gardens[6] = plantSixthGarden();

$stage = $_GET['stage'] ?? 1;
$garden = $gardens[$stage] ?? [];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="../assets/exercise.css" media="screen" rel="stylesheet" type="text/css" />
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
    <main class="exercise <?php if ($stage === '5') {
                            echo "final";
                          } ?>">
      <div class="description">
        <div class="half-v">
          <div class="description-top">
            <h2>Stage <?= $stage ?></h2>
            <div class="nav-btn">
              <?php if ($stage > 1) : ?>
                <a href="?stage=<?= $stage - 1 ?>"> <- Prev</a>
                  <?php endif; ?>
                  <?php if ($stage < 6) : ?>
                    <a href="?stage=<?= $stage + 1 ?>"> Next -> </a>
                  <?php endif; ?>
            </div>
          </div>
          <?php if ($stage <= 5) : ?>
            <p>Reproduce the image below</p>
          <?php else : ?>
            <p>Freestyle stage. Challenge yourself with loops</p>
          <?php endif; ?>
        </div>
        <?php if ($stage <= 5) : ?>
          <img src="./assets/img/examples/0<?= $stage ?>.png" alt="Image of stage" class="example-img" />
        <?php endif; ?>
      </div>
      <div class="garden earth">
        <?php if ($stage < 5) : ?>
          <?php for ($i = 1; $i <= $stage; $i++) : ?>
            <img src="./assets/img/cat.png" alt="A cat" class="cat<?php echo $i ?>" />
          <?php endfor; ?>
        <?php endif; ?>
        <?php if ($stage === '5') : ?>
          <?php for ($i = 1; $i < 5; $i++) : ?>
            <img src="./assets/img/cat.png" alt="A cat" class="cat<?php echo $i ?>" />
          <?php endfor; ?>
          <img src="./assets/img/cat2.png" alt="A cat" class="cat5" />
        <?php endif; ?>

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
      <a href="/contributors.html">
        <img class="logo" src="../assets/img/GitHub_Logo.png" alt="Link to contributors list" />
      </a>
    </footer>
  </div>
</body>

</html>