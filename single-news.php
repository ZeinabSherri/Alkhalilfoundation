<?php get_header(); ?>

<section class="single-news">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article class="news-post">
            <h2><?php the_title(); ?></h2>
            <div class="news-content"><?php the_content(); ?></div>
            <!-- Additional custom fields or information specific to news post type can be displayed here -->
        </article>
    <?php endwhile; endif; ?>
</section>

<?php get_footer(); ?>