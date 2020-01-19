<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Project;

use App\Contracts\InterfaceConnection;

/**
 * Description of Insert
 *
 * @author Esveraldo
 */
class Insert {

    private $connection;
    private $specialty_id;
    private $professional_id;
    private $name;
    private $cpf;
    private $source_id;
    private $birthdate;
    private $dateTime;
    
    public function getSpecialty_id() {
        return $this->specialty_id;
    }

    public function getProfessional_id() {
        return $this->professional_id;
    }

    public function getName() {
        return $this->name;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function getSource_id() {
        return $this->source_id;
    }

    public function getBirthdate() {
        return $this->birthdate;
    }

    public function getDateTime() {
        return $this->dateTime;
    }

    public function setSpecialty_id($specialty_id) {
        $this->specialty_id = $specialty_id;
        return $this;
    }

    public function setProfessional_id($professional_id) {
        $this->professional_id = $professional_id;
        return $this;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
        return $this;
    }

    public function setSource_id($source_id) {
        $this->source_id = $source_id;
        return $this;
    }

    public function setBirthdate($birthdate) {
        $this->birthdate = $birthdate;
        return $this;
    }

    public function setDateTime($dateTime) {
        $this->dateTime = $dateTime;
        return $this;
    }
    
    public function __construct(InterfaceConnection $conn) {
        $this->connection = $conn->getConnection();
    }
    
    public function insert()
	{
		try{
			$stmt = $this->connection->prepare("INSERT INTO clients( 
                             specialty_id, professional_id, name, cpf, source_id, birthdate, date_time
                                 ) 
                            VALUES(?,?,?,?,?,?,?) ");
                        $stmt->bindValue(1, $this->getSpecialty_id());
                        $stmt->bindValue(2, $this->getProfessional_id());
                        $stmt->bindValue(3, $this->getName());
                        $stmt->bindValue(4, $this->getCpf());
                        $stmt->bindValue(5, $this->getSource_id());
                        $stmt->bindValue(6, $this->getBirthdate());
                        $stmt->bindValue(7, $this->getDateTime());
			$stmt->execute();
			if($stmt->rowCount() > 0){			
                                return true;
			}else{
				return false;
			}
		}catch(\PDOException $e){
			echo 'Erro: ' . $e->getMessage();
		}
	}
}
