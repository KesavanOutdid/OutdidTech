// ************************************************
// Shopping Cart API
// ************************************************

var shoppingCart = (function() {
    // =============================
    // Private methods and propeties
    // =============================
    cart = [];

    // =============================
    // Public methods and propeties
    // =============================
    var obj = {};  
    
    // Add to cart
    obj.addItemToCart = function(name, email, price, product_qty, img, quantity) {
        var xmlhttp = new XMLHttpRequest();
    
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                val = $.parseJSON(this.response);
                var len = val.length;               
                    if (len == "") {
                        savetocart(name, email, price, product_qty, img, quantity);
                    } else {
                        swal("Item already exist in the cart.", "Check your cart");
                       // alert("Item already exist in the cart.");
                    }                
            }
        };
        xmlhttp.open("POST", "checkduplicate.php?name=" + name);
        xmlhttp.send();
    }

    obj.cartcount = function() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              //  alert(this.response)
                val = $.parseJSON(this.response);
                var len = val.length;
                var finalLen;
                if (len == "") {
                    finalLen = 0;
                } else {
                    finalLen = len;
                }
               // alert(finalLen)
                $('.total-count').html(finalLen);
            }
        };
        xmlhttp.open("GET", "getcart.php");
        xmlhttp.send();
    }

    // save cart
    function savetocart(name, email, price, product_qty, img, quantity) {
       // alert(product_qty)

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                    console.log("Item added to cart");
                    obj.cartcount();
                    obj.getcart();
            }
        };
        xmlhttp.open("POST", "savecart.php?name=" + name + "&email=" + email +  "&price=" + price + "&product_qty=" + product_qty + "&img=" + img + "&qty=" + quantity);
        xmlhttp.send();
    }

    // Increase item count to cart 
    obj.IncreaseItemToCart = function(name,total_p_qty,Plusquantity) {
        // alert(total_p_qty);
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var result = JSON.parse(this.response);
                for (var i in result) {
                    var q = parseInt(result[i].quantity);
                    var tupdate = q + 1;
                    updateplusquantity(name, tupdate, total_p_qty, Plusquantity);
                    return;
                }
            }
        };
        xmlhttp.open("POST", "checkduplicate.php?name=" + name);
        xmlhttp.send();

    }

    function updateplusquantity(name, tupdate, total_p_qty, Plusquantity) {
       // alert(Plusquantity);
         var xmlhttp = new XMLHttpRequest();
         xmlhttp.onreadystatechange = function() {
             if (this.readyState == 4 && this.status == 200) {
                 console.log("Quantity updated");
                 obj.getcart();
             }
         };
         xmlhttp.open("POST", "updateqty.php?name=" + name + "&qty=" + tupdate + "&total_p_qty=" + total_p_qty + "&Plusquantity=" + Plusquantity);
         xmlhttp.send();
     }

    // Remove item from cart
    obj.removeItemFromCart = function(name,total_p_qty,Minusquantity) {

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var result = JSON.parse(this.response);
                for (var i in result) {
                    var q = parseInt(result[i].quantity);
                    if (q > 1) {
                        var tupdate = q - 1;
                    } else {
                        var tupdate = 1;
                    }
                    updateminusquantity(name, tupdate, total_p_qty, Minusquantity);
                    return;
                }
            }
        };
        xmlhttp.open("POST", "checkduplicate.php?name=" + name);
        xmlhttp.send();
    }

    function updateminusquantity(name, tupdate, total_p_qty, Minusquantity) {
        // alert(Minusquantity);
         var xmlhttp = new XMLHttpRequest();
         xmlhttp.onreadystatechange = function() {
             if (this.readyState == 4 && this.status == 200) {
                 console.log("Quantity updated");
                 obj.getcart();
             }
         };
         xmlhttp.open("POST", "updateqty.php?name=" + name + "&qty=" + tupdate + "&total_p_qty=" + total_p_qty + "&Minusquantity=" + Minusquantity);
         xmlhttp.send();
     }


    // Set count from item
    obj.setCountForItem = function(name, count) {
        if (count >= 1) {
            updatequantity(name, count);
        }
    };

    // Remove all items from cart
    obj.removeItemFromCartAll = function(name, total_p_qty, quantity) {
        deleteitem(name, total_p_qty, quantity);
    }

    function deleteitem(name, total_p_qty, quantity) {
        
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log("Item Deleted");
                obj.cartcount();
                obj.getcart();
            }
        };
        xmlhttp.open("POST", "deleteitem.php?name=" + name + "&total_p_qty=" + total_p_qty + "&quantity=" + quantity);
        xmlhttp.send();
    }

    // Clear cart
    obj.clearCart = function() {
        deletealltems();
    }

    function deletealltems() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log("All cart items deleted");
                obj.cartcount();
                obj.getcart();
            }
        };
        xmlhttp.open("POST", "cartalldelete.php");
        xmlhttp.send();
    }

    // Quick view 
    obj.quickViewItem = function(name,product_qty) {
        // alert(name)
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                val = $.parseJSON(this.response);
                var len = val.length;
                View(val);
            }
        };
        xmlhttp.open("POST", "view_product.php?name=" + name + "&product_qty=" + product_qty);
        xmlhttp.send();
    }

   // Quick View
    function View(val) {
        var cartArray = val;
        var output = "";
        for (var i in cartArray) {
         //  alert(cartArray[i].id)
            var len = cartArray.length;
            if(cartArray[i].product_qty>0){            
                output +=
                "<div class='modal-content quick-view'>"+
                "<div class='modal-header p-0'>" +
                "<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'>" +
                "<i class='fa-solid fa-xmark'></i>" +
                "</button>" +
                "</div>" +
                "<div class='modal-body'>" +
                "<div class='row g-sm-4 g-2'>" +
                "<div class='col-lg-6'>" +
                "<div class='slider-image' style='padding-left:100px; weight:100%'>" +
                "<img src='assets/images/" + cartArray[i].img + "' class='img-fluid  lazyload' alt=''>" +
                "</div>" +
                "</div>" +
                "<div class='col-lg-6'>" +
                "<div class='right-sidebar-modal'>" +
                "<h4 class='title-name' style='padding-top:20%;'>" + cartArray[i].name + "</h4>" +
                "<div class='product-detail'>" +
                "<h4>Price :" + cartArray[i].price + "</h4>" +
                "</div>" +
                "<div class='modal-button'>" +
                "<button class='add-cart btn btn-md add-cart-button icon' data-name = '" + cartArray[i].name + "' data-price = '" + cartArray[i].price + "' data-img = '" + cartArray[i].img + "' >Add To Cart</button>" +
                "<button  class='view-prd-details btn theme-bg-color view-button icon text-white fw-bold btn-md' data-name = '" + cartArray[i].id + "' data-name = '" + cartArray[i].name + "' data-price = '" + cartArray[i].price + "' data-img = '" + cartArray[i].img + "'>View More Details</button>" +
                "</div>" +
                "</div>" +
                "</div>" +
                "</div>" +
                "</div>" +
                "</div>" ;
            }else{output +=
                "<div class='modal-content quick-view'>"+
                "<div class='modal-header p-0'>" +
                "<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'>" +
                "<i class='fa-solid fa-xmark'></i>" +
                "</button>" +
                "</div>" +
                "<div class='modal-body'>" +
                "<div class='row g-sm-4 g-2'>" +
                "<div class='col-lg-6'>" +
                "<div class='slider-image' style='padding-left:100px; weight:100%'>" +
                "<img src='assets/images/" + cartArray[i].img + "' class='img-fluid  lazyload' alt=''>" +
                "</div>" +
                "</div>" +
                "<div class='col-lg-6'>" +
                "<div class='right-sidebar-modal'>" +
                "<h4 class='title-name' style='padding-top:20%;'>" + cartArray[i].name + "</h4>" +
                "<div class='product-detail'>" +
                "<h4>Price :" + cartArray[i].price + "</h4>" +
                "</div>" +
                "<div class='modal-button'>" +
                "<h2 style='color:red'>Out Of Stock</h2>"+
                // "<button class='add-cart btn btn-md add-cart-button icon' data-name = '" + cartArray[i].name + "' data-price = '" + cartArray[i].price + "' data-img = '" + cartArray[i].img + "' >Add To Cart</button>" +
                "<button  class='view-prd-details btn theme-bg-color view-button icon text-white fw-bold btn-md' data-name = '" + cartArray[i].id + "' data-name = '" + cartArray[i].name + "' data-price = '" + cartArray[i].price + "' data-img = '" + cartArray[i].img + "'>View More Details</button>" +
                "</div>" +
                "</div>" +
                "</div>" +
                "</div>" +
                "</div>" +
                "</div>" ;
            }
        }
        $('#quickView').html(output);

            // Add item
            $('.add-cart').click(function(event) {
            event.preventDefault();
            var name = $(this).data('name');
            var price = Number($(this).data('price'));
            var img = $(this).data('img');
            var quantity = 1;
            let session = sessionStorage.getItem("email");
            if(session != null){
                shoppingCart.addItemToCart(name, email, price, img, quantity);
            } else {
                swal("Login your account", "Add to cart");
               // swal("Login to Add cart");
                // alert("Login to Add cart");
            }
            });

            // Product view
            $('.view-prd-details').click(function(event) {
                event.preventDefault();
              //  var id = $(this).data('id');
                var name = $(this).data('name');
               // alert(name);
                location.href = 'product-left-thumbnail.html?id='+ name +'';
            });

    } // Quick View end


    // All cart get details 
    obj.getcart = function() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                val = JSON.parse(this.response);
                get(val);
                checkout(val);
            }
        };
        
        xmlhttp.open("POST", "getcart.php");
        xmlhttp.send();
    }

    function checkout(val){
      //  alert(val)
    }
     
    function get(val) {
        var cartArray = val;
      //  alert(cartArray[i].name)
        var output = "";
       // var thead = "";
        var totalCart = 0;
       // thead += "<tr><th>Name</th><th>Name2</th></tr>";
        for (var i in cartArray) {
         //   alert((cartArray[i].total).toFixed(2))
            var len = cartArray.length;
            output +=             
            "<tr class='product-box-contain table1'>"+
            "<td class='product-detail' style='padding-bottom:15px;padding-top:25px;'>"+
            "<div class='product border-0'>"+
            "<a href='#' class='product-image'>"+
            "<img src='assets/images/" + cartArray[i].img + "' class='img-fluid lazyload' alt=''>"+
            "</a>"+
            "<div class='product-detail'>"+            
            "<td class='name' style='padding-bottom:15px;padding-top:25px;'>"+
            "<h4 class='table-title text-content'></h4>"+
            "<h5>" + cartArray[i].name + "</h5>"+
            "</td>"+
            "</div>"+
            "</div>"+
            "</td>"+
            "<td class='price' style='padding-bottom:15px;padding-top:25px;'>"+
            "<h4 class='table-title text-content'></h4>"+
            "<h5>Rs. " + cartArray[i].price + "</h5>"+
            "</td>"+
            "<td class='quantity' style='padding-bottom:15px;padding-top:25px;'>"+
            "<h4 class='table-title text-content'></h4>"+
            "<div class='quantity-price'>"+
            "<div class='cart_qty'>"+
            "<div class='input-group'>"+
            "<button class='minus-item qty-minus-item input-group-addon btn btn-primary' data-name='"+ cartArray[i].name + "' data-total_p_qty='" + cartArray[i].total_p_qty + "' data-quantity='" + cartArray[i].quantity + "'>"+ 
            "<i class='fa fa-minus ms-0' aria-hidden='true'></i>" +
            "</button>" +
            "<input type='number' class='item-count form-control' class='form-control input-number qty-input' type='text' name='quantity'  value='" + cartArray[i].quantity + "' maxlength='0' oninput='javascript: if (this.value.length > this.maxLength) this.value=this.value.slice(0, this.maxLength);'>" +
            "<button class='plus-item qty-plus-item btn btn-primary input-group-addon' data-name='" + cartArray[i].name + "' data-total_p_qty='" + cartArray[i].total_p_qty + "' data-quantity='" + cartArray[i].quantity + "'>" +
            "<i class='fa fa-plus ms-0' aria-hidden='true'></i>" +
            "</button>" +
            "</div>"+
            "</div>"+
            "</div>"+
            "</td>"+
            "<td class='subtotal' style='padding-bottom:15px;padding-top:25px;'>"+
            "<h4 class='table-title text-content'></h4>"+
            "<h5>Rs. " + (cartArray[i].total).toFixed(2) + "</h5>" + 
            "</td>"+
            "<td class='save-remove' style='padding-bottom:15px;padding-top:25px;'>"+
            "<h4 class='table-title text-content'></h4>"+
            "<a class='remove close_button delete-item '  data-name='" + cartArray[i].name + "' data-total_p_qty='" + cartArray[i].total_p_qty + "' data-quantity='" + cartArray[i].quantity + "'>Remove</a>"+ 
            "</td>"+
            "</tr>";
            totalCart += cartArray[i].price * cartArray[i].quantity
        }
        if(len>0){
          //  $('.table1').html(thead);
            $('.table1').html(output);
            $('.total-cart').html(totalCart.toFixed(2));
            $('.total-value').html((totalCart+80).toFixed(2));
        }else{
            $('.nodata').append('<h3 style="text-align:center;padding-top: 50px;color:#0da487;font-size: 50px;"> Your Cart Is Empty </h3>');
            $('.table1').html(output);
          //  $('.table1').html(thead);
            $('.total-cart').html(totalCart.toFixed(2));
            $('.total-value').html((totalCart).toFixed(2));
        }
    }
    // $(".empty-cart").append('<h3 style="text-align:center;padding-top: 50px;color:#0da487;font-size: 50px;"> Your Cart Is Empty </h3>');
    $(".newCart").append('<div class="summery-contain">'+
        '<ul>'+
        '<li>'+
        '<h4>Subtotal</h4>'+
        '<h5 class="totalname"></h5>'+
        '<h4 class="price"><b>Rs.</b><span class="total-cart"></span></h4>'+
        '</li>'+
        '<li class="align-items-start">'+
        '<h4>Shipping</h4>'+
        '<h4 class="price text-end" class="ship-value">Rs.80.00</h4>'+
        '</li>'+
        '</ul>'+
        '</div>'+
        '<ul class="summery-total">'+
        '<li class="list-total border-top-0">'+
        '<h4>Total (Rs)</h4>'+
        '<h4 class="price theme-color">Rs.</b><span class="total-value"></span></h4>'+
        '</li>'+
        '</ul>'+
        '</div>');
    $(".new-cart-button").append(
        '<ul>'+
        '<li>'+
        '<button href="checkoutLogin.php" class="check_user useremail btn btn-animation proceed-btn fw-bold">Process To Checkout</button>'+
        '</li>'+
        '</ul>');

        $('.check_user').click(function(event) {
            event.preventDefault();
            let email = sessionStorage.getItem("email");
           // document.getElementById("useremail").innerHTML = personName;
           // var email = $(this).data('useremail');
           // alert(this.response);
            location.href = 'checkoutLogin.php?email='+ email +'';
            });
    // All cart get details end


    // cart : Array
    // Item : Object/Class
    // addItemToCart : Function
    // removeItemFromCart : Function
    // removeItemFromCartAll : Function
    // clearCart : Function
    // countCart : Function
    // totalCart : Function
    // listCart : Function
    // saveCart : Function
    // loadCart : Function
    return obj;
})();

