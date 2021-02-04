<?php
  $root = 'root/';
  if(empty($_GET['dir'])){
    $directory = '';
    $breadcrums = false;
  }else{
    $directory = $_GET['dir'].'/';
    $breadcrums = explode('/', $directory);
  }
  $files = scandir($root.$directory);
  $files = array_slice($files,2);
  echo '<section class="breadcrums">';
  echo "<a href='index.php'>root</a>";
  if($breadcrums){
    $acc='';
    foreach ($breadcrums as $key => $value) {
      $acc = $acc . '/' . $value ;
      echo "<a href='?dir=$acc'>$value</a>";
    }
  }
  echo '</section>';
  renderTable('Folder', $root, $directory, $files);
  renderTable('File', $root, $directory, $files);
?>