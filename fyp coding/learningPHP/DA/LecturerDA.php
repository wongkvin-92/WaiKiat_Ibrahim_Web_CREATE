<?php

  class LecturerDA {
    private $con;
    public function __construct($con){
      if($con == null)
        throw new \Exception("LecturerDA: No connection received");
      $this->con = $con;
    }

    //returns the user by email
    function fetchLecturerById($id){
      $result = $this->con->query("SELECT * FROM lecturer WHERE lecturerID='$id'");

      return $result->fetch_object('Lecturer');
    }

  }

 ?>