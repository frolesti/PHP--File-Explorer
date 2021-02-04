<?php
  function folderSize ($dir){
      $size = 0;

      foreach (glob(rtrim($dir, '/').'/*', GLOB_NOSORT) as $each) {
          $size += is_file($each) ? filesize($each) : folderSize($each);
      }

      return $size;
  }

  function sizeFormatted($size){
      $units = array( 'B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
      $power = $size > 0 ? floor(log($size, 1024)) : 0;
      return number_format($size / pow(1024, $power), 2, '.', ',') . ' ' . $units[$power];
  }

  function getSize ($path){
    $size = (is_dir($path))?folderSize($path):filesize($path);
    return sizeFormatted($size);
  }

  function getIcon($type ,$path){
    $icon='';
    if($type== "File"){
      switch(pathinfo($path, PATHINFO_EXTENSION)){
        case "txt":
          $icon = "bx bxs-file-txt";
          break;
        default:
          $icon = "no-icon";
          break;
      }
    }else{
      $icon = "bx bxs-folder";
    }
    return $icon;
  }

?>