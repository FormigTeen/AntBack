<?php

  namespace DataBase;

  use DataBase\AntBridge as AntBridge;

  class AntBridge
  {

    const AVAILABLE = ["DataBase" => ["MYSQL"]];
    private $Base;
    private $Table;
    private $Action;
    private $Stack[];
    private $Condition[];

    //Decide qual é o Banco de Dados que deverá ser utilizado
    final public function setBridge($Base)
    {
      if ( )
    }

    //Informa qual é a Tablea que será utilizada para construir a Query
    final public function setTable(string $Table)
    {
      $this->Table = $Table;
    }

  }
