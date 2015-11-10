<?php
/**
 * Widget output template.
 */

// Filter title
if ( ! empty( $title ) ) {
	echo $before_title . apply_filters( 'widget_title', $title ) . $after_title;
} ?>

<div class="latost">
	<?php foreach ( $posts as $post ) : setup_postdata( $post ); ?>
		<div class="latost-post">
			<h4 class="latost-title">
				<a href="<?php the_permalink(); ?>" title="<?php printf( 'Permalink to %s', the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h4>
			<?php if ( $image && has_post_thumbnail() ) : ?>
				<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'latost' ), the_title_attribute('echo=0' ) ); ?>" rel="bookmark">
					<?php the_post_thumbnail( 'thumbnail', [ 'class' => 'latost-image', 'alt' => esc_attr( get_the_title() ), 'title' => esc_attr( get_the_title() ) ] ); ?>
				</a>
			<?php endif; ?>
			<?php if ( $date ) : ?>
				<time class="latost-time" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date( 'F, Y' ) ); ?></time>
			<?php endif; ?>

			<?php if ( $length !== 0 ) : ?>
				<div class="latost-excerpt">
					<?php echo substr( get_the_excerpt(), 0, $length );	?>&hellip;
					<a href="<?php the_permalink(); ?>" class="latost-more"><?php _e( 'Read More', 'latost' ); ?></a>
				</div>
			<?php endif; ?>
		</div>
	<?php endforeach; ?>
		<?php if ( $link ) : ?>
            <a href="<?php echo $link; ?>" class="latost-link"><?php _e( '- View More -', 'latost' ); ?></a>
		<?php endif; ?>
	<?php wp_reset_postdata(); ?>
</div>
