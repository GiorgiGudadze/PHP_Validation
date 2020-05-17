<?php
    $errors = array("username"=>"","firstname"=>"","lastname"=>"","email"=>"","password"=>"","Rpassword"=>""); 
if(isset($_POST["submit"])){
    $email = $_POST["email"];
    $userName=$_POST["username"];
    $password = $_POST["password"];
    $passwordR = $_POST["password-r"];
    if(strlen($userName)<3){
        $errors["username"]="Empty or Not Enough Characters (min 3)";
    }
    else if(!preg_match("/^[a-zA-Z]*[A-Z]+[a-zA-Z]*$/",$_POST["username"])){
        $errors["username"]="(At least one Lower and Capital letter without number)";
    }

    if(empty($_POST["name"])){
        $errors["firstname"]="Type Firstname";
    }
    if(empty($_POST["surname"])){
        $errors["lastname"]="Type Lastname";
    }
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errors["email"]="Invalid email";
    }
    if(!preg_match("/^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]+)$/",$password) || empty($_POST["password"])){
        $errors["password"]="(At least one numeric and Capital letter) Or Don't Leave Empty";
    }


    if($passwordR!=$password){
        $errors["Rpassword"]="Please Repeat";
    }

    if(!array_filter($errors)){
        header("Location:private.php");
        session_start();
        $_SESSION["userSes"]=$_POST["username"];
        $_SESSION["passwordSes"]=$_POST["password"];
    }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    input{
        width:100%;
        border:none;
        border-bottom:1px solid #9e9e9e;
        outline:none;
        background:#f5f5f5;
        color:#9e9e9e;
        font-family: fantasy;
    }
    input:focus{
       border-bottom:1px solid #26a69a;
    }
    label{
        display:block;
        margin:5px 0;
        color:#9e9e9e;
    }
    .center{
        text-align:center;
        padding:10px;
    }
    .execute{
        padding:10px;
        width: 90px;
        font-family:sans-serif;
        border:1px solid #9e9e9e;
        padding: 8px;
        transition:1s;
        cursor:pointer;
        background:#cbb09c;
        color:#fff;
    }
    .execute:hover{
        background:#bd630a;
        color:#fff;
        border:1px solid #bd630a;
    }
    section{
        margin: auto;
        max-width: 460px;
    }
    body{
        background:#f5f5f5;
    }
    .red-text{
        font-size: 10px;
        color: red;
        margin-top: 3px;
    }
    </style>
</head> 
<body>
 
<section class="container grey-text">

    <h1 style="color:#cbb09c;font-size:35px;" class="center">Registration</h1>
    <form action="GiorgiGudadze.php" method="POST">

    <label>Username:</label>
    <input type="text" name="username">
    <div class="red-text"><?php echo $errors["username"]?></div>

    <label>First Name:</label>
    <input type="text" name="name">
    <div class="red-text"><?php echo $errors["firstname"]?></div>

    <label>Last Name</label>
    <input type="text" name="surname">
    <div class="red-text"><?php echo $errors["lastname"]?></div>

    <label>Email</label>
    <input type="text" name="email">
    <div class="red-text"><?php echo $errors["email"]?></div>

    <label>Password</label>
    <input type="password" name="password">
    <div class="red-text"><?php echo $errors["password"]?></div>

    <label>Repeat Password</label>
    <input type="password" name="password-r">
    <div class="red-text"><?php echo $errors["Rpassword"]?></div>

    <div class="center">

    <input type="submit" name="submit" value="submit" class="execute">

    </div>
    </form>
</section>

</body>
</html>  
