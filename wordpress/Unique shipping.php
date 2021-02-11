add_filter( 'woocommerce_package_rates', function( $rates, $package ){

	$shipping_class_id = 1279;
	$in_cart = false;

	// Checking in cart items
	foreach( WC()->cart->get_cart_contents() as $key => $values){

		if( $values['data']->get_shipping_class_id() == $shipping_class_id ){
			$in_cart = true;
			break;
		}
	}

	if( $in_cart == false){
		unset($rates['shipmondo:15']);
	}
	
	if( $in_cart == true ){
		unset($rates['shipmondo:11']);
		unset($rates['shipmondo:12']);
		unset($rates['shipmondo:13']);
	}
		
	return $rates;
}, 10, 2 );
