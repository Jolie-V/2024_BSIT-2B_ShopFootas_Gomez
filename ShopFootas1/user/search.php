<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
    <?php
    include '../db.php';

    $searchString = $conn->real_escape_string($_GET['q']);
    $search_query = $conn->real_escape_string($_GET['q']); // Sanitize input

    if(isset($_GET['items']))
    {
        $query = " SELECT * FROM product_design zz
        WHERE item_name LIKE '%$searchString%' 
        OR item_description LIKE '%$searchString%' 
        OR item_brand LIKE '%$searchString%' 
        OR item_type LIKE '%$searchString%' 
        OR item_color LIKE '%$searchString%'";

$result = $conn->query($query);

 // Check if there are results
 if ($result) {
    if ($result->num_rows > 0) {
        echo "<a href ='client_homepage.php'>Go Back</a>";
        echo "<h2>Inventory Search Results: " . $searchString . "</h2>";
        echo "<div class='container'>"; // Container for card layout
        while ($row = $result->fetch_assoc()) {
            // Output product cards
            echo "<div class='col col col col' style='display: inline-block; width: 20%; max-width: 20%;'>";
            echo "<div class='card border-secondary mb-3'>";
            echo "<img src='../product_pictures/{$row['item_photo']}' width='250px' class='img'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>{$row['item_name']}</h5>";
            echo "<p class='card-text' style='color: green;'>Php {$row['item_price']}</p>";
            echo "<form action='client_homepage.php' method='get'>";
            echo "<input type='hidden' name='add_to_cart' value='{$row['prdct_dsgn_id']}'>";
            echo "<button type='submit' class='btn btn-success'>Add to Cart</button>";
            echo "</form>";
            echo "</div></div></div>";
        }
        echo "</div>"; // Close container
    } else {
        echo "<a href ='client_homepage.php'>Go Back</a>";
        echo "<p>No results found</p>";
    }
}
    }

    if(isset($_GET['orders']))
    {
            
// Prepare SQL statement
$sql = "SELECT product_design.*
FROM product_design
INNER JOIN orders ON orders.prdct_dsgn_id = product_design.prdct_dsgn_id
WHERE orders.order_ref LIKE '%$search_query%'";

// Execute SQL query
$order_result = $conn->query($sql);
if ($order_result) {
    if ($order_result->num_rows > 0) {
        echo "<a href ='client_homepage.php'>Go Back</a>";
        echo "<h2>Inventory Search Results: " . $searchString . "</h2>";
        echo "<div class='container'>"; // Container for card layout
        while ($row = $order_result->fetch_assoc()) {
            // Output product cards
            echo "<div class='col col col col' style='display: inline-block; width: 20%; max-width: 20%;'>";
            echo "<div class='card border-secondary mb-3'>";
            echo "<img src='../product_pictures/{$row['item_photo']}' width='250px' class='img'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>{$row['item_name']}</h5>";
            echo "<p class='card-text' style='color: green;'>Php {$row['item_price']}</p>";
            echo "<form action='client_homepage.php' method='get'>";
            echo "<input type='hidden' name='add_to_cart' value='{$row['prdct_dsgn_id']}'>";
            echo "<button type='submit' class='btn btn-success'>Add to Cart</button>";
            echo "</form>";
            echo "</div></div></div>";
        }
        echo "</div>"; // Close container
    } else {
    echo "No results found";
}
}
}

   
    ?>
</body>
</html>