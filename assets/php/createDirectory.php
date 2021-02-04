<?php
    $folderName = $_POST ["newFolder"];
    $url = $_POST ["url"];
    if($folderName > 1){
        chdir("../../root/$url");
        if (!file_exists($folderName)) {
            mkdir($folderName);
            echo "<script>
            alert('Your folder has been created!');
            </script>";
            header("Refresh: 0.2; URL=../../index.php?dir=$url$folderName");
        }
        else {
            echo "<script>
            alert('This folder already exists!');
            </script>";
            header("Refresh: 0.2; URL=../../index.php?dir=$url$folderName");
        }
    }
?>