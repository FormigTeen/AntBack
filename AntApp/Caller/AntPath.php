<?php

//Chama o Composer
require_once ( __DIR__ .'/../vendor/autoload.php');

//Ativa o Gatilho do Ant
require_once( __DIR__ . '/AntSign.php');

// Area para Debug

var_dump(AntConfig::Object()->GetsignAnt());
