<?php

require_once 'classes/bicycle.php';
require_once 'classes/parsecsv.php';
require_once __DIR__.'/comp_header.php';

$csv = new ParseCSV('data/used_bicycles.csv');

function showArrayAsTable($array) {
    echo "<table class='inventory'><tr><th>Brand</th><th>Model</th><th>Year</th><th>Category</th><th>Gender</th><th>Color</th><th>Weight</th><th>Condition</th><th>Price</th></tr>";

    for ($i = 0; $i < sizeof($array); $i++ ){
        $bike = new Bicycle([
            'brand' => $array[$i]['brand'],
            'model' => $array[$i]['model'],
            'year' => $array[$i]['year'],
            'category' => $array[$i]['category'],
            'color' => $array[$i]['color'],
            'gender' => $array[$i]['gender'],
            'price' => $array[$i]['price'],
            'weight_kg' => $array[$i]['weight_kg'],
            'condition_id' => $array[$i]['condition_id']
    ]);
    echo $bike->__toString();
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

<?php showArrayAsTable($csv->parse()); ?>
<?php require_once __DIR__.'/comp_footer.php'?>



