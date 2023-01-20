<?php

/******************************/
//// DO NOT TOUCH THIS FILE ////
/*****************************/

/*** TREES ***/
// 🌳 Deciduous
// 🌲 Evergreen
// 🌴 Palm
// 🌱 Seed
// ☘️ Shamrock
// 🌿 Herb
// 🍀 Four Leaf Clover
/*************/

include __DIR__ . '/../../src/planter_exercises.php';

$instructions = json_decode(file_get_contents("./assets/planter_instructions.json"), true);

$plants[1] = firstPlanter();
$plants[2] = firstPlanter();
$plants[3] = firstPlanter();

$stage = $_GET['stage'] ?? 1;
$garden = $gardens[$stage] ?? [];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="/Garden/assets/planter_style.css" media="screen" rel="stylesheet" type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
    <title>Garden</title>
</head>

<body>
    <div class="container">
        <header>
            <a id="home" href="/"><img src="../assets/img/home.png" alt="Home icon"></a>
            <h1>The planter</h1>
        </header>
        <main class="exercise">

            <div class="content">
                <div class="planter border">
                    <div class="soil">
                        <?php for ($i = 0; $i < count($plants[$stage]['planter']) && count($plants[$stage]['planter']) <= 5; $i++) : ?>
                            <div class="planter-plot">
                                <?= $plants[$stage]['planter'][$i] ?? ' '; ?>
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>
                <div class="pot border">
                    <div class="soil soil-pot">
                        <?php if (mb_strlen($plants[$stage]['pot']) <= 1) : ?>
                            <?= $plants[$stage]['pot'] ?? ''; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="instructions">
                <div class="instructions-top">
                    <h2>Stage <?= $stage ?></h2>
                    <div class="nav-btn">
                        <?php if ($stage > 1) : ?>
                            <a href="?stage=<?= $stage - 1 ?>"> <- Prev</a>
                                <?php endif; ?>
                                <?php if ($stage < 3) : ?>
                                    <a href="?stage=<?= $stage + 1 ?>"> Next -> </a>
                                <?php endif; ?>
                    </div>
                </div>
                <p><?= $instructions[$stage] ?></p>
            </div>

        </main>
        <img src="./assets/img/cat3.png" alt="A cat" class="cat" />
        <footer>
            <a href="/contributors.html">
                <img class="logo" src="../assets/img/GitHub_Logo.png" alt="Link to contributors list" />
            </a>
        </footer>
    </div>
</body>

</html>