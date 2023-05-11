<?php
    require_once 'classes/plant.php';
    require_once __DIR__.'/comp_header.php';
    require_once __DIR__.'/src/length.php';

    $plant = new Plant;
    $array = $plant->getAllPlant();

    function showArrayAsTable($array) {
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

<table class='inventory'>
    <tr>
        <th>Name</th>
        <th>Latin Name</th>
        <th>Family</th>
        <th>Price in
            <select name="select_currency" id="select_currency">
                <option value="DKK">DKK</option>
                <option value="USD">USD</option>
            </select>
        </th>
        <th>Color</th>
        <th>Season</th>
        <th>Min height in     
            <form id="heigthForm">
                <select name="select_height" id="select_height">
                    <option value="I">CM</option>
                    <option value="M">Inches</option>
                </select>
            </form>
        </th>
        <th>Max height</th>
    </tr>
    <?php showArrayAsTable($array); ?>

<?php require_once __DIR__.'/comp_footer.php'?>

<script src="js/script.js"></script>