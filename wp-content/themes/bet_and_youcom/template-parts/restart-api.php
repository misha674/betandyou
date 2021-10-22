<?php
    set_time_limit(30);

    $url = "https://part.upnp.xyz/PartLine/GetAllFeedGamesBetAndYou";

    function uploadApi($apiUrl)
    {
        $page = file_get_contents($apiUrl);
        if ($page!=""){ 
            return $page;
        } else {
            sleep(5);
            return uploadApi($apiUrl);       
        }
    }

    $page = uploadApi($url);

    file_put_contents(__DIR__ . '/API.json', $page);