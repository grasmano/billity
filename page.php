<?php

function getIncludedFile($action)
{
    $page[''] = 'includes/events.php';
    $page['events'] = 'includes/events.php';
    $page['booking'] = 'includes/booking.php';
    $page['registrations'] = 'includes/registrations.php';

    return $page[$action];
}