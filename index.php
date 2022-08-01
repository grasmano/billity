<?php
include "eventsController.php";
include "page.php";
include 'classes/DB.php';
include 'classes/ClearSkyEvent.php';
include 'classes/Registration.php';
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="menu">
            <a href="?page=events" class="menu-item">Events</a>
            <a href="?page=registrations" class="menu-item">list of registrations</a>
        </div>
        <div class="main">
            <?php
            if (isset($_REQUEST['page'])) {
                include getIncludedFile($_REQUEST['page']);
            } else {
                include 'includes/events.php';
            }
            ?>
        </div>
    </body>
</html>