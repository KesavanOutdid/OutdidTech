var shoppingCart = (function () {
    // =============================
    // Private methods and propeties
    // =============================
    cart = [];

    // =============================
    // Public methods and propeties
    // =============================
    var obj = {};
    
    // Remove all product items from admin page
    obj.removeItemFromProductAll = function (id) {
        deleteproductitem(id);
        // alert(id);

    }

    function deleteproductitem(id) {

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                console.log("Product Item Deleted");
                // obj.cartcount();
                //  obj.getcart();
            }
        };
        xmlhttp.open("POST", "deleteproductitem.php?id=" + id);
        xmlhttp.send();
    }

     // Remove category items from admin page
     obj.removeItemFromCategoryAll = function (id) {
        deletecategoryitem(id);
        // alert(id);

    }

    function deletecategoryitem(id) {

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                console.log("Category Item Deleted");
                // obj.cartcount();
                //  obj.getcart();
            }
        };
        xmlhttp.open("POST", "deleteCategory.php?id=" + id);
        xmlhttp.send();
    } 
    // Remove category items from admin page // 

    
     // Remove user items from admin page
     obj.removeItemFromUser = function (id) {
        deleteUseritem(id);
        // alert(id);

    }

    function deleteUseritem(id) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                console.log("Category Item Deleted");
                // obj.cartcount();
                //  obj.getcart();
            }
        };
        xmlhttp.open("POST", "deleteAllUser.php?id=" + id);
        xmlhttp.send();
    } 
    // Remove User items from admin page // 


    // All product items id
    obj.ProductId = function (id) {
        idproductitem(id);
        // alert(id);
    }

    function idproductitem(id) {
        //  alert(id);
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                // console.log(this.response);
                val = JSON.parse(this.response);
                getProductId(val);
            }
        };
        xmlhttp.open("POST", "get_productUpdate.php?id=" + id);
        xmlhttp.send();
    }


    function getProductId(val) {
        var cartArray = val;
        var output = "";
        for (var i in cartArray) {
            var len = cartArray.length;
            //  alert(cartArray[i].img_2)
            if(cartArray[i].product_qty>0){
                if(cartArray[i].select_show>0){
                    output +=
                    '<form action="save_productUpdate.php" class="theme-form theme-form-2 mega-form form" id="form" enctype="multipart/form-data" method="POST">' +
                    '<div class="col-sm-8 m-auto" id="edit_alt">' +
                    '<div class="card" style="width:250%; margin-bottom: 0px;">' +
                    '<div class="modal-header d-block">' +
                    '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">' +
                    '<i class="fas fa-times"></i>' +
                    '</button>' +
                    '</div>' +
                    '<div class="card-body">' +
                    '<div class="card-header-2">' +
                    '<h5>Product Update Information</h5>' +
                    '</div>' +
                    '<div class="mb-4 row align-items-center">' +
                    '<label class="col-sm-3 col-form-label form-label-title">Main Category</label>' +
                    '<div class="col-sm-9">' +
                    '<input class="form-control" value="' + cartArray[i].main_categorys + '" type="text" name="name" placeholder="Product Name" autocomplete="off" required>' +
                    '</select>' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row align-items-center">' +
                    '<label  class="col-sm-3 col-form-label form-label-title">Subcategory</label>' +
                    '<div class="col-sm-9">' +
                    '<input class="form-control" value="' + cartArray[i].sub_categorys + '" type="text" name="name" placeholder="Product Name" autocomplete="off" required>' +
                    '</select>' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row align-items-center">' +
                    '<label class="form-label-title col-sm-3 mb-0">Product Name</label>' +
                    '<div class="col-sm-9">' +
                    '<input class="form-control" value="' + cartArray[i].name + '" type="text" name="name" placeholder="Product Name" autocomplete="off" required>' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row align-items-center">' +
                    '<label class="form-label-title col-sm-3 mb-0">Product Price</label>' +
                    '<div class="col-sm-9">' +
                    '<input class="form-control" value="' + cartArray[i].price + '" type="text" name="price" placeholder="Product Price" autocomplete="off" required>' +
                    '</div>' +
                    '</div>' +	
                    '<div class="mb-4 row align-items-center">' +
                    '<label class="form-label-title col-sm-3 mb-0">Product Quantity</label>' +
                    '<div class="col-sm-9">' +
                    '<input class="form-control" value="' + cartArray[i].product_qty + '" type="text" name="product_qty" placeholder="Product Quantity" autocomplete="off" required>' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row align-items-center">' +
                    '<label class="form-label-title col-sm-3 mb-0">Show Main Page</label>' +
                    '<div class="col-sm-9">' +
                    '<input type="radio" name="select_show" value="1" checked> <label style="padding-right:30px;">Show</label>'+
                    '<input type="radio" name="select_show" value="0"> <label>Not Show</label>'+
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row align-items-center">' +
                    '<label class="form-label-title col-sm-3 mb-0">Part Number</label>' +
                    '<div class="col-sm-9">' +
                    '<input class="form-control" value="' + cartArray[i].part_number + '" type="text" name="part_number" placeholder="Part Number" autocomplete="off" required>' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row align-items-center">' +
                    '<label class="form-label-title col-sm-3 mb-0">SKU</label>' +
                    '<div class="col-sm-9">' +
                    '<input class="form-control" value="' + cartArray[i].sku + '" type="text" name="sku" placeholder="SKU" autocomplete="off" required>' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row align-items-center">' +
                    '<label class="col-sm-3 col-form-label form-label-title">Current Images</label>' +
                    '<div class="col-sm-9">' +
                    '<input type="text" value="' + cartArray[i].img + '"  name="image" id="Cimage" class="form-control form-choose">' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row align-items-center">' +
                    '<label class="col-sm-3 col-form-label form-label-title">New Images</label>' +
                    '<div class="col-sm-9">' +
                    '<input class="form-control" type="file" value="' + cartArray[i].img + '"  name="image" id="Nimage" accept=".jpg, .jpeg, .png"  multiple>' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row align-items-center">' +
                    '<label class="col-sm-3 col-form-label form-label-title">Current Img-2</label>' +
                    '<div class="col-sm-9">' +
                    '<input type="text" value="' + cartArray[i].img_2 + '"  name="img_2" id="image" class="form-control form-choose">' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row align-items-center">' +
                    '<label class="col-sm-3 col-form-label form-label-title">New Img-2</label>' +
                    '<div class="col-sm-9">' +
                    '<input class="form-control" type="file" value="' + cartArray[i].img_2 + '" name="img_2" id="Nimg_2" accept=".jpg, .jpeg, .png" multiple>' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row align-items-center">' +
                    '<label class="col-sm-3 col-form-label form-label-title">Current Img-3</label>' +
                    '<div class="col-sm-9">' +
                    '<input type="text" value="' + cartArray[i].img_3 + '"  name="img_3" id="image" class="form-control form-choose">' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row align-items-center">' +
                    '<label class="col-sm-3 col-form-label form-label-title">New Img-3</label>' +
                    '<div class="col-sm-9">' +
                    '<input class="form-control" type="file" value="' + cartArray[i].img_3 + '" name="img_3" id="Nimg_3" accept=".jpg, .jpeg, .png" multiple>' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row align-items-center">' +
                    '<label class="col-sm-3 col-form-label form-label-title">Current Img-4</label>' +
                    '<div class="col-sm-9">' +
                    '<input type="text" value="' + cartArray[i].img_4 + '" name="img_4" id="image" class="form-control form-choose">' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row align-items-center">' +
                    '<label class="col-sm-3 col-form-label form-label-title">New Img-4</label>' +
                    '<div class="col-sm-9">' +
                    '<input class="form-control" type="file" value="' + cartArray[i].img_4 + '" name="img_4" id="Nimg_4" accept=".jpg, .jpeg, .png" multiple>' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row align-items-center">' +
                    '<label class="form-label-title col-sm-3 mb-0">Heading One</label>' +
                    '<div class="col-sm-9">' +
                    '<input class="form-control" value="' + cartArray[i].des_heading_1 + '"  type="search" name="des_heading_1" placeholder="Fresh Fruits" autocomplete="off" required>' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row">' +
                    '<label class="form-label-title col-sm-3 mb-0">Paragraph One</label>' +
                    '<div class="col-sm-9">' +
                    '<input class="form-control" value="' + cartArray[i].des_paragraph_1 + '" type="text" rows="3" name="des_paragraph_1" autocomplete="off" required></input>' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row align-items-center">' +
                    '<label class="form-label-title col-sm-3 mb-0">Heading Two</label>' +
                    '<div class="col-sm-9">' +
                    '<input class="form-control" value="' + cartArray[i].des_heading_2 + '" type="search" name="des_heading_2" placeholder="Fresh Fruits" autocomplete="off" required>' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row">' +
                    '<label class="form-label-title col-sm-3 mb-0">Paragraph Two</label>' +
                    '<div class="col-sm-9">' +
                    '<input class="form-control" value="' + cartArray[i].des_paragraph_2 + '" type="text" rows="3" name="des_paragraph_2" autocomplete="off" required></input>' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row align-items-center">' +
                    '<label class="col-sm-3 col-form-label form-label-title">Current Examples</label>' +
                    '<div class="col-sm-9">' +
                    '<input type="text" value="' + cartArray[i].user_link + '" name="user_link" class="form-control form-choose">' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row align-items-center">' +
                    '<label class="form-label-title col-sm-3 mb-0">New Examples</label>' +
                    '<div class="col-sm-9">' +
                    '<input class="form-control" value="' + cartArray[i].user_link + '" type="file" name="user_link" id="Nuser_link" accept=".pdf" placeholder="Examples" autocomplete="off">' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row align-items-center">' +
                    '<label class="form-label-title col-sm-3 mb-0">Package</label>' +
                    '<div class="col-sm-9">' +
                    '<input class="form-control" value="' + cartArray[i].package + '" type="text" name="package" placeholder="Package" autocomplete="off" required>' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row">' +
                    '<label class="form-label-title col-sm-3 mb-0">Specialty</label>' +
                    '<div class="col-sm-9">' +
                    '<input class="form-control" value="' + cartArray[i].specialty + '" type="text" rows="3" name="specialty" autocomplete="off" required></input>' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row">' +
                    '<label class="form-label-title col-sm-3 mb-0">Weight</label>' +
                    '<div class="col-sm-9">' +
                    '<input class="form-control" value="' + cartArray[i].weight + '" type="text" name="weight" placeholder="Weight" autocomplete="off" required>' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row">' +
                    '<label class="form-label-title col-sm-3 mb-0">Brand</label>' +
                    '<div class="col-sm-9">' +
                    '<input class="form-control" value="' + cartArray[i].brand + '" type="text" name="brand" placeholder="Brand" autocomplete="off" required>' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row">' +
                    '<label class="form-label-title col-sm-3 mb-0">Manufacturer</label>' +
                    '<div class="col-sm-9">' +
                    '<input class="form-control" value="' + cartArray[i].manufacturer + '" type="text" name="manufacturer" placeholder="Manufacturer" autocomplete="off" required>' +
                    '</div>' +
                    '</div>' +
                    '<div style="padding-left:80%;">' +
                    '<button type="submit" id="buttoncheck"  name="update-product" class=" btn btn-md bg-dark cart-button text-white w-100">Submit</button>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</form>';
                }else{
                    output +=
                    '<form action="save_productUpdate.php" class="theme-form theme-form-2 mega-form form" id="form" enctype="multipart/form-data" method="POST">' +
                    '<div class="col-sm-8 m-auto" id="edit_alt">' +
                    '<div class="card" style="width:250%; margin-bottom: 0px;">' +
                    '<div class="modal-header d-block">' +
                    '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">' +
                    '<i class="fas fa-times"></i>' +
                    '</button>' +
                    '</div>' +
                    '<div class="card-body">' +
                    '<div class="card-header-2">' +
                    '<h5>Product Update Information</h5>' +
                    '</div>' +
                    '<div class="mb-4 row align-items-center">' +
                    '<label class="col-sm-3 col-form-label form-label-title">Main Category</label>' +
                    '<div class="col-sm-9">' +
                    '<input class="form-control" value="' + cartArray[i].main_categorys + '" type="text" name="name" placeholder="Product Name" autocomplete="off" required>' +
                    '</select>' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row align-items-center">' +
                    '<label  class="col-sm-3 col-form-label form-label-title">Subcategory</label>' +
                    '<div class="col-sm-9">' +
                    '<input class="form-control" value="' + cartArray[i].sub_categorys + '" type="text" name="name" placeholder="Product Name" autocomplete="off" required>' +
                    '</select>' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row align-items-center">' +
                    '<label class="form-label-title col-sm-3 mb-0">Product Name</label>' +
                    '<div class="col-sm-9">' +
                    '<input class="form-control" value="' + cartArray[i].name + '" type="text" name="name" placeholder="Product Name" autocomplete="off" required>' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row align-items-center">' +
                    '<label class="form-label-title col-sm-3 mb-0">Product Price</label>' +
                    '<div class="col-sm-9">' +
                    '<input class="form-control" value="' + cartArray[i].price + '" type="text" name="price" placeholder="Product Price" autocomplete="off" required>' +
                    '</div>' +
                    '</div>' +	
                    '<div class="mb-4 row align-items-center">' +
                    '<label class="form-label-title col-sm-3 mb-0">Product Quantity</label>' +
                    '<div class="col-sm-9">' +
                    '<input class="form-control" value="' + cartArray[i].product_qty + '" type="text" name="product_qty" placeholder="Product Quantity" autocomplete="off" required>' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row align-items-center">' +
                    '<label class="form-label-title col-sm-3 mb-0">Show Main Page</label>' +
                    '<div class="col-sm-9">' +
                    '<input type="radio" name="select_show" value="1"> <label style="padding-right:30px;">Show</label>'+
                    '<input type="radio" name="select_show" value="0" checked> <label>Not Show</label>'+
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row align-items-center">' +
                    '<label class="form-label-title col-sm-3 mb-0">Part Number</label>' +
                    '<div class="col-sm-9">' +
                    '<input class="form-control" value="' + cartArray[i].part_number + '" type="text" name="part_number" placeholder="Part Number" autocomplete="off" required>' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row align-items-center">' +
                    '<label class="form-label-title col-sm-3 mb-0">SKU</label>' +
                    '<div class="col-sm-9">' +
                    '<input class="form-control" value="' + cartArray[i].sku + '" type="text" name="sku" placeholder="SKU" autocomplete="off" required>' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row align-items-center">' +
                    '<label class="col-sm-3 col-form-label form-label-title">Current Images</label>' +
                    '<div class="col-sm-9">' +
                    '<input type="text" value="' + cartArray[i].img + '"  name="image" id="Cimage" class="form-control form-choose">' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row align-items-center">' +
                    '<label class="col-sm-3 col-form-label form-label-title">New Images</label>' +
                    '<div class="col-sm-9">' +
                    '<input class="form-control" type="file" value="' + cartArray[i].img + '"  name="image" id="Nimage" accept=".jpg, .jpeg, .png"  multiple>' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row align-items-center">' +
                    '<label class="col-sm-3 col-form-label form-label-title">Current Img-2</label>' +
                    '<div class="col-sm-9">' +
                    '<input type="text" value="' + cartArray[i].img_2 + '"  name="img_2" id="image" class="form-control form-choose">' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row align-items-center">' +
                    '<label class="col-sm-3 col-form-label form-label-title">New Img-2</label>' +
                    '<div class="col-sm-9">' +
                    '<input class="form-control" type="file" value="' + cartArray[i].img_2 + '" name="img_2" id="Nimg_2" accept=".jpg, .jpeg, .png" multiple>' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row align-items-center">' +
                    '<label class="col-sm-3 col-form-label form-label-title">Current Img-3</label>' +
                    '<div class="col-sm-9">' +
                    '<input type="text" value="' + cartArray[i].img_3 + '"  name="img_3" id="image" class="form-control form-choose">' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row align-items-center">' +
                    '<label class="col-sm-3 col-form-label form-label-title">New Img-3</label>' +
                    '<div class="col-sm-9">' +
                    '<input class="form-control" type="file" value="' + cartArray[i].img_3 + '" name="img_3" id="Nimg_3" accept=".jpg, .jpeg, .png" multiple>' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row align-items-center">' +
                    '<label class="col-sm-3 col-form-label form-label-title">Current Img-4</label>' +
                    '<div class="col-sm-9">' +
                    '<input type="text" value="' + cartArray[i].img_4 + '" name="img_4" id="image" class="form-control form-choose">' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row align-items-center">' +
                    '<label class="col-sm-3 col-form-label form-label-title">New Img-4</label>' +
                    '<div class="col-sm-9">' +
                    '<input class="form-control" type="file" value="' + cartArray[i].img_4 + '" name="img_4" id="Nimg_4" accept=".jpg, .jpeg, .png" multiple>' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row align-items-center">' +
                    '<label class="form-label-title col-sm-3 mb-0">Heading One</label>' +
                    '<div class="col-sm-9">' +
                    '<input class="form-control" value="' + cartArray[i].des_heading_1 + '"  type="search" name="des_heading_1" placeholder="Fresh Fruits" autocomplete="off" required>' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row">' +
                    '<label class="form-label-title col-sm-3 mb-0">Paragraph One</label>' +
                    '<div class="col-sm-9">' +
                    '<input class="form-control" value="' + cartArray[i].des_paragraph_1 + '" type="text" rows="3" name="des_paragraph_1" autocomplete="off" required></input>' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row align-items-center">' +
                    '<label class="form-label-title col-sm-3 mb-0">Heading Two</label>' +
                    '<div class="col-sm-9">' +
                    '<input class="form-control" value="' + cartArray[i].des_heading_2 + '" type="search" name="des_heading_2" placeholder="Fresh Fruits" autocomplete="off" required>' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row">' +
                    '<label class="form-label-title col-sm-3 mb-0">Paragraph Two</label>' +
                    '<div class="col-sm-9">' +
                    '<input class="form-control" value="' + cartArray[i].des_paragraph_2 + '" type="text" rows="3" name="des_paragraph_2" autocomplete="off" required></input>' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row align-items-center">' +
                    '<label class="col-sm-3 col-form-label form-label-title">Current Examples</label>' +
                    '<div class="col-sm-9">' +
                    '<input type="text" value="' + cartArray[i].user_link + '" name="user_link" class="form-control form-choose">' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row align-items-center">' +
                    '<label class="form-label-title col-sm-3 mb-0">New Examples</label>' +
                    '<div class="col-sm-9">' +
                    '<input class="form-control" value="' + cartArray[i].user_link + '" type="file" name="user_link" id="Nuser_link" accept=".pdf" placeholder="Examples" autocomplete="off">' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row align-items-center">' +
                    '<label class="form-label-title col-sm-3 mb-0">Package</label>' +
                    '<div class="col-sm-9">' +
                    '<input class="form-control" value="' + cartArray[i].package + '" type="text" name="package" placeholder="Package" autocomplete="off" required>' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row">' +
                    '<label class="form-label-title col-sm-3 mb-0">Specialty</label>' +
                    '<div class="col-sm-9">' +
                    '<input class="form-control" value="' + cartArray[i].specialty + '" type="text" rows="3" name="specialty" autocomplete="off" required></input>' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row">' +
                    '<label class="form-label-title col-sm-3 mb-0">Weight</label>' +
                    '<div class="col-sm-9">' +
                    '<input class="form-control" value="' + cartArray[i].weight + '" type="text" name="weight" placeholder="Weight" autocomplete="off" required>' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row">' +
                    '<label class="form-label-title col-sm-3 mb-0">Brand</label>' +
                    '<div class="col-sm-9">' +
                    '<input class="form-control" value="' + cartArray[i].brand + '" type="text" name="brand" placeholder="Brand" autocomplete="off" required>' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row">' +
                    '<label class="form-label-title col-sm-3 mb-0">Manufacturer</label>' +
                    '<div class="col-sm-9">' +
                    '<input class="form-control" value="' + cartArray[i].manufacturer + '" type="text" name="manufacturer" placeholder="Manufacturer" autocomplete="off" required>' +
                    '</div>' +
                    '</div>' +
                    '<div style="padding-left:80%;">' +
                    '<button type="submit" id="buttoncheck"  name="update-product" class=" btn btn-md bg-dark cart-button text-white w-100">Submit</button>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</form>';
                }
            }else{
                output +=
                    '<form action="save_productUpdate.php" class="theme-form theme-form-2 mega-form form" id="form" enctype="multipart/form-data" method="POST">' +
                    '<div class="col-sm-8 m-auto" id="edit_alt">' +
                    '<div class="card" style="width:250%; margin-bottom: 0px;">' +
                    '<div class="modal-header d-block">' +
                    '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">' +
                    '<i class="fas fa-times"></i>' +
                    '</button>' +
                    '</div>' +
                    '<div class="card-body">' +
                    '<div class="card-header-2">' +
                    '<h5>Product Update Information</h5>' +
                    '</div>' +
                    '<div class="mb-4 row align-items-center">' +
                    '<label class="col-sm-3 col-form-label form-label-title">Main Category</label>' +
                    '<div class="col-sm-9">' +
                    '<input class="form-control" value="' + cartArray[i].main_categorys + '" type="text" name="name" placeholder="Product Name" autocomplete="off" required>' +
                    '</select>' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row align-items-center">' +
                    '<label  class="col-sm-3 col-form-label form-label-title">Subcategory</label>' +
                    '<div class="col-sm-9">' +
                    '<input class="form-control" value="' + cartArray[i].sub_categorys + '" type="text" name="name" placeholder="Product Name" autocomplete="off" required>' +
                    '</select>' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row align-items-center">' +
                    '<label class="form-label-title col-sm-3 mb-0">Product Name</label>' +
                    '<div class="col-sm-9">' +
                    '<input class="form-control" value="' + cartArray[i].name + '" type="text" name="name" placeholder="Product Name" autocomplete="off" required>' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row align-items-center">' +
                    '<label class="form-label-title col-sm-3 mb-0">Product Price</label>' +
                    '<div class="col-sm-9">' +
                    '<input class="form-control" value="' + cartArray[i].price + '" type="text" name="price" placeholder="Product Price" autocomplete="off" required>' +
                    '</div>' +
                    '</div>' +	
                    '<div class="mb-4 row align-items-center">' +
                    '<label class="form-label-title col-sm-3 mb-0">Product Quantity</label>' +
                    '<div class="col-sm-9">' +
                    '<input class="form-control" value="' + cartArray[i].product_qty + '" type="text" name="product_qty" placeholder="Product Quantity" autocomplete="off" required>' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row align-items-center">' +
                    '<label class="form-label-title col-sm-3 mb-0">Part Number</label>' +
                    '<div class="col-sm-9">' +
                    '<input class="form-control" value="' + cartArray[i].part_number + '" type="text" name="part_number" placeholder="Part Number" autocomplete="off" required>' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row align-items-center">' +
                    '<label class="form-label-title col-sm-3 mb-0">SKU</label>' +
                    '<div class="col-sm-9">' +
                    '<input class="form-control" value="' + cartArray[i].sku + '" type="text" name="sku" placeholder="SKU" autocomplete="off" required>' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row align-items-center">' +
                    '<label class="col-sm-3 col-form-label form-label-title">Current Images</label>' +
                    '<div class="col-sm-9">' +
                    '<input type="text" value="' + cartArray[i].img + '"  name="image" id="Cimage" class="form-control form-choose">' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row align-items-center">' +
                    '<label class="col-sm-3 col-form-label form-label-title">New Images</label>' +
                    '<div class="col-sm-9">' +
                    '<input class="form-control" type="file" value="' + cartArray[i].img + '"  name="image" id="Nimage" accept=".jpg, .jpeg, .png"  multiple>' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row align-items-center">' +
                    '<label class="col-sm-3 col-form-label form-label-title">Current Img-2</label>' +
                    '<div class="col-sm-9">' +
                    '<input type="text" value="' + cartArray[i].img_2 + '"  name="img_2" id="image" class="form-control form-choose">' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row align-items-center">' +
                    '<label class="col-sm-3 col-form-label form-label-title">New Img-2</label>' +
                    '<div class="col-sm-9">' +
                    '<input class="form-control" type="file" value="' + cartArray[i].img_2 + '" name="img_2" id="Nimg_2" accept=".jpg, .jpeg, .png" multiple>' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row align-items-center">' +
                    '<label class="col-sm-3 col-form-label form-label-title">Current Img-3</label>' +
                    '<div class="col-sm-9">' +
                    '<input type="text" value="' + cartArray[i].img_3 + '"  name="img_3" id="image" class="form-control form-choose">' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row align-items-center">' +
                    '<label class="col-sm-3 col-form-label form-label-title">New Img-3</label>' +
                    '<div class="col-sm-9">' +
                    '<input class="form-control" type="file" value="' + cartArray[i].img_3 + '" name="img_3" id="Nimg_3" accept=".jpg, .jpeg, .png" multiple>' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row align-items-center">' +
                    '<label class="col-sm-3 col-form-label form-label-title">Current Img-4</label>' +
                    '<div class="col-sm-9">' +
                    '<input type="text" value="' + cartArray[i].img_4 + '" name="img_4" id="image" class="form-control form-choose">' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row align-items-center">' +
                    '<label class="col-sm-3 col-form-label form-label-title">New Img-4</label>' +
                    '<div class="col-sm-9">' +
                    '<input class="form-control" type="file" value="' + cartArray[i].img_4 + '" name="img_4" id="Nimg_4" accept=".jpg, .jpeg, .png" multiple>' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row align-items-center">' +
                    '<label class="form-label-title col-sm-3 mb-0">Heading One</label>' +
                    '<div class="col-sm-9">' +
                    '<input class="form-control" value="' + cartArray[i].des_heading_1 + '"  type="search" name="des_heading_1" placeholder="Fresh Fruits" autocomplete="off" required>' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row">' +
                    '<label class="form-label-title col-sm-3 mb-0">Paragraph One</label>' +
                    '<div class="col-sm-9">' +
                    '<input class="form-control" value="' + cartArray[i].des_paragraph_1 + '" type="text" rows="3" name="des_paragraph_1" autocomplete="off" required></input>' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row align-items-center">' +
                    '<label class="form-label-title col-sm-3 mb-0">Heading Two</label>' +
                    '<div class="col-sm-9">' +
                    '<input class="form-control" value="' + cartArray[i].des_heading_2 + '" type="search" name="des_heading_2" placeholder="Fresh Fruits" autocomplete="off" required>' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row">' +
                    '<label class="form-label-title col-sm-3 mb-0">Paragraph Two</label>' +
                    '<div class="col-sm-9">' +
                    '<input class="form-control" value="' + cartArray[i].des_paragraph_2 + '" type="text" rows="3" name="des_paragraph_2" autocomplete="off" required></input>' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row align-items-center">' +
                    '<label class="col-sm-3 col-form-label form-label-title">Current Examples</label>' +
                    '<div class="col-sm-9">' +
                    '<input type="text" value="' + cartArray[i].user_link + '" name="user_link" class="form-control form-choose">' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row align-items-center">' +
                    '<label class="form-label-title col-sm-3 mb-0">New Examples</label>' +
                    '<div class="col-sm-9">' +
                    '<input class="form-control" value="' + cartArray[i].user_link + '" type="file" name="user_link" id="Nuser_link" accept=".pdf" placeholder="Examples" autocomplete="off">' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row align-items-center">' +
                    '<label class="form-label-title col-sm-3 mb-0">Package</label>' +
                    '<div class="col-sm-9">' +
                    '<input class="form-control" value="' + cartArray[i].package + '" type="text" name="package" placeholder="Package" autocomplete="off" required>' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row">' +
                    '<label class="form-label-title col-sm-3 mb-0">Specialty</label>' +
                    '<div class="col-sm-9">' +
                    '<input class="form-control" value="' + cartArray[i].specialty + '" type="text" rows="3" name="specialty" autocomplete="off" required></input>' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row">' +
                    '<label class="form-label-title col-sm-3 mb-0">Weight</label>' +
                    '<div class="col-sm-9">' +
                    '<input class="form-control" value="' + cartArray[i].weight + '" type="text" name="weight" placeholder="Weight" autocomplete="off" required>' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row">' +
                    '<label class="form-label-title col-sm-3 mb-0">Brand</label>' +
                    '<div class="col-sm-9">' +
                    '<input class="form-control" value="' + cartArray[i].brand + '" type="text" name="brand" placeholder="Brand" autocomplete="off" required>' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-4 row">' +
                    '<label class="form-label-title col-sm-3 mb-0">Manufacturer</label>' +
                    '<div class="col-sm-9">' +
                    '<input class="form-control" value="' + cartArray[i].manufacturer + '" type="text" name="manufacturer" placeholder="Manufacturer" autocomplete="off" required>' +
                    '</div>' +
                    '</div>' +
                    '<div style="padding-left:80%;">' +
                    '<button type="submit" name="update-product" class=" btn btn-md bg-dark cart-button text-white w-100">Submit</button>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</form>';
            }
        }
        $('#edit_modal').html(output);
        $('#Nimage').change(function(){
            $('#edit_alt').append('<input type="hidden" value="Newimg_01" name="Newimg_01"/>');
        });
        $('#Nimg_2').change(function(){
            $('#edit_alt').append('<input type="hidden" value="Newimg_02" name="Newimg_02"/>');
        });
        $('#Nimg_3').change(function(){
            $('#edit_alt').append('<input type="hidden" value="Newimg_03" name="Newimg_03"/>');
        });
        $('#Nimg_4').change(function(){
            $('#edit_alt').append('<input type="hidden" value="Newimg_04" name="Newimg_04"/>');
        });
        $('#Nuser_link').change(function(){
            $('#edit_alt').append('<input type="hidden" value="NewUser_link" name="NewUser_link"/>');
        });
    }
    // All product items id end

    // All Category items id
    obj. CategoryId = function (id) {
        idCategoryitem(id);
        // alert(id);
    }

    function idCategoryitem(id) {
        //  alert(id);
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                // console.log(this.response);
                val = JSON.parse(this.response);
                getCategoryId(val);
            }
        };
        xmlhttp.open("POST", "get_categoryUpdate.php?id=" + id);
        xmlhttp.send();
    }

    function getCategoryId(val) {
        var cartArray = val;
        var output = "";
        for (var i in cartArray) {
            var len = cartArray.length;
            //  alert(cartArray[i].id)
            output +=
                '<form action="save_categoryUpdate.php" class="theme-form theme-form-2 mega-form" method="POST" style="padding-left:50px; ">'+
                '<div class="modal-header d-block">' +
                '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">' +
                '<i class="fas fa-times"></i>' +
                '</button>' +
                '</div>' +
                '<div class="card-header-1">'+
                '<h5 style=" padding-bottom:10px""><b>Category Information</b></h5>'+
                '</div>'+
                '<div class="mb-4 row align-items-center" >'+
               // '<label class="form-label-title col-sm-3 mb-0" style="width:100%">Id</label>'+
                '<div class="col-sm-9">'+
                '<input class="form-control" value="'+ cartArray[i].id+'" type="hidden" name="id" placeholder="Category Id" autocomplete="off" required>'+
                '</div>'+
                '</div>'+
                '<div class="mb-4 row align-items-center" >'+
                '<label class="form-label-title col-sm-3 mb-0" style="width:100%">Categorys Id</label>'+
                '<div class="col-sm-9">'+
                '<input class="form-control" value="'+ cartArray[i].category_id+'" type="text" name="category_id" placeholder="Category Id" autocomplete="off" required>'+
                '</div>'+
                '</div>'+
                '<div class="mb-4 row align-items-center">'+
                '<label class="form-label-title col-sm-3 mb-0" style="width:100%">Main Title</label>'+
                '<div class="col-sm-9">'+
                '<input class="form-control" value="'+ cartArray[i].main_title+'" type="text" name="main_title" placeholder="Category Name" autocomplete="off" required>'+
                '</div>'+
                '</div>'+
                '<div class="mb-4 row align-items-center">'+
                '<label class="form-label-title col-sm-3 mb-0" style="width:100%">Sub Title</label>'+
                '<div class="col-sm-9">'+
                '<input class="form-control" value="'+ cartArray[i].sub_title+'" type="text" name="sub_title" placeholder="Category Name" autocomplete="off" required>'+
                '</div>'+
                '</div>'+
                '<div style="padding-left:50%; padding-bottom:10px; padding-right:50px;" >'+
                '<button type="submit" name="category-update" class="btn btn-md bg-dark cart-button text-white w-100">Submit</button>'+
                '</div>'+
                '</form>';
        }
        $('#category_edit_modal').html(output);
    }
    // All category items id end

    // All User items id
    obj. UserId = function (id) {
        idUseritem(id);
        // alert(id);
    }

    function idUseritem(id) {
        //  alert(id);
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                // console.log(this.response);
                val = JSON.parse(this.response);
                getUserId(val);
            }
        };
        xmlhttp.open("POST", "get_userUpdate.php?id=" + id);
        xmlhttp.send();
    }

    function getUserId(val) {
        var cartArray = val;
        var output = "";
        for (var i in cartArray) {
            var len = cartArray.length;
            //  alert(cartArray[i].img_2)
            output +=
                '<form action="save-new-userUpdate.php" class="theme-form theme-form-2 mega-form" method="POST" style="padding-left:50px;">'+
                '<div class="modal-header d-block">' +
                '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">' +
                '<i class="fas fa-times"></i>' +
                '</button>' +
                '</div>' +
                '<div class="card-header-1">'+
                '<h5 style=" padding-bottom:10px""><b>User Information</b></h5>'+
                '</div>'+
                '<div class="row">'+
                '<div class="mb-4 row align-items-center">'+
                '<label class="form-label-title col-lg-2 col-md-3 mb-0" style="width:100%">First Name</label>'+
                '<div class="col-md-9 col-lg-10">'+
                '<input class="form-control" type="text" value="'+cartArray[i].name+'" name="name" autocomplete="off" placeholder="Full Name" required>'+
                '</div>'+
                '</div>'+
                '<div class="mb-4 row align-items-center">'+
                '<label class="col-lg-2 col-md-3 col-form-label form-label-title" style="width:100%">Email Address</label>'+
                '<div class="col-md-9 col-lg-10">'+
                '<input class="form-control" type="email"value="'+cartArray[i].email+'" name="email" autocomplete="off" placeholder="Email" required>'+
                '</div>'+
                '</div>'+
                '<div class="mb-4 row align-items-center">'+
                '<label class="col-lg-2 col-md-3 col-form-label form-label-title" style="width:100%">Phone</label>'+
                '<div class="col-md-9 col-lg-10">'+
                '<input class="form-control" type="text" value="'+cartArray[i].phone+'" name="phone" autocomplete="off" placeholder="Phone" maxlength="10" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>'+
                '</div>'+
                '</div>'+
                '<div class="mb-4 row align-items-center">'+
                '<label class="col-lg-2 col-md-3 col-form-label form-label-title" style="width:100%">Password</label>'+
                '<div class="col-md-9 col-lg-10">'+
                '<input class="form-control" value="'+cartArray[i].password+'" type="text" name="password" autocomplete="off" placeholder="Password" pattern="(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at (A-Z/!@#&*/a-z/1-10), and at least 8 or more characters" required>'+
                '</div>'+
                '</div>'+
                '<div style="padding-left:50%;padding-bottom:10px; padding-right:50px;">'+
                '<button type="submit" name="user-update" class="btn btn-md bg-dark cart-button text-white w-100">Submit</button>'+
                '</div>'+
                '</div>'+
                '</form>';
        }
        $('#user-edit_modal').html(output);
    }
    // All User items id end


    // All Track items id
    obj. TrackId = function (id) {
        idTrackitem(id);
        // alert(id);
    }

    function idTrackitem(id) {
        //  alert(id);
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                // console.log(this.response);
                val = JSON.parse(this.response);
                getTrackId(val);
            }
        };
        xmlhttp.open("POST", "get_trackingUpdate.php?id=" + id);
        xmlhttp.send();
    }

    function getTrackId(val) {
        var cartArray = val;
        var output = "";
        for (var i in cartArray) {
            var len = cartArray.length;
            //  alert(cartArray[i].img_2)
            output +=
            '<form action="save-trackingUpdate.php" class="theme-form theme-form-2 mega-form" method="POST" style="padding-left:50px;">'+
            '<div class="modal-header d-block">'+
            '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">'+
            '<i class="fas fa-times"></i>'+
            '</button>'+
            '</div>'+
            '<div class="card-header-1">'+
            '<h5 style=" padding-bottom:10px""><b>Tracking Information</b></h5>'+
            '</div>'+
            '<div class="row">'+
            '<div class="mb-4 row align-items-center">'+
           // '<label class="form-label-title col-lg-2 col-md-3 mb-0" style="width:100%">Table Id</label>'+
            '<div class="col-md-9 col-lg-10">'+
            '<input class="form-control" type="hidden" value="'+cartArray[i].id+'" name="id" autocomplete="off" placeholder="Confirmed">'+
            '</div>'+
            '</div>'+
            '<div class="mb-4 row align-items-center">'+
            '<label class="form-label-title col-lg-2 col-md-3 mb-0" style="width:100%">Tracking Code</label>'+
            '<div class="col-md-9 col-lg-10">'+
            '<input class="form-control" type="text" value="'+cartArray[i].tracking_code+'" name="tracking_code" autocomplete="off" placeholder="Tracking Code">'+
            '</div>'+
            '</div>'+
            '<div class="mb-4 row align-items-center">'+
            '<label class="form-label-title col-lg-2 col-md-3 mb-0" style="width:100%">Estimated Time : '+cartArray[i].estimated_time+'</label>'+
            '<div class="col-md-9 col-lg-10">'+
            '<input class="form-control" type="date" value="'+cartArray[i].estimated_time+'" name="estimated_time" autocomplete="off" placeholder="Estimated Time">'+
            '</div>'+
            '</div>'+
            '<div class="mb-4 row align-items-center">'+
            '<label class="form-label-title col-lg-2 col-md-3 mb-0" style="width:100%">Order Placed Date : '+cartArray[i].confirmed+'</label>'+
            '<div class="col-md-9 col-lg-10">'+
            '<input class="form-control" type="date" value="'+cartArray[i].confirmed+'" name="confirmed" autocomplete="off" placeholder="Order Placed Date">'+
            '</div>'+
            '</div>'+
            '<div class="mb-4 row align-items-center">'+
            '<label class="col-lg-2 col-md-3 col-form-label form-label-title" style="width:100%">Preparing to Ship Date : '+cartArray[i].packed+'</label>'+
            '<div class="col-md-9 col-lg-10">'+
            '<input class="form-control" type="date"value="'+cartArray[i].packed+'" name="packed" autocomplete="off" placeholder="Preparing to Ship Date">'+
            '</div>'+
            '</div>'+
            '<div class="mb-4 row align-items-center">'+
            '<label class="col-lg-2 col-md-3 col-form-label form-label-title" style="width:100%">Shipped Date : '+cartArray[i].shipped+'</label>'+
            '<div class="col-md-9 col-lg-10">'+
            '<input class="form-control" type="date" value="'+cartArray[i].shipped+'" name="shipped" autocomplete="off" placeholder="Shipped Date">'+
            '</div>'+
            '</div>'+
            '<div class="mb-4 row align-items-center">'+
            '<label class="col-lg-2 col-md-3 col-form-label form-label-title" style="width:100%">Delivered Date : '+cartArray[i].arriving+'</label>'+
            '<div class="col-md-9 col-lg-10">'+
            '<input class="form-control" value="'+cartArray[i].arriving+'" type="date" name="arriving" autocomplete="off" placeholder="Delivered Date">'+
            '</div>'+
            '</div>'+
            '<div style="padding-left:50%;padding-bottom:10px; padding-right:50px;">'+
            '<button type="submit" name="tracking-update" class="btn btn-md bg-dark cart-button text-white w-100">Submit</button>'+
            '</div>'+
            '</div>'+
            '</form>';
        }
        $('#tracking-edit_modal').html(output);
    }
    // All Track items id end

    return obj;
})();


