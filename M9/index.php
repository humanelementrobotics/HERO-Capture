<?php
include('M9.php');

$login = false;

if (count($_POST) > 0) {
    $userdata = database::select("SELECT * FROM  `users` WHERE  `username` =  '".$_POST['username']."'");
    $userdata = $userdata[0];
    #If login data is recieved
    if (filter::username($_POST['username']) == $userdata['username'] && hash('sha256', filter::password($_POST['password'])) == $userdata['password'] && $userdata != '') {
        setcookie("username", $_POST['username']);
        #Replace with randhash
        setcookie("password", hash('sha256', $_POST['password']));
        header('Location: /M9/');
        $login = true;
    } else {
        echo "Password invalid";
        $login = false;
    }
}

if (count($_COOKIE) > 0) {
    $userdata = database::select("SELECT * FROM  `users` WHERE  `username` =  '".$_COOKIE['username']."'");
    $userdata = $userdata[0];
    #If the user has cookies, this is very likely
    #Replace with randhash
    if (filter::username($_COOKIE['username']) == $userdata['username'] && filter::password($_COOKIE['password']) == $userdata['password'] && $userdata != '') {
        $login = true;
    } else {
        $login = false;
    }
}

if ($login) {
    include('Admin.php');
} else {
    include('Login.php');
}

?>