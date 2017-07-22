<?php

  namespace DataBase\Sintaxe;

  use DataBASE\Sintaxe\MySQL as MySQL;

  class MySQL
  {

    private $Query;
    private $Table;
    private $Field;
    private $NumStack;
    private $Condition;

    final public function __construct($table, $field = array(), $numStack )
    {
      $this->Table = $table;
      $this->Field = $field;
      $this->Condition = $numStack;
      $this->Select(); //DEBUG
      var_dump($this->Query);die;
    }

    final public function Insert()
    {
      $this->InsertLevelOne();
      $this->InsertLevelTwo();
    }

    final private function InsertLevelOne()
    {
      $this->Query = "INSERT INTO `" . $this->Table . "` (" . implode(", ", $this->Field) . ") VALUES ";
    }

    final private function InsertLevelTwo()
    {
      $rowPlaces = '(' . implode(', ', array_fill(0, count($this->Field), '?')) . ')';
      $this->Query .= implode(', ', array_fill(0, $this->NumStack, $rowPlaces));
    }

    final public function Select()
    {
      $this->SelectLevelOne();
    }

    final private function SelectLevelOne()
    {

      if ( is_array($this->Table) ) {
        $this->Query = $this->SelectLevelThree();
      } else {
        $this->Query = $this->SelectLevelTwo($this->Table);
      }
    }

    final private function SelectLevelTwo( string $table )
    {
      return "SELECT * FROM `{$table}` " . $this->Condition ?? ' ';
    }

    final private function SelectLevelThree() {

      $map = [];
      foreach ($this->Table as $Table ) {
        $map[] = "( {$this->SelectLevelTwo($Table)} )" . " AS {$Table}";
      }

      return "SELECT " . implode(", ", $map);
    }

    final private function startUpdate()
    {

    }

    final private function startDelete()
    {

    }

  }

  new MySQL( ['users', 'jobs'], ['name', 'age', 'andress'], "WHERE `id` = 5");
