<?php

/**
 * Media Content Spa Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = get_field('id') ? get_field('id') : 'media-content-spa-' . $block['id'];

// Create class attribute allowing for custom "className" and "align" values.
$className = 'media-content media-content-spa';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
// Load values and assign defaults.
$image = get_field('image');
$video = get_field('video');
$logo = get_field('spa_logo');
$heading = get_field('heading');
$subheading = get_field('sub_heading');
$text = get_field('text');
$cta = get_field('cta');
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <?php if ($image || $video) : ?>
            <div class="media-content__media">
                <?php 
                    get_template_part( 'templates/content-modules', 'image', array(
                        'image' => $image,
                        'video' => $video
                    ) );
                ?>
                <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" class="spa-logo a-up a-delay-3">
            </div>
        <?php endif; ?>
        <div class="media-content__content">
            <?php if ($heading) : ?>
                <h2 class="media-content__title a-up"><?php echo $heading; ?></h2>
            <?php endif; ?>
            <?php if( $subheading ): ?>
                <h6 class="media-content__subtitle a-up a-delay-1"><?php echo $subheading; ?></h6>
            <?php endif; ?>
            <?php if (have_rows('links')) : ?>
                <div class="media-content-spa__links a-up a-delay-2">
                    <?php while (have_rows('links')) : the_row(); 
                        $link = get_sub_field('link'); ?>
                        <?php if( $link['url'] == '#' ): ?>
                            <span class="media-content-spa__link dead-link">
                                <?php echo $link['title']; ?>
                            </span>
                        <?php else: ?>
                            <a href="<?php echo $link['url']; ?>" class="media-content-spa__link" target="<?php echo $link['target']; ?>">
                                <?php echo $link['title']; ?>
                            </a>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
            <?php if ($text) : ?>
                <div class="media-content__text a-up a-delay-3">
                    <?php echo $text; ?>
                </div>
            <?php endif; ?>
            <?php if ($cta) : ?>
                <a href="<?php echo $cta['url']; ?>" 
                    class="btn media-content__btn a-up a-delay-4" 
                    target="<?php echo $cta['target']; ?>">
                    <?php echo $cta['title']; ?>
                </a>
            <?php endif; ?>
        </div>
    </div>
</section>