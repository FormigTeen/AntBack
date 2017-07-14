<?php

require_once( __DIR__ . '/AntSign.php');
new AntConfig();
$db = new PDO('garbage:this is !');
