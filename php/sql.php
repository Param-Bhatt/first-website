<?php
$datasource="mysql:host=localhost;dbname=db1";
$username="root";
$password="param2000";
//should be connected with database

try{
    $db=new PDo($datasource,$username,$password);
    echo    "Yay! connected";
}
catch(PDOException $e){
    $error=$e->getMessage();
    echo $error;
    exit();
    
}
?>