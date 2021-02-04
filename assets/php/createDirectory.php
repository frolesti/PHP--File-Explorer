<?php
    $folderName = $_POST ["newFolder"];
    $url = $_POST ["url"];
    if($folderName > 1){
        chdir("../../root/$url");
        if (!file_exists($folderName)) {
            mkdir($folderName);
        }
        else {
            echo "<script>
            alert('This folder already exists!');
            </script>";
            echo getcwd();
            header("Refresh: 0.2; URL=../../index.php?dir=$url$folderName");
        }
    }
?>