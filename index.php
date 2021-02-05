<?php
require('./assets/php/helpers.php');
require('./assets/php/views.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <title>PHP File Explorer</title>
</head>

<body>
    <header class="header">
        <h1>PHP File Explorer</h1>
        <form class="searchBar" action="./assets/php/search.php" method="get">
            <input id="headerSearch" type="text" name="searchValue">
            <input type="submit" id="searchBtn" value="Search">
        </form>
    </header>
    <main class="main-container">
        <nav class="sidebar">
            <?php
            require('./assets/php/nav.php');
            ?>
        </nav>
        <section class="main">
            <?php
            require('./assets/php/getAllFilesAndFolder.php');
            ?>
        </section>
    </main>
    <section class="modal none" id="modal"></section>
    <script src="assets/js/main.js"></script>
</body>

</html>