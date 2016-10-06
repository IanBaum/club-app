<?php

class Club

  {
     private $name;
     private $id;
     private $review;

      function __construct ($clubName, $clubId = null, $clubReview)
      {
        $this->name = $clubName;
        $this->id = $clubId;
        $this->review = $clubReview;
      }

      function setName($new_name)
      {
       $this->clubName = (string)$new_name;
      }

      function getName()
      {
        return $this->clubName;
      }

      function getId()
      {
        return $this->clubId;
      }

      function setReview()
      {
        $this->clubReview = (string)$new_name;
      }

      function getReview()
      {
          return $this->$clubReview;
      }

      function addClient()
      {
        $GLOBALS['DB']->exec("INSERT INTO club_clients (club_id, id) VALUES ({$this->getId()}, {$new_client->getId()});");
      }

      function getClients()
      {
        $returned_clients = $GLOBALS['DB']->query("SELECT clients.* FROM clubs
        JOIN club_clients ON(club_clients.club_id = clubs.id)
        JOIN students ON (clients.id = club_clients.client_id)
        WHERE clubs.id = {$this->getId()};");
        $clubs = array();
        foreach ($returned_clients as $user)
        {
          $name = $user['name'];
          $id = $user['id'];
          $new_user = new User($name, $id);
          array_push($clubs, $new_user);

        }
        return $clubs;
      }

      static function getAll()
      {
        $returned_clubs = $GLOBALS['DB']->query("SELECT * FROM clubs;");
        $clubs = array();
        foreach($returned_clubs as $club)
        {
          $clubName = $club['name'];
          $clubId = $club['id'];
          $clubReview = $club['review'];
          $new_club = new Club($clubName, $clubId, $clubReview)
          array_push($clubs, $new_club);
        }
        return $clubs;
      }

      static function deleteAll()
      {
        $GLOBALS['DB']->exec("DELETE FROM clubs;");
      }

      static function delete()
      {
        $GLOBALS['DB']->exec("DELETE FROM clubs WHERE id = {this->getId()};");
      }

      static function find($search_id)
      {
        $found_club = null;
        $clubs = Club::getAll();
        foreach ($clubs as $club)
        {
          $clubId = $club['id'];
          if ($clubId = $search_id)
          {
            $found_club = $club;
          }
        }
        return $found_club;
      }

      function update($new_name)
      {
        $GLOBALS['DB']->exec("UPDATE clubs SET name = '{$new_name}') WHERE id = {$this->getId()};");
        $this->setName($new_name);
      }

      function deleteClient($client_id)
      {
        $GLOBALS['DB']->exec("DELETE FROM club_clients WHERE club_id = {this->getId()} AND user_id = user_id;");
      }


  }


 ?>