// All product view
$(document).ready(function() {

    // product dropdown menu fuunction
    getmainindex();

    load_data();

	function load_data(data) {
        $.ajax({
            
            type: "POST",
            url: "get_product.php",
            data: {
                query: data
            },
            success: function(response) {
              //  alert(response);
                $('.allproduct').empty();

                val = $.parseJSON(response);
                
                var len = val.length;

                if (len > 0) {
                    for (var i = 0; i < len; i++) {

                        var id = val[i]['id'];
                        var name = val[i]['name'];
                        var price = val[i]['price'];
                        var product_qty = val[i]['product_qty'];
                        var select_show = val[i]['select_show'];
                        var img = val[i]['img'];

                        if(val[i].product_qty >0){
                        
                            // All products
                            $('.allproduct').append('<div>'+
                                '<div class="product-box product-white-bg wow fadeIn">' +
                                '<div class="product-image">' +
                                '<a href="product-left-thumbnail.html?id=' + id + '" data-name = "' + name + '" class="view-product-details">' +
                                '<img src="assets/images/'+ img +'" class="img-fluid  lazyload link" alt="">' +
                                '</a>' +
                                '<ul class="product-option">' +
                                '<li data-bs-toggle="tooltip" data-bs-placement="top" title="View">' +
                                '<a href="product-left-thumbnail.html?id=' + id + '" data-name = "' + name + '" class="view-product-details">' +
                                // '<a href="#" data-bs-toggle="modal" data-bs-target="#view" data-name = "' + name + '" data-price = "' + price + '" data-img ="' + img + '" data-product_qty = "' + product_qty + '" class="quick-view link">' +
                                '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>' +
                                '</a>' +
                                '</li>' +
                                '<li data-bs-toggle="tooltip" data-bs-placement="top" title="Cart">' +
                                // onclick="openPopup()" 
                                '<a href="#"  data-name = "' + name + '" data-price = "' + price + '" data-product_qty = "' + product_qty + '" data-img = "' + img + '" id="link" class = "add-to-cart" class="notifi-wishlist">' +
                                '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>' +
                                '</a>' +
                                '</li>' +
                                '</ul>' +
                                '</div>' +
                                '<div class="product-detail position-relative">' +
                                '<a href="product-left-thumbnail.html?id=' + id + '" data-name = "' + name + '" class="view-product-details">' +
                                '<h6 class="name">'+ name + '</h6>' +
                                '</a>' +
                                '<a href="">' +
                                '<h6 class="price theme-color">'+'Rs. ' + price + '</h6>' +
                                '</a>' +
                                '</div>'+
                                '</div> '+
                                '</div>');
                        }else{
                            $('.allproduct').append('<div>'+
                            '<div class="product-box product-white-bg wow fadeIn">' +
                            '<div class="product-image">' +
                            '<a href="">' +
                            '<img src="assets/images/'+ img +'" class="img-fluid  lazyload link" alt="">' +
                            '</a>' +
                            '<ul class="product-option">' +
                            '<p style="color:red; padding-top:10px; line-height: 0px;">Out of Stock</p>'+
                            '</ul>' +
                            '</div>' +
                            '<div class="product-detail position-relative">' +
                            '<a href="product-left-thumbnail.html?id=' + id + '" data-name = "' + name + '" class="view-product-details">' +
                            '<h6 class="name">'+ name + '</h6>' +
                            '</a>' +
                            '<a href="">' +
                            '<h6 class="price theme-color">'+'Rs. ' + price + '</h6>' +
                            // '<h6 style="color:red; padding-left:80px;"><b>Out of stock</b></h6>' +
                            '</a>' +
                            '</div>'+
                            '</div> '+
                            '</div>');
                        }
                    }
                }
                else {
                    $('.allproduct').append('<tr><td style="font-weight: bolder;"> Data not found </td></tr>');
                }

                // *****************************************
                // Triggers / Events
                // ***************************************** 

                // Quick view item 
                $('.quick-view').click(function(event) {
                    event.preventDefault();
                  // alert(response)
                    var name = $(this).data('name');
                    var product_qty = Number($(this).data('product_qty'));
                    shoppingCart.quickViewItem(name,product_qty);
                });

                // Add item
                $('.add-to-cart').click(function(event) {
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
                    var total_p_qty = $(this).data('total_p_qty')
                    var quantity = $(this).data('quantity')
                   // alert(total_p_qty)
                    shoppingCart.removeItemFromCartAll(name,total_p_qty,quantity);
                })
            
                // -1
                $('.table1').on("click", ".minus-item", function(event) {
                    var name = $(this).data('name')
                    var total_p_qty = $(this).data('total_p_qty')
                    var Minusquantity = $(this).data('quantity')
                     //alert(Minusquantity)
                    if(Minusquantity != 1){
                        shoppingCart.removeItemFromCart(name,total_p_qty,Minusquantity);
                    }
                })
                   
                // +1
                $('.table1').on("click", ".plus-item", function(event) {
                    var name = $(this).data('name')
                    var total_p_qty = $(this).data('total_p_qty');
                    var Plusquantity = $(this).data('quantity')
                    if(total_p_qty != 0){
                        shoppingCart.IncreaseItemToCart(name,total_p_qty,Plusquantity);
                    }     
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
        });
    }

    // product dropdown menu start
    function getmainindex() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var val = JSON.parse(this.response);
                var value = val;
                var output = "";
                for (var i in value) {
                    var category_id = value[i]['category_id'];
                    output +=
                    '<li class="subMenu"><a style="font-size: large;">'+ value[i]['main_title'] +'</a>'+
                    '<ul style="display:none; padding-left: 20px; padding-top:20px;" id=index'+ value[i]['category_id'] + '>'+
                   // '<li id=index'+ value[i]['category_id'] + '></li>'+
                    '</ul>'+
                    '</li>';
                    $('.index-get-categorys').html(output);
                    getsubindex(category_id);
                } 
                $('.subMenu > a').click(function(e){
                    e.preventDefault();
                    var subMenu = $(this).siblings('ul');
                    var li = $(this).parents('li');
                    var subMenus = $('#sidebar li.subMenu ul');
                    var subMenus_parents = $('#sidebar li.subMenu');
                    if(li.hasClass('open')){
                        if(($(window).width() > 768) || ($(window).width() < 479)) {
                            subMenu.slideUp();
                        } else {
                            subMenu.fadeOut(250);
                        }
                        li.removeClass('open');
                    } else {
                        if(($(window).width() > 768) || ($(window).width() < 479)) {
                            subMenus.slideUp();			
                            subMenu.slideDown();
                        } else {
                            subMenus.fadeOut(250);			
                            subMenu.fadeIn(250);
                        }
                        subMenus_parents.removeClass('open');		
                        li.addClass('open');	
                    }
                });
            }
        };
        xmlhttp.open("GET", "get_dropdown.php", true);
        xmlhttp.send();
    }
    
    function getsubindex(category_id) {
        var output = "";
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var val = JSON.parse(this.response);
                for (var i in val) {
                    output +='<li><b>&#x2023;</b> <a class="link" data-value="' + val[i]['sub_title'] + '" style="color: black;">' + val[i]["sub_title"] + '</a></li>';
                  //  output +='<li><b>&#x2023;</b> <a class="link" href="search.html?result=' + val[i]['sub_title'] + '" style="color: black;">' + val[i]["sub_title"] + '</a></li>';
                    $("#index" + category_id).html(output);
                }
                $('.link').click(function() {
                    var search = $(this).data('value');
                    // alert(search)
                    
                    if (search != '') {
                        load_data(search);
                    } else {
                        load_data();
                    }
                });
            }
        };
        xmlhttp.open("GET", "get_sub_dropdown.php?category_id=" + category_id, true);
        xmlhttp.send();
    }
    // product dropdown menu end

        // Search 
        // $('.link').click(function() {
        //     var search = $(this).data('value');
        //     if (search != '') {
        //         load_data(search);
        //     } else {
        //         load_data();
        //     }
        // });
 
        $('#srchFld').keyup(function() {
            var search = $(this).val();
           // alert(search)
            if (search != '') {
                load_data(search);
            } else {
                load_data();
            }
        });
}); // All product view end

    // login email access in all page start
     let email = sessionStorage.getItem("email");
     // alert(email)
     document.getElementById("useremail").innerHTML = email;

    // destroy a session 
        function deleteItems() {
            sessionStorage.clear();
            window.location.replace("login.html");
        }  

    // login hide and show start
    $(document).ready(function(){
        // alert(personName)
         if(email){
             $("#hideShowID").hide();
         }else{
             $("#hideShowID").show();
         }
    });
    // login hide and show end
    // Account profile hide and show start
    $(document).ready(function(){
       //  alert(personName)
         if(email){
             $("#myAccount").show();
             $("#myOrders").show();
            // $("#cart-box").show();
         }else{
             $("#myAccount").hide();
             $("#myOrders").hide();
            // $("#cart-box").hide();
         }
    });
    // Account profile hide and show end

  

  // login email access in all page end


