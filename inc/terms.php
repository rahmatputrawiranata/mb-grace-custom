<?php

add_action( 'add_meta_boxes', 'mb_grace_product_meta_box_add' );
function mb_grace_product_meta_box_add()
{
    add_meta_box( 'product-meta-box-id', 'Product Settings', 'mb_grace_product_meta_box_cb', 'post', 'normal', 'high' );
}

function mb_grace_product_meta_box_cb()
{
    // $post is already set, and contains an object: the WordPress post
    global $post;
    $values = get_post_custom( $post->ID );
    $normal_price = isset( $values['product_meta_box_normal_price'] ) ? $values['product_meta_box_normal_price'][0] : '0';
    $sale_price = isset( $values['product_meta_box_sale_price'] ) ? $values['product_meta_box_sale_price'][0] : '0';
    $product_link = isset( $values['product_meta_box_link'] ) ? $values['product_meta_box_link'][0] : '#';
    $link_text = isset( $values['product_meta_box_link_text'] ) ? $values['product_meta_box_link_text'][0] : 'See deals';
    $currency = isset( $values['product_meta_box_currency'] ) ? esc_attr( $values['product_meta_box_currency'][0] ) : 'Rp';
    $rating_star = isset( $values['product_meta_box_rating_star'] ) ? esc_attr( $values['product_meta_box_rating_star'][0] ) : '0';
    $is_featured = isset( $values['product_meta_box_is_featured'] ) ? esc_attr( $values['product_meta_box_is_featured'][0] ) : 'off';
    $coupon_code = isset( $values['product_meta_box_coupon_code'] ) ? $values['product_meta_box_coupon_code'][0] : '';
    $is_custom_price = isset( $values['product_meta_box_is_custom_price'] ) ? esc_attr( $values['product_meta_box_is_custom_price'][0] ) : 'off';
    $custom_price_text = isset( $values['product_meta_box_custom_price_text'] ) ? $values['product_meta_box_custom_price_text'][0] : 'Hubungi kami';
    $custom_price_link = isset( $values['product_meta_box_custom_price_link'] ) ? $values['product_meta_box_custom_price_link'][0] : '#';
    $custom_price_notes = isset( $values['product_meta_box_custom_price_notes'] ) ? $values['product_meta_box_custom_price_notes'][0] : '**harga hubungi cs';
     
    // We'll use this nonce field later on when saving.
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
    ?>

    <table width="100%">
        <tr>
            <td colspan="2">
                <p>
                <input type="checkbox" id="product_meta_box_is_custom_price" name="product_meta_box_is_custom_price" <?php checked( $is_custom_price, 'on' ); ?> />
                <label for="product_meta_box_is_custom_price"><?php _e('Enable custom price', 'mb-grace'); ?></label>
                </p>
            </td>
        </tr>

        <tr class="normal-price" style="<?php echo ($is_custom_price == 'on') ? 'display:none;' : ''; ?>">
            <td>
                <label for="product_meta_box_normal_price"><?php _e('Normal Price', 'mb-grace'); ?></label><br>
                <input type="number" name="product_meta_box_normal_price" id="product_meta_box_normal_price" value="<?php echo $normal_price; ?>" />
            </td>
            <td>
                <label for="product_meta_box_sale_price"><?php _e('Sale Price', 'mb-grace'); ?></label><br>
                <input type="number" name="product_meta_box_sale_price" id="product_meta_box_sale_price" value="<?php echo $sale_price; ?>" />
            </td>
        </tr>

        <tr class="custom-price" style="<?php echo ($is_custom_price == 'on') ? '' : 'display:none;'; ?>">
            <td colspan="2">
                <label for="product_meta_box_custom_price_notes"><?php _e('Custom Price Text', 'mb-grace'); ?></label><br>
                <input type="text" name="product_meta_box_custom_price_notes" id="product_meta_box_custom_price_notes" value="<?php echo $custom_price_notes; ?>" />
            </td>
        </tr>

        <tr class="custom-price" style="<?php echo ($is_custom_price == 'on') ? '' : 'display:none;'; ?>">
            <td>
                <label for="product_meta_box_custom_price_text"><?php _e('Custom Price Button Text', 'mb-grace'); ?></label><br>
                <input type="text" name="product_meta_box_custom_price_text" id="product_meta_box_custom_price_text" value="<?php echo $custom_price_text; ?>" />
            </td>
            <td>
                <label for="product_meta_box_custom_price_link"><?php _e('Custom Price Button Link', 'mb-grace'); ?></label><br>
                <input type="text" name="product_meta_box_custom_price_link" id="product_meta_box_custom_price_link" value="<?php echo $custom_price_link; ?>" />
            </td>
        </tr>

        <tr>
            <td>
                <label for="product_meta_box_link"><?php _e('Affiliate Link/URL', 'mb-grace'); ?></label><br>
                <input type="text" name="product_meta_box_link" id="product_meta_box_link" value="<?php echo $product_link; ?>" />
            </td>
            <td>
                <label for="product_meta_box_link_text"><?php _e('Button/Link Text', 'mb-grace'); ?></label><br>
                <input type="text" name="product_meta_box_link_text" id="product_meta_box_link_text" value="<?php echo $link_text; ?>" />
            </td>
        </tr>

        <tr>
            <td>
                <label for="product_meta_box_currency"><?php _e('Currency', 'mb-grace'); ?></label><br>
                <select name="product_meta_box_currency" id="product_meta_box_currency">
                    <option value="$" <?php selected( $currency, '$' ); ?>>USD</option>
                    <option value="Rp" <?php selected( $currency, 'Rp' ); ?>>IDR</option>
                    <option value="&#8369" <?php selected( $currency, '&#8369' ); ?>>PHP</option>
                    <option value="RM" <?php selected( $currency, 'RM' ); ?>>MYR</option>
                </select>
            </td>
            <td>
                <label for="product_meta_box_rating_star"><?php _e('Rating Star', 'mb-grace'); ?></label><br>
                <select name="product_meta_box_rating_star" id="product_meta_box_rating_star">
                    <option value="0">0</option>
                    <option value="1" <?php selected( $rating_star, '1' ); ?>>1</option>
                    <option value="2" <?php selected( $rating_star, '2' ); ?>>2</option>
                    <option value="3" <?php selected( $rating_star, '3' ); ?>>3</option>
                    <option value="4" <?php selected( $rating_star, '4' ); ?>>4</option>
                    <option value="5" <?php selected( $rating_star, '5' ); ?>>5</option>
                </select>   
            </td>
        </tr>   
        <tr>
            <td colspan="2">
                <label for="product_meta_box_coupon_code"><?php _e('Coupon Code', 'mb-grace'); ?></label><br>
                <input type="text" name="product_meta_box_coupon_code" id="product_meta_box_coupon_code" value="<?php echo $coupon_code; ?>" />
            </td>
        </tr>      
        <tr>
            <td colspan="2">
                <p>
                <input type="checkbox" id="product_meta_box_is_featured" name="product_meta_box_is_featured" <?php checked( $is_featured, 'on' ); ?> />
                <label for="product_meta_box_is_featured"><?php _e('Feature this product', 'mb-grace'); ?></label>
                </p>
            </td>
        </tr>
    </table>

    <script>
        jQuery(function(){
            jQuery("#product_meta_box_is_custom_price").on('change', function(){
                if (this.checked) {
                    jQuery(".custom-price").show();
                    jQuery(".normal-price").hide();
                } else {
                    jQuery(".normal-price").show();
                    jQuery(".custom-price").hide();
                }
            });
        });
    </script>

    <?php    
}

