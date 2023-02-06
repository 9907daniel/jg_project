<?php
try{
    $pdo = new PDO('mysql:host=localhost;dbname=project_db','root','');
}catch(PDOException $f){
    echo $f -> getmessage();
}
?>