// Get admin product
$(document).ready(function () {

    $.ajax({

        type: "POST",
        url: "get_admin_product.php",

        success: function (response) {
            //  alert(response);
            // $('.allproduct').empty();

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
                    var part_number = val[i]['part_number'];
                    var sku = val[i]['sku'];
                    var img_2 = val[i]['img_2'];
                    var img_3 = val[i]['img_3'];
                    var img_4 = val[i]['img_4'];
                    var des_heading_1 = val[i]['des_heading_1'];
                    var des_paragraph_1 = val[i]['des_paragraph_1'];
                    var des_heading_2 = val[i]['des_heading_2'];
                    var des_paragraph_2 = val[i]['des_paragraph_2'];
                    var user_link = val[i]['user_link'];
                    var package = val[i]['package'];
                    var specialty = val[i]['specialty'];
                    var weight = val[i]['weight'];
                    var brand = val[i]['brand'];
                    var manufacturer = val[i]['manufacturer'];

                    // alert(product_qty);
                    // All products
                    if(val[i].product_qty>0){
                        if(val[i].select_show>0){
                            $('.all-products').append(
                                '<tr>' +
                                '<td>' +
                                '<div class="table-image">' +
                                '<img src="../assets/images/' + img + '" class="img-fluid" alt="">' +
                                '</div>' +
                                '</td>' +
                                '<td>' + name + '</td>' +
                                '<td class="td-price">Rs. ' + price + '</td>' +
                                '<td>' + product_qty + '</td>' +
                                '<td class="theme-color td-price">Show</td>'+
                                '<td>' + part_number + '</td>' +
                                '<td>' + sku + '</td>' +
                                '<td>' +
                                '<div class="table-image">' +
                                '<img src="../assets/images/' + img_2 + '" class="img-fluid" alt="">' +
                                '</div>' +
                                '</td>' +
                                '<td>' +
                                '<div class="table-image">' +
                                '<img src="../assets/images/' + img_3 + '" class="img-fluid"alt="">' +
                                '</div>' +
                                '</td>' +
                                '<td>' +
                                '<div class="table-image">' +
                                '<img src="../assets/images/' + img_4 + '" class="img-fluid" alt="">' +
                                '</div>' +
                                '</td>' +
                                '<td>' + des_heading_1 + '</td>' +
                                '<td>' + des_paragraph_1 + '</td>' +
                                '<td>' + des_heading_2 + '</td>' +
                                '<td>' + des_paragraph_2 + '</td>' +
                                '<td>' + user_link + '</td>' +
                                '<td>' + package + '</td>' +
                                '<td>' + specialty + '</td>' +
                                '<td>' + weight + '</td>' +
                                '<td>' + brand + '</td>' +
                                '<td>' + manufacturer + '</td>' +
                                '<td>' +
                                '<ul>' +
                                '<li>' +
                                '<a href="" class="product-item-id" data-bs-toggle="modal" data-id="' + id + '" data-bs-target="#exampleModalToggle-5">' +
                                '<i class="ri-pencil-line"></i>' +
                                '</a>' +
                                '</li>' +
                                '<li>' +
                                '<a href="" class="detele-product-item" data-id="' + id + '">' +
                                '<i class="ri-delete-bin-line"></i>' +
                                '</a>' +
                                '</li>' +
                                '</ul>' +
                                '</td>' +
                                '</tr>');
                        }else{
                            $('.all-products').append(
                                '<tr>' +
                                '<td>' +
                                '<div class="table-image">' +
                                '<img src="../assets/images/' + img + '" class="img-fluid" alt="">' +
                                '</div>' +
                                '</td>' +
                                '<td>' + name + '</td>' +
                                '<td class="td-price">Rs. ' + price + '</td>' +
                                // '<p style="color:red; padding-top:10px; line-height: 0px;">Out of Stock</p>'+
                                '<td>' + product_qty + '</td>' +
                                '<td style="color:red;">Not Show</td>'+
                                '<td>' + part_number + '</td>' +
                                '<td>' + sku + '</td>' +
                                '<td>' +
                                '<div class="table-image">' +
                                '<img src="../assets/images/' + img_2 + '" class="img-fluid" alt="">' +
                                '</div>' +
                                '</td>' +
                                '<td>' +
                                '<div class="table-image">' +
                                '<img src="../assets/images/' + img_3 + '" class="img-fluid"alt="">' +
                                '</div>' +
                                '</td>' +
                                '<td>' +
                                '<div class="table-image">' +
                                '<img src="../assets/images/' + img_4 + '" class="img-fluid" alt="">' +
                                '</div>' +
                                '</td>' +
                                '<td>' + des_heading_1 + '</td>' +
                                '<td>' + des_paragraph_1 + '</td>' +
                                '<td>' + des_heading_2 + '</td>' +
                                '<td>' + des_paragraph_2 + '</td>' +
                                '<td>' + user_link + '</td>' +
                                '<td>' + package + '</td>' +
                                '<td>' + specialty + '</td>' +
                                '<td>' + weight + '</td>' +
                                '<td>' + brand + '</td>' +
                                '<td>' + manufacturer + '</td>' +
                                '<td>' +
                                '<ul>' +
                                '<li>' +
                                '<a href="" class="product-item-id" data-bs-toggle="modal" data-id="' + id + '" data-bs-target="#exampleModalToggle-5">' +
                                '<i class="ri-pencil-line"></i>' +
                                '</a>' +
                                '</li>' +
                                '<li>' +
                                '<a href="" class="detele-product-item" data-id="' + id + '">' +
                                '<i class="ri-delete-bin-line"></i>' +
                                '</a>' +
                                '</li>' +
                                '</ul>' +
                                '</td>' +
                                '</tr>');
                            }
                    }else{
                        $('.all-products').append(
                            '<tr>' +
                            '<td>' +
                            '<div class="table-image">' +
                            '<img src="../assets/images/' + img + '" class="img-fluid" alt="">' +
                            '</div>' +
                            '</td>' +
                            '<td>' + name + '</td>' +
                            '<td class="td-price">Rs. ' + price + '</td>' +
                           // '<p style="color:red; padding-top:10px; line-height: 0px;">Out of Stock</p>'+
                            '<td style="color:red; padding-top:10px; line-height: 0px;">Out of Stock</td>' +
                            '<td style="color:red;">Not Show</td>'+
                            '<td>' + part_number + '</td>' +
                            '<td>' + sku + '</td>' +
                            '<td>' +
                            '<div class="table-image">' +
                            '<img src="../assets/images/' + img_2 + '" class="img-fluid" alt="">' +
                            '</div>' +
                            '</td>' +
                            '<td>' +
                            '<div class="table-image">' +
                            '<img src="../assets/images/' + img_3 + '" class="img-fluid"alt="">' +
                            '</div>' +
                            '</td>' +
                            '<td>' +
                            '<div class="table-image">' +
                            '<img src="../assets/images/' + img_4 + '" class="img-fluid" alt="">' +
                            '</div>' +
                            '</td>' +
                            '<td>' + des_heading_1 + '</td>' +
                            '<td>' + des_paragraph_1 + '</td>' +
                            '<td>' + des_heading_2 + '</td>' +
                            '<td>' + des_paragraph_2 + '</td>' +
                            '<td>' + user_link + '</td>' +
                            '<td>' + package + '</td>' +
                            '<td>' + specialty + '</td>' +
                            '<td>' + weight + '</td>' +
                            '<td>' + brand + '</td>' +
                            '<td>' + manufacturer + '</td>' +
                            '<td>' +
                            '<ul>' +
                            '<li>' +
                            '<a href="" class="product-item-id" data-bs-toggle="modal" data-id="' + id + '" data-bs-target="#exampleModalToggle-5">' +
                            '<i class="ri-pencil-line"></i>' +
                            '</a>' +
                            '</li>' +
                            '<li>' +
                            '<a href="" class="detele-product-item" data-id="' + id + '">' +
                            '<i class="ri-delete-bin-line"></i>' +
                            '</a>' +
                            '</li>' +
                            '</ul>' +
                            '</td>' +
                            '</tr>');
                    }
                }
            }

        }
    });
});
// Delete product item button
$('.all-products').on("click", ".detele-product-item", function (event) {
    var id = $(this).data('id')
    //alert(id);
    shoppingCart.removeItemFromProductAll(id);
})      
// Product item id 
$('.all-products').on("click", ".product-item-id", function (event) {
    var id = $(this).data('id')
    // alert(id);
    shoppingCart.ProductId(id);
})


