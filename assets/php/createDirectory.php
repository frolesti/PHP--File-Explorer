<?php
    $folderName = $_POST ["newFolder"];
    $url = $_POST ["url"];
    $url = substr($url, 0, -1);
    $head = $url == '' ? "Refresh: 0.2; URL=../../index.php":"Refresh: 1; URL=../../index.php?dir=$url";
    if($folderName > 1){
        chdir("../../root/$url");
        if (!file_exists($folderName)) {
            mkdir($folderName);
            echo "<script>
            alert('Your folder has been created!');
            </script>";
            header($head);
        }
        else {
            echo "<script>
            alert('This folder already exists!');
            </script>";
            header($head);
        }
    }
?>