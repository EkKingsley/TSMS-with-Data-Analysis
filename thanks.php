<?php

#$pw = "admin";
#$encd_pw = md5($pw);

#echo "original string :" . $pw . "<br>";
#echo "encrypted string :" . $encd_pw . "(" . strlen($encd_pw) . ")" . "<br>";
echo date("h:i:s");

#$n = "admin1";
#if(md5($n)===$encd_pw){
#    echo "password match \n";
#}else{
#    echo "password unmatch \n";
#}

if(isset($_POST['submit'])){

echo "<br>" . $_POST['date'];
          }



?>
<form action="" method="post">
    <input type="date" name="date"><br>
    <input type="submit" name="submit">
</form>