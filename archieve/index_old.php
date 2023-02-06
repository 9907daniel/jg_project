<?php
include'dbconnect.php';

if(isset($_POST['btnsave'])){
    $user_name = $_POST['user_name'];
    $user_password = $_POST['user_password'];

    // echo"user_name : ".$user_id."user_password : ".$user_password;

    if(!empty($user_name && $user_password)){
        $insert = $pdo->prepare("insert into sign_up(user_name,user_password) values(:user_name, :user_password)");
        
            $insert->bindParam(':user_name', $user_name);
            $insert->bindParam(':user_password', $user_password);

            $insert->execute();

            if($insert->rowCount()){
                echo "insert success";
            }else{
                echo "insert failed";
            }   
    }else{
        echo "given username and password is empty";
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
</head>
<body>

    <form action="" method="post">
        <p><input type="text" name="user_name" placeholder="username"></p>
        <p><input type="text" name="user_password" placeholder="password"></p>
        <input type="submit" value = "Save" name = "btnsave">
    </form>






</body>
</html>