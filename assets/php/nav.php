<?php
echo "<ul>";
echo "<li><a href='?dir='>root</a></li>";
getAllFolderInRoot('');
echo"</ul>";
function getAllFolderInRoot($path){
  $root= 'root/';
  if (is_dir($root . $path)){
      $manager = scandir($root . $path);
      if(count($manager) > 2){
        $manager = array_slice($manager,2);
        echo "<ul>";
        foreach ($manager as $key => $value) {
          $pathShort = $path . "/" . $value;
          if (is_dir($root . $pathShort)) {
              echo "<li><a href='?dir=$pathShort'>$value</a></li>";
              getAllFolderInRoot($pathShort);
          }
        }
        echo "</ul>";
      }
  } else {
      echo "No es una path de directorio valida<br/>";
  }
}
?>