<?php

class connect
{
   public $db_found;
   public function __construct()
   {
       $this->db_found=mysqli_connect("localhost","root","1234","student");
   }
}

?>