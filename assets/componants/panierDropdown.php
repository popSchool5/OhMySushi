<div class="dropdown-menu dropdown-menu-right" style="background-color: #000;">
    <div class="dropdown-cart-products">
        <?php foreach ($productsDansLePanier as $productDansLePanier) { ?>
            <div class="product">
                <div class="product-cart-details">
                    <h4 class="product-title">
                        <a href="product.php?id=<?= $productDansLePanier['id'] ?>" class="bgbgtestjson text-white"><?= htmlspecialchars($productDansLePanier['name']) ?></a>
                    </h4>

                    <span class="cart-product-info">
                        <span class="text-white" class="cart-product-qty"><?= $_SESSION['panier'][$productDansLePanier['id']] ?> x <?= htmlspecialchars(number_format($productDansLePanier['price'], 2, ',', ' ')) ?>€</span>

                    </span>
                </div><!-- End .product-cart-details -->

                <figure class="product-image-container">
                    <a href="product.php?id=<?= $productDansLePanier['id'] ?>"  class="product-image">
                        <img src="./sysadmin/html/assets/uploads/<?= htmlspecialchars($productDansLePanier['image']) ?>" alt="product">
                    </a>
                </figure>
                <a href="./panier/delpanier.php?del=<?= htmlspecialchars($productDansLePanier['id']) ?>" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
            </div><!-- End .product -->
        <?php } ?>
    </div><!-- End .cart-product -->

    <div class="dropdown-cart-total">
        <span>Total</span>

        <span class="cart-total-price"><?= htmlspecialchars(number_format($panier->total(), 2, ',', ' ')) ?></span>
    </div><!-- End .dropdown-cart-total -->

    <div class="dropdown-cart-action">
        <a href="cart.php" class="btn btn-primary">Mon panier</a>
        <!-- <a href="checkout.html" class="btn btn-outline-primary-2"><span>Checkout</span><i class="icon-long-arrow-right"></i></a> -->
    </div><!-- End .dropdown-cart-total -->
</div><!-- End .dropdown-menu -->