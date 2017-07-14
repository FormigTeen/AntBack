<?php

  namespace Validation\Type;

  class Str {

    public function stringToBool( $value, bool $restrict = false ) {
      if ( $restrict ) {
        if ( $value == "true" )
          return true;
        else if ( $value == "false" )
          return false;
        else {
          return $value;
        }
      } else
        return boolval($value);
    }
  }
