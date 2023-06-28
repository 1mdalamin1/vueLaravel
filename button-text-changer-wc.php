<?php
/**
 * Plugin Name:       Button Text Changer WC
 * Plugin URI:        https://wordpress.org/plugins/button-text-changer-wc
 * Description:       Button Text Changer in wooCommerce plugin will help you to put any custom text for wooCommerce button. It Designed, Developed, Maintained & Supported by vir-za Team.
 * Version:           1.0.0
 * Author:            1mdalamin1
 * Author URI:        https://www.fiverr.com/share/4Y1RVk
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * Text Domain:       button-text-changer-wc
 */

// Exit if accessed directly |
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
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

    $dashboard = get_option('btcwc_account_dashboard_text') ? get_option('btcwc_account_dashboard_text') :'Dashboard';
    $orders = get_option('btcwc_account_orders_text') ? get_option('btcwc_account_orders_text') :'Orders';
    $download = get_option('btcwc_account_downloads_text') ? get_option('btcwc_account_downloads_text') :'Download';
    $address = get_option('btcwc_account_address_text') ? get_option('btcwc_account_address_text') :'Address';
    $account = get_option('btcwc_account_details_text') ? get_option('btcwc_account_details_text') :'Account details';
    $logout = get_option('btcwc_account_log_out_text') ? get_option('btcwc_account_log_out_text') :'Log out';

    $items['dashboard'] = __( $dashboard, 'button-text-changer-wc' );
    $items['orders'] = __( $orders, 'button-text-changer-wc' );
    $items['downloads'] = __( $download, 'button-text-changer-wc' );
    $items['edit-address'] = __( $address, 'button-text-changer-wc' );
    $items['edit-account'] = __( $account, 'button-text-changer-wc' );
    $items['customer-logout'] = __( $logout, 'button-text-changer-wc' );

    return $items;
}

// wooCommerce Add to cart btn 
add_filter( 'woocommerce_product_add_to_cart_text', 'btcwc_change_add_to_cart_text' );
add_filter( 'woocommerce_product_single_add_to_cart_text', 'btcwc_change_add_to_cart_text' );
function btcwc_change_add_to_cart_text( $text ) {
    // Modify the button text here
    $addToCart = get_option( 'btcwc_fild_btcwc_add_to_cart' );
    $text      = $addToCart ? $addToCart : 'Add to cart';

    return $text;
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
    $sCheckout = get_option('btcwc_order_btn_text') ? get_option('btcwc_order_btn_text') :'Place order';
    return __( $sCheckout, 'button-text-changer-wc' ); 
}

// Empty cart button
add_filter( 'woocommerce_return_to_shop_text', 'btcwc_empty_cart_button', 10, 1 );
function btcwc_empty_cart_button ( $default_text ) {
    $goToShop = get_option('btcwc_back_to_shop_btn_text') ? get_option('btcwc_back_to_shop_btn_text') :'Return to Shop';

    $default_text = __( $goToShop, 'button-text-changer-wc' );
    return $default_text;
}




// function change_mini_cart_button_text( $label ) {
//     $label = __( 'Custom View Cart', 'your-text-domain' );
//     return $label;
// }
// add_filter( 'woocommerce_widget_cart_item_quantity', 'change_mini_cart_button_text' );