// Categorys main and sub titles 
$(document).ready(function () {

    $.ajax({

        type: "GET",
        url: "get_category.php",

        success: function (response) {
            //  alert(response);

            val = $.parseJSON(response);

            var len = val.length;

            if (len > 0) {
                for (var i = 0; i < len; i++) {

                    var id = val[i]['id'];
                   // var category_id = val[i]['category_id'];
                    var main_title = val[i]['main_title'];
                    var sub_title = val[i]['sub_title'];

                    // alert(id)
                    // All products
                    $('.all-category').append(
                        '<tr>'+
                        '<td>' + main_title + '</td >'+
                        '<td>' + sub_title + '</td>'+
                        '<td>'+
                        '<ul>'+
                        '<li>'+
                        '<a href="" class="category-item-id" data-bs-toggle="modal" data-id="' + id + '" data-bs-target="#exampleModalToggle-6">'+
                        '<i class="ri-pencil-line"></i>'+
                        '</a>'+
                        '</li>'+
                        '<li>'+
                        '<a href="" class="detele-category-item" data-id="' + id + '">'+
                        '<i class="ri-delete-bin-line"></i>'+
                        '</a>'+
                        '</li>'+
                        '</ul>'+
                        '</td>'+
                        '</tr>');
                }
            }

        }
    });
});

    // Delete category item button

    $('.all-category').on("click", ".detele-category-item", function (event) {
        var id = $(this).data('id')
        //alert(id);
        shoppingCart.removeItemFromCategoryAll(id);
    })


    // Product item id 
    $('.all-category').on("click", ".category-item-id", function (event) {
        var id = $(this).data('id')
        // alert(id);
        shoppingCart.CategoryId(id);
    })

