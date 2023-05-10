<?php

/******************************/
//// DO NOT TOUCH THIS FILE ////
/*****************************/

include __DIR__ . './pamphletBridge.php';

$instructions = json_decode(file_get_contents("./assets/pamphlet_instructions.json"), true);

for ($i = 1; $i <= count($instructions); $i++) {
    $pamphletInit = 'pamphlet' . $i;
    if (function_exists($pamphletInit)) {
        $pamphlet[$i] = $pamphletInit($instructions[$i]["sentences"]);
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
    <link href="/Archeology/assets/pamphlet_style.css" media="screen" rel="stylesheet" type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Luxurious+Roman&display=swap" rel="stylesheet">
    <title>Pamphlet</title>
</head>

<body>
    <div class="container">
        <header>
            <a id="home" href="/"><img src="../assets/img/home.png" alt="Home icon"></a>
            <h1>Pamphlet</h1>
            <a id="back" href="/Archeology/"><img src="../assets/img/back.png" alt="Home icon" /></a>
        </header>

        <main class="exercise">
            <div class="papyrus">
                <h2>Ruins guide (<?= $stage ?>)</h2>
                <?php if ($stage > 1) : ?>
                    <a href="?stage=<?= $stage - 1 ?>">
                        <div class="papyrus-nav back-button">
                            <p class="hover-text">
                                < Back</p>
                        </div>
                    </a>
                <?php endif; ?>
                <?php if ($stage < count($instructions)) : ?>
                    <a href="?stage=<?= $stage + 1 ?>">
                        <div class="papyrus-nav next-button">
                            <p class="hover-text">Next ></p>
                        </div>
                    </a>
                <?php endif; ?>
                <div class="papyrus-container">
                    <p class="papyrus-text"><?= nl2br($instructions[$stage]['sentences']) ?></p>
                </div>
            </div>
            <div class="notepad">
                <a onclick="refreshPamphlet()"><img src="./assets/img/pen.png" alt="Image of a fountain pen" /></a>
            </div>

        </main>

        <footer>
            <a href="/contributors.html">
                <img class="logo" src="../assets/img/GitHub_Logo.png" alt="Link to contributors list" />
            </a>
        </footer>
    </div>
    <script>
        function refreshPamphlet() {
            const params = new URLSearchParams(window.location.search)
            const stage = params.get('stage') ?? '1';
            const pamphletText = document.querySelector('.papyrus-text').innerText
            const data = new FormData();
            data.append('stage', stage)
            data.append('pamphletText', pamphletText)
            console.log(data)
            fetch("http://localhost:8000/Archeology/pamphletBridge.php", {
                    method: "POST",
                    body: data
                })
                .then((response) => response.text())
                .then((res) => {
                    const correctedText = document.createElement("p")
                    correctedText.classList.add("note")
                    correctedText.innerText = res;
                    const notepad = document.querySelector(".notepad")
                    const note = document.querySelector(".note")
                    if (note) note.removechild()
                    notepad.appendChild(correctedText)
                });
        }
    </script>
</body>

</html>