<?php

  namespace Config;


  use Config\AntConfig as AntConfig;
  use Validation\AntSupvisor as AntSupvisor;
  use Validation\Exception\AntTalk as AntTalk;

  //Chama o Validador do Ant, caso seja necessario validar algo.
  require_once( __DIR__ . '/../Validation/AntSupvisor.php');

  class AntConfig {

    //Diretorio Padrao da Configuração
    const File = __DIR__ . '/.AntConfig.cfg';

    //Todos os Dados do Arquivo de Configuração
    public $Config;

    public function __construct() {
      //Carrega as Configurações
      $this->setConfiguration();
    }

    //Lê o Arquivo de Configuração do Ant e carrega no AntConfig
    private function  setConfiguration() {

      try {
        if ( !( AntSupvisor::File()->isRead( self::File ) ) ) {
          throw new AntTalk("Leitura Negada ou Arquivo Inexistente!");
        }
        $this->Config = parse_ini_file( self::File , true);
      } catch ( AntTalk $Erro ) {
        $Erro->showPage();
      }
    }

    //Cria um Objeto Anonimo para AntConfig
     public static function Object() {
       return new AntConfig();
     }

      //Listas de Funções que Trata a Resposta do Config individualmente

      //Responde solicitação sobre o signAnt
      public function GetsignAnt() {

        if ( !isset($this->Config['Caller']['signAnt']) )
          $this->Config['Caller']['signAnt'] = true;
        else
          $this->Config['Caller']['signAnt'] = AntSupvisor::Str()->stringToBool($this->Config['Caller']['signAnt'], true);

        try {
          if ( !is_bool($this->Config['Caller']['signAnt']) )
            throw new AntTalk("Configuração 'signAnt' incorreta. Consulte o Arquivo de Configuração!");
          return $this->Config['Caller']['signAnt'];
        } catch ( AntTalk $Erro ) {
          $Erro->showPage();
        }
      }
  }
