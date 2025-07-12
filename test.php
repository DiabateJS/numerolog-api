<?php

include "util.class.php";

function testGetCharCode(){
    //return value between 1 and 9
    echo "Return value between 1 and 9 => ";
    $test1 = Util::getCharCode('A');
    if ($test1 > 0 and $test1 < 10){
      echo "OK";
    }else{
      echo "KO";
    }
    echo "<br>";
    echo "A return 1 , K return 2 , U return 3 and R return 9 => ";
    $test2 = Util::getCharCode('A') == 1 and Util::getCharCode('K') == 2 and Util::getCharCode('U') == 3 and Util::getCharCode('R') == 9;
    //AJS -> 1
    //BKT -> 2
    //CLU -> 3
    //DMV -> 4
    //ENW -> 5
    //FOX -> 6
    //GPY -> 7
    //HQZ -> 8
    //IR -> 9 
    if ($test2){
        echo "OK";
    }else{
        echo "KO";
    }
    echo "<br>";
}

testGetCharCode();