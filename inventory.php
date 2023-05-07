<?php
    require_once 'classes/plant.php';
    require_once __DIR__.'/comp_header.php';
    require_once __DIR__.'/src/length.php';

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
<div>
    <form id="heigthForm">
        <label for="select_height"> Height meassurement:
            <select name="select_height" id="select_height">
                <option value="m">Metric</option>
                <option value="i">Imperial</option>
            </select>
        </label>
    </form>
    <label for="select_height"> Prefered currency:
        <select name="select_height" id="select_height">
            <option value="DKK">DKK</option>
            <option value="USD">USD</option>
        </select>
    </label>
    <p class="test">36</p>
</div>

<?php showArrayAsTable($array); ?>
<?php require_once __DIR__.'/comp_footer.php'?>

<script>

'use strict';

const API_URL = 'api/index.php';

document.querySelector('#select_height').addEventListener('change', function(e) {
    e.preventDefault();
    const measure = 36;
    const system = document.querySelector('#select_height').value;
    
    $.ajax({
        url: API_URL,
        method: 'POST',
        data: {
            'conversion': 'length',
            'measure': measure,
            'system': system
        }
    }).done(function(result) {
        const text = measure + (system === 'M' ? ' centimeters' : ' inches') + ' is ' + result + (system === 'M' ? ' inches' : ' centimeters');

        $('.test').text(text);
    });
});


</script>
function fetchData() {
  fetch("https://kea21-7e1e.restdb.io/rest/t9-post?sort=date&dir=-1&max=5", {
    method: "GET",
    headers: {
      "x-apikey": "602f9e445ad3610fb5bb63d5",
    },
  })
    .then((res) => res.json())
    .then((response) => {
      handlePosts(response);
      console.log(response);
    })
    .catch((err) => {
      console.error(err);
    });
}