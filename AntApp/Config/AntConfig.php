<?php

  namespace Config;

  use Config\AntConfig as AntConfig;
  use Validation\AntSupvisor as AntSupvisor;
  use Validation\AntTalk as AntTalk;

  require_once( __DIR__ . '/../Validation/AntSupvisor.php');

  class AntConfig {

    const File = __DIR__ . '/.AntConfig.cfg';
    public $Config;

    public function __construct() {
      $this->setConfiguration();
    }

    /*
     * Lê o Arquivo de Configuração do Ant e carrega no AntConfig
     */

    private function  setConfiguration() {

      try {
        if ( !( AntSupvisor::Object()->FileIsOpen( self::File ) ) ) {
          throw new AntTalk("Leitura Negada ou Arquivo Inexistente!");
        }
        $this->Config = parse_ini_file( self::File );
      } catch ( AntTalk $Erro ) {
        $Erro->showPage();
      }
    }

    /*
     * Cria um Objeto Anonimo para AntConfig
     */

     public static function Object() {
       return new AntConfig();
     }


  }
