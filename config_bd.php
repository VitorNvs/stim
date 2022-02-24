<?php
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "stim";

$link = mysqli_connect($host,$usuario,$senha);
if(!$link){
    echo mysqli_connect_error();
    die();
}

if(!mysqli_select_db($link, $banco))
{
    echo mysqli_error($link);
    mysqli_close($link);
    die();
}