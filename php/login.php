<?php

    session_start();

    include('users.inc');

    if(isset($_GET['mail'])) {

        $mail = $_GET['mail'];
        $userInd = getUsers($mail);

        $password = uniqid();
        $_SESSION['password'] = $password;

        if($userInd){
            
            if($mail == "digitalna.skola"){
                $password = "d1g1t4lnask0l4";
                $_SESSION['password'] = $password;
                echo "ok";
            }else{
                $password = uniqid();
                $_SESSION['password'] = $password;
                $to = $mail;
                $subject = "Avengers kviz";
                $txt = $password;
                if(mail($to,$subject,$txt)){
                    echo "ok";
                }else{
                    echo "err";
                }
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