// Get dropdowns
window.onload = function() {
    getmain();
  //  getmainindex();
}

function getmain() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var val = JSON.parse(this.response);
            var value = val;
            var output = "";
            for (var i in value) {
                var category_id = value[i]['category_id'];
                output +='<li class="sub-dropdown-hover" id="a-main-title">'+
                    '<a class="dropdown-item">'+ value[i]['main_title'] +'</a>'+
                    '<ul class="sub-menu">'+
                    '<li id='+ value[i]['category_id'] + '>'+
                    // '<a class="dropdown-item" href="search.html?result=Boards/Kits" id='+ value[i]['category_id'] + '></a>'+
                    '</li>'+
                    '</ul>'+
                    '</li>';
                $('#get-categorys').html(output);
                getsub(category_id);
            } 
        }
    };
    xmlhttp.open("GET", "get_dropdown.php", true);
    xmlhttp.send();
}


function getsub(category_id) {
    var output = "";
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var val = JSON.parse(this.response);
            for (var i in val) {
                output += '<a class="dropdown-item" href="search.html?result=' + val[i]['sub_title'] + '" style="padding-top:5px;">' + val[i]["sub_title"] + '</a>';
                $("#" + category_id).html(output);
            }
        }
    };
    xmlhttp.open("GET", "get_sub_dropdown.php?category_id=" + category_id, true);
    xmlhttp.send();
}
// Get dropdowns end


