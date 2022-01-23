<?php

require 'vendor/autoload.php';

include "src/myclass.php";

?>

<form action="" method="post" enctype="multipart/form-data">
    Upload File:
    <input type="file" name="f1">
    <br><br>
    <input type="submit" name="submit">
</form>

<?php

if($_POST){
      $obj = new Acme\Zebra("localhost","root","root");
      $db = "cow"; //change db name here
    
      $obj->createdb($db);
      $obj->conndb($db);
      $obj->createtable();

      $file_name = $_FILES['f1']['name'];
      $file_tmp = $_FILES['f1']['tmp_name'];
      $dir = "uploads/";
      $merge = $dir.$file_name; 
      move_uploaded_file($file_tmp, $merge);
  
      $fh = fopen($merge, 'r');
      fgetcsv($fh);
  
      if ($fh !== FALSE) {
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

                  $obj = new Acme\Zebra("localhost","root","root");
                  $obj->conndb($db);

                  $obj->insertdata($first_name,$surname,$email);

              }
          }           
      }
  fclose($fh);
}


?>