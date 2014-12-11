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

        $data = Input::all();

        session_start();
        
        $_SESSION['order'] = array();
        
        array_push($_SESSION['order'], $data);


        //  and
        return Response::json(array('data' => $data, 'redirect' => true));

        

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
        
        /*$price = $data['price'];
        $orders = $data['orders'];
        
        this is an example of how to access the data. We can only return JSON.
        Right now, the client only checks that you returned SOMETHING. If you didn't return anything,
        the page is not redirected to /checkout. */
        
        /*$willReturn = array();
        foreach ($orders as $url => $sizes){
            //do stuff with the url and sizes
            array_push($willReturn, $url);
        }*/
        
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
		$data = $_SESSION['order'];
		$order = $data[0];
		

		//print_r($images);

		


		return View::make('checkout')
			->with('orders', $order);
			
	}




}