// Get All delivery order list 
$(document).ready(function () {

    $.ajax({

        type: "GET",
        url: "get_orderSuccess.php",

        success: function (response) {
            //  alert(response);

            val = $.parseJSON(response);

            var len = val.length;

            if (len > 0) {
                for (var i = 0; i < len; i++) {

                    var id = val[i]['id'];
                    var name = val[i]['name'];
                    var email = val[i]['email'];
                    var phone = val[i]['phone'];
                    var address = val[i]['address'];
                    var pincode = val[i]['pincode'];
                    var deliveryoption = val[i]['deliveryoption'];
                    var paymentoption = val[i]['paymentoption'];
                    var p_img = val[i]['p_img'];
                    var p_name = val[i]['p_name'];
                    var p_price = val[i]['p_price'];
                    var p_quantity = val[i]['p_quantity'];
                    var total = val[i]['total'];

                    // alert(user_profile)
                    // All products
                    $('#order-table-1').append(
                        '<tr>'+
                        '<td class="name">'+
                        '<img src="assets/images/'+p_img+'" class="img-fluid blur-up lazyload" alt="">'+
                        '</td> '+
                        '<td class="name">'+
                        '<h4 class="text-content">'+p_name+'</h4>'+
                        '</td>'+
                        '<td class="price">'+
                        '<h6 class="text-content">'+paymentoption+'</h6>'+
                        '</td>'+
                        '<td class="price">'+
                        '<h6 class="text-content">'+address+'</h6>'+
                        '</td>'+
                        '<td class="price">'+
                        '<h6 class="theme-color">'+p_price+'</h6>'+
                        '</td>'+
                        '<td class="quantity">'+
                        '<h4 class="text-title">'+p_quantity+'</h4>'+
                        '</td>'+
                        '<td class="subtotal">'+
                        '<h5>'+total+'</h5>'+
                        '</td>'+
                        '<td>'+
                        '<button class="tracking-id btn btn-sm btn-solid text-white " data-bs-toggle="modal" data-id="'+id+'"><a href="order-tracking.html?id='+id+'">Tracking</a></button>'+
                        '</td>'+
                        '</tr>');
                }
            }
        }
    });
});
// location.href = 'search.html?result='+ srchValue + '';

// // Tracking item id 
// $('#order-table-1').on("click", ".tracking-id", function (event) {
//     var id = $(this).data('id')
//     // alert(id);
//     shoppingCart.TrackIteamId(id);
// })


