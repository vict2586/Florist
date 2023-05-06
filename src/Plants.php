<?php

require_once 'DB.php';

//echo "test ...";

class Plant extends DB 
{
    private static int $plants = 0;
    private static int $plants_family = 0;

    /**
     * The total number of plants is saved in a private property.
     * By making it static, the calculation will be made only once
     */
    public function __construct()
    {
        parent::__construct();
        if (static::$plants === 0) {
            $sql =<<<'SQL'
                SELECT COUNT(*) AS total
                FROM plants;
            SQL;
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            static::$plants = $stmt->fetch()['total'];
        }

        if (static::$plants_family === 0) {
            $sql =<<<'SQL'
                SELECT COUNT(*) AS total
                FROM plants_family;
            SQL;
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            static::$plants_family = $stmt->fetch()['total'];
        }
    }

    public function getAllPlant(): array
    {
        $sql =<<<SQL
            SELECT `name`, `latin_name`, `price_DKK`, `min_hight_cm`, `max_hight_cm`, `color`, `season` 
            FROM plants;
        SQL;
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function getAllFamily(): array
    {
        $sql =<<<SQL
            SELECT `name` 
            FROM plants_family;
        SQL;
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetch();
    }
}

$printPlants = new Plant;
print_r($printPlants->getAllPlant());
