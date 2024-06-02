<?php
    include "../db.php";
if(isset($_POST['u_name'])){

    $item_id = $_POST['u_item_id'];
    $item_name = $_POST['u_name'];
    $item_desc = $_POST['u_description'];
    $item_price = $_POST['u_price'];
    $item_qty = $_POST['u_quantity'];
    $item_color = $_POST['u_color'];
    $item_cat = $_POST['u_category'];
    $item_brand = $_POST['u_brand'];
    $sizes = isset($_POST['sizes']) ? $_POST['sizes'] : array();
    
    $sql_update_item = "UPDATE `product_design`
                           SET `item_name`='$item_name'
                              , `item_description`='$item_desc'
                              , `item_price`='$item_price'
                              , `item_qty` = '$item_qty'
                              , `item_color` = '$item_color'
                              , `item_type` = '$item_cat'
                              , `item_brand` = '$item_brand'
                        WHERE prdct_dsgn_id ='$item_id'";

                        if(mysqli_query($conn, $sql_update_item)==TRUE) {
                            $item_id = $conn->insert_id;
                        
                            $sql_delete_second_table = "DELETE FROM `product` WHERE `prdct_dsgn_id` = '$item_id'";

                            foreach ($sizes as $size){
                                $conn->query($sql_delete_second_table);
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
                                        header("location: admin_items.php?update_status=1");
                                    }
                                }
                            }
                        }
                        else{
                            header("location: admin_items.php?error");
                        }   

    
}