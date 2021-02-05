<?php
$root = 'root/';
if (empty($_GET['dir'])) {
  $directory = '';
  $breadcrums = false;
} else {
  $directory = $_GET['dir'] . '/';
  $breadcrums = explode('/', $directory);
  if ($breadcrums[0] == '') {
    $breadcrums = array_slice(explode('/', $directory), 1);
  }
  array_pop($breadcrums);
}
$files = scandir($root . $directory);
$files = array_slice($files, 2);
echo '<ol class="breadcrums">';
echo "<li><a href='index.php'>root</a></li>";
if ($breadcrums) {
  $acc = '';
  foreach ($breadcrums as $key => $value) {
    $acc = $acc . '/' . $value;
    echo "<li><a href='?dir=$acc'>$value</a></li>";
  }
}
echo '</ol>';
renderTable('Folder', $root, $directory, $files);
renderTable('File', $root, $directory, $files);
