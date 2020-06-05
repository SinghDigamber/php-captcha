<?php
    session_start();
    
    if(!empty($_POST["send"])) {
      $name = $_POST["name"];
      $email = $_POST["email"];
      $captcha = $_POST["captcha"];

      $captchaUser = filter_var($_POST["captcha"], FILTER_SANITIZE_STRING);

      if(empty($captcha)) {
        $captchaError = array(
          "status" => "alert-danger",
          "message" => "Please enter the captcha."
        );
      }
      else if($_SESSION['CAPTCHA_CODE'] == $captchaUser){
        $captchaError = array(
          "status" => "alert-success",
          "message" => "Your form has been submitted successfuly."
        );
      } else {
        $captchaError = array(
          "status" => "alert-danger",
          "message" => "Captcha is invalid."
        );
      }
    }  
?>