<?php

include('db-connection.php');
$errors = [];

if(empty($_POST['code']) || empty($_POST['name']) || empty($_POST['price']) || empty($_POST['product-type'])){
    $errors[] = "all fields are required";
    header('Location: add-product.php');
    return;
}

$product_code  = $_POST['code'];
$name = $_POST['name'];
$price = $_POST['price'];
$product_type = $_POST['product-type'];

$stmt = $conn->prepare('SELECT * FROM Product WHERE product_code = ?');
$stmt->bindParam(1, $product_code, PDO::PARAM_INT);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);


if($_POST['size']){
    $product_description = $_POST['size'] .' MB';
}else if($_POST['height'] && $_POST['width'] && $_POST['length']){
    $product_description = $_POST['height'] . 'x' . $_POST['width'] . 'X' . $_POST['length'];
}else if($_POST['weight']){
    $product_description = $_POST['weight'] . " KG" ;
}

$sql = "INSERT INTO Product (product_code , name, price, product_type, product_description)
        VALUES('$product_code ', '$name', '$price', '$product_type', '$product_description')";
$conn->exec($sql);
echo "New record created successfully";
header('Location: product.php');

?>

