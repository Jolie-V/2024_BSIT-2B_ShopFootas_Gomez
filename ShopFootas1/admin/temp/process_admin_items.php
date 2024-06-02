<?php 
error_reporting(0);
$msg = "";
if(isset($_POST['upload'])){ //trap
    include_once "../db.php";

    $filename = $_FILES["uploadfile"]["name"];
	$tempname = $_FILES["uploadfile"]["tmp_name"];
	$folder = "../product_pictures/". $filename;

    $name = $_POST['i_name'];
    $price = $_POST['i_price'];
    $desc = $_POST['i_description'];
    $qty = $_POST['i_quantity'];
    $color = $_POST['i_color'];
    $ctgry = $_POST['i_category'];
    $brand = $_POST['i_brand'];
    $sizes = isset($_POST['sizes']) ? $_POST['sizes'] : array();

    $sql_insert_items = "INSERT INTO product_design (item_name, item_price, item_description, item_qty, item_color, item_type, item_brand, item_photo)
                        VALUES('$name', '$price', '$desc', '$qty', '$color', '$ctgry', '$brand', '$filename')";
    
    if ($conn->query($sql_insert_items) === TRUE) {
        $item_id = $conn->insert_id; // Get the ID of the inserted item
    
        // Insert selected sizes into 'item_sizes' table
        foreach ($sizes as $size) {
            // Sanitize size before inserting into the database
            $size = $conn->real_escape_string($size);
            $sql = "SELECT * FROM product_sizes WHERE size_name = '$size'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $sid = $row["sizes_id"];
                $ssql = "INSERT INTO product (prdct_dsgn_id, sizes_id) VALUES($item_id, $sid)";
                if ($conn->query($ssql) === TRUE)
                {
                    echo "Data inserted.";      
                    header("location: admin_items.php?insert_status=1");
                }
            }else{
                $size_sql = "INSERT INTO product_sizes (size_name) VALUES ('$size')";
                if ($conn->query($size_sql) === TRUE){
                    $sid = $conn->insert_id;
                    $size_sql = "INSERT INTO product (prdct_dsgn_id, size_id) VALUES ('$item_id', '$sid')";
                }
            }
            
            // Insert size into 'item_sizes' table4
            
        }
    }

    if(move_uploaded_file($tempname, $folder)){
        echo "Data inserted.";      
        header("location: admin_items.php?insert_status=1");
    }
    
}
else{
    header("location: admin_items.php?failed_to_upload_data");
}
?>