<?php
session_start();
if (isset($_REQUEST["confirm"])) {
    $form_is_valid = 0;

    if ($_REQUEST["product_name"]) {
        $product_name = $_REQUEST["product_name"];
        $form_is_valid = 1;
    }

    if (ctype_digit($_REQUEST["quantity"]) && (int)$_REQUEST["quantity"] < 10000) {
        $quantity = (int)$_REQUEST["quantity"];
    } else {
        if ($form_is_valid) {
            $form_is_valid = 0;
        }
    }

    if (ctype_digit($_REQUEST["percent_discount"]) && (int)$_REQUEST["percent_discount"] < 100) {
        $percent_discount = (int)$_REQUEST["percent_discount"];
    } else {
        if ($form_is_valid) {
            $form_is_valid = 0;
        }
    }

    if (ctype_digit($_REQUEST["initial_price"]) && (int)$_REQUEST["initial_price"] < 10000) {
        $initial_price = (int)$_REQUEST["initial_price"];
    } else {
        if ($form_is_valid) {
            $form_is_valid = 0;
        }
    }

    if (ctype_digit($_REQUEST["final_price"]) && (int)$_REQUEST["final_price"] < 10000) {
        $final_price = (int)$_REQUEST["final_price"];
    } else {
        if ($form_is_valid) {
            $form_is_valid = 0;
        }
    }

    if ($_REQUEST["description"]) {
        $description = $_REQUEST["description"];
    } else {
        if ($form_is_valid) {
            $form_is_valid = 0;
        }
    }

    if ($form_is_valid) {
        require "database.config.php";
        $connect = new mysqli(HOSTNAME, USERNAME,PASSWORD ,DATABASE);
        $crud = sprintf("INSERT INTO products (product_name,Product_desc,purchase_price,sale_product,discount_per,reset_quantity) VALUES ('%s','%s',%d,%d,%d,%d)",
            $connect->real_escape_string($product_name),
            $connect->real_escape_string($description),
            $connect->real_escape_string($initial_price),
            $connect->real_escape_string($final_price),
            $connect->real_escape_string($percent_discount),
            $connect->real_escape_string($quantity),
        );
        $connect->query($crud);
        $_SESSION["Invalid"] = false;
    } else {
        echo "bad";
        $form_is_valid = 0;
        $_SESSION["Invalid"] = true;
    }
    header("location: dashboard.php");
}