<?php
# textDomain=button-text-changer-wc | prefix=btcwc_
add_filter('woocommerce_settings_tabs_array', 'btcwc_add_fild', 50);
function btcwc_add_fild($settings_tab) {
    $settings_tab['btcwc_fild'] = __('btnTextChange', 'button-text-changer-wc');
    return $settings_tab;
}

// add new fild in wc setting
add_action('woocommerce_settings_tabs_btcwc_fild', 'btcwc_add_fild_settings');
function btcwc_add_fild_settings() {
    woocommerce_admin_fields(btcwc_get_fild_settings());
}

// upload data in option table
add_action('woocommerce_update_options_btcwc_fild', 'btcwc_update_options_fild_settings');
function btcwc_update_options_fild_settings() {
    woocommerce_update_options(btcwc_get_fild_settings());
}

function btcwc_get_fild_settings() {
    $settings = array(
        'section_title' => array(
            'id' => 'btcwc_fild_settings_title',
            // 'desc' => 'You can control teachable course',
            'type' => 'title',
            'name' => __('wooCommerce Button Text Change Settings', 'button-text-changer-wc'),
        ),
        'btcwc_add_to_cart' => array(
            'id' => 'btcwc_fild_btcwc_add_to_cart',
            'desc' => __('Now you can set add to cart button text. Default it show Add to cart.', 'button-text-changer-wc'),
            'type' => 'text',
            'desc_tip' => true,
            'name' => __('Add to Cart button', 'button-text-changer-wc'),
        ),

        'btcwc_variable_add_to_cart' => array(
            'id' => 'btcwc_variable_add_to_cart',
            'desc' => __('Now you can set variable button text. Default it show View products.', 'button-text-changer-wc'),
            'type' => 'text',
            'desc_tip' => true,
            'name' => __('View products', 'button-text-changer-wc'),
        ),
        'btcwc_group_product_add_to_cart' => array(
            'id' => 'btcwc_group_product_add_to_cart',
            'desc' => __('Now you can set group product button text. Default it show Read more.', 'button-text-changer-wc'),
            'type' => 'text',
            'desc_tip' => true,
            'name' => __('read more', 'button-text-changer-wc'),
        ),
        
        'btcwc_order_btn_text' => array(
            'id' => 'btcwc_order_btn_text',
            'desc' => __('Now you can set checkout page order button text. Default it show Place order.', 'button-text-changer-wc'),
            'type' => 'text',
            'desc_tip' => true,
            'name' => __('Place order', 'button-text-changer-wc'),
        ),
        'btcwc_checkout_btn_text' => array(
            'id' => 'btcwc_checkout_btn_text',
            'desc' => __('Now you can set cart page checkout button text. Default it show Proceed to checkout.', 'button-text-changer-wc'),
            'type' => 'text',
            'desc_tip' => true,
            'name' => __('Proceed to checkout', 'button-text-changer-wc'),
        ),
        'btcwc_coupon_btn_text' => array(
            'id' => 'btcwc_coupon_btn_text',
            'desc' => __('Now you can set cart & checkout page ApplyCoupon button text. Default it show Apply coupon.', 'button-text-changer-wc'),
            'type' => 'text',
            'desc_tip' => true,
            'name' => __('Apply coupon', 'button-text-changer-wc'),
        ),
        'btcwc_update_cart_btn_text' => array(
            'id' => 'btcwc_update_cart_btn_text',
            'desc' => __('Now you can set cart page UpdateCart button text. Default it show Update cart.', 'button-text-changer-wc'),
            'type' => 'text',
            'desc_tip' => true,
            'name' => __('Update Cart', 'button-text-changer-wc'),
        ),
        'btcwc_back_to_shop_btn_text' => array(
            'id' => 'btcwc_back_to_shop_btn_text',
            'desc' => __('Now you can set cart page UpdateCart button text. Default it show Return to Shop', 'button-text-changer-wc'),
            'type' => 'text',
            'desc_tip' => true,
            'name' => __('Return to Shop', 'button-text-changer-wc'),
        ),

        'single_page_ajax_btn' => array(
            'id' => 'btcwc_fild_single_page_ajax_btn',
            'desc' => __( 'Enable wc single product page add to cart button ajax.', 'button-text-changer-wc' ),
            'type' => 'checkbox',
            // 'desc_tip' => true,
            // 'cbvalue'       => 'yes',
			// 'css'      => 'min-width:300px;',
            'name' =>  __( 'Add to Cart btn Ajax?', 'button-text-changer-wc' ),
        ),
        
        /*
        'name' => array(
            'id'	=> 'btcwc_fild_name',
            'desc' => __( 'Select name want to enroll the user in teachable', 'button-text-changer-wc' ),
            'type' => 'select', // multiselect 
            'name' => __( 'My account page menu', 'button-text-changer-wc' ),
            'desc_tip' => true,
            'options' => array(
                'billing_first_name' => __('Dashboard', 'button-text-changer-wc' ),
                'billing_last_name' => __('Order', 'button-text-changer-wc' ),
                'billing_full_name' => __('Downloads', 'button-text-changer-wc' ),
                'shipping_first_name' => __( 'Addresses', 'button-text-changer-wc' ),
                'shipping_last_name' => __( 'Account details', 'button-text-changer-wc' ),
                'shipping_full_name' => __('Log out', 'button-text-changer-wc' ),
            )

        ),
        'section_menue' => array(
            'id' => 'btcwc_my_account_menue',
            'desc' => 'You can control wooCommerce my account menu text',
            'type' => 'title',
            'name' => __('wooCommerce my account menu', 'button-text-changer-wc'),
        ),
        */
        'btcwc_account_dashboard_text' => array(
            'id' => 'btcwc_account_dashboard_text',
            'desc' => __('Now you can set account menu text. Default it show Dashboard.', 'button-text-changer-wc'),
            'type' => 'text',
            'desc_tip' => true,
            'name' => __('My account dashboard', 'button-text-changer-wc'),
        ),
        'btcwc_account_orders_text' => array(
            'id' => 'btcwc_account_orders_text',
            'desc' => __('Now you can set account menu text. Default it show Orders.', 'button-text-changer-wc'),
            'type' => 'text',
            'desc_tip' => true,
            'name' => __('My account orders', 'button-text-changer-wc'),
        ),
        'btcwc_account_downloads_text' => array(
            'id' => 'btcwc_account_downloads_text',
            'desc' => __('Now you can set account menu text. Default it show downloads.', 'button-text-changer-wc'),
            'type' => 'text',
            'desc_tip' => true,
            'name' => __('My account downloads', 'button-text-changer-wc'),
        ),
        
        'btcwc_account_address_text' => array(
            'id' => 'btcwc_account_address_text',
            'desc' => __('Now you can set account menu text. Default it show address.', 'button-text-changer-wc'),
            'type' => 'text',
            'desc_tip' => true,
            'name' => __('My account address', 'button-text-changer-wc'),
        ),
        
        'btcwc_account_details_text' => array(
            'id' => 'btcwc_account_details_text',
            'desc' => __('Now you can set account menu text. Default it shown Account details.', 'button-text-changer-wc'),
            'type' => 'text',
            'desc_tip' => true,
            'name' => __('My account details', 'button-text-changer-wc'),
        ),
        
        'btcwc_account_log_out_text' => array(
            'id' => 'btcwc_account_log_out_text',
            'desc' => __('Now you can set account menu text. Default it show Log out.', 'button-text-changer-wc'),
            'type' => 'text',
            'desc_tip' => true,
            'name' => __('My account Log out', 'button-text-changer-wc'),
        ),
        


        'section_end' => array(
            'id' => 'btcwc_fild_settings_sectionend',
            'type' => 'sectionend',
        ),

        


    );

    return apply_filters('filter_btcwc_fild_settings', $settings);
}










