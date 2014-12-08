$(document).ready(function(){
    
    //variables--------------------
    //initialize the cart data
    var cartData = {
        orders: [], //stores the urls of the files we are going to order
        price: 0
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
        
        $.ajax({
            url: '/addToCart',
            type: 'post',
            dataType: 'json',
            contentType: 'application/json',
            'data': JSON.stringify(data),
            success: onSuccess,
            error: function(jqchr, textStatus, errorThrown){
                console.log(errorThrown);
            }
        }); //end ajax
        
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
        
        if ($(this).attr('type') == 'checkbox'){
            console.log("Checkbox");
        }
        
        else if ($(this).attr('type') == 'text'){
            var textEntered = $(this).val().trim();
            
            if(!textEntered) //if it was empty
                textEntered = '0';
            
            var testIfNumber = new RegExp('^[0-9]*$');
            if (testIfNumber.test(textEntered)){

                //see if there is already order data for this picture
                var alreadyThere = false;
                for (var i = 0; i < cartData.orders.length; i++){
                    if (cartData.orders[i].url == url){
                        //found it, now update the value
                        var oldValue = cartData.orders[i].sizes[$(this).attr('name')] || 0;
                        
                        cartData.price += ($(this).attr('data-cost') * (textEntered - oldValue));
                        cartData.orders[i].sizes[$(this).attr('name')] = textEntered;
                        alreadyThere = true;
                    }
                }

                if (!alreadyThere && textEntered != 0){
                    var newOrder = {
                        'url': url,
                        'sizes': {}
                    }
                    newOrder.sizes[$(this).attr('name')] = textEntered;
                    cartData.price += textEntered * $(this).attr('data-cost');
                    cartData.orders.push(newOrder);
                }
                
                //update the price to represent the items expected
                $('#cartPrice').html('$' + cartData.price.toFixed(2));
                
            } else {
                //send an error message of some type, input isn't a number
            }
            
            console.log(cartData);
        }
        
        
    });
    
});