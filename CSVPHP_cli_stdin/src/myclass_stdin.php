<?php

namespace Acme;

class Zebra2 {
  public $host;
  public $username;
  public $password;
  public $db;
  public $con;

   function __construct($host,$username,$password,$db){
    $this->host = $host;
    $this->username = $username;
    $this->password = $password;
    $this->db = $db;

    $this->con = mysqli_connect($this->host,$this->username,$this->password,$this->db);
  }

      function createdb($db){    
          $qdb =  "CREATE DATABASE $db";

          if(mysqli_query($this->con,$qdb)){
            echo "db created" . "</br>"; 
          } else {
            echo "Error creating database: " . mysqli_error($this->con) . "<br>";
          }
      }

      function conndb($db){
        mysqli_select_db($this->con,$db);
      }

      function createtable(){
          $qtd =   " CREATE TABLE users (
                id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                FirstName varchar(255) NOT NULL,
                LastName varchar(255) NOT NULL,
                Email varchar(255) NOT NULL
                )";

          if(mysqli_query($this->con,$qtd)){
              echo "table created" ."</br>";
          } else {
              echo "error creating table" . mysqli_error($this->con) ."</br";

          }
      }

      function insertdata($first_name1,$surname1,$email1){
        $qins = "INSERT INTO users(FirstName,LastName,Email) VALUES ('$first_name1','$surname1', '$email1')";

            if(mysqli_query($this->con,$qins)){
              echo "Data inserted in the table";
              echo "</br>";
            } else {
              echo "Error creating table: " . mysqli_error($this->con);
              echo "</br>";
            }
      }

  }
