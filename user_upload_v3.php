#!/usr/bin/env php

<?php

 $filename = "uploads/users.csv";
// $filename = "example.txt";

  $fh = (fopen($filename, 'r'));

        if($fh == false) {
            echo ("Error in reading file");
            exit();
        }
                $DB_HOST = "127.0.0.1";
                $DB_USER = "root";
                $DB_PASSWORD = "root";
                $DB_DB = "girraf";
                
                //connection
                $con = mysqli_connect($DB_HOST,$DB_USER,$DB_PASSWORD);
                
                $qdb =  "CREATE DATABASE $DB_DB";

                mysqli_query($con,$qdb);

                mysqli_select_db($con,$DB_DB);
          
          
                $qtd =   "CREATE TABLE users(
                      id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                      FirstName varchar(255) NOT NULL,
                      LastName varchar(255) NOT NULL,
                      Email varchar(255) NOT NULL
                      )";      
                mysqli_query($con,$qtd);     
        
  
        // while (! feof ($fh))
        // {
        //    $data = fgets($fh) . "</br>";    
        //    echo $data['2'];
        //  }
        //  fclose($fh);





        

        // if ($fh !== FALSE) {
        while (($data = fgetcsv($fh, 1000, ",")) !== FALSE) {
            if (!preg_match("/^[a-zA-Z-' ]*$/",$data['0'])) {
              echo "Only letters and white space allowed" ."<br>";
            } else {
              $first_name =  ucfirst(strtolower($data['0'])); 
            }

            if (!preg_match("/^[a-zA-Z-' ]*$/",$data['1'])) {
              echo "Only letters and white space allowed";
              echo "</br>";
            } else {
              $surname =  ucfirst(strtolower($data['1']));
            }
                              
            
            $email = $data['2'];
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
              echo "Invalid email format.";
              echo "</br>";
              
            } else {
                $email =  strtolower($email);
        
                $qins = "INSERT INTO users(FirstName,LastName,Email) VALUES ('$first_name','$surname', '$email')";       

                if(mysqli_query($con,$qins)){
                  echo "Data inserted in the table";
                  echo "</br>";
                } else {
                  echo "Error creating table: " . mysqli_error($con);
                  echo "</br>";
                }
              }
        }
                
            fclose($fh);
        
   


