<?php
$current_post_id = get_the_ID(); // Get the current post ID
$related_posts_args = array(
    'category__in' => wp_get_post_categories($current_post_id),
    'posts_per_page' => 3, 
    'post__not_in' => array($current_post_id),
    'orderby' => 'rand'
);
$related_posts_query = new WP_Query( $related_posts_args ); 
?>

<div class="reporteri_related">
    <div class="related-col">
        <img style="width:300px; height: 250px;" src="/wp-content/uploads/2023/03/reklama.jpg">
    </div>
    <?php if ( $related_posts_query->have_posts() ) : ?>
    <div class="related-col">
        <div class="block-heading"><h3>Lexo edhe:</h3></div>
        <ul class="block-related-list">
        <?php while ( $related_posts_query->have_posts() ) : $related_posts_query->the_post(); ?>
            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
        <?php endwhile; ?>
        </ul>
    </div>
    <?php 
        endif; 
        wp_reset_postdata(); 
    ?>
</div>