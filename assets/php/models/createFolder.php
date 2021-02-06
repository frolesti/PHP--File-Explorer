<?php
function createFolder($folderName, $url)
{
  if ($folderName > 1) {
    if (!file_exists("root/$url/$folderName")) {
      mkdir("root/$url/$folderName");
      $message = false;
    } else {
      $message = "<script>
        alert('This folder already exists!');
        </script>";
    }
    return $message;
  }
}
