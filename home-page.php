<?php
/**
 * Template Name: home-page
 */

get_header(); ?>

<main class="main-page">
    <div class="content-wrap">
        <div class="main-page__blog-wrap">
            <?php
            $custom_query_args = array(
                'post_type' => 'omega',
                'post_status' => 'publish',
                'order' => 'DESC', // 'ASC'
            );
            $query = new WP_Query($custom_query_args);
            while ( $query->have_posts() ) {
                $query->the_post();
                ?>
            <div class="main-page__blog-item">
                <img src="<?php the_field('omega-Img'); ?>" alt="img">
                <h3><?php the_field('omega-title'); ?></h3>
                <p><?php the_field('omega-text'); ?></p>
                <a href="<?php the_field('omega-link'); ?>">
                    <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3.71786 13.3554C3.91425 13.5495 4.23082 13.5477 4.42495 13.3513L7.58849 10.151C7.78262 9.9546 7.78079 9.63802 7.5844 9.44389C7.38801 9.24976 7.07144 9.25159 6.87731 9.44798L4.06528 12.2927L1.22055 9.48067C1.02416 9.28654 0.707582 9.28837 0.513452 9.48476C0.319322 9.68115 0.321151 9.99773 0.517539 10.1919L3.71786 13.3554ZM3.50001 1.00289L3.56937 13.0027L4.56935 12.9969L4.49999 0.99711L3.50001 1.00289Z"
                              fill="#0067A3"/>
                    </svg>
                    <span>Show more</span>
                </a>
            </div>
            <?php
            }
            wp_reset_postdata();
            ?>
        </div>
    </div>
</main>
<?php get_footer(); ?>
