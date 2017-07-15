<?php

  namespace DataBase;

  use DataBase\AntBridge as AntBridge;

  //Chama todos os Modulos necessarios do Ant
  require_once ( __DIR__ . '/../Validation/AntSupvisor.php');
  require_once ( __DIR__ . '/../Config/AntConfig.php');

  //Conecta o todos os Módulos Secundarios de AntBridge
  require_once( __DIR__ . '/Extern/Connection.php');

  class AntBridge {

    private $Table;
    private $Action;
    private $Stack[];
    private $Condition[];

    final public function setBridge() {
    }

    final public function setTable(string $Table) {
      $this->Table();
    }

  }
