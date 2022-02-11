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

    #mySidenav .product {
        display: flex;
        height: 100px;
    }

    #mySidenav .product .product-title a {
        font-size: 10px;
    }
</style>
<div id="mySidenav" class="sidenav">
    <h1>Mon panier</h1>
    <?php foreach ($productsDansLePanier as $productDansLePanier) { ?>

        <div class="product">
            <div class="product-cart-details">
                <h4 class="product-title">
                    <a href="product.html" class="bgbgtestjson text-white"><?= htmlspecialchars($productDansLePanier['name']) ?></a>
                </h4>

                <span class="cart-product-info">
                    <span class="text-white" class="cart-product-qty"><?= $_SESSION['panier'][$productDansLePanier['id']] ?> x <?= htmlspecialchars(number_format($productDansLePanier['price'], 2, ',', ' ')) ?>€</span>

                </span>
            </div><!-- End .product-cart-details -->

            <figure class="product-image-container">
                <a href="product.html" class="product-image">
                    <img src="./sysadmin/html/assets/uploads/petite<?= htmlspecialchars($productDansLePanier['image']) ?>" alt="product">
                </a>
            </figure>
            <a href="./panier/delpanier.php?del=<?= htmlspecialchars($productDansLePanier['id']) ?>" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
        </div><!-- End .product -->

    <?php } ?>

</div>