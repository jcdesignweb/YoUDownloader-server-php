<?php

namespace Models;

include_once("./app/Services/Command.php");
include_once("File.php");


use Services\Command;


class Audio extends File {

    function __construct($url) {
        $this->url = $url;
    }

    public function downloadAsMp3()
    {
        // TODO: Implement downloadAsMp3() method.
        $url = explode('?v=', $this->url);

        if($vId = $url[1]) {

            if (strpos($vId, '&') !== false) {
                $parseVid = explode('&', $vId);
                $vId = $parseVid[0];
            }

            $filename = $this->getFilesPath() .'/'. $vId . '.mp3';

            //die(print_r($this->getFileInfo($this->url)));
            return Command::ytDownload($this->url, $filename);
        } else {
            throw new \Exception("url wrong");
        }

    }

    public function downloadAsVideo()
    {
        // TODO: Implement downloadAsVideo() method.
    }
}
