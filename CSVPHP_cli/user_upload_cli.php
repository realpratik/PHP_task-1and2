<?php

require 'vendor/autoload.php';

require "src/myclass.php";

  $filename = "uploads/users.csv";

  $fh = fopen($filename, 'r');

  if ($fh == FALSE) {
      echo "error reading file";
      exit();
  } else {
      $obj = new Acme\Zebra("127.0.0.1","root","root");
      $db = "yourdbname23"; //change db name here
    
      $obj->createdb($db);
      $obj->conndb($db);
      $obj->createtable();
  
          while (($data = fgetcsv($fh)) !== FALSE) {
              if (!preg_match("/^[a-zA-Z-' ]*$/",$data['0'])) {
                echo "\nOnly letters and white space allowed\n";
              } else {
                $first_name =  ucfirst(strtolower($data['0'])); 
              }

              if (!preg_match("/^[a-zA-Z-' ]*$/",$data['1'])) {
                echo "\nOnly letters and white space allowed\n";    
              } else {
                $surname =  ucfirst(strtolower($data['1']));
              }
                    
              $email = $data['2'];

              if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
               echo  "\nInvalid email format.\n";      
              } else {
                  $email =  strtolower($email);
                  $obj->insertdata($first_name,$surname,$email);
              }
          }           
    }
    
fclose($fh);
            