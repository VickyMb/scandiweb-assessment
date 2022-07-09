<?php
    include('db-connection.php');
    $sql = "SELECT * FROM Product ORDER by id DESC";
    $products = $conn->query($sql);
    