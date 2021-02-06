<?php
function renderTable($type, $root, $directory)
{
  $files = scandir($root . $directory);
  $files = array_slice($files, 2);
  $is_type = $type == "Folder" ? "is_dir" : "is_file";
  $template = renderTableTitle($type, $directory);
  foreach ($files as $value) {
    if ($is_type($root . $directory . $value)) {
      $template = $template . renderTableContent(getDataFileOrFolder($type, $root, $directory, $value));
    }
  }
  return $template . "</table>";
}
