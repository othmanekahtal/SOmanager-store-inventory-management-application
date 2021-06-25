<ul class="table">
    <!-- header table start -->
    <li class="header-table table-row">
        <div class="checkbox checkbox__all">
            <input type="checkbox" id="select_all">
            <span for="select_all" class="checkbox-span"></span>
        </div>
        <div class="col-table-header col-1 name">name</div>
        <div class="col-table-header col-2 quantity">quantity</div>
        <div class="col-table-header col-3 price">price</div>
        <div class="col-table-header col-4 discount">discount</div>
        <div class="col-table-header col-5 status">status</div>
        <div class="col-table-header col-6 actions">actions</div>
    </li>


    <!-- header table end -->
    <!-- ********************************************* -->
    <!-- body table start -->


    <?php
    require "database.config.php";
    $connect = new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE);
    $statement = $connect->prepare("select * from products");
    $statement->execute();
    $result = $statement->get_result();
    while ($row = $result->fetch_assoc()) {
        if ($row['available']) {
            $available = 'available';
        } else {
            $available = 'not available';
        }
        echo '<li class="body-table table-row" id="r' . $row['id'] . '">
            <div class="checkbox checkbox__item">
                <input type="checkbox" id="select_all" value=' . $row['id'] . '>
                <span for="select_all" class="checkbox-span"></span>
            </div>
            <div title="' . $row['product_name'] . '"' . ' class="col-table-body col-1 col-name">' . $row['product_name'] . '</div>
            <div class="col-table-body col-2 col-quantity">
                <svg class="table__icons">
                    <use href="images/SVG/sprite.svg#price-tag" />
                </svg>
                <span class="col-2 col-span--content">' . $row['reset_quantity'] . '</span>
            </div>
            <div class="col-table-body col-3 col-price">
                <svg class="table__icons">
                    <use href="images/SVG/sprite.svg#dollar" />
                </svg>
                <span class="col-3 col-span--content">' . $row['sale_product'] . '</span>
            </div>
            <div class="col-table-body col-4 col-discount">
                <svg class="table__icons">
                    <use href="images/SVG/sprite.svg#discount" />
                </svg>
                <span class="col-4 col-span--content">' . $row["discount_per"] . '</span>%
            </div>
            <div class="hidden_element description">' . $row["Product_desc"] . '</div>
                        <div class="hidden_element purchase_price">' . $row["purchase_price"] . '</div>
            <div class="hidden_element id_element">' . $row["id"] . '</div>
            <div class="col-table-body col-5 col-status">
                <svg class="table__icons table__icons--blue">
                    <use href="images/SVG/sprite.svg#check-mark" />
                </svg>
                <span class="col-5 col-span--content">' . $available . '</span>
            </div>
            <div class="col-table-body col-6 col-actions">
                <svg class="table__icons table__icons--blue">
                    <use href="images/SVG/sprite.svg#edit" />
                </svg>
            </div>
        </li>';
    };
    ?>
    <!-- body table end -->
</ul>