<?php

class CartController extends BaseController {


	public function addToCart()
	{
		session_start();
		$url = Input::get('url');
		if(!isset($_SESSION['cart']))
		{
			$_SESSION['cart'] = array();
		}
		array_push($_SESSION['cart'], $url);
		//array_push($_SESSION['cart'], $url);
		$_SESSION['cart'] = array_unique($_SESSION['cart']);
		/*foreach($_SESSION['cart'] as $value)
		{
			echo $value . '</br>';
		} */
		return Redirect::back()
				->with('global', 'Image added to cart'); 
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