<!--

. Logic Test
Create a PHP script that is executed from the command line. The script should:
• Output the numbers from 1 to 100
• Where the number is divisible by three (3) output the word “foo”
• Where the number is divisible by five (5) output the word “bar”
• Where the number is divisible by three (3) and (5) output the word “foobar”
• Only be a single PHP file

2.1 Example
An example output of the script would look like:
1, 2, foo, 4, bar, foo, 7, 8, foo, bar, 11, foo, 13, 14, foobar ...
2.2 Deliverable
The deliverable for this task is a PHP script called foobar.php. Please include this 
script in the same source control as the script test.
2.3 Questions
The aim of this task is to test your development skills. Guidance can be sought 
regarding the requirements and deliverables of this task. Questions on “how to do it” won't 
be accepted.


https://github.com/realpratik/PHP_task-1and2.git


//to execute the file on command line
php -f foobar.php



-->






<?php

for($i=1;$i<=100;$i++){
  if($i%3==0 && $i%5==0){
    echo "foobar";
    echo "</br>";
  } else if($i%5==0) {
    echo "bar";
    echo "</br>";
  } else if($i%3==0) {
    echo "foo";
    echo "</br>";
  } else {
    echo $i;
    // $i++;
    echo "</br>";
  }
}


