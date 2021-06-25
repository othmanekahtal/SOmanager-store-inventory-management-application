<?php
$id_product = explode(",", $_GET["id"]);
require "database.config.php";
$connect = new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE);
foreach ($id_product as $product) {
    $connect->query("DELETE FROM  products WHERE id = $product");
}
$connect->close();
header("location:  dashboard.php");