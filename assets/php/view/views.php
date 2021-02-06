<?php

function renderTableTitle($type, $url = false)
{
  $template = "<h1 class='main-content__title'>$type</h1>";
  if ($type != 'Search') {
    $class = ($type == 'Folder') ? 'bx bxs-folder-plus' : 'bx bx-upload';
    $template = $template . "<button class='buttonNew $class' id='btnNew$type' data-url='$url'></button>";
  }
  $template = $template .
    "<table class='table $type'>
      <tr class='table__title'>
        <td>Icon:</td>
        <td>$type Name:</td>
        <td>Creation Date:</td>
        <td>Modification Date:</td>
        <td>$type Size:</td>
      </tr>";
  return $template;
}
function renderTableContent($data)
{
  $template = "<tr class='" . $data['type'] . "-items'>";
  $template = "<td class='icon-container'><img class='icon-img' src='./assets/scr/icons/svg/" . $data['icon'] . ".svg'></td>";
  if ($data['type'] == 'Folder') {
    $template = $template . "<td><a href='?dir=" . $data['url'] . "'>" . $data['name'] . "</a></td>";
  } else {
    $template = $template . "<td data-url=" . $data['url'] . "'>" . $data['name'] . "</td>";
  }
  $template = $template . "<td>" . $data['timeCreate'] . "</td>
          <td>" . $data['timeModificate'] . "</td>
          <td>" . $data['fileSize'] . "</td>
          </tr>";
  return $template;
}

function renderBreadcrums($breadcrums)
{
  $template = "<ol class='breadcrums'><li><a href='index.php'>root</a></li>";
  if ($breadcrums) {
    $acc = '';
    foreach ($breadcrums as $value) {
      $acc = $acc . '/' . $value;
      $template = $template . "<li><a href='?dir=$acc'>$value</a></li>";
    }
  }
  return $template . '</ol>';
}
