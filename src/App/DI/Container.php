<?php

namespace App\DI;

use App\Helpers\Urls;
use App\Connections\Base;
use App\Project\Insert;
use App\Project\Select;
use App\Project\ReadApi;

class Container {

    public static function url() {
        $url = new Urls();
        return $url;
    }
    
    public static function conn() {
        $conn = new Base();
        return $conn;
    }
    
    public static function getInsert() {
        $insertClients = new Insert(self::conn());
        return $insertClients;
    }

    public static function getSelect() {
        $selClients = new Select(self::conn());
        return $selClients;
    }
    
    public static function getReadApi() {
        $api = new ReadApi();
        return $api;
    }
}
