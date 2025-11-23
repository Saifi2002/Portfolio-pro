<?php get_header(); ?>

<main class="py-20 bg-gray-50">
    <div class="max-w-5xl mx-auto px-6">

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <!-- Project Title -->
            <h1 class="text-4xl font-bold mb-6"><?php the_title(); ?></h1>

            <!-- Featured Image -->
            <?php if (has_post_thumbnail()) : ?>
                <img src="<?php the_post_thumbnail_url('large'); ?>" 
                     alt="<?php the_title(); ?>" 
                     class="rounded-xl shadow-md mb-10 w-full">
            <?php endif; ?>

            <!-- Project Content -->
            <div class="prose max-w-none">
                <?php the_content(); ?>
            </div>

            <!-- Back Button -->
            <a href="<?php echo site_url('/projects'); ?>"
               class="inline-block mt-10 text-blue-600 font-semibold hover:underline">
                ← Back to Projects
            </a>

        <?php endwhile; endif; ?>

    </div>
</main>

<?php get_footer(); ?>
