<?php

    session_start();

    include('users.inc');

    if(isset($_GET['mail'])) {

        $mail = $_GET['mail'];
        $userInd = getUsers($mail);

        $password = uniqid();
        $_SESSION['password'] = $password;

        if($userInd){
            
            $password = uniqid();
            $_SESSION['password'] = $password;

            $to = $mail;
            $subject = "Avengers";
            $txt = $password;
            if(mail($to,$subject,$txt)){
                echo "ok";
            }else{
                echo "err";
            }
        }else{
            echo "no";
        }
    }

    if(isset($_GET['password'])){
        $inputPassword = $_GET['password'];
        if($inputPassword == $_SESSION['password']){
            $cookie_name = "avengers";
            $cookie_value = $inputPassword;
            setcookie($cookie_name, $cookie_value, time() + (86400 * 7), "/");
            echo "ok";
        }else{
            echo "err";
        }
    }
    
?>