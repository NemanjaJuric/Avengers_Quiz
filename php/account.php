<?php

    include('passwords.inc');

    $password = getPasswords();

    $inputPassword = $_GET['password'];

    if($inputPassword == $password){
        $cookie_name = "avengers";
        $cookie_value = $inputPassword;
        setcookie($cookie_name, $cookie_value, time() + (86400 * 1), "/");
        echo "ok";
    }else{
        echo "err";
    }

?>