<?php
class Club
{
 private $name;
 private $id;
 private $review;

  function __construct ($name, $id = null, $review)
  {
    $this->name = $name;
    $this->id = $id;
    $this->review = $review;
  }

  function setName($new_name)
  {
   $this->name = (string)$new_name;
  }

  function getName()
  {
    return $this->name;
  }

  function getId()
  {
    return $this->id;
  }

  function setReview()
  {
    $this->review = (string)$new_name;
  }

  function getReview()
  {
      return $this->$review;
  }

}


 ?>
