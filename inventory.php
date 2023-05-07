<?php
    require_once 'classes/plant.php';
    require_once __DIR__.'/comp_header.php';
?> <?php

$plant = new Plant;
$array = $plant->getAllPlant();

//echo $array;

function showArrayAsTable($array) {
    echo "<table class='inventory'>
        <tr>
            <th>Name</th>
            <th>Latin Name</th>
            <th>Family</th>
            <th>Price in DKK</th>
            <th>Color</th>
            <th>Season</th>
            <th>Min height in cm</th>
            <th>Max height in cm</th>
        </tr>";

    foreach($array as $PlantArray){
        $array = new allPlant([
        'name' => $PlantArray['name'],
        'latin_name' => $PlantArray['latin_name'],
        'family_name' => $PlantArray['family_name'],
        'price_DKK' => $PlantArray['price_DKK'],
        'color' => $PlantArray['color'],
        'season' => $PlantArray['season'],
        'min_hight_cm' => $PlantArray['min_hight_cm'],
        'max_hight_cm' => $PlantArray['max_hight_cm']
        ]);
        echo $array->__toString();
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

<?php showArrayAsTable($array); ?>

<?php require_once __DIR__.'/comp_footer.php'?>



