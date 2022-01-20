<!--



1. Script Task

Create a PHP script, that is executed from the command line, which accepts a CSV file
 as input (see command line directives below) and processes the CSV file. The parsed file
  data is to be inserted into a MySQL database. A CSV file is provided as part of this task 
  that contains test data, the script must be able to process this file appropriately.



The PHP script will need to correctly handle the following criteria:
• CSV file will contain user data and have three columns: name, surname, email (see table 
definition below)
• CSV file will have an arbitrary list of users
• Script will iterate through the CSV rows and insert each record into a dedicated MySQL
database into the table “users”
• The users database table will need to be created/rebuilt as part of the PHP script. 
This will be defined as a Command Line directive below
• Name and surname field should be set to be capitalised e.g. from “john” to “John” before 
being inserted into DB
• Emails need to be set to be lower case before being inserted into DB
• The script should validate the email address before inserting, to make sure that it is 
valid (valid means that it is a legal email format, e.g. “xxxx@asdf@asdf” is not a legal format). 
In case that an email is invalid, no insert should be made to database and an error message should 
be reported to STDOUT.
We are looking for a script that is robust and gracefully handles errors/exceptions.
The PHP script command line argument definition is outlined in 1.4 Script Command Line Directives . 
However, user documentation will be looked upon favourably.


1.1 Source Control
The code for the test is to be managed using “git” as the Version Control System, with the 
repository made available via online repository: GitHub (github.com), bitbucket (bitbucket.org) etc.
 This will be how the sample code is to be delivered to Catalyst at the completion of development.
A repository with only one commit is not acceptable. Showing the development process is just as 
important as the task itself.


1.2 Assumptions
• The deliverable will be a running PHP script – it will be executed on an Ubuntu 20.04 instance
• PHP version is: 7.4.x (or higher)
• Catalyst would like to see your development process history in git – not just a completed
 script
• There may be some libraries that need to be installed via apt-get, pear or composer. This 
is fine but these dependencies should be outlined in provided install documentation

    
• MySQL database server is already installed and is version 8.0 (higher versions are fine, 
as is MariaDB 10.x) – DB user details should be configurable
• PHP script will be called – user_upload.php
• CSV file will be called users.csv and is provided with this document.
If there are any unclear details here, you are welcome to make assumptions as long as they 
are clearly stated and documented as part of the deliverables.


1.3 User Table Definition
The MySQL table should contain at least these fields:
• name
• surname
• email (email should be set to a UNIQUE index).


1.4 Script Command Line Directives
The PHP script should include these command line options (directives):
• --file [csv file name] – this is the name of the CSV to be parsed
• --create_table – this will cause the MySQL users table to be built (and no further
• action will be taken)
• --dry_run – this will be used with the --file directive in case we want to run the script but 
not insert into the DB. All other functions will be executed, but the database won't be altered
• -u – MySQL username
• -p – MySQL password
• -h – MySQL host
• --help – which will output the above list of directives with details.

1.5 Questions
The aim of this task is to test both your development skills as well as simulate a real world 
project task. Guidance can be sought regarding the requirements and deliverables of this task. 
Questions on “how to do it” won't be accepted.
  


https://github.com/realpratik/PHP_task-1and2.git


-->


    <!-- // $filename = 'users.csv';
    // $data = [];

    // // open the file
    // $f = fopen($filename, 'r');

    // if ($f === false) {
    //   die('Cannot open the file ' . $filename);
    // }

    // // read each line in CSV file at a time
    // while (($row = fgetcsv($f)) !== false) {
    //   $data[] = $row;
    // }

    // // close the file
    // // fclose($f); -->
 
    <form action="" method="post" enctype="multipart/form-data">
              Upload File:
              <input type="file" name="f1">
              <br><br>
              <input type="submit" name="submit">
          </form>


  <?php

$csv = '/Users/Project2021/Sites/CSVPHP/uploads/users.csv';


$fh = fopen($csv, 'r');
if($_POST){
if ($fh === false) {
       die('Cannot open the file ' . $csv);
} else {      
  while(($row = fgetcsv($fh)) !== false) {
          $data[] = $row;
          $first_name = $row['0'];
          $surname = $row['1'];
          $email = $row['2'];

      } 











                      
                  $DB_HOST = "localhost";
                  $DB_USER = "root";
                  $DB_PASSWORD = "root";
                  $DB_DB = "";
                  

                  $con = mysqli_connect($DB_HOST,$DB_USER,$DB_PASSWORD,$DB_DB);
                  $qdb =  "CREATE DATABASE nayak";

                  if(mysqli_query($con,$qdb)){
                    echo "db created"; 
                  } else {
                    echo "Error creating database: " . mysqli_error($con) . "<br>";

                  }

                  mysqli_select_db($con,"nayak");

                  // Check connection
                  if (!$con) {
                      die("Connection failed: " . mysqli_connect_error());
                  }    

                  $qtd =   "CREATE TABLE users(
                        UserId int,
                        FirstName varchar(255) ,
                        LastName varchar(255),
                        Email varchar(255)
                        )";

                  if(mysqli_query($con,$qtd)){
                      echo "tables created now";
                  } else {
                    echo "Error creating table: " . mysqli_error($con). "<br>";

                  }
                    
                    
                  

                  

                  
                    //   $qins =  "INSERT INTO users(firstname,surname,email) VALUE ('$first_name','$surname', '$email')";
                  
                        

                  

                    // // while(list($first_name,$surname, $email) = fgetcsv($fh)){
                    // //   //   printf("<p>%s, %s, %s</p>", $first_name,$surname,$email);
                    // //   // }


                    

                

                  $csv = '/Users/Project2021/Sites/CSVPHP/uploads/users.csv';


                  $fh = fopen($csv, 'r');

                  if ($fh === false) {
                        die('Cannot open the file ' . $csv);
                  } else {      
                    while(($row = fgetcsv($fh)) !== false) {
                            $data[] = $row;
                            $first_name = $row['0'];
                            $surname = $row['1'];
                            $email = $row['2'];
                  
                        } 

                }



            while (($row = fgetcsv($fh)) !== false) {
                $data[] = $row;
                print $data['name'];
            }
    }

}