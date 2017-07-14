<?php


  namespace Validation;

  use Config\AntConfig as AntConfig;
  use Validation\AntSupvisor as AntSupvisor;
  use Validation\Exception\AntTalk as AntTalk;

  //Chama AntConfig caso precise de alguma resposta da configuração.
  require_once( __DIR__ . '/../Config/AntConfig.php');

  //Chama AntTalk para permitir que Ant faça excessões
  require_once( __DIR__ . '/Exception/AntTalk.php');

  //Chama as Validações Especializadas

  require_once( __DIR__ . '/Type/File.php');
  require_once( __DIR__ . '/Type/Str.php');

  use Validation\Type\File as File;
  use Validation\Type\Str as Str;

  class AntSupvisor {

    private $antAction;

    //LIsta de Ligaçãoes com Especialidades

    //Liga com a Especialidade File
    public static function File() {
      return new File();
    }

    //Liga com a Especialidade Str ( String )
    public static function Str() {
      return new Str();
    }


    //Cria um Objeto Anônimo para Utilizar Métodos não estáticos
    public static function Object() {
      return new AntSupvisor();
    }

  }

  //Funcção para Capturar Automaticamente Excessoes Escapadas
  set_exception_handler(function ($Error) {
    $Erro = new AntTalk(get_class($Error) . " finds: " . $Error->getMessage(), 0, $Error);
    $Erro->showPage();
  });
