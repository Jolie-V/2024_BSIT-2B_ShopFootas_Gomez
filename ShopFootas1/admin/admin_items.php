<html>
<?php include "../db.php"; 
session_start();
?>
<head>
    <title>Admin Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../css/bootstrap.css">

</head>
<body>    
    <div class="container-fluid" id="content" style="margin-top: 10px">
    <a href ='dashboard.php'>Go Back</a>
        <div class="row">
            <div class="col-md-4">
                <div class="admin-product-form-container">
                <?php
                
                if(isset($_GET['delete_item'])){
                    $item_id = $_GET['delete_item'];

                    $sql_delete_second_table = "DELETE FROM `product` WHERE `prdct_dsgn_id` = '$item_id'";
                    mysqli_query($conn, $sql_delete_second_table);

                    $sql_delete_first_table = "DELETE FROM `product_design` WHERE `prdct_dsgn_id` = '$item_id'";
                    mysqli_query($conn, $sql_delete_first_table);
                
                }
                        if(isset($_GET['update_item']))
                        {
                            $item_id = $_GET['update_item'];
                            
                            $sql_get_item_info = "SELECT * FROM `product_design`
                                                    WHERE prdct_dsgn_id = '$item_id'";
                            $result = mysqli_query($conn, $sql_get_item_info);
                            $data_row = mysqli_fetch_assoc($result);
                        
                            $asize = array();
                            $asize[] = "0";
                            
                            $sql_get_sizes = "SELECT * FROM product 
                            inner JOIN product_sizes 
                            ON product.sizes_id = product_sizes.sizes_id where product.prdct_dsgn_id = '$item_id'";
                            $sizeresult = mysqli_query($conn, $sql_get_sizes);
                            while( $sizerow = mysqli_fetch_assoc( $sizeresult ) ) {
                                $asize[] = $sizerow['size_name'];
                            }      
                            
                            ?>
                                <form action="process_update_items.php" method="POST">
                                    
                                    <h3>Update Product</h3>

                                    <input type="hidden" value="<?php echo $data_row['prdct_dsgn_id'];?>" type="text" name="u_item_id" readonly class="form-control mb-3">

                                    <input value="<?php echo $data_row['item_name'];?>" type="text" name="u_name" placeholder="name" class="box" required/><br>
                                
                                    <input value="<?php echo $data_row['item_price'];?>" type="number" name="u_price" placeholder="price" class="box" required/><br>

                                    <textarea name="u_description" placeholder="description" class="box" required><?php echo $data_row['item_description'];?></textarea><br>

                                    <input value="<?php echo $data_row['item_qty'];?>" type="number" name="u_quantity" placeholder="quantity" class="box" required/><br>

                                    <input value="<?php echo $data_row['item_color'];?>" type="text" name="u_color" placeholder="color" class="box" required/><br>

                                    <div class="form-group">

                                        <label for="sizes">Sizes:</label><br>
                                        <input type="checkbox" id="size_36" name="sizes[]" value="36" <?php if (array_search("36", $asize))  echo "checked";  ?>>
                                        <label for="size_">Size 36</label><br>
                                        <input type="checkbox" id="size_37" name="sizes[]" value="37"<?php if (array_search("37", $asize))  echo "checked"; ?>>
                                        <label for="size_2">Size 37</label><br>
                                        <input type="checkbox" id="size_38" name="sizes[]" value="38"<?php if (array_search("38", $asize))  echo "checked"; ?>>
                                        <label for="size_3">Size 38</label><br>
                                        <input type="checkbox" id="size_39" name="sizes[]" value="39"<?php if (array_search("39", $asize))  echo "checked"; ?>>
                                        <label for="size_4">Size 39</label><br>
                                        <input type="checkbox" id="size_40" name="sizes[]" value="40"<?php if (array_search("40", $asize))  echo "checked"; ?>>
                                        <label for="size_5">Size 40</label><br>
                                        <input type="checkbox" id="size_41" name="sizes[]" value="41"<?php if (array_search("41", $asize))  echo "checked"; ?>>
                                        <label for="size_6">Size 41</label><br>
                                        <input type="checkbox" id="size_42" name="sizes[]" value="42"<?php if (array_search("42", $asize))  echo "checked"; ?>>
                                        <label for="size_7">Size 42</label><br>
                                                                              
                                    </div>

                                    <input value="<?php echo $data_row['item_type'];?>" type="text" name="u_category" placeholder="category" class="box" required/><br>

                                    <input value="<?php echo $data_row['item_brand'];?>" type="text" name="u_brand" placeholder="brand" class="box" required/><br>

                                    <button class="btn" type="submit" name="update">UPDATE</button>
                                </form>
                            
                    <?php
                        }
                    
                    ?>

                    <form method="POST" action="process_admin_items.php" enctype="multipart/form-data">
                        <h3>Add a New Product</h3>

                        <input type="text" name="i_name" placeholder="name" class="box" required/><br>
                    
                        <input type="number" name="i_price" placeholder="price" class="box" required/><br>

                        <textarea name="i_description" placeholder="description" class="box" required></textarea><br>

                        <input type="number" name="i_quantity" placeholder="quantity" class="box" required/><br>

                        <input type="text" name="i_color" placeholder="color" class="box" required/><br>

                        <div class="form-group">
                            <label for="sizes">Sizes:</label><br>
                            <input type="checkbox" id="size_36" name="sizes[]" value="36">
                            <label for="size_36">Size 36</label><br>
                            <input type="checkbox" id="size_37" name="sizes[]" value="37">
                            <label for="size_37">Size 37</label><br>
                            <input type="checkbox" id="size_38" name="sizes[]" value="38">
                            <label for="size_38">Size 38</label><br>
                            <input type="checkbox" id="size_39" name="sizes[]" value="39">
                            <label for="size_39">Size 39</label><br>
                            <input type="checkbox" id="size_40" name="sizes[]" value="40">
                            <label for="size_40">Size 40</label><br>
                            <input type="checkbox" id="size_41" name="sizes[]" value="41">
                            <label for="size_41">Size 41</label><br>
                            <input type="checkbox" id="size_42" name="sizes[]" value="42">
                            <label for="size_42">Size 42</label><br>
                        </div>

                        <input type="text" name="i_category" placeholder="category" class="box" required/><br>

                        <input type="text" name="i_brand" placeholder="brand" class="box" required/><br>

                        <input type="file" name="uploadfile" value=""  class="box" required/><br>

                        <button class="btn" type="submit" name="upload">UPLOAD</button>
                    </form>
                </div>
            </div>

            <div class="col-md-8">
                <?php                                 
                    $sql_get_items = "SELECT * FROM `product_design` order by prdct_dsgn_id DESC";
                    $get_result = mysqli_query($conn, $sql_get_items);
                ?>
                <table class="table">
                    <form action="search.php" method="GET">
                        <h3>Search for Products</h3>
                        <input type="text" name="q" placeholder="Search products..." style="width:500px; height:60px;">
                        <button name="items" type="submit" class="btn btn-success" style="background-color:blue; width: 200px">Search in Inventory</button>
                        <button name="orders" type="submit" class="btn btn-success" style="background-color:blue; width: 200px">Search in orders</button>
                    </form>
                            <td>Photo</td>
                            <td>Name</td>
                            <td>Description</td>
                            <td>Price</td>
                            <td>Quantity</td>
                            <td>Color</td>
                            <td>Category</td>
                            <td>Brand</td>
                            <td>Sizes</td>
                    <?php
                        while ( $row = mysqli_fetch_assoc($get_result) ){ 
                            $asize = array();
                            $asize[] = "0";
                            $strsize = "";
                            $prodctid = $row['prdct_dsgn_id'];
                            $sql_get_sizes = "SELECT * FROM product 
                            inner JOIN product_sizes 
                            ON product.sizes_id = product_sizes.sizes_id where product.prdct_dsgn_id = $prodctid";
                            $sizeresult = mysqli_query($conn, $sql_get_sizes);
                            while( $sizerow = mysqli_fetch_assoc( $sizeresult ) ) {
                                $strsize = $strsize . $sizerow['size_name'] . "<br>";
                                $asize[]= $sizerow['size_name'];
                            }      
                    ?>
                        <tr>
                            <td> <img src="../product_pictures/<?php echo $row['item_photo'];?>" alt="" class="img-fluid" width="100px"> </td>
                            <td><?php echo $row['item_name'];?></td>
                            <td><?php echo $row['item_description'];?></td>
                            <td><?php echo "Php " . number_format($row['item_price'],2);?></td>
                            <td><?php echo $row['item_qty'];?></td>
                            <td><?php echo $row['item_color'];?></td>
                            <td><?php echo $row['item_type'];?></td>
                            <td><?php echo $row['item_brand'];?></td>
                            <td><?php echo $strsize;
                                                 ?></td>
                                        

                            <td> <a href="admin_items.php?update_item=<?php echo $row['prdct_dsgn_id'];?>" class="btn btn-success">Update</a>
                            <a href="admin_items.php?delete_item=<?php echo $row['prdct_dsgn_id'];?>" class="btn btn-danger">Delete</a> </td>
                        </tr>
                        <?php }
                    ?>
                </table>
            </div>
        </div>
    </div>

</body>
</html>
<?php
error_reporting(0);

$msg = "";
?>