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
  $icon = '';
  if ($type == "File") {
    switch (pathinfo($path, PATHINFO_EXTENSION)) {
      case "doc":
        $icon = "bx bxs-file-doc";
        break;
      case "csv":
        $icon = "bx bxs-file-csv";
        break;
      case "jpg":
        $icon = "bx bxs-file-jpg";
        break;
      case "png":
        $icon = "bx bxs-file-png";
        break;
      case "txt":
        $icon = "bx bxs-file-txt";
        break;
      case "ppt":
        $icon = "bx bxl-microsoft";
        break;
      case "odt":
        $icon = "bx bxs-spreadsheet";
        break;
      case "pdf":
        $icon = "bx bxs-file-pdf";
        break;
      case "zip":
        $icon = "bx bxs-file-zip";
        break;
      case "rar":
        $icon = "bx bx-library";
        break;
      case "exe":
        $icon = "bx bxs-file-exe";
        break;
      case "svg":
        $icon = "bx bxs-file-svg";
        break;
      case "mp3":
        $icon = "bx bxs-music";
        break;
      case "mp4":
        $icon = "bx bxs-videos";
        break;
      default:
        $icon = "no-icon";
        break;
    }
  } else {
    $icon = "bx bxs-folder";
  }
  return $icon;
}
