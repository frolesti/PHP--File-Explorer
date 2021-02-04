<?php
    
    $url = $_POST["url"];
    chdir("../../root/$url");
    $uploadFile = basename($_FILES['newFile']['name']);
    $head = $url == '' ? "Refresh: 0.2; URL=../../index.php":"Refresh: 0.2; URL=../../index.php?dir=$url";
    if(!file_exists($_FILES['newFile']['name'])){
        if (move_uploaded_file($_FILES['newFile']['tmp_name'], $uploadFile)) {
            echo "<script>
            alert('Your file has been succesfully uploaded!');
            </script>";
            header($head);
        } else {
            echo "<script>
            alert('There has been trouble with the uploading');
            </script>";
            header($head);
        }    
    } else {
        echo "<script>
        alert('This file already exists!');
        </script>";
        header($head);
    }
?>