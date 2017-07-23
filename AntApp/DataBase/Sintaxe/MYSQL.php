<?php

  namespace DataBase\Sintaxe;

  use DataBase\Sintaxe\MYSQL as MYSQL;

  class MYSQL
  {

    const AVAILABLE = ["Action" => ["UPDATE", "SELECT", "DELETE", "INSERT"] ];
    private $Query; //Query final criado pelo Objeto
    private $Table; //Tabela onde ocorrerá a modificação, caso seja um Select pode ser um Array de tabelas
    private $Field; //Campos da Tabela que serão utilizados no Insert e no Update
    private $FieldUpdate; //Campos onde o Update e o Delete utilizará o Where
    private $NumStack; //Numero de Intes que serão Inseridos, Atualizados, Criados e Deletados.
    private $Condition; //Condições adicionais para o Select

    final public function execute( array $input ) {
      $Action = self::validateAction($input["Action"]);
      $Action = ucfirst(strtolower($Action));
      self::validateCall($Action, $input);
    }

    //Cria a Query de Insert
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

    //Cria a Query de Select
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

    final private function SelectLevelThree()
    {

      $map = [];
      foreach ($this->Table as $Table ) {
        $map[] = "( {$this->SelectLevelTwo($Table)} )" . " AS {$Table}";
      }

      return "SELECT " . implode(", ", $map);
    }

    //Cria a Query de Update
    final private function Update()
    {
      $this->UpdateLevelOne();
      $this->UpdateLevelTwo();
    }

    final private function UpdateLevelOne()
    {
      $this->Insert();
    }

    final private function UpdateLevelTwo()
    {
      $map = array_map(function ($Fields) { return "{$Fields}=VALUES($Fields)"; }, $this->FieldUpdate);
      $this->Query .= " ON DUPLICATE KEY UPDATE " . implode(", ", $map);
    }

    //Cria a Query de Delete
    final private function Delete()
    {
      $this->DeleteLevelOne();
      $this->DeleteLevelTwo();
    }

    final private function DeleteLevelOne()
    {
      $arr = array_map( function ($item) { return "{$item} = ?";}, $this->FieldUpdate);
      $this->Query = "DELETE FROM `{$this->Table}` WHERE " . implode(", ", $arr);
    }

    final private function DeleteLevelTwo()
    {
      $this->Query .= $this->Condition ?? ' ';
    }

    //Valida se a Action passada pelo AntBride é Válida
    final private static function validateAction( string $Action )
    {
      try {
        $Action = strtoupper($Action);
        if ( in_array( $Action, self::AVAILABLE["Action"]) ) {
          return $Action;
        } else {
          throw new AntTalk("Ação {$Action} não implementada na Sintaxe MySQL do AntBack!");
        }
      } catch ( AntTalk $Erro ) {
        $Erro->showPage();
      }
    }

    //Valida se tem os Dados necessários para fazer a Chamada da Query
    final private static function validateCall ( )
    {

    }
  }
