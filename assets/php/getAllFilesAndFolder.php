<?php
  include('helpers.php');
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
  echo '<section>';
  echo "<a href='?dir='>root</a>";
  if($breadcrums){
    $acc='';
    foreach ($breadcrums as $key => $value) {
      $acc = $acc . '/' . $value ;
      echo "<a href='?dir=$acc'>$value</a>";
    }
  }
  echo '</section>';
  echo "<h1 class='folders-title'>Folders</h1>";
  echo "<button id='newFolderBtn'>New Folder</button>";
  echo "<section class='folders'>";
  foreach ($files as $key => $value) {
      if(is_dir($root.$directory.$value)){
          $timeCreate=  date ("d m Y H:i:s.", filemtime($root.$directory.$value));
          $fileSize= foldersize($root.$directory.$value);
          $url=urlencode($directory.$value);
          echo "<section class='folders-item'>
                  <p class='bx bxs-folder'></p>
                  <a href='?dir=$url'>$value</a>
                  <p>$timeCreate</p>
                  <p>$fileSize</p>
              </section>";
      }
  }
  echo "</section>";
  echo "<h1 class='files-title'>Files</h1>";
  echo "<button id='newFileBtn'>Upload File</button>";
  echo "<section class='files'>";
  foreach ($files as $key => $value) {
      if(is_file($root.$directory.$value)){
        $timeCreate=  date ("d m Y H:i:s.", filemtime($root.$directory.$value));
        $fileSize= filesize($root.$directory.$value);
        echo "<section class='folders-item'>
                <p>$key</p>
                <p>$value</p>
                <p>$timeCreate</p>
                <p>$fileSize</p>
            </section>";
      }
  }
  echo "</section>";
?>