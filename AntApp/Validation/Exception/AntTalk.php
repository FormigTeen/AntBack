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
      $this->previous = $previous;
      parent::__construct($message, $code);
    }

    private function pageTrace() {
      $Trace = str_replace("#", "<br><br>#", htmlentities($this->getTraceAsString()));
      return "<span>Stack Code: </span>" . $Trace;
    }

    private function pagePrevious() {
      $Previous = str_replace("#", "<br><br>#", htmlentities($this->previous));
      $Previous = str_replace("Stack trace:", "<br><br>Stack trace:", $Previous);
      return "<span>With </span> " . $Previous . "<br><br>";
    }

    private function pageFileLine() {
      return "<span>In: </span>" . htmlentities($this->file) . "<span> Line: </span>" . htmlentities($this->line) . "<br><br>";
    }

    private function pageMessage() {
      return "<span>Message: </span>'" . htmlentities($this->message) . "'<br><br>";
    }

    private function sayPage() {
      return get_class($this) . "<span> says:</span><br><br>" .
      $this->pageMessage() . $this->pageFileLine() . $this->pagePrevious() . $this->pageTrace();
    }

    public function __toString() {
      $String = str_replace("<br>", "\n", $this->sayPage());
      $String = strip_tags($String);
      $String = html_entity_decode($String);
      return $String;
    }

    private function setLog() {
      error_log("Message Direct\n: " . $this, 3); // Inserir a Configuração do Log de Erros
    }

    public function showPage() {
      // $this->setLog();
      setcookie("ErrorMensage", $this->getMessage(), 0, '/');
      setcookie("LogErrorMensage", $this->sayPage(), 0, '/');
      header('Location:  /AntBack/AntApp/Validation/Exception/Assets/AntTalk.php');
    }

  }

  class AntTalk extends CustomException {}
