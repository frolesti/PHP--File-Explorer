<?php
function renameItem($fileToRename, $newName)
{
  $root = "./root";
  $fileToRename = "/" . urldecode($fileToRename);
  if (file_exists($root . $fileToRename)) {
    $positionToCut = strripos($fileToRename, "/");
    $fileName = substr($fileToRename, $positionToCut + 1);
    $relativePath = substr($fileToRename, 0, $positionToCut + 1);
    $extCut = strripos($fileName, ".");
    $ext = substr($fileName, $extCut);
    $newNamePath = $extCut > 0 ? $root . $relativePath . $newName . $ext : $root . $relativePath . $newName;
    if (!file_exists($newNamePath)) {
      rename(($root . $fileToRename), $newNamePath);
      $message = false;
    } else {
      $message = "<script>alert('This item already exists!')</script>";
    }
  } else {
    $message = "<script>alert('The file you want to move doesn´t exists!')</script>";
  }
  return $message;
}
