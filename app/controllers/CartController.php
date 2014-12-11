<?php

class CartController extends BaseController {


	public function addToCart()
	{
		session_start();
        
		$data = Input::all();
        $url = $data['url'];
        
		if(!isset($_SESSION['cart']))
		{
			$_SESSION['cart'] = array();
		}
        
		array_push($_SESSION['cart'], $url);
        //make sure there are no duplicates
		$_SESSION['cart'] = array_unique($_SESSION['cart']);

        
		return Response::json(array('raceAdded' => $url));
	}
	public function getCart()
	{
		session_start();
		if(isset($_SESSION['cart']))
		{
			$cart = $_SESSION['cart'];
			return View::make('cart')
			->with('cart', $cart);

		}
		else
		{
			return View::make('cart');
		}
		
		
		
	}
    
    public function cartData()
    {


    	/*
		Joel, your code returns the $data object when the checkout button is clicked, which you can see under the 
		console in chrome.... which is what's supposed to be happen... all good and dandy.
		However, there are two problems...

	 	1.  When you click 'checkout', nothing actually happens... it doesnt seem to even reload the page. However,
	 	    it does look like it accesses this controller. Which leads to the next problem.

		2.  Any code other than the code you wrote:			*/

	        $data = Input::all();

	        session_start();
	        if(!isset($_SESSION['order']))
			{
				$_SESSION['order'] = array();
			}
	        array_push($_SESSION['order'], $data);


	        //  and
	        return Response::json(array('data' => $data));

	   /*   breaks it and returns this error in the console:
	   			"SyntaxError: Unexpected token a {stack: (...), message: "Unexpected token a"}"

	   		for instance, if I add this simple line BEFORE any of the previous code:			*/

	   		  // echo 'Hello World';

	   	/* 	it will return the error, but if it is BEFORE any of the previous code, it returns the error...
	   		and even when it returns the $data object, it doesn't echo 'Hello World'. 
	   		Any ideas?
	   	*/
			







        /////////////////////////////////////////////////////////////////////////////////

        //the data looks like this! ( in JSON, but same really for php
        
        /*data: {
            orders: {
                urlToPicture1: {
                    sizes: {
                        digital: true,
                        4x7: 1,
                        6x7: 7
                        //... any sizes they selected. Could be 0!!!
                    },
                urlToSecondPicture : {....}
            },
            price: ThePriceShownOnTheScreenBeforeCheckout
        }*/
        
        /*Notes: It's always good practice to double check the price on the server side,
        hypothetically someout COULD edit the price variable to be like, -50 if they
        really wanted to be an asshole and send it like that. But maybe just do some contraint
        checking. */
        
        
        
        
    }
    
	public function editCart()
	{
		session_start();
		$cart = $_SESSION['cart'];

		$delete = Input::get('delete');
		if(isset($delete))
		{
			foreach($delete as $delete)
			{
				unset($cart[$delete]);
				
				//echo $delete;
			}
		}
		$_SESSION['cart'] = $cart;
		//return $cart;
		return View::make('cart')
			->with('cart', $cart); 
	}
	public function checkout()
	{
		session_start();
		if(isset($_SESSION['order']))
		{
			$order = $_SESSION['order'];
			return $_SESSION['order'];
			
			

		}
		
		
		return View::make('checkout')
			->with('order', $order);
	}




}