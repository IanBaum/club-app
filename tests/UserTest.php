<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/User.php";

    $server = 'mysql:host=localhost:8889;dbname=club_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class UserTest extends PHPUnit_Framework_TestCase
    {
        function test_getId()
        {
            //Arrange
            $name = "John";
            $id = 1;
            $test_user = new User($name, $id);
            //Act
            $result = $test_user->getId();
            //Assert
            $this->assertEquals($id, $result);
        }
        function test_getName()
        {
          //Arrange
          $name = "John";
          $test_user = new User($name);
          //Act
          $result = $test_user->getName();
          //Assert
          $this->assertEquals($name, $test_user->getName());
        }
        function test_setName()
        {
            //Arrange
            $name = "John";
            $test_user = new User($name);
            $new_name = "Nhoj";
            //Act
            $test_user->setName($new_name);
            $result = $test_user->getName();
            //Assert
            $this->assertEquals($new_name, $test_user->getName());
        }

        
    }
?>
