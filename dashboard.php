<!DOCTYPE html>
<html lang="en">
<?php
session_start();
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | SOmanager store management application</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="icon" href="images/SVG/logo.svg">
    <link rel="stylesheet" href="css/Dashboard-dark.css">
</head>

<body>
<div class="overlay_mobile "></div>
<div class="menu-toggle">
    <span class="menu"></span>
</div>
<aside class="asidebar">
    <div class="logo-box">
        <img src="images/SVG/logo.svg" class="logo" alt="logo">
    </div>
    <ul class="asidebar-menu">
        <li class="asidebar__li">
            <svg class="asidebar__icon">
                <use href="images/SVG/sprite.svg#dashboard"/>
            </svg>
        </li>
        <li class="asidebar__li">
            <svg class="asidebar__icon">
                <use href="images/SVG/sprite.svg#settings"/>
            </svg>
        </li>
        <li class="asidebar__li">
            <svg class="logout-icon asidebar__icon">
                <use href="images/SVG/sprite.svg#theme"/>
            </svg>
        </li>
    </ul>
    <div class="asidebar__logout">
        <svg class="logout-icon asidebar__icon">
            <use href="images/SVG/sprite.svg#exit"/>
        </svg>
    </div>
</aside>
<nav class="navbar">
    <div class="input-search">
        <svg class="search-icon">
            <use href="images/SVG/sprite.svg#search"/>
        </svg>
        <input type="text" class="search-input">
    </div>
    <div class="navbar__option">
        <svg class="navbar__icon  navbar__option--delete">
            <use href="images/SVG/sprite.svg#delete"/>
        </svg>
        <svg class="navbar__icon  navbar__option--list ">
            <use href="images/SVG/sprite.svg#menu"/>
        </svg>
        <svg class="navbar__icon nav__option--add">
            <use href="images/SVG/sprite.svg#add"/>
        </svg>
    </div>
</nav>
<!-- list style -->
<?php require 'list_db.php'; ?>

<!-- menu style -->
<!-- <div class="table table_menu">
    <div class="Product_item">
        <img src="https://source.unsplash.com/user/erondu/1600x900" alt="Product img" />
        <div class="product_infos">
            <div class="name_product">
                Dell latitude e5440
            </div>
            <btn class="btn more-btn btn__primary">MORE</btn>
        </div>
    </div>
</div> -->

<div class="overlay_popup hidden">
    <form class="add_product hidden" action="create_row.php" method="post">
        <div class="close-popup">
            <svg>
                <use href="images/SVG/sprite.svg#error"/>
            </svg>
        </div>
        <h2 class="secondary-heading">
            add the product
        </h2>
        <div class="img_box">
            <input type="file" name="file_uploader" id="file_uploader">
            <svg>
                <use href="images/SVG/sprite.svg#add_uploader"></use>
            </svg>
        </div>
        <input class="Product_name" name="product_name" type="text" placeholder="Product name">
        <input type="text" name="quantity" class="quantity" placeholder="Quantity">
        <input type="text" name="percent_discount" class="Percent_discount" placeholder="Discount">
        <input type="text" name="initial_price" class="initial_price" placeholder="Purchase price">
        <input type="text" name="final_price" class="final_price" placeholder="Sale  price">
        <textarea name="description" class="description_input" placeholder="Write a description..."></textarea>
        <button class="btn confirm_btn btn__primary" name="confirm">confirm</button>
    </form>
    <form class="popup_edit hidden" action="update_row.php" method="post">
        <input type="text" class="hidden_element id_product" name="id_product"/>

        <div class="close-popup">
            <svg>
                <use href="images/SVG/sprite.svg#error"/>
            </svg>
        </div>
        <h2 class="secondary-heading">
            modify the product
        </h2>
        <div class="img_box">
        </div>
        <input class="Product_name" name="product_name" type="text" placeholder="Product name">
        <input type="text" name="quantity" class="quantity" placeholder="Quantity">
        <input type="text" name="percent_discount" class="Percent_discount" placeholder="Discount">
        <input type="text" name="initial_price" class="initial_price" placeholder="Purchase price">
        <input type="text" name="final_price" class="final_price" placeholder="Sale  price">
        <textarea name="description" class="description_input" placeholder="Write a description..."></textarea>
        <button class="btn confirm_btn btn__primary" name="confirm">confirm</button>
    </form>
    <div class="popup_view hidden">
        <div class="close-popup">
            <svg>
                <use href="images/SVG/sprite.svg#error"/>
            </svg>
        </div>
        <h2 class="secondary-heading">
            Dell latitude e5440
        </h2>
        <div class="img_box">
        </div>
        <div class="quantity_product">Quantity : <span><span>140</span></span></div>
        <div class="discount_product">Discount : <span><span>14</span>%</span></div>
        <div class="Purshase_product">Purshase Price : <span><span>100</span>$</span></div>
        <div class="Sale_product">Sale Price : <span><span>140</span>$</span></div>
        <div class="Desc_product">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, aut dicta non atque sequi saepe minus
            iusto ut earum odio voluptates assumenda fuga ducimus sunt aliquam cumque! A, provident doloribus.
        </div>

        <div class="popup_view__btns">
            <button class="btn btn__primary delete_btn">Delete</button>
            <div class="btn btn__secondary edit_btn">Edit</div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="scripts/app.js"></script>
<script>
    <?php
    if (isset($_SESSION["Invalid"]) && $_SESSION["Invalid"] == 1) {
        include "form_invalid.js";
        unset($_SESSION["Invalid"]);
    }
    ?>
</script>
</body>

</html>