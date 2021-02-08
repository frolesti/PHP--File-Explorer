<?php
function moveItem($fileToMove, $folderToMove)
{
  $root = "./root";
  $fileToMove = "/" . urldecode($fileToMove);
  $folderToMove = urldecode($folderToMove);
  if (file_exists($root . $fileToMove)) {
    $positionToCut = strripos($fileToMove, "/");
    $fileName = substr($fileToMove, $positionToCut + 1);
    if (!file_exists($root . "$folderToMove/$fileName")) {
      rename($root . $fileToMove, $root . "$folderToMove/$fileName");
      $message = false;
    } else {
      $message = "<script>alert('This item already exists!')</script>";
    }
  } else {
    $message = "<script>alert('The file you want to move doesn´t exists!')</script>";
  }
  return $message;
}
