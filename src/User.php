<?php
    class User{
        private $name;
        private $id;

        function __construct($name, $id=null)
        {
            $this->name = $name;
            $this->id = $id;
        }

        function getId()
        {
            return $this->id;
        }
        function getName()
        {
            return $this->name;
        }

        function setName($new_name)
        {
            $this->name = (string) $new_name;
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO users (name) VALUES ('{$this->getName()}');");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        static function getAll()
        {
          $returned_users = $GLOBALS['DB']->query("SELECT * FROM users;");
          $users = array();
          foreach($returned_users as $user)
          {
              $name = $user['name'];
              $id = $user['id'];
              $new_user = new User($name, $id);
              array_push($users, $new_user);
          }
          return $users;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM users;");
        }

        static function find($search_id)
        {
            $found_user = null;
            $users = User::getAll();
            foreach($users as $user){
                $user_id = $user->getId();
                if($user_id = $search_id)
                {
                    $found_user = $user;
                }
            }
            return $found_user;
        }

        function update ($new_name)
        {
            $GLOBALS['DB']->exec("UPDATE users SET name = '{$new_name}' WHERE id = {$this->getId()};");
            $this->setName($new_name);
        }

        function delete()
        {
            $GLOBALS['DB']->exec("DELETE FROM users WHERE id = {$this->getId()};");
        }

        function addClub($new_club)
        {
            $GLOBALS['DB']->exec("INSERT INTO users_clubs (club_id, user_id) VALUES ({$new_club->getId()}, {$this->getId()});");
        }

        function getClubs()
        {
            $returned_clubs = $GLOBALS['DB']->query("SELECT clubs.* FROM clubs
            JOIN users_clubs ON (users_clubs.user_id = users.id)
            JOIN clubs ON (clubs.id = users_clubs.club_id)
            WHERE users.id = {$this->getId()};");
            $clubs = array();
            foreach ($returned_clubs as $club)
            {
                $id = $club['id'];
                $name = $club['name'];
                $new_club = new Club($name,$id);
                array_push($clubs, $new_club);
            }
            return $clubs;
        }
    }
?>
