<?php
/**
 * Plugin Name:       Button Text Changer WC
 * Plugin URI:        https://wordpress.org/plugins/button-text-changer-wc
 * Description:       Button Text Changer in wooCommerce plugin will help you to put any custom text for wooCommerce button. It Designed, Developed, Maintained & Supported by vir-za Team.
 * Version:           1.0.0
 * Author:            1mdalamin1
 * Author URI:        https://bd.linkedin.com/in/1mdalamin1
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * Text Domain:       button-text-changer-wc
 */

// Exit if accessed directly |
if ( ! defined( 'ABSPATH' ) ) { exit; }
/**
 * Checking if WooCommerce is active.
 */
if(!in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))){return;}

/*
    $activated = false;
    if ( function_exists( 'is_multisite' ) && is_multisite() ) {
        include_once ABSPATH . 'wp-admin/includes/plugin.php';
        if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
            $activated = true;
        }
    } else {
        if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ), true ) ) {
            $activated = true;
        }
    }
*/

include 'btcwc-settings.php';
// Define  textDomain=button-text-changer-wc | prefix=btcwc_

$updateCart  = get_option('btcwc_update_cart_btn_text') ? get_option('btcwc_update_cart_btn_text') :'Update Cart';
$applyCoupon = get_option('btcwc_coupon_btn_text') ? get_option('btcwc_coupon_btn_text') :'Apply coupon';
$checkEnableAjaxBTN = get_option( 'btcwc_fild_single_page_ajax_btn' );

define('BTCWC_COUPON',$applyCoupon);
define('BTCWC_UPDATE_CART',$updateCart);
define('BTCWC_AJAX_BTN_SINGLE_PAGE',$checkEnableAjaxBTN);

// Including JavaScript
add_action( "wp_enqueue_scripts", "btcwc_enqueue_scripts" );
function btcwc_enqueue_scripts(){
    //wp_enqueue_script('jquery');
    wp_enqueue_script('btcwc-custom-script', plugins_url('js/btcwc_custom.js', __FILE__), array('jquery'), '1.1.0', 'true');
    // Localize the script and pass PHP values
    wp_localize_script('btcwc-custom-script', 'btcwcCustomData', array(
      'applyCoupon' => BTCWC_COUPON,
      'updateCart' => BTCWC_UPDATE_CART,
      'checkEnableAjaxBTN' => BTCWC_AJAX_BTN_SINGLE_PAGE
    ));

}

// wooCommerce my-account 
add_filter( 'woocommerce_account_menu_items', 'btcwc_my_account_menu_order_label', 999 );
function btcwc_my_account_menu_order_label( $items ) {

    $dashboard = get_option('btcwc_account_dashboard_text') ? get_option('btcwc_account_dashboard_text') :__( 'Dashboard', 'button-text-changer-wc' );
    $orders = get_option('btcwc_account_orders_text') ? get_option('btcwc_account_orders_text') :__( 'Orders', 'button-text-changer-wc' );
    $download = get_option('btcwc_account_downloads_text') ? get_option('btcwc_account_downloads_text') :__( 'Download', 'button-text-changer-wc' );
    $address = get_option('btcwc_account_address_text') ? get_option('btcwc_account_address_text') :__( 'Address', 'button-text-changer-wc' );
    $account = get_option('btcwc_account_details_text') ? get_option('btcwc_account_details_text') :__( 'Account details', 'button-text-changer-wc' );
    $logout = get_option('btcwc_account_log_out_text') ? get_option('btcwc_account_log_out_text') :__( 'Log out', 'button-text-changer-wc' );

    $items['dashboard'] = $dashboard;
    $items['orders'] = $orders;
    $items['downloads'] = $download;
    $items['edit-address'] = $address;
    $items['edit-account'] = $account;
    $items['customer-logout'] = $logout;

    return $items;
}

// remove Default Proceed to checkout button
add_action('template_redirect', 'btcwc_default_remove_proceed_to_checkout_button');
function btcwc_default_remove_proceed_to_checkout_button() {
    if (is_cart()) {
        remove_action( 'woocommerce_proceed_to_checkout','woocommerce_button_proceed_to_checkout', 20);
    }
}

// cart page Proceed to checkout button text cheange 
add_filter( 'woocommerce_proceed_to_checkout', 'btcwc_button_checkout_texts',20);
function btcwc_button_checkout_texts() { 
    $pCheckout = get_option('btcwc_checkout_btn_text') ? get_option('btcwc_checkout_btn_text') :'Proceed to checkout';
    ?> 
    <a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" 
    class="checkout-button button alt wc-forward<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>">
        <?php esc_html_e( $pCheckout, 'button-text-changer-wc' ); ?>
    </a>

    <?php

}




add_filter( 'woocommerce_order_button_text', 'btcwc_order_button_text' ); 
function btcwc_order_button_text() {
    $sCheckout = get_option('btcwc_order_btn_text') ? get_option('btcwc_order_btn_text') : __( 'Place order', 'button-text-changer-wc' );
    return $sCheckout; 
}

// Empty cart button
add_filter( 'woocommerce_return_to_shop_text', 'btcwc_empty_cart_button', 10, 1 );
function btcwc_empty_cart_button ( $default_text ) {
    $goToShop = get_option('btcwc_back_to_shop_btn_text') ? get_option('btcwc_back_to_shop_btn_text') :__( 'Return to Shop', 'button-text-changer-wc' );

    $default_text = $goToShop;
    return $default_text;
}


// wooCommerce Add to cart btn 
add_filter("woocommerce_product_add_to_cart_text","btcwc_change_add_to_cart_text", 10, 2);
add_filter("woocommerce_product_single_add_to_cart_text","btcwc_change_add_to_cart_text", 10, 2);
function btcwc_change_add_to_cart_text($add_to_cart_text, $product){

    $product;

    $product_type = $product->get_type();

    if( $product_type == "variable" && is_shop()){

        $variable_btn_text= get_option("btcwc_variable_add_to_cart");
        // __( 'Orders', 'button-text-changer-wc' );
        $add_to_cart_text = $variable_btn_text ? $variable_btn_text :  __( 'View products', 'button-text-changer-wc' );
        
    }else if( $product_type == "group"){

        $group_btn_text   = get_option("btcwc_group_product_add_to_cart");
        $add_to_cart_text = $group_btn_text ? $group_btn_text :  __( 'View Group products', 'button-text-changer-wc' );

    }else if( $product_type == "simple" ){

        $addToCart        = get_option( 'btcwc_fild_btcwc_add_to_cart' );
        $add_to_cart_text = $addToCart ? $addToCart :  __( 'Add to cart', 'button-text-changer-wc' );
    }
    
    return $add_to_cart_text;
}



// function change_mini_cart_button_text( $label ) {
//     $label = __( 'Custom View Cart', 'your-text-domain' );
//     return $label;
// }
// add_filter( 'woocommerce_widget_cart_item_quantity', 'change_mini_cart_button_text' );


/*
    // wooCommerce Add to cart btn 
    add_filter( 'woocommerce_product_add_to_cart_text', 'btcwc_change_add_to_cart_text' );
    add_filter( 'woocommerce_product_single_add_to_cart_text', 'btcwc_change_add_to_cart_text' );
    function btcwc_change_add_to_cart_text( $text ) {
        // Modify the button text here
        $addToCart = get_option( 'btcwc_fild_btcwc_add_to_cart' );
        $text      = $addToCart ? $addToCart : 'Add to cart';

        return $text;
    }
*/

