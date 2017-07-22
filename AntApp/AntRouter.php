<?php
  //Receptor das Rotas

  //Carrega o Ant
  require_once( __DIR__ . '/Caller/AntPath.php');

  //Carrega o Roteamento Personalizado
  //include_once( __DIR__ . '/../MyRouter.php');

  //Recebe a Rota
  unset($ROUTE);
  //$ROUTE[] = strtoupper($_SERVER['REQUEST_METHOD']);
  //$ROUTE[] = explode('/', strtoupper($_GET['URI']));
  //var_dump($ROUTE);die;
  //var_dump($_POST);die;
  //var_dump($_GET);die;
  var_dump($_SERVER['REQUEST_METHOD']);die;
  //var_dump("Ola");die;
