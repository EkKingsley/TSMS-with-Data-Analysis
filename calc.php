<?php

//$vid = "gr120";
//echo $vid;
//echo "<br>" . $vid[0];

//$len = strlen($vid);
//echo "<br>" . $len;

//$p1 = substr($vid, 0, 2);
//echo "<br>" . $p1;

//$p3 = substr($vid, $len-2, 2);
//echo "<br> new" . $p3;
//$r = $len - 4;
//$p2 = substr($vid, 2, 4);
//echo "<br>" . $p2;

//echo "<br>" . ($len-4);
//echo "<br>last" . substr($vid, 2, $r);


//function vid_parsing($vid){
    //$vid = strtoupper($vid);
    //$len = strlen($vid);
    //$p1 = substr($vid, 0, 2);
    //$p3 = substr($vid, $len-2, 2);
    //$r = $len - 4;
    //$p2 = substr($vid, 2, $r);
    //$final = $p1 . " " . $p2 . "-" . $p3;
    //return $final;
//}
//$f = vid_parsing($vid);
//echo "function trial = " . $f; 
//$d = date("Y/m/d");
//echo "time " . date("h:i:s");
//echo "date time " . date("Y-m-d");
//echo "time " . time("h:i:s");
//echo date("Y-m-d h:i:s");

//Generating unique passwords for drivers
//the length we want the password
$gen_passwords = array();
$password_len = 8;

//a true or false variable to check if generated password does not exist
$unique = false;

//define possible characters
//notice that confusing characters such as 0 and O are not part
$possible_chars = "23456789abcdefghijklmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ";

//until we find a unique password keep generating new ones
while(!$unique){
    //start with blank a blank character
    $unique_password = "";
    
    //set up counter to keep track of how many characters have been added
    $i = 0;
    
    //add random characters from the possible characters until password len is reached
    while($i < $password_len){
        //pick random character from the possible characters list
        $char = substr($possible_chars, mt_rand(0, strlen($possible_chars)-1), 1);
        $unique_password .= $char;
        $i++;
    }
    //new unique password is generated
    $gen_passwords[] = $unique_password;
    echo $unique_password;
    //checking if generated password already exists in database
    //$q = "SELECT password FROM driver_info_tbl WHERE password = '$unique_password'";
    //$result = @mysqli_query($conn, $q);
    //if(mysqli_num_rows($result) == 0){
        //generated password is unique
        $unique = true;
        //$gen_passwords[] = $unique_password;
   // }
    
}


?>