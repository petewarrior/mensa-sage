<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/utils.php',                 // Utility functions
  'lib/init.php',                  // Initial theme setup and constants
  'lib/wrapper.php',               // Theme wrapper class
  'lib/conditional-tag-check.php', // ConditionalTagCheck class
  'lib/config.php',                // Configuration
  'lib/assets.php',                // Scripts and stylesheets
  'lib/titles.php',                // Page titles
  'lib/nav.php',                   // Custom nav modifications
  'lib/gallery.php',               // Custom [gallery] modifications
  'lib/extras.php',                // Custom functions
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

function my_eme_add_currencies($currencies){
	$currencies['IDR'] = 'Indonesian Rupiah';
	return $currencies;
}
add_filter('eme_add_currencies','my_eme_add_currencies');

/**
 * Adds a new Currency symbol and name to Give payment options
 * @since 1.0
 * NOTE: Give supports all currencies that PayPal Standard offers
 * See here: https://developer.paypal.com/docs/classic/api/country_codes/
 * 
 * This adds the currency as an option in your currency settings 
 * and will output in your front-end forms. But it is up to your 
 * Payment Gateway to handle that currency correctly. 
 * This means that even though the form will show your currency, and 
 * you'll see the reports with this currency, your Payment processor 
 * may reflect something different.
 */
/*
 * Adds Costa Rican Colon currency to your Give settings
 */
add_filter('give_currencies', 'give_add_idr_currency');
function give_add_idr_currency($currencies) {
    $currencies['IDR'] = __( 'Indonesian Rupiah (Rp)', 'give' );
    return $currencies;
}
/*
 * Converts the currency code to the correct HTML character symbol
 * for the form output
 */
add_filter('give_currency_symbol', 'add_colon_symbol', 10,2);
function add_colon_symbol($symbol, $currency) {
    switch ( $currency ) :
        case "IDR" :
            $symbol = 'Rp';
            break;
    endswitch;
    return $symbol;
}