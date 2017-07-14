<?php

  namespace Validation\Type;

  class File {

    //Função Retorna somente se o arquivo Existe dada a Localização
    public function isExists( string $location ) {
      return file_exists($location);
    }

    //Função retorna se o arquivo existe ou se pode ser lido dada a localização
    public function isRead( string $location ) {
      return is_readable($location);
    }

  }
