<?php

namespace Models;

class Video extends File
{
    function __construct($url) {
        $this->url = $url;
    }

    public function downloadAsMp3() {
        // TODO: Implement downloadAsMp3() method.

    }

    public function downloadAsVideo() {
        // TODO: Implement downloadAsVideo() method.
    }

}