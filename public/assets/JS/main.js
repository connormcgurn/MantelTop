$(document).ready(function(){
    
    //this will create the breadcrumbs on all pages but homepage
    if (!(window.location.pathname === '/')){
        var splitPathnames = window.location.pathname.split('/');
        splitPathnames.shift();
        console.log(splitPathnames);
        
        var $breadcrumbs = $("<ol class='breadcrumb'></ol>");
        $breadcrumbs.append("<li><a href='/'>MantelTop</a></li>");
        
        for (var i = 0; i < splitPathnames.length - 1; i++)
            $breadcrumbs.append("<li><a href=/" + splitPathnames[i] + ">" + splitPathnames[i] + "</a></li>");
        
        $breadcrumbs.append("<li class='active'>" + splitPathnames[splitPathnames.length - 1] + "</li>");
  
        ($breadcrumbs).insertAfter('body>nav:nth-child(1)');
    }  // end breadcrumbs auto generation
});