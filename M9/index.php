<?php
include('M9.php');

$login = false;

if (count($_POST) > 0) {
    $username = filter::username($_POST['username']);
    $password = filter::password($_POST['password']);
    $userdata = database::select("SELECT * FROM  `users` WHERE  `username` =  '".$username."'");
    $userdata = $userdata[0];
    #If login data is recieved
    if ($username == $userdata['username'] && hash('sha256', $password) == $userdata['password'] && $userdata != '') {
        setcookie("username", $username, time()+10000, "/");
        $random = hash('sha256', rand());
        database::insert("UPDATE  `m9`.`users` SET  `clientid` =  '".$random."' WHERE  `users`.`id` = ".$userdata['id']);
        setcookie("clientid", $random, time()+10000, "/");
        header('Location: /M9/');
        $login = true;
    } else {
        echo "Password invalid";
        $login = false;
    }
}

if (count($_COOKIE) > 0) {
    $username = filter::username($_COOKIE['username']);
    $userdata = database::select("SELECT * FROM  `users` WHERE  `username` =  '".$username."'");
    $userdata = $userdata[0];
    #If the user has cookies, this is very likely
    if ($username == $userdata['username'] && filter::password($_COOKIE['clientid']) == $userdata['clientid'] && $userdata != '') {
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