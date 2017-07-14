<?php

  namespace Validation;

  use Config\AntConfig as AntConfig;
  use Validation\AntSupvisor as AntSupvisor;
  use Validation\Exception\AntTalk as AntTalk;

  require_once( __DIR__ . '/../Config/AntConfig.php');
  require_once( __DIR__ . '/Exception/AntTalk.php');

  /*
   * Chama as Validações Especializadas
   */

  require_once( __DIR__ . '/Type/File.php');
  require_once( __DIR__ . '/Type/Str.php');

  use Validation\Type\File as File;
  use Validation\Type\Str as Str;

  class AntSupvisor {

    private $antAction;

    /*
     * Lista de Criador de Ligações com Especialidades
     */

    public function Exception( string $msg = NULL, string $code = NULL) {
      return new AntTalk( $msg, $code );
    }

    public static function File() {
      return new File();
    }

    public static function Str() {
      return new Str();
    }


    /*
     * Cria um Objeto Anônimo para Utilizar Métodos não estáticos
     */

    public static function Object() {
      return new AntSupvisor();
    }

    /*
     * Cria Funções Especializada para File
     */

  }

  set_exception_handler(function ($Error) {
    $Erro = new AntTalk(get_class($Error) . " finds: " . $Error->getMessage(), 0, $Error);
    $Erro->showPage();
  });
