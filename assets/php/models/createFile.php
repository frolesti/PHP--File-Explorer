<?php
function createFile($uploadFile)
{
  if (!file_exists($_FILES['newFile']['name'])) {
    if (move_uploaded_file($_FILES['newFile']['tmp_name'], $uploadFile)) {
      $message = false;
    } else {
      $message = "<script>
            alert('There has been trouble with the uploading');
            </script>";
    }
  } else {
    $message = "<script>
        alert('This file already exists!');
        </script>";
  }
  return $message;
}
