<?php

  namespace Validation\Exception;
//Code by Wiki Users PHP

  use Validation\Exception\Extern\IException as IException;
  use Validation\Exception\Extern\CustomException as CustomException;
  use Validation\Exception\AntTalk as AntTalk;
  Use \Exception as Exception;

  require_once( __DIR__ . '/Extern/CustomException.php');
  require_once( __DIR__ . '/Extern/IException.php');

  class AntTalk extends CustomException {

    public function __construct($message = null, $code = 0, $second = null) {
      if (!$message) {
        throw new $this('Unknown '. get_class($this));
      }
      $this->second = $second;
      parent::__construct($message, $code);
    }

    private function pageTrace() {
      $Trace = str_replace("#", "<br><br>#", htmlentities($this->getTraceAsString()));
      return "<span>Stack Code: </span>" . $Trace;
    }

    private function pagePrevious() {
      $Second = str_replace("#", "<br><br>#", htmlentities($this->second));
      $Second = str_replace("Stack trace:", "<br><br>Stack trace:", $Second);
      return "<span>With </span> " . $Second . "<br><br>";
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
      die;
    }

  }
