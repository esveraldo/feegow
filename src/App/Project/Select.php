<?php 

namespace App\Project;

use App\Contracts\InterfaceConnection;

/**
 * Description of Select
 *
 * @author Esveraldo
 */

class Select
{
	private $connection;
        private $id;
        
        function getId() {
            return $this->id;
        }

        function setId($id) {
            $this->id = $id;
        }

	public function __construct(InterfaceConnection $conn)
	{
		$this->connection = $conn->getConnection();
	}
        
        public function select()
	{
		try{
			$stmt = $this->connection->query("SELECT * FROM clients ORDER BY id DESC");
			$stmt->execute();
			if($stmt->rowCount() > 0){
				return $stmt->fetchAll(\PDO::FETCH_ASSOC);
			}else{
				return false;
			}
		}catch(\PDOException $e){
			echo 'Erro: ' . $e->getMessage();
		}
	}

	public function selectOne()
	{
		try{
			$stmt = $this->connection->prepare("SELECT * FROM clients WHERE id = :id");
                        $stmt->bindValue(":id", $this->getId());
			$stmt->execute();
			if($stmt->rowCount() > 0){
				return $stmt->fetch();
			}else{
				return false;
			}
		}catch(\PDOException $e){
			echo 'Erro: ' . $e->getMessage();
		}
	}
        
}