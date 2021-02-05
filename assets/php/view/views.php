<?php

function renderTableTitle($type, $url)
{
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
function renderTableContent($data)
{
  echo "<tr class='" . $data['type'] . "-items'>
          <td class='" . $data['icon'] . "'></td>";
  if ($data['type'] == 'Folder') {
    echo "<td><a href='?dir=" . $data['url'] . "'>" . $data['name'] . "</a></td>";
  } else {
    echo "<td data-url=" . $data['url'] . "'>" . $data['name'] . "</td>";
  }
  echo "<td>" . $data['timeCreate'] . "</td>
          <td>" . $data['timeModificate'] . "</td>
          <td>" . $data['fileSize'] . "</td>
          </tr>";
}

function renderBreadcrums($breadcrums)
{
  echo '<ol class="breadcrums">';
  echo "<li><a href='index.php'>root</a></li>";
  if ($breadcrums) {
    $acc = '';
    foreach ($breadcrums as $value) {
      $acc = $acc . '/' . $value;
      echo "<li><a href='?dir=$acc'>$value</a></li>";
    }
  }
  echo '</ol>';
}
