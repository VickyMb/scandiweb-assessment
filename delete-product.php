<?php
session_start();
include('db-connection.php');

if(isset($_POST['prod_delete_multiple_btn']))
{
    $all_id = $_POST['product_delete'];
    $extract_id = implode(',' , $all_id);

    $query = "DELETE FROM Product WHERE id IN($extract_id)";
    $query_run = $conn->query($query);

    if($query_run)
    {
        $_SESSION['status'] = "Multiple Data Deleted Successfully";
        header("Location: product.php");
    }
    else
    {
        $_SESSION['status'] = "Multiple Data Not Deleted";
        header("Location: product.php");
    }
}
?>