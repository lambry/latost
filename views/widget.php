<?php
/**
 * Widget output template.
 */

// Filter title
if ( ! empty( $title ) ) {
	echo $before_title . apply_filters( 'widget_title', $title ) . $after_title;
} ?>

<div class="posts-widget">
	<?php foreach ( $posts as $post ) : setup_postdata( $post ); ?>
		<div class="posts-widget-post">
			<h4 class="posts-widget-title">
				<a href="<?php the_permalink(); ?>" title="<?php printf( 'Permalink to %s', the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h4>
			<?php if ( $pw_image && has_post_thumbnail() ) { ?>
				<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'posts-widget' ), the_title_attribute('echo=0' ) ); ?>" rel="bookmark">
					<?php the_post_thumbnail( 'thumbnail', [ 'class' => 'posts-widget-image', 'alt' => esc_attr(get_the_title() ), 'title' => esc_attr( get_the_title() ) ] ); ?>
				</a>
			<?php } ?>
			<?php if ( $pw_date ) { ?>
				<time class="posts-widget-time" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date( 'F, Y' ) ); ?></time>
			<?php } ?>

			<?php if ( $pw_length !== 0 ) { ?>
				<div class="posts-widget-excerpt">
					<?php echo substr( get_the_excerpt(), 0, $pw_length );	?>&hellip;
					<a href="<?php the_permalink(); ?>" class="posts-widget-more"><?php _e( 'Read More', 'mild-pw' ); ?></a>
				</div>
			<?php } ?>
		</div>
	<?php endforeach; ?>
		<?php if ( $pw_link ) { ?>
            <a href="<?php echo $pw_link; ?>" class="posts-widget-link"><?php _e( '- View More -', 'mild-pw' ); ?></a>
		<?php } ?>
	<?php wp_reset_postdata(); ?>
</div>
