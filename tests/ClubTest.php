<?php

  require_once "src/Club.php";

  $server = 'mysql:host=localhost:8889;dbname=club_test';
  $username = 'root';
  $password = 'root';
  $DB = new PDO($server, $username, $password);

  class ClubTest extends PHPUnit_Framework_TestCase
  {







  }



 ?>
