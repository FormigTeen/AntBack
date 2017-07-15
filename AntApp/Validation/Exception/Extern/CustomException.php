<?php

  namespace Validation\Exception\Extern;

  use Validation\Exception\Extern\IException as IException;
  Use \Exception as Exception;

  require_once ( __DIR__ . '/IException.php');

  abstract class CustomException extends Exception implements IException
  {

    protected $message = 'Unknown exception';     // Exception message
    private   $string;                            // Unknown
    protected $code = 0;                          // User-defined exception code
    protected $file;                              // Source filename of exception
    protected $line;                              // Source line of exception
    private   $trace;
    private $second;
  }
