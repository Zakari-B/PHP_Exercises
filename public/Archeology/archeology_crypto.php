<?php

/******************************/
//// DO NOT TOUCH THIS FILE ////
/*****************************/

include __DIR__ . './muralBridge.php';

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
    <link href="/Archeology/assets/mural_style.css" media="screen" rel="stylesheet" type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Luxurious+Roman&display=swap" rel="stylesheet">
    <title>Mural</title>
</head>

<body>
    <div class="container">
        <div id="level" class="grayscalized <?php if ($stage === '1') : ?><?= ' darkness' ?><?php endif ?>">
            <header>
                <a id="home" href="/"><img src="../assets/img/home.png" alt="Home icon"></a>
                <h1>Mural</h1>
            </header>
            <main class="exercise">

                <div class="instructions">
                    <div class="instructions-top">
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

                <div class="content<?php if ($stage === '1') : ?><?= ' hidden' ?><?php endif ?>">
                    <button class="torch" onclick="toggleLight()"></button>
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
            </main>

            <footer>
                <a href="/contributors.html">
                    <img class="logo" src="../assets/img/GitHub_Logo.png" alt="Link to contributors list" />
                </a>
            </footer>
        </div>
    </div>
    <script>
        document.documentElement.style.setProperty('--light', '10vmax')
        document.documentElement.style.setProperty('--innerLight', '0.70')
        document.documentElement.style.setProperty('--centerLight', '0.85')
        document.documentElement.style.setProperty('--outerLight', '0.95')

        function refreshTablet() {
            const params = new URLSearchParams(window.location.search)
            const stage = params.get('stage')
            const muralText = document.querySelector('.grainy_wall').textContent
            fetch("http://localhost:8000/Archeology/muralUpdater.php", {
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

        function lightTorch() {
            const torch = document.querySelector('.torch');
            torch.style.backgroundColor = "rgb(75, 50, 10)";

            const flame = document.createElement('div');
            flame.style.backgroundImage = "url('./assets/img/flame.png')"
            flame.style.backgroundSize = "cover";
            flame.style.backgroundRepeat = "no-repeat";
            flame.style.height = "100px"
            flame.style.width = "100px"
            flame.style.position = "absolute";
            flame.style.top = "-50px";
            flame.style.left = "-37px";
            torch.appendChild(flame)
        }

        function displayTablet() {
            const tablet = document.querySelector(".tablet-perspective");
            tablet.style.display = "flex";
        }

        function toggleLight() {
            document.documentElement.style.setProperty('--light', '1000vmax')
            document.documentElement.style.setProperty('--innerLight', '0.10')
            document.documentElement.style.setProperty('--centerLight', '0.10')
            document.documentElement.style.setProperty('--outerLight', '0.10')

            lightTorch()
            displayTablet()
        }

        function update(e) {
            var x = (window.Event) ? e.pageX || e.touches[0].clientX : event.clientX + (document.documentElement.scrollLeft ? document.documentElement.scrollLeft : document.body.scrollLeft);
            var y = (window.Event) ? e.pageY || e.touches[0].clientY : event.clientY + (document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop);

            document.documentElement.style.setProperty('--cursorX', x + 'px')
            document.documentElement.style.setProperty('--cursorY', y + 'px')
        }
        document.addEventListener('mousemove', update)
        document.addEventListener('touchmove', update)

        window.onload = function() {
            const level = document.getElementById('level');
            if (!level.classList.contains('darkness')) {
                lightTorch();
                displayTablet();
            }
        }
    </script>
</body>

</html>