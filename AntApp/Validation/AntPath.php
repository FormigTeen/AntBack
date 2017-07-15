<?php

  //Chama o Módulo Principal do Validation
  require_once('AntSupvisor.php');

  //Chama AntTalk para permitir que Ant faça excessões
  require_once( __DIR__ . '/Exception/AntTalk.php');

  //Chama as Validações Especializadas
  require_once( __DIR__ . '/Type/File.php');
  require_once( __DIR__ . '/Type/Str.php');

  //Chama os Códigos Externos
  require_once( __DIR__ . 'Exception/Extern/CustomException.php');
  require_once( __DIR__ . 'Exception/Extern/IException.php');
