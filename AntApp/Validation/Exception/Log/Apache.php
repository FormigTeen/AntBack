<?php

  use AntBack\Validation\Exception\AntTalk as AntTalk;

  require_once(__DIR__ . '/../../AntPath.php');

  $Talk = new AntTalk($_GET['Message']);

  $Talk->showPage();
?>
