<!doctype html>
<!-- This file contains the admin panel -->
<!-- It will be included by index.php -->
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <?php m9::addframework('jQuery'); ?>
        <?php m9::addframework('Bootstrap'); ?>
        <?php m9::addframework('TinyMCE'); ?>
        <link rel="stylesheet" href="styles.css" />
        <script type="text/javascript" src="scripts.js"></script>
        <link rel="shortcut icon" href="/M9/favicon.ico" type="image/x-icon">
        <link rel="icon" href="/M9/favicon.ico" type="image/x-icon">
        <title>M9 Admin Panel</title>
    </head>
    <body onload="Core.load();">
        <div class="view" id="intro">
            <img src="Resources/Images/M9v2.svg" alt="M9" class="logo" />
        </div>
        <div id="content">
            <div class="nav">
                <a class="btn btn-info back" id="Back" onclick="Interface.popPanel();"><span class="glyphicon glyphicon-chevron-left"></span> Back</a>
                <input type="button" value="Logout" class="btn btn-warning" onclick="window.location = '/M9/Logout.php'" />
                <img alt="Profile Pic" src="http://www.gravatar.com/avatar/<?php echo user::getGravatar(); ?>?s=400" class="profilepic img-circle" />
            </div>
            <!--<img src="/M9/Resources/Images/dbzbadge.svg" alt="Designed by DBZ Technology" class="dbzbadge" />-->
            <h1 class="lead notice">Welcome to the M9 content managment system by <a href="http://dbztech.com" style="color: rgb(40, 182, 44);" target="_blank">DBZ Technology</a></h1>
            <?php
                cards::adminPanel();
            ?>
            <script>
              jQuery(".filltext").fitText();
            </script>
        </div>
        <script src="validate.js"></script>
    </body>
</html>