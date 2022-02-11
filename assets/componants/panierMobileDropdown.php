<style>
    #mySidenav {
        width: 100%;
        background-color: #000;
    }

    #mySidenav h1 {
        color: white;
        font-weight: 200;
        text-align: center;
    }


    #mySidenav .product .product-title a {
        font-size: 10px;
    }

    #mySidenav .product {
        position: relative;
        display: flex;
        align-items: flex-start;
        padding: 1.6rem 2.4rem 1.6rem 1rem;
        box-shadow: none;
        margin: 0 !important;
        border: none;
        border-bottom: 1px solid #443e3e;
        box-shadow: none !important;
    }

    .productMobilePanier .product-cart-details {
        font-weight: 400;
        max-width: 130px;
        font-size: 1.7rem;
        color: #999;
        text-align: left;
    }

    .productMobilePanier .product-title {
        font-weight: 400;
        font-size: 2rem !important;
        line-height: 1.3;
        color: #666;
        text-align: left;
        margin-bottom: .4rem;
    }

    .productMobilePanier .product-title a {
        font-weight: 400;
        font-size: 1.8rem !important;
        line-height: 1.3;
        color: #666;
        text-align: left;
        margin-bottom: .4rem;
    }

    .productMobilePanier .product-image-container {
        position: relative;
        max-width: 150px;
        margin: 0;
        margin-left: auto;
    }

    .productMobilePanier>.btn-remove {
        position: absolute;
        top: 50%;
        right: -.55rem;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 2.9rem;
        height: 2.4rem;
        color: white !important;
        font-size: 1.3rem;
        line-height: 1;
        text-align: center;
        margin-top: -2.2rem;
    }

    .productMobilePanier .sidenav a {
        padding-top: 16px;
        padding-bottom: 16px;
        padding-left: 0px;
        text-align: left;
        text-decoration: none;
        font-size: 25px;
        color: #000;
        display: block;
        transition: 0.3s;
    }
    .dropdown-cart-action-moi{
        margin:2rem 0 8rem 0;
        display: flex;
        justify-content: center;
    }
    .product-moi{
        padding: 0.5rem 2rem 0.5rem 1.2rem !important;
    }
    .product-title-moi{
        padding-left: 0 !important;
        padding-bottom: 0.2rem;
    }
    .sidenav-moi{
        padding-top: 30px !important;
      
    }
  

</style>
<div id="mySidenav" class="sidenav sidenav-moi">
    <h1>Mon panier</h1>
    <?php foreach ($productsDansLePanier as $productDansLePanier) { ?>

        <div class="productMobilePanier product product-moi">
            <div class="product-cart-details">
                <h4 class="product-title">
                    <a href="product.html" class="product-title-moi bgbgtestjson text-white"><?= htmlspecialchars($productDansLePanier['name']) ?></a>
                </h4>

                <span class="cart-product-info">
                    <span class="text-white" class="cart-product-qty"><?= $_SESSION['panier'][$productDansLePanier['id']] ?> x <?= htmlspecialchars(number_format($productDansLePanier['price'], 2, ',', ' ')) ?>€</span>

                </span>
            </div><!-- End .product-cart-details -->

            <div class="product-image-container">
                <a href="product.html" class="product-image">
                    <img src="./sysadmin/html/assets/uploads/<?= htmlspecialchars($productDansLePanier['image']) ?>" alt="product">
                </a>
            </div>
            <div>
                <style>
                    .icon-close{
                        color: white;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        align-self: center;
                    }
                </style>
                <a href="./panier/delpanier.php?del=<?= htmlspecialchars($productDansLePanier['id']) ?>" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
            </div>



        </div><!-- End .product -->

    <?php } ?>
    <div class="dropdown-cart-action dropdown-cart-action-moi ">
        <a href="cart.php" class="btn btn-primary">Mon panier</a>
        <!-- <a href="checkout.html" class="btn btn-outline-primary-2"><span>Checkout</span><i class="icon-long-arrow-right"></i></a> -->
    </div><!-- End .dropdown-cart-total -->

</div>