// Get All user list 

$(document).ready(function () {

    $.ajax({

        type: "GET",
        url: "get_all_user.php",

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
                    var password = val[i]['password'];
                    var user_profile = val[i]['user_profile'];

                    // alert(user_profile)
                    // All products
                    $('.all-user-list').append(
                        '<tr>'+
                        '<td>'+
                        '<div class="table-image">'+
                        '<img src="../img/'+user_profile+'" class="img-fluid" alt="">'+
                        '</div>'+
                        '</td>'+
                        '<td>'+
                        '<div class="user-name">'+
                        '<span>'+name+'</span>'+
                        '</div>'+
                        '</td>'+
                        '<td>'+phone+'</td>'+
                        '<td>'+email+'</td>'+
                        '<td>'+password+'</td>'+
                        '<td>'+
                        '<ul>'+
                        '<li>'+
                        '<a href="" class="user-item-id" data-bs-toggle="modal" data-id="' + id + '" data-bs-target="#exampleModalToggle-7">'+
                        '<i class="ri-pencil-line"></i>'+
                        '</a>'+
                        '</li>'+
                        '<li>'+
                        '<a href="" class="detele-user-item" data-id="' + id + '">'+
                        '<i class="ri-delete-bin-line"></i>'+
                        '</a>'+
                        '</li>'+
                        '</ul>'+
                        '</td>'+
                        '</tr>');
                }
            }

        }
    });
});

    // Delete User item button

    $('.all-user-list').on("click", ".detele-user-item", function (event) {
        var id = $(this).data('id')
        //alert(id);
        shoppingCart.removeItemFromUser(id);
    })

    
    // User item id 
    $('.all-user-list').on("click", ".user-item-id", function (event) {
        var id = $(this).data('id')
        // alert(id);
        shoppingCart.UserId(id);
    })


