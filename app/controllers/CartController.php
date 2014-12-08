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