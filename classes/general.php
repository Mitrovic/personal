<?php 
class General{
    #Check if the user is logged in.
    public function logged_in () {
        return(isset($_SESSION['id'])) ? true : false;
    }
  
    #if logged in then redirect to members.php
    public function logged_in_protect() {
        if ($this->logged_in() === true) {
            header('Location: members.php');
            exit();     
        }
    }
     
    #if not logged in then redirect to login.php
    public function logged_out_protect() {
        if ($this->logged_in() === false) {
            header('Location: login.php');
            exit();
        }   
    }
}