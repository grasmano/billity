<?php
/**
 * Created by PhpStorm.
 * User: Oleg
 * Date: 23.07.2022
 * Time: 00:22
 * // */

class ClearSkyEvent
{
    public function getClearSkyEvents($town)
    {
        $response = file_get_contents('https://api.openweathermap.org/data/2.5/forecast?q=' . $town . '&appid=f63a322a0db5dbdc7af8118b77ad7797&cnt=40');
        return json_decode($response);
    }
}