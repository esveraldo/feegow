<?php 

namespace App\Connections;

use App\Contracts\InterfaceConnection;
use App\Config\Config;

class Base implements InterfaceConnection
{
	public function getConnection()
	{
		$connection = new \PDO(Config::DSN, Config::USER, Config::PASS);
		$connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
		return $connection;
	}
}