<?php

  namespace Config;

  use Config\AntConfig as AntConfig;
  use Validation\AntSupvisor as AntSupvisor;
  use Validation\AntTalk as AntTalk;

  class AntConfig {

    const File = __DIR__ . '/.AntConfig.cfg';
    private $Config;

    public function __construct() {
      $this->setConfiguration();
    }

    private function  setConfiguration() {

      try {
        if ( !( self::ObjectAntSupvisor()->FileIsOpen( self::File ) ) ) {
          throw new AntTalk("Leitura Negada ou Arquivo Inexistente!");
        }
        $this->Config = parse_ini_file( self::File );
      } catch ( AntTalk $Erro ) {
        $Erro->showPage();
      }
    }
    /*
     * FUnção para Linkar com Objetos Essenciais
     */

    private static function ObjectAntSupvisor() {
      return new AntSupvisor();
    }
  }
