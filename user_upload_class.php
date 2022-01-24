<?php

require 'vendor/autoload.php';

require "src/myclass.php";



 $filename = "uploads/users.csv";
// $filename = "example.txt";

  $fh = (fopen($filename, 'r'));

    if($fh == false) {
        echo ("Error in reading file");
        exit();
      } else {
              
            // $obj = new Acme\Zebra("127.0.0.1","root","root");

            // $obj = new Acme\Zebra("127.0.0.1",'$username','$password');

            echo "\n enter database name:\n";
            $handle = fopen("php://stdin","r"); //input stream         
            $db = fgets($handle);



            echo "\n enter user name:\n";
            $handle = fopen("php://stdin","r"); //input stream         
            $username1 = fgets($handle);



            // echo "\n enter password:\n";
            // $handle = fopen("php://stdin","r"); //input stream         
            // $password1 = fgets($handle);



            $obj = new Acme\Zebra("127.0.0.1",$username1,'root');
          
            $obj->createdb($db); /// check why db is not 

 
            $obj->conndb($db);
            // $obj = new Acme\Zebra("127.0.0.1","root","root");
            // mysqli_connect("127.0.0.1",$username1,$password1);

            $obj->createtable($db);
            
            echo "\n Would you like to insert data: press 'y' for yes and 'n' for no;\n";        
            $handle2 = fopen("php://stdin","r"); //input stream     
            $userinput2 = fgets($handle2);


            

            do {

                while (($data = fgetcsv($fh)) !== FALSE) 
                {
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
                        

                          
                            
                           
                         $this->con = $con;   
                          
                      
                          $email =  strtolower($email);
        
                          $qins = "INSERT INTO users(FirstName,LastName,Email) VALUES ('$first_name','$surname', '$email')";       
          
                          if(mysqli_query($this->con,$qins)){
                            echo "Data inserted in the table";
                            echo "</br>";
                          } else {
                            echo "Error creating table: " . mysqli_error($con);
                            echo "</br>";
                        
                          }
                      }   
                }  
                  
            }while($userinput = "y");
      }

  fclose($fh);
?>