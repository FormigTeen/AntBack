<?php

  namespace AntBack\Config;


  use AntBack\Config\AntConfig as AntConfig;
  use AntBack\Validation\AntSupvisor as AntSupvisor;
  use AntBack\Validation\Exception\AntTalk as AntTalk;

  class AntConfig {

    //Diretorio Padrao da Configuração
    const FILE = __DIR__ . '/.AntConfig.cfg';

    //Todos os Dados do Arquivo de Configuração
    public $Config;

    final public function __construct()
    {
      //Carrega as Configurações
      $this->setConfiguration();
    }

    //Lê o Arquivo de Configuração do Ant e carrega no AntConfig
    final private function  setConfiguration()
    {

      try {
        if (!( AntSupvisor::File()->isRead(self::FILE) )) {
          throw new AntTalk("Leitura Negada ou Arquivo Inexistente!");
        }
        $this->Config = parse_ini_file(self::FILE , true);
      } catch ( AntTalk $Erro ) {
        $Erro->showPage();
      }
    }

    //Cria um Objeto Anonimo para AntConfig
     final public static function Object()
     {
       return new AntConfig();
     }

      //Listas de Funções que Trata a Resposta do Config individualmente

      //Responde solicitação sobre o signAnt
      final public function GetsignAnt()
      {

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
