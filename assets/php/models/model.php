<?php
function getDataFileOrFolder($type, $root, $directory, $value)
{
  $icon = getIcon($type, $root . $directory . $value);
  $timeCreate =  date("d m Y H:i:s.", filectime($root . $directory . $value));
  $timeModificate =  date("d m Y H:i:s.", filemtime($root . $directory . $value));
  $fileSize = getSize($root . $directory . $value);
  $url = urlencode($directory . $value);
  return array('type' => $type, 'name' => $value, 'icon' => $icon, 'timeCreate' => $timeCreate, 'timeModificate' => $timeModificate, 'fileSize' => $fileSize, 'url' => $url);
}
