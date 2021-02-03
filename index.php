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
        <input id="headerSearch" type="text">
    </header>
    <nav class="sidebar">
        <?php
            require('./assets/php/nav.php');
        ?>
    </nav>
    <main class="main-container">
        <?php
            require('./assets/php/getAllFilesAndFolder.php');
        ?>
    </main>
    <section class="modal"></section>
    <script src="assets/js/main.js"></script>
</body>
</html>