add_action( 'save_post', 'mb_grace_product_meta_box_save' );
function mb_grace_product_meta_box_save( $post_id )
{
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
     
    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
     
    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_post' ) ) return;
     
    // now we can actually save the data
    $allowed = array( 
        'a' => array( // on allow a tags
            'href' => array() // and those anchors can only have href attribute
        )
    );
     
    // Make sure your data is set before trying to save it
    if( isset( $_POST['product_meta_box_normal_price'] ) )
        update_post_meta( $post_id, 'product_meta_box_normal_price', wp_kses( $_POST['product_meta_box_normal_price'], $allowed ) );

    if( isset( $_POST['product_meta_box_sale_price'] ) )
        update_post_meta( $post_id, 'product_meta_box_sale_price', wp_kses( $_POST['product_meta_box_sale_price'], $allowed ) );

    if( isset( $_POST['product_meta_box_link'] ) )
        update_post_meta( $post_id, 'product_meta_box_link', wp_kses( $_POST['product_meta_box_link'], $allowed ) );
         
    if( isset( $_POST['product_meta_box_currency'] ) )
        update_post_meta( $post_id, 'product_meta_box_currency', esc_attr( $_POST['product_meta_box_currency'] ) );

    if( isset( $_POST['product_meta_box_rating_star'] ) )
        update_post_meta( $post_id, 'product_meta_box_rating_star', esc_attr( $_POST['product_meta_box_rating_star'] ) );
  
    if( isset( $_POST['product_meta_box_link_text'] ) )
        update_post_meta( $post_id, 'product_meta_box_link_text', esc_attr( $_POST['product_meta_box_link_text'] ) );

    if( isset( $_POST['product_meta_box_coupon_code'] ) )
        update_post_meta( $post_id, 'product_meta_box_coupon_code', esc_attr( $_POST['product_meta_box_coupon_code'] ) );

    if( isset( $_POST['product_meta_box_custom_price_text'] ) )
        update_post_meta( $post_id, 'product_meta_box_custom_price_text', esc_attr( $_POST['product_meta_box_custom_price_text'] ) );

    if( isset( $_POST['product_meta_box_custom_price_link'] ) )
        update_post_meta( $post_id, 'product_meta_box_custom_price_link', esc_attr( $_POST['product_meta_box_custom_price_link'] ) );

    if( isset( $_POST['product_meta_box_custom_price_notes'] ) )
        update_post_meta( $post_id, 'product_meta_box_custom_price_notes', esc_attr( $_POST['product_meta_box_custom_price_notes'] ) );
         
    $chk = isset( $_POST['product_meta_box_is_featured'] ) && $_POST['product_meta_box_is_featured'] ? 'on' : 'off';
    update_post_meta( $post_id, 'product_meta_box_is_featured', $chk );

    $chk2 = isset( $_POST['product_meta_box_is_custom_price'] ) && $_POST['product_meta_box_is_custom_price'] ? 'on' : 'off';
    update_post_meta( $post_id, 'product_meta_box_is_custom_price', $chk2 );
}