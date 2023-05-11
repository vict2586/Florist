<?php
    require_once 'classes/plant.php';
    require_once __DIR__.'/comp_header.php';
    require_once __DIR__.'/src/length.php';

$plant = new Plant;
$array = $plant->getAllPlant();

//echo $array;

function showArrayAsTable($array) {
    // echo "<table class='inventory'>
    //     <tr>
    //         <th>Name</th>
    //         <th>Latin Name</th>
    //         <th>Family</th>
    //         <th>Price in DKK</th>
    //         <th>Color</th>
    //         <th>Season</th>
    //         <th>Min height in cm</th>
    //         <th>Max height in cm</th>
    //     </tr>";

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

function convertplease(float $measure, string $system = Length::METRIC){
    $length = new Length(['measure' => $measure, 'system' => $system]);
    return $length->convert();
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

<script>

'use strict';

const API_URL = 'api/index.php';

// convert heigths
document.querySelector('#select_height').addEventListener('change', function(e) {
    $('.inventory tr').each( async (elm) => {
        if(elm > 0){
            const maxMeasure = $(`.inventory tr:nth-of-type(${elm + 1})`).children().last().html();
            const maxPlacement = $(`.inventory tr:nth-of-type(${elm + 1})`).children().last();
            let newMaxNum = await sendConvert(maxMeasure);
            maxPlacement.html(newMaxNum);

            const minMeasure = $(`.inventory tr:nth-of-type(${elm + 1})`).children().eq(-2).html();
            const minPlacement = $(`.inventory tr:nth-of-type(${elm + 1})`).children().eq(-2);
            let newMinNum = await sendConvert(minMeasure);
            minPlacement.html(newMinNum);
        }
    })
});

async function sendConvert(measure){
    const system = document.querySelector('#select_height').value;
    
    const text = $.ajax({
        url: API_URL,
        method: 'POST',
        data: {
            'conversion': 'length',
            'measure': measure,
            'system': system
        }
    })
    return text;
}

// logic:
// for each table row in inventory find the last and second to last element and recalculate height.

</script>