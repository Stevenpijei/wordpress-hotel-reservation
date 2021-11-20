<?php

/**
 * Single Room Booking Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = get_field('id') ? get_field('id') : 'culinary-detail-' . $block['id'];

// Create class attribute allowing for custom "className" and "align" values.
$className = 'culinary-detail';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$direction = get_field( 'direction' );
$heading = get_field( 'heading' );
$sub_heading = get_field( 'sub_heading' );
$description = get_field( 'description' );
$images = get_field( 'images' );
$content = get_field( 'content' );
$className .= $direction == 'true' ? ' culinary-detail--right' : ' culinary-detail--left'
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <div class="culinary-detail__inner">
            <?php if( $images ): ?>
            <div class="culinary-detail__images a-up">
                <?php foreach( $images as $image ): ?>
                    <div class="culinary-detail__image">
                        <img class="lazyload" 
                            data-src="<?php echo $image['sizes']['culinary-detail']; ?>" 
                            data-srcset="<?php echo $image['sizes']['culinary-detail-2x']; ?>"
                            alt="">
                    </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
            <div class="culinary-detail__content a-up a-delay-1">
                <?php if( $content ): ?>
                    <div class="culinary-detail__text">
                        <?php echo $content; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
