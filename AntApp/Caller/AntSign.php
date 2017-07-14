<?php

  /*
  * Lista dos Requires do Caller
  */

  require_once( __DIR__ . '/../Validation/AntSupvisor.php');
  require_once( __DIR__ . '/../Config/AntConfig.php');

  /*
  * Lista das Constantes USE para os Callers
  */

  use Validation\Exception\AntTalk as AntTalkSign;
  use Validation\AntSupvisor as AntSupvisorSign;
  use Config\AntConfig as AntConfigSign;

  /*
  * Lista das Assinaturas dos Callers
  */


  if ( AntConfigSign::Object()->GetsignAnt() ) {
    class AntTalk extends AntTalkSign {}
    class AntSupvisor extends AntSupvisorSign{}
    class AntConfig extends AntConfigSign{}
  }

  /*
  * Pronto, Vamos para o Caminho do Formigueiro!
  */
