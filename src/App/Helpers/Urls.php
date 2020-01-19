<?php

namespace App\Helpers;

class Urls {

    public function urls($url) {
        $newUrl = explode("/", $url);
        $count = count($newUrl);
        
        switch ($count) {
            case 1:
                if(file_exists($newUrl[0] . '.php')){
                    include_once $newUrl[0] . '.php';
                }else{
                    include_once '404.php';
                }
                break;
            case 2:
                if(file_exists($newUrl[0] . '/' . $newUrl[1] . '.php')){
                    include_once $newUrl[0] . '/' . $newUrl[1] . '.php';
                }else{
                    include_once '404.php';
                }
                break;
            case 3:
                if(file_exists($newUrl[0] . '/' . $newUrl[1] . '/' . $newUrl[2] . '.php')){
                    include_once $newUrl[0] . '/' . $newUrl[1] . '/' . $newUrl[2] . '.php';
                }else{
                    include_once '404.php';
                }
                break;
            default:
                include_once '404.php';
                break;
        }
    }
}
