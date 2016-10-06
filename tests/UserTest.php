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
        protected function teardown()
        {
            user::deleteAll();
        }

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

        function test_save()
        {
            //Arrange
            $name = "John";
            $test_user = new User($name);
            $test_user->save();
            //Act
            $result = User::getAll();
            //Assert
            $this->assertEquals($test_user, $result[0]);
        }

        function test_getAll()
        {
            //Arrange
            $name = "John";
            $test_user = new User($name);
            $test_user->save();

            $name2 = "Jane";
            $test_user2 = new User($name2);
            $test_user2->save();
            //Act
            $result = User::getAll();
            //Assert
            $this->assertEquals([$test_user, $test_user2], $result);
        }

        function test_deleteAll()
        {
          //Arrange
          $name = "John";
          $test_user = new User($name);
          $test_user->save();

          $name2 = "Jane";
          $test_user2 = new User($name2);
          $test_user2->save();
          //Act
          User::deleteAll();
          $result = User::getAll();
          //Assert
          $this->assertEquals([], $result);
        }
    }
?>
