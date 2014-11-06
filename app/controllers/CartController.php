<?php

class CartController extends BaseController {


	public function addToCart()
	{

		$cart = Input::get('url');

		return Redirect::back()
				->with('global', 'Image added to cart');
	}



}