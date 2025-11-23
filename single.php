<?php get_header(); ?>

<main class="py-20 bg-gray-50">
    <div class="max-w-3xl mx-auto px-6">

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <h1 class="text-4xl font-bold mb-6"><?php the_title(); ?></h1>

            <p class="text-gray-500 text-sm mb-6">
                Published on <?php echo get_the_date(); ?> • By <?php the_author(); ?>
            </p>

            <?php if (has_post_thumbnail()) : ?>
                <img src="<?php the_post_thumbnail_url('large'); ?>"
                     class="rounded-xl shadow mb-10">
            <?php endif; ?>

            <div class="prose max-w-none">
                <?php the_content(); ?>
            </div>

            <a href="<?php echo site_url('/blog'); ?>"
               class="inline-block mt-12 text-blue-600 hover:underline">
               ← Back to Blog
            </a>

        <?php endwhile; endif; ?>

    </div>
</main>

<?php get_footer(); ?>
