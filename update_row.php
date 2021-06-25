<?php
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
        $discount = (int)$_REQUEST["percent_discount"];
    } else {
        if ($form_is_valid) {
            $form_is_valid = 0;
        }
    }

    if (ctype_digit($_REQUEST["initial_price"]) && (int)$_REQUEST["initial_price"] < 10000) {
        $init_price = (int)$_REQUEST["initial_price"];
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
        $desc = $_REQUEST["description"];
    } else {
        if ($form_is_valid) {
            $form_is_valid = 0;
        }
    }

    if ($form_is_valid) {
        $product_updated= $_POST["id_product"];
        require "database.config.php";
        $connect = new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE);
        $update = sprintf("UPDATE products SET product_name = '%s',Product_desc = '%s',reset_quantity = %d,purchase_price = %d,sale_product = %d,discount_per = %d WHERE id = %d",
            $connect->real_escape_string($product_name),
            $connect->real_escape_string($desc),
            $connect->real_escape_string($quantity),
            $connect->real_escape_string($init_price),
            $connect->real_escape_string($final_price),
            $connect->real_escape_string($discount),
            $connect->real_escape_string($product_updated)
        );
        $connect->query($update);
        $connect->close();
    }
    header("location: dashboard.php");
}