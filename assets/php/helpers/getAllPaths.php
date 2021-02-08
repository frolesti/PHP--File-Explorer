<?php
function getAllPaths()
{
  $path = "root";
  $results = array();

  array_push($results, $path);
  chdir("../../../");

  $dir = new RecursiveDirectoryIterator($path, RecursiveDirectoryIterator::SKIP_DOTS);
  $files = new RecursiveIteratorIterator($dir, RecursiveIteratorIterator::SELF_FIRST);

  foreach ($files as $key => $file) {
    if (is_dir($file)) {
      array_push($results, $key);
    }
  }

  return $results;
}

header("Content-Type: application/json");
echo json_encode(getAllPaths());
