<?php
$searchValue = $_GET['searchValue'];
chdir("../../../");
search($searchValue);

function search($searchedItem)
{
  $path = 'root';
  $dir = new RecursiveDirectoryIterator($path, RecursiveDirectoryIterator::SKIP_DOTS);
  $files = new RecursiveIteratorIterator($dir, RecursiveIteratorIterator::SELF_FIRST);
  foreach (glob("./$path/*$searchedItem*", GLOB_BRACE) as $nombre_fichero) {
    echo "Tamaño de $nombre_fichero " . filesize($nombre_fichero) . "<br>";
  }
  foreach ($files as $file) {
    if (is_dir($file)) {
      foreach (glob("./$file/*$searchedItem*", GLOB_BRACE) as $nombre_fichero) {
        echo "Tamaño de $nombre_fichero " . filesize($nombre_fichero) . "<br>";
      }
    }
  }
}
