$(document).ready(function(){
    
    //variables--------------------
    //initialize the cart data
    var cartData = {
        orders: {}, //stores the urls of the files we are going to order
        price: 0
    };
    
    //helper functions---------------
    //helper method to send ajax
    var sendAjax = function(url, data, onSuccess){
        $.ajax({
            'url': url,
            type: 'post',
            dataType: 'json',
            contentType: 'application/json',
            'data': JSON.stringify(data),
            success: onSuccess,
            error: function(jqchr, textStatus, errorThrown){
                console.log(errorThrown);
            }
        }); //end ajax
    };
    
    //this will create the breadcrumbs on all pages but homepage
    if (!(window.location.pathname === '/')){
        var splitPathnames = window.location.pathname.split('/');
        splitPathnames.shift();
        
        var $breadcrumbs = $("<ol class='breadcrumb'></ol>");
        $breadcrumbs.append("<li><a href='/'>MantelTop</a></li>");
        
        for (var i = 0; i < splitPathnames.length - 1; i++)
            $breadcrumbs.append("<li><a href=/" + splitPathnames[i] + ">" + splitPathnames[i] + "</a></li>");
        
        $breadcrumbs.append("<li class='active'>" + splitPathnames[splitPathnames.length - 1] + "</li>");
  
        ($breadcrumbs).insertAfter('body>nav:nth-child(1)');
    }  // end breadcrumbs auto generation
    
    /*
    * When a picture is added to cart, 
    * 1. find the id of the picture
    * 2. send the id through ajax to the server
    */
    $('#racePictures form input[type="submit"]').on('click', function(){
        
        var $thisBtn = $(this); //for future reference
        var url = $(this).attr('id');
        
        //data we will send to our addToCart controller
        var data = {
            'url': url
        };
        
        //this is the function called if the ajax works
        var onSuccess = function(data){
            if (data.raceAdded == url){
                $thisBtn.attr('value', 'Added!');
            }
        };
        
        //use our helper fuction to send ajax
        sendAjax('/addToCart', data, onSuccess);
        
        return false; //cancel the page reloading on submit
        
    });

    /**
    * Cart handler---------------
    * When the user changes a value on the cart
    * to buy a picture
    */
    $('#cart input').on('change', function(){
        
        //get the picture url for this input event
        url = $(this).parent().parent().attr('id');
        
        //if there is no previous order data... make it
        if (!cartData.orders[url]){
            var newOrder = {
                sizes: {}
            }
            cartData.orders[url] = newOrder;
        }
        
        if ($(this).attr('type') == 'checkbox'){
            //update cartData to new value
            cartData.orders[url].sizes.digital = $(this).prop('checked');
            
            //change price based on old value
            if ($(this).prop('checked'))
                cartData.price += 15;
            else
                cartData.price -= 15;
        }
        
        else if ($(this).attr('type') == 'text'){
            var textEntered = $(this).val().trim();
            
            if(!textEntered) //if it was empty
                textEntered = '0';
            
            var testIfNumber = new RegExp('^[0-9]*$');
            if (testIfNumber.test(textEntered)){
                
                //change the prices variable to represent the correct cost
                var oldValue = cartData.orders[url].sizes[$(this).attr('name')] || 0;
                cartData.price += ($(this).attr('data-cost') * (textEntered - oldValue));

                //place new order value into the associative array
                cartData.orders[url].sizes[$(this).attr('name')] = textEntered;

                } else {
                    //send an error message of some type, input isn't a number
                }
        }
        
        //update the price to represent the items expected
        $('#cartPrice').html('$' + cartData.price.toFixed(2));
    });
    
    /**
    * When the user submits the cart
    */
    $('#cart').parent().on('submit', function(){
        
        var onSuccess = function(data){
            console.log(data);
            //if something was returned, redirect
            if (data)
                window.location.href = window.location.origin + '/checkout';
        };
        
        //send cart data to server
        sendAjax('/cartData', cartData, onSuccess);
        //prevent the page from reloading
        return false;
    });
    
});