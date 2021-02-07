<?php
$root = 'root/';
if (isset($_GET['searchValue'])) {
  echo renderBreadcrums(false);
  echo renderTableTitle('Search');
  echo search($_GET['searchValue']);
  echo '</table>';
} else if (isset($_POST["newFolder"])) {
  $folderName = $_POST["newFolder"];
  $url = $_POST["url"];
  $url = substr($url, 0, -1);
  $head = $url == '' ? "Refresh: 0; URL=index.php" : "Refresh: 0; URL=index.php?dir=$url";
  if (createFolder($folderName, $url)) {
    echo createFolder($folderName, $url);
  }
  header($head);
} else if (isset($_POST["MAX_FILE_SIZE"])) {
  $url = $_POST["url"];
  $url = substr($url, 0, -1);
  chdir("root/$url");
  $uploadFile = basename($_FILES['newFile']['name']);
  $head = $url == '' ? "Refresh: 0; URL=index.php" : "Refresh: 0; URL=index.php?dir=$url";
  if (createFile($uploadFile)) {
    echo createFile($uploadFile);
  }
  header($head);
} else if (empty($_GET['dir'])) {
  $directory = '';
  echo renderBreadcrums(false);
  echo renderTable('Folder', $root, $directory);
  echo renderTable('File', $root, $directory);
} else {
  $directory = $_GET['dir'] . '/';
  if (strpos($directory, "/") == 0 && strpos($directory, ".") == 1) {
    echo "<script>alert('This is not a valid path');</script>";
    header("Refresh: 0; URL=index.php");
  } else {
    $breadcrums = explode('/', $directory);
    if ($breadcrums[0] == '') {
      $breadcrums = array_slice(explode('/', $directory), 1);
    }
    array_pop($breadcrums);
    echo renderBreadcrums($breadcrums);
    echo renderTable('Folder', $root, $directory);
    echo renderTable('File', $root, $directory);
  }
}
