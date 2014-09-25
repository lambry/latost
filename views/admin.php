<?php
/**
 * Widget admin template.
 */
?>
<div class="posts-widget-container">
    <div class="posts-widget-row">
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'mild-pw' ); ?></label>
        <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $title; ?>" class="widefat" />
    </div>
    <div class="posts-widget-row">
        <label for="<?php echo esc_attr( $this->get_field_id( 'pw_cats' ) ); ?>"><?php _e( 'Categories:', 'mild-pw' ); ?></label>
        <select multiple="multiple" id="<?php echo esc_attr( $this->get_field_id( 'pw_cats' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'pw_cats' ) ); ?>[]" class="widefat">
            <optgroup label="categories">
                <?php $categories = get_terms( 'category' ); ?>
                <?php foreach( $categories as $category ) { ?>
                    <option value="<?php echo $category->term_id; ?>" <?php if ( is_array( $pw_cats ) && in_array( $category->term_id, $pw_cats ) ) echo ' selected="selected"'; ?>><?php echo $category->name; ?></option>
                <?php } ?>
            </optgroup>
        </select>
    </div>
    <div class="posts-widget-row">
        <label for="<?php echo esc_attr( $this->get_field_id( 'pw_tags' ) ); ?>"><?php _e( 'Tags:', 'mild-pw' ); ?></label>
        <select multiple="multiple" id="<?php echo esc_attr( $this->get_field_id( 'pw_tags' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'pw_tags' ) ); ?>[]" class="widefat">
            <optgroup label="tags">
                <?php $tags = get_terms( 'post_tag' ); ?>
                <?php foreach( $tags as $tag ) { ?>
                    <option value="<?php echo $tag->term_id; ?>" <?php if ( is_array( $pw_tags ) && in_array( $tag->term_id, $pw_tags ) ) echo ' selected="selected"'; ?>><?php echo $tag->name; ?></option>
                <?php } ?>
            </optgroup>
        </select>
    </div>
    <div class="posts-widget-row">
        <h4><?php _e( 'Settings', 'mild-pw' ); ?></h4>
    </div>
    <div class="posts-widget-row">
        <label for="<?php echo $this->get_field_id( 'pw_link' ); ?>"><?php _e( 'Link to full page:', 'mild-pw' ); ?></label>
        <input type="text" id="<?php echo $this->get_field_id( 'pw_link' ); ?>" name="<?php echo $this->get_field_name( 'pw_link' ); ?>" value="<?php echo $pw_link; ?>" class="widefat" />
    </div>
    <div class="posts-widget-row">
        <label for="<?php echo $this->get_field_id( 'pw_limit' ); ?>"><?php _e( 'No. of posts to show:', 'mild-pw' ); ?></label>
        <input type="text" id="<?php echo $this->get_field_id( 'pw_limit' ); ?>" name="<?php echo $this->get_field_name( 'pw_limit' ); ?>" value="<?php echo $pw_limit; ?>" class="small-text" />
    </div>
    <div class="posts-widget-row">
        <label for="<?php echo $this->get_field_id( 'pw_length' ); ?>"><?php _e( 'Length of the excerpt:', 'mild-pw' ); ?></label>
        <input type="text" id="<?php echo $this->get_field_id( 'pw_length' ); ?>" name="<?php echo $this->get_field_name( 'pw_length' ); ?>" value="<?php echo $pw_length; ?>" class="small-text" />
    </div>
    <div class="posts-widget-row">
        <input id="<?php echo esc_attr( $this->get_field_id( 'pw_image' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'pw_image' ) ); ?>" type="checkbox" value="1" <?php checked( '1', $pw_image ); ?> />
        <label for="<?php echo $this->get_field_id( 'pw_image' ); ?>"><?php _e( 'Show Image', 'mild-pw' ); ?></label>
    </div>
    <div class="posts-widget-row">
        <input id="<?php echo esc_attr( $this->get_field_id( 'pw_date' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'pw_date' ) ); ?>" type="checkbox" value="1" <?php checked( '1', $pw_date ); ?> />
        <label for="<?php echo $this->get_field_id( 'pw_date' ); ?>"><?php _e( 'Show Date', 'mild-pw' ); ?></label>
    </div>
</div>
