<?php

class CartController extends BaseController {


	public function addToCart()
	{
		session_start();
		$url = Input::get('url');

		array_push($_SESSION['cart'], $url);
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

		return 'success';
	}



}