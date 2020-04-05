<?php

$errors = array('user'=>'','passEr'=>'');

if(isset($_POST["submit"])){

    if(preg_match("/^[a-zA-Z]*[A-Z]+[a-zA-Z]*$/",$_POST["username"])){
        
    }

    else if(empty($_POST["username"]) || strlen($_POST["username"])<3){
        $errors["user"]="Empty or Not Enough Characters (min 3)";
    }

    else{
        $errors["user"]="(At least one Lower and Capital letter)";
    }

    if(preg_match("/^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]+)$/",$_POST["password"])) {
 
    }

    else if(empty($_POST["password"])){
        $errors["passEr"]="Type Password";
    }
    else if(strlen($_POST["password"])<6 || strlen($_POST["password"])>18){
        $errors["passEr"]="Characters (Min 6 - 18 Max)";
    }

    else{
        $errors["passEr"]="(At least one numeric and Capital letter)";
    }

    if(!empty($errors["user"]) || !empty($errors["passEr"])){
        
    }
    else{
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
    <link href="https://fonts.googleapis.com/css?family=Convergence&display=swap" rel="stylesheet">


    <title>Giorgi Gudadze(N2)</title>
    <style>
    *{
        margin:0;
        box-sizing:border-box;
        padding:0;
    }
    div{
        display:flex;
        justify-content:space-between;
        padding-bottom:20px;
        align-items: center;
    }
     label{
        font-family: 'Convergence', sans-serif;
        font-size:14px;
        cursor:pointer;
    } 
    input{
        height: 22px;
        padding-left:5px;
        outline:red;
        border: 1px solid;
        cursor:pointer;
    } 
    input:focus{
        border: 1px solid rgba(35, 221, 37, 0.93);
    }
    section{
        padding-top:120px;
        max-width:250px;
        margin:auto;
    }
    label:after,input:after{
        display:block;
        content:" ";
        clear:both;
    }
    input::placeholder{
        font-size:12px;
        color:#1f7971;
    }
    h1{
        text-align:center;
        padding-bottom:15px;
        font-family:'Convergence', sans-serif;
        font-weight:unset;
    }
    #sub{
        padding:0;
        border:none;
        float:right;
        display:block;
        background:#000;
        color:#fff;
        border-radius:5%;
        width:55px;
        padding:3px;
    }
    #sub:after{
        display:block;
        clear:both;
        content:" ";
    }
    .red-text{
        margin:0;
        color:red;
        font-size:10px;
    }
    .red-field{
        position:absolute;
        right:0;
        bottom:0;
        padding:0px;
        padding-bottom:5px;
        padding-right:5px;
    }
    .box{
        display:block;
        padding:0;
        position:relative;
    }
    .red-text{
        padding:0;
    }
    .registration{
        color: #ff6c62;
        text-decoration-color: #ff1100;
    }
    
    </style>
</head>

<body>

<section>

<h1>Sing In</h1>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

<div class="box">
    <div>
    <label for="user-ident">Username</label>
    <input type="text" name="username" id="user-ident" placeholder="Type Username">
    </div>

    <div class="red-field">
    <div class="red-text"><?php echo $errors['user']; ?></div>

</div>

</div>



<div class="box">

    <div>

        <label for="pass-ident">Password</label>
        <input type="password" name="password" id="pass-ident" placeholder="Insert Password">

    </div>

    <div class="red-field">
        <div class="red-text"><?php echo $errors["passEr"]; ?></div>
</div>

</div>

<input type="submit" value="Login" id="sub" name="submit">
</form>
<a class="registration" href="GiorgiGudadze.php">Registration</a>
</section>

</body>
</html>
