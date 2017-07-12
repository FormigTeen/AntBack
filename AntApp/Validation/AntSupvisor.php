<?php

  namespace Validation;

  use Validation\AntSupvisor as AntSupvisor;

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

    private function linkFile() {
      $this->antAction = new AntValFile();
    }

    /*
     * Cria um Objeto Anônimo para Utilizar Métodos não estáticos
     */

    public static function Object() {
      return new AntSupvisor();
    }

  }
