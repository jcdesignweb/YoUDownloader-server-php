<?php

namespace Models;

use Noodlehaus\Config;

abstract class File
{
    public $url;
    public $output;

    public abstract function downloadAsMp3();
    public abstract function downloadAsVideo();

    protected function getFilesPath() {
        $config = new Config('config.json');
        return $config["outputDir"];
    }
}