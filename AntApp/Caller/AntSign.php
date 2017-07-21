<?php

  //Lista dos Requires do Caller

  require_once( __DIR__ . '/../Validation/AntPath.php');
  require_once( __DIR__ . '/../Config/AntPath.php');

  //Lista das Constantes USE para os Callers

  use AntBack\Validation\Exception\AntTalk as AntTalkSign;
  use AntBack\Validation\AntSupvisor as AntSupvisorSign;
  use AntBack\Config\AntConfig as AntConfigSign;


  //Lista das Assinaturas dos Callers

  if ( AntConfigSign::Object()->GetsignAnt() ) {
    final class AntTalk extends AntTalkSign {}
    final class AntSupvisor extends AntSupvisorSign{}
    final class AntConfig extends AntConfigSign{}
  }

  //Pronto, Vamos para o Caminho do Formigueiro!
