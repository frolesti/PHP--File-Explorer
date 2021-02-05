<?php
$root = 'root/';
if (empty($_GET['dir'])) {
  $directory = '';
  $breadcrums = false;
  renderBreadcrums($breadcrums);
  renderTable('Folder', $root, $directory);
  renderTable('File', $root, $directory);
} else if (isset($_GET['searchInfo'])) {
} else {
  $directory = $_GET['dir'] . '/';
  $breadcrums = explode('/', $directory);
  if ($breadcrums[0] == '') {
    $breadcrums = array_slice(explode('/', $directory), 1);
  }
  array_pop($breadcrums);
  renderBreadcrums($breadcrums);
  renderTable('Folder', $root, $directory);
  renderTable('File', $root, $directory);
}


function renderTable($type, $root, $directory)
{
  $files = scandir($root . $directory);
  $files = array_slice($files, 2);
  $is_type = $type == "Folder" ? "is_dir" : "is_file";
  renderTableTitle($type, $directory);
  foreach ($files as $value) {
    if ($is_type($root . $directory . $value)) {
      renderTableContent(getDataFileOrFolder($type, $root, $directory, $value));
    }
  }
  echo "</table>";
}
