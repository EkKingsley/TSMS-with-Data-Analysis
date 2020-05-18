<?php

function redirect_to($location){
    if($location != null){
    header("Location: {$location}");
    exit;
    }
}

function vid_parsing($vid){
    $vid = strtoupper($vid);
    $len = strlen($vid);
    $p1 = substr($vid, 0, 2);
    $p3 = substr($vid, $len-2, 2);
    $r = $len - 4;
    $p2 = substr($vid, 2, $r);
    $final = $p1 . " " . $p2 . "-" . $p3;
    return $final;
}

?>