// Get All delivery order list 
$(document).ready(function () {

    $.ajax({

        type: "GET",
        url: "get_deliveryOrder.php",

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
                    // var deliveryoption = val[i]['deliveryoption'];
                    var paymentoption = val[i]['paymentoption'];
                    var p_img = val[i]['p_img'];
                    var p_name = val[i]['p_name'];
                    var p_price = val[i]['p_price'];
                    var p_quantity = val[i]['p_quantity'];
                    var total = val[i]['total'];

                    // alert(user_profile)
                    // All products
                    $('.delivery-order').append(
                        '<tr>'+
                        '<td>'+name+'</td>'+
                        '<td>'+phone+'</td>'+
                        '<td>'+email+'</td>'+
                        '<td>'+address+'</td>'+
                        '<td>'+pincode+'</td>'+
                        // '<td>'+deliveryoption+'</td>'+
                        '<td>'+paymentoption+'</td>'+
                        '<td>'+
                        '<a class="d-block">'+
                        '<span class="order-image">'+
                        '<img src="../assets/images/'+p_img+'" class="img-fluid" alt="users">'+
                        '</span>'+
                        '</a>'+
                        '</td>'+
                        '<td>'+p_name+'</td>'+
                        '<td>'+p_price+'</td>'+
                        '<td>'+p_quantity+'</td>'+
                        '<td>'+total+'</td>'+
                        '<td>'+
                        '<ul>'+
                        '<li>'+
                        '<a class="track-item-id btn btn-sm btn-solid text-white" href=""  data-bs-toggle="modal" data-id="' + id + '" data-bs-target="#exampleModalToggle-new"> Tracking </a>'+
                        '</li>'+
                        '</ul>'+
                        '</td>'+
                        '</tr>');
                }
            }

        }
    });
});

