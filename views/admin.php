<?php
/**
 * Widget admin template.
 */
?>
<div class="latost">
    <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'latost' ); ?></label>
        <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $title; ?>" class="widefat" />
    </p>
    <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'cats' ) ); ?>"><?php _e( 'Categories:', 'latost' ); ?></label>
        <select multiple="multiple" id="<?php echo esc_attr( $this->get_field_id( 'cats' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'cats' ) ); ?>[]" class="widefat">
            <?php foreach( $tax_cats as $tax_cat ) : ?>
                <option value="<?php echo $tax_cat->term_id; ?>" <?php if ( is_array( $cats ) && in_array( $tax_cat->term_id, $cats ) ) echo ' selected="selected"'; ?>>
                    <?php echo $tax_cat->name; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </p>
    <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'tags' ) ); ?>"><?php _e( 'Tags:', 'latost' ); ?></label>
        <select multiple="multiple" id="<?php echo esc_attr( $this->get_field_id( 'tags' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'tags' ) ); ?>[]" class="widefat">
            <?php foreach( $tax_tags as $tax_tag ) : ?>
                <option value="<?php echo $tax_tag->term_id; ?>" <?php if ( is_array( $tags ) && in_array( $tax_tag->term_id, $tags ) ) echo ' selected="selected"'; ?>>
                    <?php echo $tax_tag->name; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'link' ); ?>"><?php _e( 'Link to full page:', 'latost' ); ?></label>
        <input type="text" id="<?php echo $this->get_field_id( 'link' ); ?>" name="<?php echo $this->get_field_name( 'link' ); ?>" value="<?php echo $link; ?>" class="widefat" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'limit' ); ?>"><?php _e( 'No. of posts to show:', 'latost' ); ?></label>
        <input type="text" id="<?php echo $this->get_field_id( 'limit' ); ?>" name="<?php echo $this->get_field_name( 'limit' ); ?>" value="<?php echo $limit; ?>" class="small-text" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'length' ); ?>"><?php _e( 'Length of the excerpt:', 'latost' ); ?></label>
        <input type="text" id="<?php echo $this->get_field_id( 'length' ); ?>" name="<?php echo $this->get_field_name( 'length' ); ?>" value="<?php echo $length; ?>" class="small-text" />
    </p>
    <p>
        <input id="<?php echo esc_attr( $this->get_field_id( 'image' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'image' ) ); ?>" type="checkbox" value="1" <?php checked( '1', $image ); ?> />
        <label for="<?php echo $this->get_field_id( 'image' ); ?>"><?php _e( 'Show Image', 'latost' ); ?></label>
    </p>
    <p>
        <input id="<?php echo esc_attr( $this->get_field_id( 'date' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'date' ) ); ?>" type="checkbox" value="1" <?php checked( '1', $date ); ?> />
        <label for="<?php echo $this->get_field_id( 'date' ); ?>"><?php _e( 'Show Date', 'latost' ); ?></label>
    </p>
</div>
