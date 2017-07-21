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
      $this->NumStack = $numStack;
      $this->Insert();
    }

    final public function Insert()
    {
      $this->InsertLevelOne();
      $this->InsertLevelTwo();
      var_dump($this->Query);die;
    }

    final private function InsertLevelOne()
    {
      $this->Query = "INSERT INTO `" . $this->Table . "` (" . implode(", ", $this->Field) . ") VALUES ";
    }

    final private function Select()
    {

    }

    final private function InsertLevelTwo()
    {
      $rowPlaces = '(' . implode(', ', array_fill(0, count($this->Field), '?')) . ')';
      $this->Query .= implode(', ', array_fill(0, $this->NumStack, $rowPlaces));
    }

    final private function startUpdate()
    {

    }

    final private function startDelete()
    {

    }

  }

  new MySQL( "users", ['name', 'age', 'andress'], 8);
