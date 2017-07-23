<?php

  namespace DataBase;

  use DataBase\AntBridge as AntBridge;
  use AntBack\Config\AntConfig as AntConfig;
  use AntBack\Validation\Exception\AntTalk as AntTalk;

  class AntBridge
  {

    const AVAILABLE = ["DataBase" => ["MYSQL"]]; //Lista de Banco de Dados já implementados na Sintaxe de Ant
    public $Base;
    private $Query; //Query final criado pelo Objeto
    private $Table; //Tabela onde ocorrerá a modificação, caso seja um Select pode ser um Array de tabelas
    private $Field; //Campos da Tabela que serão utilizados no Insert e no Update
    private $FieldUpdate; //Campos onde o Update e o Delete utilizará o Where
    private $NumStack; //Numero de Intes que serão Inseridos, Atualizados, Criados e Deletados.
    private $Condition; //Condições adicionais para o Select
    private $Action; //Informa qual a Ação que deve ser Realizada;

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

    final public function execute()
    {
      return $Base->execute(["Field" = > $this->Field, "FieldUpdate" => $this->FieldUpdate, "NumStack" => $this->NumStack,
                             "Condition" => $this->Condition, "Action" => $this->Action]);
    }
  }
