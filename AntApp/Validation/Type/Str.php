<?php

  namespace AntBack\Validation\Type;

  final class Str
  {

    //Função que Converte uma String $value em um Valor Booleano, caso $restric seja 'true' a função só irá
    //converter o valor se a string for igual a 'true' or 'false' sem se importar com o case
    final public function stringToBool( $value, bool $restrict = false )
    {
      if ( $restrict ) {
        if ( strcasecmp( $value, "true") == 0 )
          return true;
        else if ( strcasecmp( $value, "false") == 0 )
          return false;
        else {
          return $value;
        }
      } else
        return boolval($value);
    }
  }
