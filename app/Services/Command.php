<?php

namespace Services;

class Command {

    function ytDownload($url, $outputFile) {

        $command = "youtube-dl --extract-audio -o $outputFile --newline --audio-format mp3 $url";

        $descriptorspec = array(
            0 => array("pipe", "r"),   // stdin is a pipe that the child will read from
            1 => array("pipe", "w"),   // stdout is a pipe that the child will write to
            2 => array("pipe", "w")    // stderr is a pipe that the child will write to
        );
        flush();
        $process = proc_open($command, $descriptorspec, $pipes, realpath('./'), array());
        if (is_resource($process)) {
            while ($s = fgets($pipes[1])) {

                flush();
            }
        }

        return true;
      //  var_dump($exec);
    }

}