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

include __DIR__ . '/../../src/planterExercises.php';

$instructions = json_decode(file_get_contents("./assets/planter_instructions.json"), true);

for ($i = 1; $i <= count($instructions); $i++) {
    $planterInit = 'planter' . $i;
    if (function_exists($planterInit)) {
        $plants[$i] = $planterInit();
    }
}

$allowedList = ['🌻', '🌼', '🌹', '🌷', '🌺', '🌸', '🏵️', '🍀', '🌿', '☘️', '🌱', '🌴', '🌲', '🌳', '', ' '];

$stage = $_GET['stage'] ?? 1;

$planterIsInvalid = false;
foreach ($plants[$stage]['planter'] as $planterItem) {
    if (!in_array($planterItem, $allowedList)) {
        $planterIsInvalid = true;
    }
}
if (($planterIsInvalid) || (count($plants[$stage]['planter']) > 5)) {
    $errors[] = '• There are too many plants in the planter, or you\'re trying to plant something strange !';
}
if (!in_array($plants[$stage]['pot'], $allowedList)) {
    $errors[] = '• There are too many plants in the pot or you\'re trying to plant something strange !';
}

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
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <title>Planter</title>
</head>

<body>
    <div class="container">
        <header>
            <a id="home" href="/"><img src="../assets/img/home.png" alt="Home icon"></a>
            <h1>The planter</h1>
            <a id="back" href="/Garden/"><img src="../assets/img/back.png" alt="Home icon" /></a>
        </header>
        <input type="checkbox" name="contrast" id="contrast" style="display: none" />
        <main class="exercise">
            <?php if (isset($errors)) : ?>
                <div class="error">
                    <?php foreach ($errors as $error) : ?>
                        <p><?= $error ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <div class="content">
                <div class="planter">
                    <?php for ($i = 0; $i < 5 && $planterIsInvalid === false; $i++) : ?>
                        <div class="plot" data-target="contrast">
                            <?= $plants[$stage]['planter'][$i] ?? '' ?>
                        </div>
                    <?php endfor; ?>
                </div>

                <div class="planter pot">
                    <div class="plot" data-target="contrast">
                        <?php if ($planterIsInvalid === false) : ?>
                            <?= $plants[$stage]['pot'] ?? ''; ?>
                        <?php endif ?>
                    </div>
                </div>
            </div>

            <div class="instructions">

                <div class="instructions-top">
                    <h2>Stage <?= $stage ?></h2>

                    <div class="nav-btn">
                        <?php if ($stage > 1) : ?>
                            <a href="?stage=<?= $stage - 1 ?>">
                                < Prev</a>
                                <?php endif; ?>
                                <?php if ($stage < count($instructions)) : ?>
                                    <a href="?stage=<?= $stage + 1 ?>"> Next > </a>
                                <?php endif; ?>
                    </div>
                </div>
                <label class="contrastLabel" for="contrast"> → Click here for high-contrast mode</label>
                <p><?= nl2br($instructions[$stage]["desc"]) ?></p>

                <div class="expectations">
                    <p>Expected : </p>
                    <div class="planter mini">
                        <?php foreach ($instructions[$stage]["result"]["planter"] as $plant) : ?>
                            <div class="plot" data-target="contrast">
                                <?= $plant ?>
                            </div>
                        <?php endforeach ?>
                    </div>
                    <div class="planter mini pot">
                        <div class="plot" data-target="contrast">
                            <?php echo $instructions[$stage]["result"]["pot"] ?>
                        </div>
                    </div>
                </div>
            </div>

        </main>
        <footer>
            <img src="./assets/img/cat3.png" alt="A cat" class="cat" />
            <a href="/contributors.html">
                <img class="logo" src="../assets/img/GitHub_Logo.png" alt="Link to contributors list" />
            </a>
        </footer>
    </div>
</body>

</html>