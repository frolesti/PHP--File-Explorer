<?php

function folderSize($dir)
{
  $size = 0;

  foreach (glob(rtrim($dir, '/') . '/*', GLOB_NOSORT) as $each) {
    $size += is_file($each) ? filesize($each) : folderSize($each);
  }

  return $size;
}

function sizeFormatted($size)
{
  $units = array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
  $power = $size > 0 ? floor(log($size, 1024)) : 0;
  return number_format($size / pow(1024, $power), 2, '.', ',') . ' ' . $units[$power];
}

function getSize($path)
{
  $size = (is_dir($path)) ? folderSize($path) : filesize($path);
  return sizeFormatted($size);
}

function getIcon($type, $path)
{
  $icon = $type == "File" ? $icon = pathinfo($path, PATHINFO_EXTENSION) : "folder";
  return $icon;
}
function getDataFileOrFolder($type, $root, $directory, $value)
{
  $icon = getIcon($type, $root . $directory . $value);
  $timeCreate =  date("d m Y H:i:s.", filectime($root . $directory . $value));
  $timeModificate =  date("d m Y H:i:s.", filemtime($root . $directory . $value));
  $fileSize = getSize($root . $directory . $value);
  $url = urlencode($directory . $value);
  return array('type' => $type, 'name' => $value, 'icon' => $icon, 'timeCreate' => $timeCreate, 'timeModificate' => $timeModificate, 'fileSize' => $fileSize, 'url' => $url);
}
