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
  echo '<section class="root">';
  echo "<a href='index.php'>root</a>";
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
  echo "<section class='folder-details'>
  <p id='folder-icon'>Icon:</p>
  <p id='folder-name'>Folder Name:</p>
  <p id='folder-creation-date'>Creation Date:</p>
  <p id='folder-size'>Folder Size:</p>
</section>";
  foreach ($files as $key => $value) {
      if(is_dir($root.$directory.$value)){
          $timeCreate=  date ("d m Y H:i:s.", filemtime($root.$directory.$value));
          $fileSize= foldersize($root.$directory.$value);
          $url=urlencode($directory.$value);
          echo "<section class='folder-items'>
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
  echo "<section class='file-details'>
  <p id='file-icon'>Icon:</p>
  <p id='file-name'>File Name:</p>
  <p id='file-creation-date'>Creation Date:</p>
  <p id='file-size'>File Size:</p>
</section>";
  foreach ($files as $key => $value) {
      if(is_file($root.$directory.$value)){
        $timeCreate=  date ("d m Y H:i:s.", filemtime($root.$directory.$value));
        $fileSize= filesize($root.$directory.$value);
        echo "<section class='file-items'>
                <p>$key</p>
                <p>$value</p>
                <p>$timeCreate</p>
                <p>$fileSize</p>
            </section>";
      }
  }
  echo "</section>";
?>