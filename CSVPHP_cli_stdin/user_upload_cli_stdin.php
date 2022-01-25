<?php          
  // echo "\n enter database name:\n";
  // $handle = fopen("php://stdin","r"); //input stream         
  // $db = fgets($handle);

  // echo "\n enter user name:\n";
  // $handle = fopen("php://stdin","r"); //input stream         
  // $username1 = fgets($handle);

  // echo "\n enter password:\n";
  // $handle = fopen("php://stdin","r"); //input stream         
  // $password1 = fgets($handle);


  require 'vendor/autoload.php';
  
  require "src/myclass_stdin.php";
  
    $filename = "uploads/users.csv";
  
    $fh = fopen($filename, 'r');

    // $db1 = "ganagubhai";
  
    if ($fh == FALSE) {
        echo "error reading file";
        exit();
    } else {
       

        // echo "\n enter database name:\n";
        // $handle = fopen("php://stdin","r"); //input stream         
        // $db = trim(fgets($handle));

        //$db = "yourdbname23"; //change db name here
        $obj = new Acme\Zebra2("127.0.0.1","root","root","chameli");
        // $obj->createdb($db);
     
        //  $obj->conndb($db);
  
        // Check connection
        // if (!$obj) {
        //     die("Connection failed: " . mysqli_connect_error());
        // }
        // echo 'Connected successfully';
        
        // mysqli_close($conn);

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
              