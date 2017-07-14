<?php

  namespace Validation;
//Code by Wiki Users PHP

  use Validation\IException as IException;
  use Validation\CustomException as CustomException;
  use Validation\AntTalk as AntTalk;
  Use \Exception as Exception;


  interface IException {
    /* Protected methods inherited from Exception class */
    public function getMessage();                 // Exception message
    public function getCode();                    // User-defined Exception code
    public function getFile();                    // Source filename
    public function getLine();                    // Source line
    public function getTrace();                   // An array of the backtrace()
    public function getTraceAsString();           // Formated string of trace

    /* Overrideable methods inherited from Exception class */
    public function __toString();                 // formated string for display
    public function __construct($message = null, $code = 0);
  }

  abstract class CustomException extends Exception implements IException {

    protected $message = 'Unknown exception';     // Exception message
    private   $string;                            // Unknown
    protected $code = 0;                          // User-defined exception code
    protected $file;                              // Source filename of exception
    protected $line;                              // Source line of exception
    private   $trace;
    private $previous;

    public function __construct($message = null, $code = 0, $previous = null) {
      if (!$message) {
        throw new $this('Unknown '. get_class($this));
      }
      parent::__construct($message, $code);
      $this->previous = $previous;
    }

    public function __toString() {
      $Trace = str_replace("#", "<br><br>#", $this->getTraceAsString());
      $Previous = str_replace("#", "<br><br>#", $this->previous);
      $Previous = str_replace("Stack trace:", "<br><br>Stack trace:", $Previous);
      return get_class($this) . "<span> says:</span><br><br>
        <span>Message: </span>'{$this->message}'<br><br>
        <span>In: </span>{$this->file} <span>Line:</span> {$this->line}) <br><br>
        <span>With </span> " . $Previous . "<br><br>
        <span>Stack Code: </span>{$Trace}";
    }

    private function setLog() {
      error_log("Message Direct: " . $this->getMessage() . "\n\n" . strip_tags($this));die;
    }

    public function showPage() {
      // $this->setLog();
      setcookie("ErrorMensage", $this->getMessage(), 0, '/');
      setcookie("LogErrorMensage", $this, 0, '/');
      header('Location:  /AntBack/AntApp/Validation/Exception/Assets/AntTalk.php');
    }

  }

  class AntTalk extends CustomException {}
