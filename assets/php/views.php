<?php
  function renderTable($type, $root, $directory, $files){
    $is_type = $type=="Folder"? "is_dir":"is_file";
    renderTableTitle($type, $directory);
    foreach ($files as $key => $value) {
      if($is_type($root.$directory.$value)){
          $icon = getIcon($type,$root.$directory.$value);
          $timeCreate=  date ("d m Y H:i:s.", filectime($root.$directory.$value));
          $timeModificate=  date ("d m Y H:i:s.", filemtime($root.$directory.$value));
          $fileSize= getSize($root.$directory.$value);
          $url=urlencode($directory.$value);
          renderTableContent($type,$icon,$url,$value,$timeCreate,$timeModificate,$fileSize);
      }
    }
    echo "</table>";
  }
  function renderTableTitle($type, $url){
    echo "<h1 class='main-content__title'>$type</h1>";
    echo "<button id='btnNew$type' data-url='$url'>New $type</button>";
    echo "<table class='table'>";
    echo "<tr class='table__title'>
        <td>Icon:</td>
        <td>$type Name:</td>
        <td>Creation Date:</td>
        <td>Modification Date:</td>
        <td>$type Size:</td>
      </tr>";
  }
  function renderTableContent($type, $icon, $url,$value, $timeCreate, $timeModificate, $fileSize){
    echo "<tr class='$type-items'>
          <td class='$icon'></td>";
    if($type=='Folder' ){
      echo "<td><a href='?dir=$url'>$value</a></td>";
    }else{
      echo "<td data-url=$url'>$value</td>";
    }
    echo "<td>$timeCreate</td>
          <td>$timeModificate</td>
          <td>$fileSize</td>
          </tr>";
  }
?>