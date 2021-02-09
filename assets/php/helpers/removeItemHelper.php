<?php
function removeFolder($fileToRemove)
{
  foreach (glob($fileToRemove . "/*") as $file) {
    if (is_dir($file)) {
      removeFolder($file);
    } else {
      unlink($file);
    }
  }
  rmdir($fileToRemove);
}
