<?php
require('./assets/php/helpers/helpers.php');
require('./assets/php/helpers/searchHelper.php');
require('./assets/php/helpers/removeItemHelper.php');
require('./assets/php/view/views.php');
require('./assets/php/models/search.php');
require('./assets/php/models/createFolder.php');
require('./assets/php/models/createFile.php');
require('./assets/php/models/getAllFolder.php');
require('./assets/php/models/renderTable.php');
require('./assets/php/models/moveItem.php');
require('./assets/php/models/renameItem.php');
require('./assets/php/models/removeItem.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/style.css">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
  <title>PHP File Explorer</title>
</head>

<body>
  <header class="header">
    <button id="showMenu" class='buttonShowMenu bx bxs-directions'></button>
    <h1>PHP File Explorer</h1>
    <form class="searchBar" action="index.php" method="get">
      <input id="headerSearch" class="searchBar__input" type="text" name="searchValue" required>
      <input type="submit" class="searchBar__submit" id="searchBtn" value="Search">
    </form>
  </header>
  <main class="main-container">
    <nav class="sidebar none">
      <?php
      require('./assets/php/controller/nav.php');
      ?>
    </nav>
    <section class="main">
      <?php
      require('./assets/php/controller/mainController.php');
      ?>
    </section>
  </main>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous"></script>
  <section class="modal none" id="modal"></section>
  <script src="assets/js/main.js" type="module"></script>
</body>

</html>