<?php
function search($searchedItem)
{
  //chdir("../../../");
  $path = 'root';
  $results = array();
  $dir = new RecursiveDirectoryIterator($path, RecursiveDirectoryIterator::SKIP_DOTS);
  $files = new RecursiveIteratorIterator($dir, RecursiveIteratorIterator::SELF_FIRST);
  foreach (glob("./$path/*$searchedItem*", GLOB_BRACE) as $itemPath) {
    array_push($results, splitValueAndDirectory($itemPath));
  }
  foreach ($files as $file) {
    if (is_dir($file)) {
      foreach (glob("./$file/*$searchedItem*", GLOB_BRACE) as $itemPath) {
        array_push($results, splitValueAndDirectory($itemPath));
      }
    }
  }
  $template = '';
  foreach ($results as $value) {
    $template = $template . renderTableContent(getDataFileOrFolder($value['type'], $value['root'], $value['directory'], $value['value']));
  }
  return $template;
}
