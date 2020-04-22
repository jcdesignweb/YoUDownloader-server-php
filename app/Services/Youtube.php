<?php


namespace Services;


class Youtube {

    public function getFileInfo($url) {
        $youtube = "http://www.youtube.com/oembed?url=". $url ."&format=json";

        $curl = curl_init($youtube);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($curl);
        curl_close($curl);

        //die(print_r(json_decode($return, false)));

        return json_decode($response, true);

    }
}