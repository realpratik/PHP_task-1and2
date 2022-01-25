<?php
      for($i=1;$i<=100;$i++){
        if($i%3==0 && $i%5==0){
          echo "foobar";
          echo ",";
        } else if($i%5==0) {
          echo "bar";
          echo ",";
        } else if($i%3==0) {
          echo "foo";
          echo ",";
        } else {
          echo $i;
          // $i++;
          echo ",";
        }
      }

