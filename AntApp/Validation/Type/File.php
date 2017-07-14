<?php

  namespace Validation\Type;

  class File {

    public function isExists( string $location ) {
      return file_exists($location);
    }

    public function isRead( string $location ) {
      return is_readable($location);
    }

    public function FileIsOpen ( string $location ) {
      return $this->isRead($location);
    }
  }
