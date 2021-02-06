<?php
function getAllFolderInRoot($path)
{
  $root = 'root/';
  if (is_dir($root . $path)) {
    $manager = scandir($root . $path);
    if (count($manager) > 2) {
      $manager = array_slice($manager, 2);
      echo "<ul>";
      foreach ($manager as $value) {
        $pathShort = $path . "/" . $value;
        if (is_dir($root . $pathShort)) {
          echo "<li><a href='?dir=$pathShort'>$value</a></li>";
          getAllFolderInRoot($pathShort);
        }
      }
      echo "</ul>";
    }
  }
}
