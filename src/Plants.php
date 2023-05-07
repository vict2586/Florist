<?php

require_once 'DB.php';

class Plant extends DB 
{

    /**
     * The total number of plants is saved in a private property.
     * By making it static, the calculation will be made only once
     */
    public function __construct() {

        parent::__construct();
        $sql =<<<'SQL'
            SELECT COUNT(*) AS total
            FROM plants;
        SQL;
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $stmt->fetch()['total'];
        

        $sql =<<<'SQL'
            SELECT COUNT(*) AS total
            FROM plants_family;
        SQL;
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $stmt->fetch()['total'];
        
    }

    public function getAllPlant(): array {

        $sql =<<<SQL
            SELECT plants.name, 
                    latin_name, 
                    price_DKK, 
                    min_hight_cm, 
                    max_hight_cm, 
                    color, 
                    season, 
                    plants_family.name AS family_name 
            FROM plants 
            LEFT JOIN plants_family 
            ON plants.family_fk = plants_family.id; 
        SQL;
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }
}

//$printPlants = new Plant;
//print_r($printPlants->getAllPlant());
