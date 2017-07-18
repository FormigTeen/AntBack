<?php
  //Receptor das Rotas

  //Carrega o Ant
  require_once( __DIR__ . '/Caller/AntPath.php');

  //Carrega o Roteamento Personalizado
  //include_once( __DIR__ . '/../MyRouter.php');

  //Recebe a Rota
  $array = explode('/', $_GET['URI']);
  var_dump($array);die;
