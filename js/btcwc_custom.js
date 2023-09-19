jQuery(document).ready(function () {

  jQuery('button[name="update_cart"]').text(btcwcCustomData.updateCart); 
  jQuery('button[name="apply_coupon"]').text(btcwcCustomData.applyCoupon); 

  // btcwcCustomData.checkEnableAjaxBTN

  if (btcwcCustomData.checkEnableAjaxBTN === 'yes') {
    
    jQuery('.single_add_to_cart_button').on('click', function(e) {
        e.preventDefault();

        let form = jQuery("form.cart");
        form.block({ message: null, overlayCSS: { background: '#fff', opacity: 0.6 } });
        
        if(jQuery(this).closest('button').attr('name')) {
            jQuery(form).append(
                jQuery("<input type='hidden'>").attr( { 
                    name: jQuery(this).attr('name'), 
                    value: jQuery(this).attr('value') })
            );
        }

        let formData   = jQuery(this).closest('form.cart').serialize();
        let urlForm    = jQuery(this).closest('form.cart').attr("action");
        
        // WP Ajax Call with submit function | echo admin_url('admin-ajax.php')
        jQuery.ajax({
            type: 'POST',
            url: urlForm,
            data: formData,
            success: function(response) {
                
                jQuery(document.body).trigger('wc_fragment_refresh');
                form.unblock();

                // Create a jQuery object from the response
                let $response            = jQuery(response);
                let $desiredSection      = $response.find('.woocommerce-notices-wrapper');
                let notification_massage = $desiredSection.html();

                jQuery(document.body).find('.woocommerce-notices-wrapper').html(notification_massage);
                // console.log(notification_massage);
                
            }
        });

    });
    
  }


});