// Tracking item id 
$('.delivery-order').on("click", ".track-item-id", function (event) {
    var id = $(this).data('id')
    // alert(id);
    shoppingCart.TrackId(id);
})


// Get Admin user list 
$(document).ready(function () {

    $.ajax({

        type: "GET",
        url: "get_admin_user_list.php",

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
                    var password = val[i]['password'];
                    var admin_profile = val[i]['admin_profile'];

                    // alert(name)
                    // All products
                    $('.admin-user-list').append('<form action="save_adminUserList.php" class="theme-form theme-form-2 mega-form" id="form" enctype="multipart/form-data" method="post">'+
                        '<div class="row">'+
                        '<div class="mb-4 row align-items-center">'+
                        '<label class="form-label-title col-sm-2 mb-0">Full Name</label>'+
                        '<div class="col-sm-10">'+
                        '<input class="form-control" value="'+name+'" name="name" id="admin-user-list" type="text" placeholder="Enter Full Name" autocomplete="off" required>'+
                        '</div>'+
                        '</div>'+
                        '<div class="mb-4 row align-items-center">'+
                        '<label class="form-label-title col-sm-2 mb-0">Phone Number</label>'+
                        '<div class="col-sm-10">'+
                        '<input class="form-control" value="'+phone+'" name="phone" type="text" maxlength="10" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" placeholder="Enter Your Number" autocomplete="off" required>'+
                        '</div>'+
                        '</div>'+
                        '<div class="mb-4 row align-items-center">'+
                        '<label class="form-label-title col-sm-2 mb-0">Email Address</label>'+
                        '<div class="col-sm-10">'+
                        '<input class="form-control" value="'+email+'" name="email" type="email" placeholder="Enter Email Address" autocomplete="off" required>'+
                        '</div>'+
                        '</div>'+
                        '<div class="mb-4 row align-items-center">'+
                        '<label class="col-sm-2 col-form-label form-label-title">Curren Photo</label>'+
                        '<div class="col-sm-10">'+
                        '<input class="form-control"  value="'+admin_profile+'" type="text" placeholder="Admin Curren Photo">'+
                        '</div>'+
                        '</div>'+
                        '<div class="mb-4 row align-items-center">'+
                        '<label class="col-sm-2 col-form-label form-label-title">New Photo</label>'+
                        '<div class="col-sm-10">'+
                        '<input class="form-control form-choose" name="admin_profile" type="file" id="formFileMultiple" accept=".jpg, .jpeg, .png" multiple >'+
                        '</div>'+
                        '</div>'+
                        '<div class="mb-4 row align-items-center">'+
                        '<label class="form-label-title col-sm-2 mb-0">Password</label>'+
                        '<div class="col-sm-10">'+
                        '<input class="form-control"  value="'+password+'" name="password" type="text" placeholder="Enter Password" autocomplete="off" required>'+
                        '</div>'+
                        '</div>'+
                        '<div style="padding-left:80%; padding-right: 35px;">'+
                        '<button type="submit" name="admin-user-list-update" class="btn btn-md bg-dark cart-button text-white w-100">Submit</button>'+
                        '</div>'+
                        '</div>'+
                        '</form>');
                }
            }

        }
    });
});


