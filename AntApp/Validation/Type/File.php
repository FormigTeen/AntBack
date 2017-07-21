<?php

  namespace AntBack\Validation\Type;

  final class File
  {

    //Função Retorna somente se o arquivo Existe dada a Localização
    final public function isExists( string $location )
    {
      return file_exists($location);
    }

    //Função retorna se o arquivo existe ou se pode ser lido dada a localização
    final public function isRead( string $location )
    {
      return is_readable($location);
    }

  }
