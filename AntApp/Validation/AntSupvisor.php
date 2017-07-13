<?php

  namespace Validation;

  use Validation\AntSupvisor as AntSupvisor;
  use Validation\AntTalk as AntTalk;

  require_once( __DIR__ . '/Exception/AntTalk.php');

  /*
   * Chama as Validações Especializadas
   */

  require_once( __DIR__ . '/Type/File.php');

  use Validation\Type\File as AntValFile;

  class AntSupvisor {

    private $antAction;

    /*
     * Lista de Criador de Ligações com Especialidades
     */

    public function Exception( string $msg = NULL, string $code = NULL) {
      return new AntTalk( $msg, $code );
    }

    private static function File() {
      return new AntValFile();
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

    public function FileIsOpen ( string $location ) {
      return self::File()->isRead($location);
    }

  }
