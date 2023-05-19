<?php

/******************************/
//// DO NOT TOUCH THIS FILE ////
/*****************************/

include __DIR__ . '/bridges/muralBridge.php';

$instructions = json_decode(file_get_contents("./assets/mural_instructions.json"), true);

for ($i = 1; $i <= count($instructions); $i++) {
    $muralInit = 'mural' . $i;
    if (function_exists($muralInit)) {
        $mural[$i] = $muralInit($instructions[$i]["muralMessage"]);
    }
}

$stage = $_GET['stage'] ?? '1';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="/assets/theme.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="/Archeology/assets/mural_style.css" media="screen" rel="stylesheet" type="text/css" />
    <title>Mural Exercise</title>
</head>

<body class="container">
    <nav>
        <div class="brand">
            <a class="home" href="/">
                <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
                    <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146ZM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5Z" />
                </svg>
            </a>
            <h1>Mural</h1>
            <a class="back" href="/Archeology">
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
    </nav>

    <main id="level" class="exercise grayscalized">
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
            <div class="expectations">
                <p><?= nl2br($instructions[$stage]["instructions"]) ?></p>
            </div>
            <div class="errors">
            </div>
            <footer>
                <a href="/contributors.html">
                    <img class="logo" src="../assets/img/GitHub_Logo.png" alt="Link to contributors list" />
                </a>
            </footer>
        </aside>

        <div class="sandbox">
            <div class="content">
                <p class="grainy_wall"><?= $instructions[$stage]["muralMessage"] ?></p>
            </div>

            <div class="tablet-perspective">
                <div class="tablet">
                    <div class="screen">
                        <?php if ($mural[$stage] === $instructions[$stage]["muralMessage"]) : ?>
                            <p id="tablet-text"><?= nl2br($instructions[$stage]["tabletMessage"]) ?></p>
                        <?php else : ?>
                            <p id="tablet-text"><?= $mural[$stage] ?></p>
                        <?php endif; ?>
                        <div class="black-band"></div>
                        <div class="black-band"></div>
                        <div class="black-band"></div>
                        <div class="black-band"></div>
                        <div class="black-band"></div>
                        <div class="black-band"></div>
                        <div class="black-band"></div>
                        <div class="black-band"></div>
                        <div class="black-band"></div>
                        <div class="black-band"></div>
                        <div class="black-band"></div>
                        <div class="black-band"></div>
                        <div class="black-band"></div>
                        <div class="black-band"></div>
                        <div class="black-band"></div>
                        <div class="black-band"></div>
                        <div class="black-band"></div>
                        <div class="black-band"></div>
                        <div class="black-band"></div>
                        <div class="black-band"></div>
                        <div class="black-band"></div>
                        <div class="black-band"></div>
                        <div class="black-band"></div>
                        <div class="black-band"></div>
                        <div class="black-band"></div>
                        <div class="black-band"></div>
                        <div class="black-band"></div>
                        <div class="black-band"></div>
                        <div class="black-band"></div>
                        <div class="black-band"></div>
                        <div class="black-band"></div>
                        <div class="black-band"></div>
                        <div class="black-band"></div>
                        <div class="black-band"></div>
                        <div class="black-band"></div>
                        <div class="black-band"></div>
                        <div class="black-band"></div>
                        <div class="black-band"></div>
                        <div class="black-band"></div>
                        <div class="black-band"></div>
                    </div>
                </div>

                <div class="tablet-buttons">
                    <button class="refresh-button" onclick="refreshTablet()">⟳</button>
                    <div class="tablet-button"></div>
                    <div class="tablet-button-large"></div>
                    <div class="tablet-button"></div>
                    <div class="tablet-button"></div>
                </div>
            </div>
        </div>
    </main>
    <script>
        function refreshTablet() {
            const params = new URLSearchParams(window.location.search)
            const stage = params.get('stage')
            const muralText = document.querySelector('.grainy_wall').textContent
            fetch("http://localhost:8000/Archeology/bridges/muralBridge.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
                    },
                    body: `stage=${stage}&muralText=${muralText}`,
                })
                .then((response) => response.json())
                .then((res) => {
                    document.getElementById("tablet-text").innerHTML = res.tabletUpdate
                });
        }

        function displayTablet() {
            const tablet = document.querySelector(".tablet-perspective");
            tablet.style.display = "flex";
        }

        window.onload = function() {
            displayTablet();
        }
    </script>
</body>

</html>