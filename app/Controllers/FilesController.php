<?php
namespace Controllers;

include_once("./app/Models/Audio.php");
include_once("./app/Models/Video.php");

include_once("./app/Services/Youtube.php");

use Models\Video;
use Models\Audio;
use Noodlehaus\Config;
use Services\Youtube;

class FilesController {
    private $youtube;

    public function __construct() {
        $this->youtube = new Youtube();
    }

    private function makeFileYoutube($vId, $file=false) {
        $fileYoutube = $this->youtube->getFileInfo("https://www.youtube.com/watch?v=$vId");
        $fileYoutube['id'] = $vId;

        $fileYoutube['filename'] = (empty($file))? $vId . ".mp3" : $file;

        return $fileYoutube;
    }

    function getList() {
        $files = [];
        $config = new Config('config.json');

        $ffs = scandir($config["outputDir"]);

        if (($key = array_search('..', $ffs)) !== false) {
            unset($ffs[$key]);
        }

        if (($key = array_search('.', $ffs)) !== false) {
            unset($ffs[$key]);
        }

        foreach ($ffs as $file) {
            $fileWExt  = explode('.', $file);

            $files[] = $this->makeFileYoutube($fileWExt[0], $file);
        }


        echo json_encode($files);
    }

    /**
     *
     */
    function downloadAsMp3() {
        $url = $_POST["url"];

        $audio = new Audio($url);
        try {
            if($audio->downloadAsMp3()) {

                $parseUrl = parse_url($url, PHP_URL_QUERY);
                parse_str($parseUrl, $query_params);

                echo json_encode(["status" => "success", "data" => $this->makeFileYoutube($query_params['v'])]);
            }
        } catch(\Exception $exception) {
            die('Error Controller exception');
        }
    }
}
