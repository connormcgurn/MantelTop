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

		$cart = $_SESSION['cart'];
		return View::make('cart')
			->with('cart', $cart);
		
	}
    
    public function cartData()
    {
        $data = Input::all();
        
        //the data looks like this! ( in JSON, but same really for php
        /*
        data: {
            orders: {
                urlToPicture1: {
                    sizes: {
                        digital: true,
                        4x7: 1,
                        6x7: 7
                        ... any sizes they selected. Could be 0!!!
                    },
                urlToSecondPicture : {....}
            },
            price: ThePriceShownOnTheScreenBeforeCheckout
        }
        
        Notes: It's always good practice to double check the price on the server side,
        hypothetically someout COULD edit the price variable to be like, -50 if they
        really wanted to be an asshole and send it like that. But maybe just do some contraint
        checking. 
        */
        
        return Response::json(array('data' => $data));
        
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
		 return View::make('checkout');
	}



}