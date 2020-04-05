<?php 

if(isset($_POST["logout"])){

    header("Location:login.php");
    session_destroy();
}

session_start();
$name=$_SESSION["userSes"];
$password=$_SESSION["passwordSes"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Convergence&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pridi&display=swap" rel="stylesheet">

    <title><?php "$name profile" ?></title>

    <style>
    *{
        margin:0;
        padding:0;
        box-sizing:border-box;
    }
    h1{
        font-size:25px;
        padding-bottom:15px;
    }
    p{
        padding-bottom:10px;
    }
    section{
        max-width:200px;
        margin:auto;
        font-family:'Convergence', sans-serif;
        padding-top:50px;
        text-align:center;
    }
    header{
        width:100%;
        border-bottom: 2px solid #9e9e9e;
        height:50px;
        position:relative;
        background:#000;
    }
    .greeting{
        line-height:50px;
        float:right;
        font-family: 'Pridi', serif;
        padding-right:15px;
        font-size:12px;
        color:#fff;
        font-family: 'Pridi', serif;
    }
    .greeting:after{
        display:block;
        content:"";
        clear:both;
    }
    .welcome{
        line-height:50px;
        position:absolute;
        left:50%;
        transform:translateX(-50%);
        font-family: 'Pridi', serif;
        font-size:23px;
        color:#fff;
        letter-spacing:0.5px;
    }

    .logout{
    width: 55px;
    padding: 5px;
    border: none;
    background: #000;
    color: #fff;
    cursor:pointer;
    }
    .image-preview{
        max-width:170px;
        min-height:100px;
        border:2px solid #dddddd;
        margin: 20px auto;
        display:flex;
        align-items:center;
        justify-content:center;
        font-weight:bold;
        color:#cccccc;
    }
    .image-preview_image{
        display:none;
        width:100%;
    }
    </style>

</head>
<body>
    <header>
        <h2 class="welcome">Welcome</h2>
        <div class="greeting">Hello <?php echo "$name!" ?></div>
    </header>

<section>

    <h1>Your Profile Details</h1>
    <h4 style="padding-bottom:10px;">Upload Profile Picture</h4>
    <input type="file" name="inpFile" id="inpFile">
    <div class="image-preview" id="imagePreview">
    <img src="" alt="" class="image-preview_image">
    <span class="image-preview_default-text">Image Preview</span>      
    </div>
    <script>
        const inpFile = document.getElementById("inpFile");
        const previewContainer = document.getElementById("imagePreview");
        const previewImage = previewContainer.querySelector(".image-preview_image");
        const previewDefaultText = previewContainer.querySelector(".image-preview_default-text");

        inpFile.addEventListener("change",function(){
            
            const file = this.files[0];

            if (file){
                const reader = new FileReader();

                previewDefaultText.style.display = "none";
                previewImage.style.display = "block";

                reader.addEventListener("load",function(){
                    previewImage.setAttribute("src",this.result);
                });

                reader.readAsDataURL(file);
            } else{
                previewDefaultText.style.display = null;
                previewImage.style.display = null;
                previewImage.setAttribute("src","");
            }

        });

    </script>


    <p>Username-><span><?php echo "$name"; ?></span></p>
    <p>Password-><span><?php echo "$password"; ?></span></p>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <input type="submit" name="logout" value="Logout" class="logout">

    </form>
    
</section>

</body>
</html>
