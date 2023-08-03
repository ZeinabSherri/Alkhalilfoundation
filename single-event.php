<?php get_header(); ?>

<section class="single-event">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article class="event-post">
            <h2><?php the_title(); ?></h2>
            <div class="event-content"><?php the_content(); ?></div>
            <!-- Additional custom fields or information specific to events post type can be displayed here -->
        </article>
    <?php endwhile; endif; ?>
</section>

<?php get_footer(); ?>