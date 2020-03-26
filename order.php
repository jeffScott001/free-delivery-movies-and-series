<?php session_start(); ?>
<?php if($_SESSION['verified']){ ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/style.css">
        <script src="https://kit.fontawesome.com/be994c5cbf.js" crossorigin="anonymous"></script>
        <title>OrderMovies</title>
    </head>
    <body class="">
        <?php
        include ("inc/navbar.php");  
        // include ("inc/searchbar.php");
        ?>
        <div class="body-order">
            <div class="order-container">
                <h1 class="order-title">Order confirmation</h1>
                <form>
                    <label class="location-lable">Delivery Address(edit if required)</label>
                    <div class="order-input-container">
                        <input type="text" id="location" class="location-input" value="<?php echo $_SESSION['street'] . ' - ' . $_SESSION['building'] ; ?>"/>
                    </div>
                    <label class="location-lable">Phone Number(edit if required)</label>
                    <div class="order-input-container">
                        <input type="text" id="phone" class="location-input" name="phone_number" value="<?php echo $_SESSION['phone_number']; ?>" />
                    </div>
                    <div id="items-container">
                      
                    </div>
                    <label class="method-payment-lable">Method of Payment</label>
                    <div>
                        <select name="payment_method" class="order-select-payment" >
                            <option value="M-pesa">M-pesa</option>
                            <option value="Pay on Delivery">Pay on Delivery</option>
                        </select>
                        <input id="m_pesa_code" type="text" placeholder="Enter M-pesa payment code" />
                    </div>
                    <input type="hidden" id="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                    <input type="submit" class="place-order" value="Place your order" />
                </form>
            </div>
            <!-- <div class="model-container">
                <div class={`model`}>
                    <h3 class="model-title">Select Your New Delivery Location</h3>
                    <label class="order-region-lable">County</label>
                    <div>
                        <select name="county" class="order-select-location" >
                            <option value="Nakuru">Nakuru</option>
                            <option value="Muran'ga">Muran'ga</option>
                        </select>
                    </div>

                    <label class="order-region-lable">Region</label>
                    <div>
                        <select name="region" class="order-select-location" >
                            <option value="Gilgil">Gilgil</option>
                            <option value="Mukuyu">Mukuyu</option>
                        </select>
                    </div>

                    <label class="order-region-lable">Street</label>
                    <div>
                        <select name="street" class="order-select-location" >
                            <option value="G.T.I">G.T.I</option>
                            <option value="Mukuyu town">Mukuyu Town</option>
                        </select>
                    </div>
                    <div class="btn-container-order">
                        <button class="btn-order-location-change" >Change</button>
                        <button class="btn-order-location-change" >Cancel</button>
                    </div>
                </div>
            </div> -->
        </div>
        <!-- <script src="js/main.js"></script> -->
        <script src="js/nav_cart2.js"></script>
        <script src="js/order.js"></script>
    </body>
    </html>
<?php 
    } else {
        header('Location:http://localhost/online_freedelivery_movies_series/user/login.php');
    }

