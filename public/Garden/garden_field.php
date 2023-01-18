<?php

/******************************/
//// DO NOT TOUCH THIS FILE ////
/*****************************/

include __DIR__ . '/../../src/garden_exercises.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="/Garden/assets/style.css" media="screen" rel="stylesheet" type="text/css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
  <title>Garden</title>
</head>

<body>
  <header>
    <h1>My garden</h1>
  </header>
  <section class="exercise">
    <div class="description">
      <div class="half-v">
        <h2>First stage:</h2>
        <p>I have an empty plot of size 10x10 and I'd like to plant some seeds 🌱 in all the available spaces. Please help me do it, it should look like this when you're done:</p>
      </div>
      <img src="./assets/img/examples/01.png" alt="Image of what's expected" class="example-img" />
    </div>
    <div class="garden earth">
      <img src="./assets/img/cat.png" alt="A cat" class="cat1" />
      <?php foreach ($firstGarden as $row) : ?>
        <div class="garden-row">
          <?php foreach ($row as $column) : ?>
            <div class="garden-plot">
              <?php echo $column; ?>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endforeach; ?>
    </div>
  </section>
  <section class="exercise">
    <div class="description">
      <div class="half-v">
        <h2>Second stage:</h2>
        <p>Alright, some seeds have grown. I didn't plant the same thing in all the spaces though. Right now, only the trees on the outside have grown, they're deciduous trees. Now, my plot looks like that:</p>
      </div>
      <img src="./assets/img/examples/02.png" alt="Image of what's expected" class="example-img" />
    </div>
    <div class="garden earth">
      <img src="./assets/img/cat.png" alt="A cat" class="cat1" />
      <img src="./assets/img/cat.png" alt="A cat" class="cat2" />
      <?php foreach ($secondGarden as $row) : ?>
        <div class="garden-row">
          <?php foreach ($row as $column) : ?>
            <div class="garden-plot">
              <?php echo $column; ?>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endforeach; ?>
    </div>
  </section>
  <section class="exercise">
    <div class="description">
      <div class="half-v">
        <h2>Third stage:</h2>
        <p>Great ! The garden has grown again, the shamrock I sowed in a X pattern looks nice, take a look :</p>
      </div>
      <img src="./assets/img/examples/03.png" alt="Image of what's expected" class="example-img" />
    </div>
    <div class="garden earth">
      <img src="./assets/img/cat.png" alt="A cat" class="cat1" />
      <img src="./assets/img/cat.png" alt="A cat" class="cat2" />
      <img src="./assets/img/cat.png" alt="A cat" class="cat3" />
      <?php foreach ($thirdGarden as $row) : ?>
        <div class="garden-row">
          <?php foreach ($row as $column) : ?>
            <div class="garden-plot">
              <?php echo $column; ?>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endforeach; ?>
    </div>
  </section>
  <section class="exercise">
    <div class="description">
      <div class="half-v">
        <h2>Fourth stage:</h2>
        <p>It gets tougher, and better. The palm trees have grown around the center, just like this :</p>
      </div>
      <img src="./assets/img/examples/04.png" alt="Image of what's expected" class="example-img" />
    </div>
    <div class="garden earth">
      <img src="./assets/img/cat.png" alt="A cat" class="cat1" />
      <img src="./assets/img/cat.png" alt="A cat" class="cat2" />
      <img src="./assets/img/cat.png" alt="A cat" class="cat3" />
      <img src="./assets/img/cat.png" alt="A cat" class="cat4" />
      <?php foreach ($fourthGarden as $row) : ?>
        <div class="garden-row">
          <?php foreach ($row as $column) : ?>
            <div class="garden-plot">
              <?php echo $column; ?>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endforeach; ?>
    </div>
  </section>
  <section class="exercise final">
    <div class="description">
      <div class="half-v">
        <h2>Fifth stage:</h2>
        <p>Finally ! The garden is complete now that the evergreens and leafy plants have grown too. Take a look :</p>
      </div>
      <img src="./assets/img/examples/05.png" alt="Image of what's expected" class="example-img" />
    </div>
    <div class="garden earth">
      <img src="./assets/img/cat.png" alt="A cat" class="cat1" />
      <img src="./assets/img/cat.png" alt="A cat" class="cat2" />
      <img src="./assets/img/cat.png" alt="A cat" class="cat3" />
      <img src="./assets/img/cat.png" alt="A cat" class="cat4" />
      <img src="./assets/img/cat2.png" alt="A cat" class="cat5" />
      <?php foreach ($fifthGarden as $row) : ?>
        <div class="garden-row">
          <?php foreach ($row as $column) : ?>
            <div class="garden-plot">
              <?php echo $column; ?>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endforeach; ?>
    </div>
  </section>
  <section class="exercise">
    <div class="description">
      <div class="half-v">
        <h2>Freestyle:</h2>
        <p>Alright, you've seen my garden, now show me yours. Create your own garden with what you've learned so far.</p>
      </div>
    </div>
    <div class="garden earth">
      <img src="./assets/img/cat.png" alt="A cat" class="cat1" />
      <img src="./assets/img/cat.png" alt="A cat" class="cat2" />
      <img src="./assets/img/cat.png" alt="A cat" class="cat3" />
      <img src="./assets/img/cat.png" alt="A cat" class="cat4" />
      <img src="./assets/img/cat.png" alt="A cat" class="cat6" />
      <?php foreach ($sixthGarden as $row) : ?>
        <div class="garden-row">
          <?php foreach ($row as $column) : ?>
            <div class="garden-plot">
              <?php echo $column; ?>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endforeach; ?>
    </div>
  </section>
  <footer>
    <a href="https://github.com/Zakari-B">
      <img class="logo" src="./assets/img/GitHub_Logo.png" alt="Github profile link" />
    </a>
  </footer>
</body>

</html>