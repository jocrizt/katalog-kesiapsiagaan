<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $post;

$wbg_author 		= get_post_meta( $post->ID, 'wbg_author', true );
$wbg_download_link 	= get_post_meta( $post->ID, 'wbg_download_link', true );
$wbgp_buy_link 	    = get_post_meta( $post->ID, 'wbgp_buy_link', true );
$wbg_publisher 		= get_post_meta( $post->ID, 'wbg_publisher', true );
$wbg_published_on 	= get_post_meta( $post->ID, 'wbg_published_on', true );
$wbg_isbn 			= get_post_meta( $post->ID, 'wbg_isbn', true );
$wbg_isbn_13 		= get_post_meta( $post->ID, 'wbg_isbn_13', true );
$wbg_pages 			= get_post_meta( $post->ID, 'wbg_pages', true );
$wbg_country 		= get_post_meta( $post->ID, 'wbg_country', true );
$wbg_language 		= get_post_meta( $post->ID, 'wbg_language', true );
$wbg_dimension 		= get_post_meta( $post->ID, 'wbg_dimension', true );
$wbg_filesize 		= get_post_meta( $post->ID, 'wbg_filesize', true );
$wbg_status 		= get_post_meta( $post->ID, 'wbg_status', true );
$wbgp_regular_price	= get_post_meta( $post->ID, 'wbgp_regular_price', true );
$wbgp_sale_price 	= get_post_meta( $post->ID, 'wbgp_sale_price', true );
$wbg_cost_type 		= get_post_meta( $post->ID, 'wbg_cost_type', true );
$wbg_is_featured    = get_post_meta( $post->ID, 'wbg_is_featured', true );
$wbg_item_weight    = get_post_meta( $post->ID, 'wbg_item_weight', true );
?>
<table class="form-table">
    <tr>
        <th scope="row">
            <label><?php _e('Author', WBG_TXT_DOMAIN); ?>:</label>
        </th>
        <td>
            <input type="text" name="wbg_author" value="<?php esc_attr_e( $wbg_author ); ?>" class="regular-text">
        </td>
    </tr>
    <tr>
        <th scope="row">
            <label><?php _e('Publisher', WBG_TXT_DOMAIN); ?>:</label>
        </th>
        <td>
            <input type="text" name="wbg_publisher" value="<?php esc_attr_e( $wbg_publisher ); ?>" class="regular-text">
        </td>
    </tr>

    <?php do_action( 'wbg_admin_book_meta_after_publisher' ); ?>

    <tr>
        <th scope="row">
            <label><?php _e('Published On', WBG_TXT_DOMAIN); ?>:</label>
        </th>
        <td>
            <input type="text" name="wbg_published_on" id="wbg_published_on" value="<?php esc_attr_e( $wbg_published_on ); ?>" class="medium-text" readonly>
        </td>
    </tr>
    <tr>
        <th scope="row">
            <label><?php _e('ISBN', WBG_TXT_DOMAIN); ?>:</label>
        </th>
        <td>
            <input type="text" name="wbg_isbn" value="<?php esc_attr_e( $wbg_isbn ); ?>" class="medium-text">
        </td>
    </tr>
    <tr>
        <th scope="row">
            <label><?php _e('ISBN-13', WBG_TXT_DOMAIN); ?>:</label>
        </th>
        <td>
            <?php
            if ( wbg_fs()->is_not_paying() ) {
                ?>
                <span><?php echo '<a href="' . wbg_fs()->get_upgrade_url() . '">' . __('Please Upgrade to Professional!', WBG_TXT_DOMAIN) . '</a>'; ?></span>
                <?php
            }

            if ( wbg_fs()->is_plan__premium_only('pro') ) {
                ?>
                <input type="text" name="wbg_isbn_13" value="<?php esc_attr_e( $wbg_isbn_13 ); ?>" class="medium-text">
                <?php
            }
            ?>
        </td>
    </tr>
    <tr>
        <th scope="row">
            <label for="wbg_pages"><?php _e('Pages', WBG_TXT_DOMAIN); ?>:</label>
        </th>
        <td>
            <input type="number" min="1" max="10000" step="1" name="wbg_pages" value="<?php esc_attr_e( $wbg_pages ); ?>" class="medium-text">
        </td>
    </tr>
    <tr>
        <th scope="row">
            <label><?php _e('Country', WBG_TXT_DOMAIN); ?>:</label>
        </th>
        <td>
            <input type="text" name="wbg_country" value="<?php esc_attr_e( $wbg_country ); ?>" class="medium-text">
        </td>
    </tr>
    <tr>
        <th scope="row">
            <label><?php _e('Language', WBG_TXT_DOMAIN); ?>:</label>
        </th>
        <td>
            <input type="text" name="wbg_language" value="<?php esc_attr_e( $wbg_language ); ?>" class="medium-text">
        </td>
    </tr>
    <tr>
        <th scope="row">
            <label><?php _e('Dimension', WBG_TXT_DOMAIN); ?>:</label>
        </th>
        <td>
            <input type="text" name="wbg_dimension" value="<?php esc_attr_e( $wbg_dimension ); ?>" class="medium-text">
        </td>
    </tr>
    <tr>
        <th scope="row">
            <label><?php _e('Download Link', WBG_TXT_DOMAIN); ?>:</label>
        </th>
        <td>
            <input type="text" name="wbg_download_link" value="<?php esc_attr_e( $wbg_download_link ); ?>" class="widefat">
        </td>
    </tr>
    <tr>
        <th scope="row">
            <label><?php _e('Buy From Link', WBG_TXT_DOMAIN); ?>:</label>
        </th>
        <td>
            <?php
            if ( wbg_fs()->is_not_paying() ) {
                ?>
                <span><?php echo '<a href="' . wbg_fs()->get_upgrade_url() . '">' . __('Please Upgrade Now!', WBG_TXT_DOMAIN) . '</a>'; ?></span>
                <?php
            }

            if ( wbg_fs()->is_plan__premium_only('basic') ) {
                ?>
                <input type="text" name="wbgp_buy_link" value="<?php esc_attr_e( $wbgp_buy_link ); ?>" class="widefat">
                <?php
            }
            ?>
        </td>
    </tr>
    <tr>
        <th scope="row">
            <label><?php _e('File Size', WBG_TXT_DOMAIN); ?>:</label>
        </th>
        <td>
            <input type="text" name="wbg_filesize" value="<?php esc_attr_e( $wbg_filesize ); ?>" class="medium-text">
        </td>
    </tr>
    <tr>
        <th scope="row">
            <label><?php _e('Cost Type', WBG_TXT_DOMAIN); ?>:</label>
        </th>
        <td>
            <?php
            if ( wbg_fs()->is_not_paying() ) {
                ?>
                <span><?php echo '<a href="' . wbg_fs()->get_upgrade_url() . '">' . __('Please Upgrade Now!', WBG_TXT_DOMAIN) . '</a>'; ?></span>
                <?php
            }

            if ( wbg_fs()->is_plan__premium_only('basic') ) {
                ?>
                <input type="radio" name="wbg_cost_type" id="wbg_cost_type_free" value="free" <?php echo ( 'premium' !== $wbg_cost_type ) ? 'checked' : ''; ?> >
                <label for="wbg_cost_type_free"><span></span><?php _e( 'Free', WBG_TXT_DOMAIN ); ?></label>
                &nbsp;&nbsp;
                <input type="radio" name="wbg_cost_type" id="wbg_cost_type_premium" value="premium" <?php echo ( 'premium' === $wbg_cost_type ) ? 'checked' : ''; ?> >
                <label for="wbg_cost_type_premium"><span></span><?php _e( 'Premium', WBG_TXT_DOMAIN ); ?></label>
                <?php
            }
            ?>
        </td>
    </tr>
    <tr>
        <th scope="row">
            <label><?php _e('Is Featured', WBG_TXT_DOMAIN); ?>:</label>
        </th>
        <td>
            <?php
            if ( ! wbg_fs()->is_plan__premium_only('pro') ) {
                ?>
                <span><?php echo '<a href="' . wbg_fs()->get_upgrade_url() . '">' . __('Upgrade to Professional!', WBG_TXT_DOMAIN) . '</a>'; ?></span>
                <?php
            }

            if ( wbg_fs()->is_plan__premium_only('pro') ) {
                ?>
                <input type="radio" name="wbg_is_featured" id="wbg_is_featured_yes" value="yes" <?php echo ( 'yes' === $wbg_is_featured ) ? 'checked' : ''; ?> >
                <label for="wbg_is_featured_yes"><span></span><?php _e( 'Yes', WBG_TXT_DOMAIN ); ?></label>
                &nbsp;&nbsp;
                <input type="radio" name="wbg_is_featured" id="wbg_is_featured_no" value="no" <?php echo ( 'yes' !== $wbg_is_featured ) ? 'checked' : ''; ?> >
                <label for="wbg_is_featured_no"><span></span><?php _e( 'No', WBG_TXT_DOMAIN ); ?></label>
                <?php
            }
            ?>
        </td>
    </tr>
    <tr>
        <th scope="row">
            <label><?php _e('Regular Price', WBG_TXT_DOMAIN); ?>:</label>
        </th>
        <td>
            <?php
            if ( wbg_fs()->is_not_paying() ) {
                ?>
                <span><?php echo '<a href="' . wbg_fs()->get_upgrade_url() . '">' . __('Please Upgrade Now!', WBG_TXT_DOMAIN) . '</a>'; ?></span>
                <?php
            }

            if ( wbg_fs()->is_plan__premium_only('basic') ) {
                ?>
                <input type="number" min="1" max="100000" step="1" name="wbgp_regular_price" value="<?php esc_attr_e( $wbgp_regular_price ); ?>" class="medium-text">
                <code><?php _e('Use 999 For 9.99', WBG_TXT_DOMAIN); ?></code>
                <?php
            }
            ?>
        </td>
    </tr>
    <tr>
        <th scope="row">
            <label><?php _e('Discount Price', WBG_TXT_DOMAIN); ?>:</label>
        </th>
        <td>
            <?php
            if ( wbg_fs()->is_not_paying() ) {
                ?>
                <span><?php echo '<a href="' . wbg_fs()->get_upgrade_url() . '">' . __('Please Upgrade Now!', WBG_TXT_DOMAIN) . '</a>'; ?></span>
                <?php
            }

            if ( wbg_fs()->is_plan__premium_only('basic') ) {
                ?>
                <input type="number" min="1" max="100000" step="1" name="wbgp_sale_price" value="<?php esc_attr_e( $wbgp_sale_price ); ?>" class="medium-text">
                <code><?php _e('Use 999 For 9.99', WBG_TXT_DOMAIN); ?></code>
                <?php
            }
            ?>
        </td>
    </tr>
    <tr>
        <th scope="row">
            <label><?php _e('Item Weight', WBG_TXT_DOMAIN); ?>:</label>
        </th>
        <td>
            <?php
            if ( wbg_fs()->is_not_paying() ) {
                ?>
                <span><?php echo '<a href="' . wbg_fs()->get_upgrade_url() . '">' . __('Please Upgrade to Professional!', WBG_TXT_DOMAIN) . '</a>'; ?></span>
                <?php
            }

            if ( wbg_fs()->is_plan__premium_only('pro') ) {
                ?>
                <input type="text" name="wbg_item_weight" value="<?php esc_attr_e( $wbg_item_weight ); ?>" class="medium-text">
                <?php
            }
            ?>
        </td>
    </tr>

    <?php do_action( 'wbg_admin_book_meta_after_filesize' ); ?>

    <tr>
        <th scope="row">
            <label><?php _e('Status:', WBG_TXT_DOMAIN); ?></label>
        </th>
        <td>
            <input type="radio" name="wbg_status" id="wbg_status_active" value="active" <?php echo ( 'inactive' !== $wbg_status ) ? 'checked' : ''; ?> >
            <label for="wbg_status_active"><span></span><?php _e( 'Active', WBG_TXT_DOMAIN ); ?></label>
            &nbsp;&nbsp;
            <input type="radio" name="wbg_status" id="wbg_status_inactive" value="inactive" <?php echo ( 'inactive' === $wbg_status ) ? 'checked' : ''; ?> >
            <label for="wbg_status_inactive"><span></span><?php _e( 'Inactive', WBG_TXT_DOMAIN ); ?></label>
        </td>
    </tr>
</table>