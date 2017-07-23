<?php

  namespace DataBase;

  use DataBase\AntBridge as AntBridge;
  use AntBack\Config\AntConfig as AntConfig;
  use AntBack\Validation\Exception\AntTalk as AntTalk;

  class AntBridge
  {

    const AVAILABLE = ["DataBase" => ["MYSQL"]]; //Lista de Banco de Dados já implementados na Sintaxe de Ant
    public $Base;
    private $Table;
    private $Action;
    private $Stack;
    private $Condition;

    final public function __construct()
    {
      $this->setBridge();
    }

    //Decide qual é o Banco de Dados que deverá ser utilizado e faz a Conexão no Atributo $Base
    final public function setBridge()
    {
      try {
        $Base = strtoupper(AntConfig::Object()->GettypeDatabase());
        if ( !in_array($Base, self::AVAILABLE["DataBase"])) {
          throw new AntTalk("AntBack Não conhece o tipo de Banco de Dados chamado {$Base}!");
        } else {
          $Base = "\DataBase\Sintaxe\\" . $Base;
          $this->Base = new $Base();
        }
      } catch ( AntTalk $Erro ) {
        $Erro->showPage();
      }
    }

    //Informa qual é a Tablea que será utilizada para construir a Query
    final public function setTable(string $Table)
    {
      $this->Table = $Table;
    }

  }
