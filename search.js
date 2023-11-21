// ************************************************
// Search js 
// ************************************************

// All product view
$(document).ready(function() {

    load_data();

    function load_data(data) {
       $.ajax({
           type: "POST",
           url: "get_product.php",
           data: {
               query: data
           },
           success: function(response) {

              $('.getAllProduct').empty();

               val = $.parseJSON(response);

               var len = val.length;

               if (len > 0) {

                   for (var i = 0; i < len; i++) {

                       var id = val[i]['id'];
                       var name = val[i]['name'];
                       var price = val[i]['price'];
                       var product_qty = val[i]['product_qty'];
                       var img = val[i]['img'];

                       if(val[i].product_qty>0){
                       
                        // All products
                        $('.getAllProduct').append('<div class="product">'+
                        '<div class="product-box product-white-bg wow fadeIn">' +
                            '<div class="product-image">' +
                            '<a href="">' +
                            '<img src="assets/images/'+ img +'" class="img-fluid  lazyload link" alt="">' +
                            '</a>' +
                            '<ul class="product-option">' +
                            '<li data-bs-toggle="tooltip" data-bs-placement="top" title="View">' +
                            '<a href="product-left-thumbnail.html?id=' + id + '" data-name = "' + name + '" class="view-product-details">' +
                            // '<a href="#" data-bs-toggle="modal" data-bs-target="#view" data-name = "' + name + '" data-price = "' + price + '" data-img ="' + img + '" class="quick-view link">' +
                            '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>' +
                            '</a>' +
                            '</li>' +
                            '<li data-bs-toggle="tooltip" data-bs-placement="top" title="Cart">' +
                            '<a href="#" data-name = "' + name + '" data-price = "' + price + '" data-product_qty = "' + product_qty + '" data-img = "' + img + '" id="link" class = "add-to-search-cart" class="notifi-wishlist">' +
                            '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>' +
                            '</a>' +
                            '</li>' +
                            '</ul>' +
                            '</div>' +
                            '<div class="product-detail position-relative">' +
                            '<a href="product-left-thumbnail.html?id=' + id + '" data-name = "' + name + '" class="view-product-details">' +
                            '<h6 class="name search">'+ name + '</h6>' +
                            '</a>' +
                            '<a href="">' +
                            '<h6 class="price theme-color">'+'Rs. ' + price + '</h6>' +
                            // '<h6 style="color:red; padding-left:80px;"><b>Out of stock</b></h6>' +
                            '</a>' +
                            '</div>'+
                            '</div>'+
                            '</div> ');
                        }else{
                            $('.getAllProduct').append('<div class="product">'+
                        '<div class="product-box product-white-bg wow fadeIn">' +
                            '<div class="product-image">' +
                            '<a href="">' +
                            '<img src="assets/images/'+ img +'" class="img-fluid  lazyload link" alt="">' +
                            '</a>' +
                            '<ul class="product-option">' +
                            '<p style="color:red; padding-top:10px;">Out of Stock</p>'+
                            '</ul>' +
                            '</div>' +
                            '<div class="product-detail position-relative">' +
                            '<a href="product-left-thumbnail.html?id=' + id + '" data-name = "' + name + '" class="view-product-details">' +
                            '<h6 class="name search">'+ name + '</h6>' +
                            '</a>' +
                            '<a href="">' +
                            '<h6 class="price theme-color">'+'Rs. ' + price + '</h6>' +
                            '</a>' +
                            '</div>'+
                            '</div>'+
                            '</div> ');
                        }
                   }

               }
               else {
                   $('.getAllProduct').append('<tr><td style="font-weight:bolder; text-align:center;"> Data not found </td></tr>');
               }

               // *****************************************
               // Triggers / Events
               // ***************************************** 

               // Quick view item 
               $('.quick-view').click(function(event) {
                   event.preventDefault();
                   var name = $(this).data('name');
                   shoppingCart.quickViewItem(name);
               });

               // Add item
               $('.add-to-search-cart').click(function(event) {
                  // alert(response)
                   event.preventDefault();
                   var name = $(this).data('name');
                   var price = Number($(this).data('price'));
                   var product_qty = Number($(this).data('product_qty'));
                   var img = $(this).data('img');
                   var quantity = 1;
                   let session = sessionStorage.getItem("email");
                    if(session != null){
                        shoppingCart.addItemToCart(name, email, price, product_qty, img, quantity);
                    } else {
                        swal("Login your account", "Add to cart");
                       // swal("Login to Add cart");
                        // alert("Login to Add cart");
                    }
               });

               // Clear items
               $('.clear-cart').click(function() {
                   shoppingCart.clearCart();
               });

               // Delete item button

               $('.table1').on("click", ".delete-item", function(event) {
                   var name = $(this).data('name')
                   shoppingCart.removeItemFromCartAll(name);
               })

           
               // -1
               $('.table1').on("click", ".minus-item", function(event) {
                       var name = $(this).data('name')
                       shoppingCart.removeItemFromCart(name);
                   })
                   // +1
               $('.table1').on("click", ".plus-item", function(event) {
                   var name = $(this).data('name')
                   shoppingCart.IncreaseItemToCart(name);
               })

               // Item count input
               $('.table1').on("change", ".item-count", function(event) {
                   var name = $(this).data('name');
                   var count = Number($(this).val());
                   shoppingCart.setCountForItem(name, count);
                   shoppingCart.getcart();
               });

              
                // cartcount and getcart
                let a = sessionStorage.getItem("email");

                if(a!=null){
                    shoppingCart.cartcount();
                    shoppingCart.getcart();
                }else{
                    $(".total-count").hide();
                }
           }
       })
  }

    // login email access in all page start
    let email = sessionStorage.getItem("email");
    // alert(email)
    document.getElementById("useremail").innerHTML = email;


   // search other page data name
   console.log("Window Location:", window.location);
   const queryString = window.location.search;
   const urlParams = new URLSearchParams(queryString);
   const result = urlParams.get('result')
   // alert(result)
   console.log(result);
   document.getElementById("srchText").innerHTML = result;
  // document.querySelector('input[id="find"]').value =result;

   // search other page process
   var search = result;
   if (search != '') {
      load_data(search);
   } else {
      load_data();
   }

   // Search 
   $('.link').click(function() {
       var search = $(this).data('value');
       if (search != '') {
           load_data(search);
       } else {
           load_data();
       }
   });
       $('#find').keyup(function() {
           var search = $(this).val();
        //   alert(search)
           if (search != '') {
               load_data(search);
           } else {
               load_data();
           }
       });

  
}); // All product view end
