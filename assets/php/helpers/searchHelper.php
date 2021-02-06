<?php
function splitValueAndDirectory($path)
{
  $type = is_dir($path) ? 'Folder' : 'File';
  $path = substr($path, 6);
  $posValue = strpos($path, '/') + 1;
  $directory = substr($path, 0, $posValue);
  $value = substr($path, $posValue);
  $directory = strlen($directory) == 1 ? '' : substr($directory, 1);
  return array('value' => $value, 'directory' => $directory, 'root' => 'root/', 'type' => $type);
}
