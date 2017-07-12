<?php

  /*
   * Lista dos Requires do Caller
   */

  require_once( __DIR__ . '/../Config/AntConfig.php');
  require_once( __DIR__ . '/../Validation/AntSupvisor.php');

  /*
   * Lista das Constantes USE para os Callers
   */

  use Config\AntConfig as AntConfigSign;

  use Validation\AntSupvisor as AntSupvisorSign;

  /*
   * Lista das Assinaturas dos Callers
   */

  class AntConfig extends AntConfigSign{}

  class AntSupvisor extends AntSupvisorSign{}

  /*
   * Pronto, Vamos para o Caminho do Formigueiro!
   */

   require_once( __DIR__ . '/AntPath.php');
