<?php
    function getPath(){
        $path_server = $_SERVER['HTTP_HOST'];
        $path_folders = explode('/', $_SERVER['PHP_SELF']);
        $path_folders_number = count($path_folders);
        if($path_folders_number > 0){
            array_pop($path_folders);
            $path = 'http://' . $path_server;
            foreach ($path_folders as $folder){
                $path .= $folder . '/';
            }
            return $path;
        }
        return $path_server;
    }


?>