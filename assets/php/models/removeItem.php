<?php
function removeItem($fileToRemove)
{
  $fileToRemove = urldecode($fileToRemove);
  $path = ($fileToRemove[0] == '/') ? "./root$fileToRemove" : "./root/$fileToRemove";
  if (is_dir($path)) {
    removeFolder($path);
  } else {
    unlink($path);
  }
}
