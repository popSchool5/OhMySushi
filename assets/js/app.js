(function ($) {
    $(".addPanier").click(function (event) {
        console.log($('.addPanier'))
        event.preventDefault();
        let $addPanier = $(this);
        $.get($(this).attr('href'), function (data, status) {

            if (data.error) {
            
            } else {

                $("#countt").empty().append(data.count);
                $("#count").empty().append(data.count);

                let id = $addPanier.data("id"); 
                $('.addPanier[data-id="'+id+'"]').find(".compteParProduit").text(data.compteParProduit)



                $("#counttt").empty().append(data.count);
                $("[data-total-panier]").text(data.total);
                $("#countttt").empty().append(data.count);
                // $addPanier.find(".compteParProduit").empty().append(data.compteParProduit);
                $(".dropdown-menu-right").replaceWith(data.panierDropdown);
                $("#mySidenav").replaceWith(data.panierMobileDropdown);
            }

        }, 'json');
    });
})(jQuery);