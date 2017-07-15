<?php


  namespace Validation;

  use Config\AntConfig as AntConfig;
  use Validation\AntSupvisor as AntSupvisor;
  use Validation\Exception\AntTalk as AntTalk;

  use Validation\Type\File as File;
  use Validation\Type\Str as Str;

  class AntSupvisor {

    private $antAction;

    //LIsta de Ligaçãoes com Especialidades

    //Liga com a Especialidade File
    final public static function File() {
      return new File();
    }

    //Liga com a Especialidade Str ( String )
    final public static function Str() {
      return new Str();
    }


    //Cria um Objeto Anônimo para Utilizar Métodos não estáticos
    final public static function Object() {
      return new AntSupvisor();
    }

  }

  //Funcção para Capturar Automaticamente Excessoes Escapadas
  set_exception_handler(function ($Error) {
    $Erro = new AntTalk(get_class($Error) . " finds: " . $Error->getMessage(), 0, $Error);
    $Erro->showPage();
  });
