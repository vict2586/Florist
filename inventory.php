<?php
    require_once 'classes/plant.php';
    require_once __DIR__.'/comp_header.php';
?> <?php

$allPlant = new allPlant;
$allPlant->getPlant();

$arrayOfPlants = $allPlant->plant;

function showArrayAsTable($arrayOfPlants) {
    echo "<table class='inventory'><tr><th>Name</th><th>Latin Name</th><th>Family</th><th>Price in DKK</th><th>Color</th><th>Season</th><th>Min height in cm</th><th>Max height in cm</th></tr>";

    var_dump($arrayOfPlants);

/*     for ($i = 0; $i < sizeof($arrayOfPlants); $i++ ){
        $plants = new allPlant([
            'name' => $arrayOfPlants[$i]['name'],
            'latin_name' => $arrayOfPlants[$i]['latin_name'],
            'family' => $arrayOfPlants[$i]['family'],
            'price_DKK' => $arrayOfPlants[$i]['price_DKK'],
            'color' => $arrayOfPlants[$i]['color'],
            'season' => $arrayOfPlants[$i]['season'],
            'min_hight_cm' => $arrayOfPlants[$i]['min_hight_cm'],
            'max_hight_cm' => $arrayOfPlants[$i]['max_hight_cm']
        ]);
        echo $plants->__toString();
    } 
*/

    if (is_array($arrayOfPlants) || is_object($arrayOfPlants)) {

        foreach($arrayOfPlants as $arrayOfPlantss) {
            $name = $arrayOfPlantss['name'];
            $latin_name = $arrayOfPlantss['latin_name'];
            $family = $arrayOfPlantss['family'];
            $price_in_DKK = $arrayOfPlantss['price_DKK'];       
            $color = $arrayOfPlantss['color'];        
            $season = $arrayOfPlantss['season'];       
            $min_height_in_cm = $arrayOfPlantss['min_hight_cm'];        
            $max_height_in_cm = $arrayOfPlantss['max_hight_cm'];
        }    
    }
    echo "</table>";
}
?>

<div class="img-text-flex">
    <img class="small" src="img/appletree.webp" alt="bike chain">
    <div>
        <h2>Our current inventory</h2>
        <p>Welcome to Blossom's Flowers, the premier flower shop for all of your plant needs! Our passion for greenery is evident in every arrangement we create. From stunning succulents to lush foliage, we have everything you need to add a touch of nature to your home, office, or special event.</p>
    </div>
</div>

<?php showArrayAsTable($arrayOfPlants); ?>

<?php require_once __DIR__.'/comp_footer.php'?>



