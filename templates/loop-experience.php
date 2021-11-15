<?php
$id = $args['post'];
$title = get_the_title( $id );
$excerpt = get_the_excerpt( $id );
$cta = get_field('cta', $id);
$image = get_field( 'image', $id );
$img_src = $image['sizes']['culinary-grid'];
$img_src_2x = $image['sizes']['culinary-grid-2x'];
if ( get_post_type( $id ) == 'offer' ) :
    $day = get_the_date('d', $id);
    $month = get_the_date('M', $id);
else : 
    $day = tribe_get_start_date($id, false, 'd');
    $month = tribe_get_start_date($id, false, 'M');
    $img_src = get_the_post_thumbnail( $id, 'culinary-grid' );
    $img_src_2x = get_the_post_thumbnail( $id, 'culinary-grid-2x' );
endif; ?>
<article class="loop-culinary" data-id="<?php echo $id; ?>">
    <div class="loop-culinary__image gradient-overlay">
        <a href="<?php echo get_the_permalink( $id ); ?>">
        <div class="img-a">
            <div class="img-a-img gradient-overlay">
                <img src="<?php echo $img_src; ?>" 
                    <?php echo $img_src_2x ? 'srcset="' . $img_src_2x . '"' : ''; ?> 
                    alt="<?php echo $title; ?>" class="loop-culinary__bg">
            </div>
        </div>
        <h6 class="loop-culinary__title a-up"><?php echo $title; ?></h6>
        </a>
    </div>
    <div class="loop-culinary__date a-up a-delay-1">
        <span class="loop-culinary__date--day"><?php echo $day; ?></span>
        <span class="loop-culinary__date--month"><?php echo $month; ?></span>
    </div>
    <div class="loop-culinary__content">
        <?php if ($excerpt) : ?>
            <p class="loop-culinary__excerpt a-up a-delay-2"><?php echo $excerpt; ?></p>
        <?php endif; ?>
    </div>
</article>