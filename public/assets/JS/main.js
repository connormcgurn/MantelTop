$(document).ready(function(){
    
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
        
        var $thisBtn = $(this);
        var url = $(this).attr('id');
        
        //data we will send to our addToCart controller
        var data = {
            'url': url
        };
            
        
        $.ajax({
            url: '/addToCart',
            type: 'post',
            dataType: 'json',
            contentType: 'application/json',
            'data': JSON.stringify(data),
            success: function(data){
                console.log("This is the data from the ajax request");
                console.log(data);
                if (data.raceAdded == url){
                    console.log("Changing button value");
                    //find the button again, add change the value
                    $thisBtn.attr('value', 'Added!');
                }
            },
            error: function(jqchr, textStatus, errorThrown){
                console.log(errorThrown);
            }
        }); //end ajax
        
        return false; //cancel the page reloading on submit
        
    });

        
    
});