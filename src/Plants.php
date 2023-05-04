<?php

require_once 'DB.php';

//echo "test ...";

class Plant extends DB 
{
    private static int $plants = 0;

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
    }

    public function getRandomPlant(): array
    {
        $randomTown = mt_rand(0, (static::$plants - 1));
        $sql =<<<SQL
            SELECT name AS name
            FROM plants
            LIMIT $randomTown, 1;
        SQL;
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetch();
    }
}

//$fakeplant = new Plant;
//print_r($fakeplant->getRandomPlant());