// Get Admin Profile
$(document).ready(function () {

    $.ajax({

        type: "GET",
        url: "get_admin_user_list.php",

        success: function (response) {
            //  alert(response);

            val = $.parseJSON(response);

            var len = val.length;

            if (len > 0) {
                for (var i = 0; i < len; i++) {

                    var id = val[i]['id'];
                    var admin_profile = val[i]['admin_profile'];
                    
                    // alert(name)
                    // All products
                    $('#admin-profile').append('<img class="user-profile rounded-circle" src="assets/images/admin-profile/'+admin_profile+'" alt="">');
                }
            }

        }
    });
});


{/* <img class="user-profile rounded-circle" src="assets/images/user/user2.png" alt=""> */}

// login email access in all page start
 let email = sessionStorage.getItem("email");
 // alert(email)
 document.getElementById("useremail").innerHTML = email;

// destroy a session 
    function deleteItems() {
        sessionStorage.clear();
        window.location.replace("index.html");
    }  

    // Get product count
    $(document).ready(function () {

        $.ajax({
    
            type: "GET",
            url: "productCount.php",
    
            success: function (response) {
               // alert(response);
                val = $.parseJSON(response);
               // const names= val.map(user=>user.rowcountProduct);

              //  alert(val);
                $('#product-count').append('<h3>'+val+'</h3>');
            }
        });
    });

    
     // Get User count
     $(document).ready(function () {

        $.ajax({
    
            type: "GET",
            url: "userCount.php",
    
            success: function (response) {
               // alert(response);
                val = $.parseJSON(response);
                
              //  alert(val);
                $('#user-count').append('<h3>'+val+'</h3>');
            }
        });
    });

    // Get Order count
    $(document).ready(function () {

        $.ajax({
    
            type: "GET",
            url: "deliveryCount.php",
    
            success: function (response) {
               // alert(response);
                val = $.parseJSON(response);

              //  alert(val);
                $('#order-count').append('<h3>'+val+'</h3>');
            }
        });
    });

    function preventBack() {window.history.forward(0)};
    setTimeout("preventBack()",0);
       window.onunload=function(){null;}