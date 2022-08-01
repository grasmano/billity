<?php
/**
 * Created by PhpStorm.
 * User: Oleg
 * Date: 24.07.2022
 * Time: 23:59
 */

function getAllClearSkyEvents()
{
    $townNames = ['Tallinn', 'Tartu', 'Narva', 'Pärnu', 'Jõhvi', 'Jõgeva', 'Põlva', 'Valga'];
    $sessions = ['21:00', '00:00', '03:00', '06:00'];
    $cse = new ClearSkyEvent();
    $clearSkyEvents = [];

    foreach ($townNames as $townName) {
        $events = $cse->getClearSkyEvents($townName);
        if ($events) {
            foreach ($events->list as $event) {
                $available_session = [];
                if ($event->weather[0]->id == '800' // clear sky
                    || $event->weather[0]->id == '801' // few clouds
                ) {
                    $dateTime = new DateTime($event->dt_txt);
                    $date = $dateTime->format('Y-m-d');
                    $time = $dateTime->format('H:i');
                    if (in_array($time, $sessions)) {
                        $timestamp = strtotime($time) - 60 * 60;
                        $time = date('H:i', $timestamp);
                        $available_session['townName'] = $townName;
                        $available_session['date'] = $date;
                        $available_session['time'] = $time;
                        $available_session['weather'] = $event->weather[0]->description;
                        $available_session['dt'] = $event->dt;
                        $clearSkyEvents[$available_session['dt']] = $available_session;
                    }
                }
            }
        }
    }
    return $clearSkyEvents;
}

function getRegistrations()
{
    $reg = new Registration();
    return $reg->getDbRegistrations();
}

function saveRegistration()
{
    if (isset($_POST['register_submit'])) {
        $reg = new Registration();
        if ($reg->createRegistration()) {
            return true;
        }
    }
    return false;
}

?>

