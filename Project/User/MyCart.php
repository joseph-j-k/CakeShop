
<?php
include("../Assets/Connection/Connection.php");
session_start();
include("Head.php")
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <style>
            /* Reset some default styling */
body, h1, label, button {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Body styling */
body {
    padding: 20px;
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
}

/* Heading styling */
h1 {
    font-size: 2em;
    margin-bottom: 20px;
    color: #333;
}

/* Column labels styling */
.column-labels {
    display: flex;
    justify-content: space-between;
    padding: 10px 0;
    border-bottom: 2px solid #ddd;
}

.column-labels label {
    font-weight: bold;
    text-align: center;
    width: 15%;
}

/* Shopping cart styling */
.shopping-cart {
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

.product {
    display: flex;
    align-items: center;
    border-bottom: 1px solid #ddd;
    padding: 10px 0;
}

.product-image img {
    width: 100px;
    border-radius: 5px;
}

.product-details {
    flex: 1;
    padding: 0 10px;
}

.product-title {
    font-weight: bold;
}

.product-description {
    font-size: 0.9em;
    color: #666;
}

.product-price, .product-quantity, .product-removal, .product-line-price {
    width: 15%;
    text-align: center;
}

.product-quantity input {
    width: 60px;
    padding: 5px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.product-removal button {
    background-color: #c66;
    color: #fff;
    border: none;
    padding: 5px 10px;
    border-radius: 5px;
    cursor: pointer;
}

.product-removal button:hover {
    background-color: #a44;
}

.totals {
    margin-top: 20px;
    text-align: right;
}

.totals-item {
    margin-bottom: 10px;
}

.totals-value {
    font-size: 1.5em;
    font-weight: bold;
}

/* Checkout button styling */
.checkout {
    background-color: #6b6;
    color: #fff;
    border: none;
    padding: 10px 20px;
    font-size: 1.2em;
    border-radius: 5px;
    cursor: pointer;
    text-align: center;
}

.checkout:hover {
    background-color: #494;
}

/* Responsive design adjustments */
@media (max-width: 768px) {
    .product {
        flex-direction: column;
        align-items: flex-start;
    }

    .product-image, .product-details, .product-price, .product-quantity, .product-removal, .product-line-price {
        width: 100%;
        text-align: left;
    }

    .product-quantity input {
        width: auto;
    }
}

@media (max-width: 480px) {
    .column-labels {
        flex-direction: column;
    }

    .column-labels label {
        width: 100%;
        text-align: left;
    }
}

        </style>
    </head>
    <?php
        if (isset($_POST["btn_checkout"])) {        
                 $amt = $_POST["carttotalamt"];
				$selC = "select * from tbl_booking where user_id ='" .$_SESSION["uid"]. "'and booking_status='0'";
                $rs = $con->query($selC);
                $row=$rs->fetch_assoc();
                $upQry1 = "update tbl_booking set booking_date=curdate(),booking_amount='".$amt."',booking_status='1' where user_id ='" .$_SESSION["uid"]. "'";
                if($con->query($upQry1))
                {
					$upQry1s = "update tbl_cart set cart_status='1' where booking_id='" .$row["booking_id"]. "'";
					if($con ->query($upQry1s))
					{
					  $_SESSION["bid"] = $row["booking_id"];
					  ?>
					  <script>
						 window.location="MyBooking.php";
					  </script>
					  <?php
					}    
                }
			}
	?>
    <body onload="recalculateCart()">
        <h1>Cart</h1>
            <div class="column-labels">
                <label class="product-price" style="width: 15%; text-align:center">Image</label>
                <label class="product-price" style="width: 16%; text-align:center">Details</label>	
                <label class="product-price" style="width: 10%; text-align:center">Price</label>
                <label class="product-price" style="width: 10%; text-align:center">Qty</label>
                <label class="product-price" style="width: 10%; text-align:center">Remove</label>
                <label class="product-price" style="width: 16%; text-align:center">Total</label>
            </div>
<form method="post">
        <div class="shopping-cart" style="margin-top: 50px">            
            <?php                
            $sel = "select * from tbl_booking b inner join tbl_cart c on c.booking_id=b.booking_id where b.user_id ='" .$_SESSION["uid"]. "' and booking_status='0'";
               $res = $con->query($sel);
                while ($row=$res->fetch_assoc()) {
                    $selPr = "select * from tbl_product where product_id ='" .$row["product_id"]. "'";
                    $respr = $con->query($selPr);
                    if ($rowpr=$respr->fetch_assoc()) {
                         $selstock = "select sum(stock_qty) as stock from tbl_stock where product_id='".$rowpr["product_id"]."'";
                        $resst = $con->query($selstock);


                    if ($rowst=$resst->fetch_assoc()) {

                        $selstocka = "select sum(cart_qty) as stock from tbl_cart where product_id='".$rowpr["product_id"]."' and cart_status > 0";
                        $ressta = $con->query($selstocka);
                        $rowsta=$ressta->fetch_assoc();

                        $stock = $rowst["stock"] - $rowsta["stock"];
            ?>
            <div class="product">
                <div class="product-image">
                    <img src="../Assets/File/Seller/<?php echo $rowpr["product_photo"] ?>"/>
                </div>
                <div class="product-details">
                    <div class="product-title"><?php echo $rowpr["product_name"] ?></div>
                    <p class="product-description">
                    <?php echo $rowpr["product_description"] ?>
                    </p>
                </div>
                <div class="product-price "	><?php echo $rowpr["product_price"] ?></div>
                <div class="product-quantity">
                    <input alt="<?php echo $row["cart_id"] ?>" type="number" value="<?php echo $row["cart_qty"] ?>" min="1" max="<?php echo $stock ?>"/>
                </div>
                <div class="product-removal">
                    <button class="remove-product" value="<?php echo $row["cart_id"] ?>">Remove</button>
                </div>
                <div class="product-line-price">
                    <?php
                        $pr = $rowpr["product_price"];
                        $qty = $row["cart_qty"];
                        $tot = (int)$pr * (int)$qty;
                        echo $tot;
                    ?>
                </div>
            </div>
            <?php
                    }
                }
              
                }
            ?>

            <div class="totals">
                <div class="totals-item totals-item-total">
                    <label>Grand Total</label>
                    <div class="totals-value" id="cart-total">0</div>
                    <input type="hidden" id="cart-totalamt" name="carttotalamt" value=""/>
                </div>
            </div>
                <button type="submit" class="checkout" name="btn_checkout">Checkout</button>
        </div>
</form>
        <!-- partial -->
        <script src="../Assets/JQ/jQuery.js"></script>
        <script>
        /* Set rates + misc */
        var fadeTime = 300;
        /* Assign actions */
        $(".product-quantity input").change(function() {
            $.ajax({
                url: "../Assets/AjaxPages/AjaxCart.php?action=Update&id=" + this.alt + "&qty=" + this.value
            });
            updateQuantity(this);
        });
        $(".product-removal button").click(function() {
            $.ajax({
                url: "../Assets/AjaxPages/AjaxCart.php?action=Delete&id=" + this.value
            });
            removeItem(this);
        });
        /* Recalculate cart */
        function recalculateCart() {
            var subtotal = 0;
            /* Sum up row totals */
            $(".product").each(function() {
                subtotal += parseFloat(
                        $(this).children(".product-line-price").text()
                        );
            });
            /* Calculate totals */
            var total = subtotal;
            /* Update totals display */
            $(".totals-value").fadeOut(fadeTime, function() {
                $("#cart-total").html(total.toFixed(2));
                document.getElementById("cart-totalamt").value = total.toFixed(2);
                if (total == 0) {
                    $(".checkout").fadeOut(fadeTime);
                } else {
                    $(".checkout").fadeIn(fadeTime);
                }
                $(".totals-value").fadeIn(fadeTime);
            });
        }
        /* Update quantity */
        function updateQuantity(quantityInput) {
            /* Calculate line price */
            var productRow = $(quantityInput).parent().parent();
            var price = parseFloat(productRow.children(".product-price").text());
            var quantity = $(quantityInput).val();
            var linePrice = price * quantity;
            /* Update line price display and recalc cart totals */
            productRow.children(".product-line-price").each(function() {
                $(this).fadeOut(fadeTime, function() {
                    $(this).text(linePrice.toFixed(2));
                    recalculateCart();
                    $(this).fadeIn(fadeTime);
                });
            });
        }
        /* Remove item from cart */
        function removeItem(removeButton) {
            /* Remove row from DOM and recalc cart total */
            var productRow = $(removeButton).parent().parent();
            productRow.slideUp(fadeTime, function() {
                productRow.remove();
                recalculateCart();
            });
        }
        $('.switch2 input').on('change', function() {
            var dad = $(this).parent();
            if ($(this).is(':checked'))
                dad.addClass('switch2-checked');
            else
                dad.removeClass('switch2-checked');
        });
        </script>
    </body>
    <?php
?>
</html>
