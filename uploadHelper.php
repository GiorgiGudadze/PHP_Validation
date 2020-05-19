<?php


// აუცილებელია uploads საქაღალდის ქონა იგივე ფაილში

session_start();
class UploadHelper{

    public $status;
    public $currentFile;

    public function __construct () {

        $this->currentFile = 'uploads/' . basename($_FILES["upload"]["name"]);
        $this->status = 1;
        $this->imageFileType = $_FILES["upload"]["type"];

        if(isset($_POST["submitImg"])) {
            $check = getimagesize($_FILES["upload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $this->status = 1;

            }
             else {
                echo "File is not an image.";
                $this->status = 0;
            }
        }

    }
     public function uploadSize(){
         if ($_FILES["upload"]["size"] > 500000) {
             echo "File should not be more than 500MB";
             $status = 0;
         }
     }
     public function extension(){
         if( $_FILES["upload"]["type"] !== 'image/jpeg') {
             echo "Only JPG, JPEG, PNG & GIF";
             $status = 0;
         }
     }
    public function upload(){
        if ($this->status == 0) {
            echo "file can't be uploaded.";
        }
        else {
            if (move_uploaded_file($_FILES["upload"]["tmp_name"], $this->currentFile)) {
                $_SESSION['Actualimg'] = $this->currentFile;
                header("Location: private.php");
            }
            else {
                echo "error during uploading your file.";
            }
        }
    }
}

if(isset($_POST["submitImg"])) {
    $profile = new UploadHelper();

        $profile->uploadSize();
        $profile->extension();
        $profile->upload();
}


?>