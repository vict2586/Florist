<?php
    require_once 'classes/plant.php';
    require_once __DIR__.'/comp_header.php';
?> <?php

$printPlants = new allPlant;
$printPlants->getPlant();

//print_r($printPlants->getPlant());
//var_dump($printPlants->getPlant());

function showArrayAsTable($printPlants) {
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

    if (is_array($printPlants) || is_object($printPlants)) {
     
        foreach($printPlants as $arrayOfPlants) { 
            $name = $arrayOfPlants['name'];
            $latin_name = $arrayOfPlants['latin_name'];
            $family = $arrayOfPlants['family'];
            $price_in_DKK = $arrayOfPlants['price_DKK'];       
            $color = $arrayOfPlants['color'];        
            $season = $arrayOfPlants['season'];       
            $min_height_in_cm = $arrayOfPlants['min_hight_cm'];        
            $max_height_in_cm = $arrayOfPlants['max_hight_cm'];
        }
        
    }

    echo "<tr>
            <td>$name</td>
            <td>$latin_name</td>
            <td>$family</td>
            <td>$price_in_DKK</td>
            <td>$color</td>
            <td>$season</td>
            <td>$min_height_in_cm</td>
            <td>$max_height_in_cm</td>
        </tr>";

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

<?php showArrayAsTable($printPlants); ?>

<?php require_once __DIR__.'/comp_footer.php'?>



