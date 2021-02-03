<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Document</title>
</head>
<body>
    <header class="header">
        <h1>PHP File Explorer</h1>
        <input id="headerSearch" type="text">
    </header>
    <nav class="sidebar">
        <button id="newContentBtn">NEW</button>
    </nav>
    <main class="main-container">
        <?php
            $directory = 'root/';
            $files = scandir($directory);
            $files = array_slice($files,2);
            echo "<h1 class='folders-title'>Folders</h1>";
            echo "<section class='folders'>";
            foreach ($files as $key => $value) {
                if(is_dir($directory.$value)){
                    echo "<section class='folders-item'>
                            <p>$key</p>
                            <p>$value</p>
                        </section>";
                }
            }
            echo "</section>";
            echo "<h1 class='files-title'>Files</h1>";
            echo "<section class='files'>";
            foreach ($files as $key => $value) {
                if(is_file($directory.$value)){
                    echo "<section>
                            <p>$key</p>
                            <p>$value</p>
                        </section>";
                }
            }
            echo "</section>";
            print_r($files);
        ?>
    </main>
    
    <section class="modal"></section>
    <script src="assets/js/main.js"></script>
</body>
</html>