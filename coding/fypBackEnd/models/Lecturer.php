<?php
class Lecturer{
  public $lecturerID, $lecturerName, $lecturerEmail, $lecturerPassword;

  public function getId(){
    return $this->lecturerID;
  }

  public function getName(){
    return $this->lecturerName;
  }
  public function getEmail(){
    return $this->email;
  }
  public function getPass(){
    return $this->password;
  }

}

?>
