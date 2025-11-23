<?php get_header(); ?>

<main class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-6">

        <h1 class="text-4xl font-bold mb-10 text-center">
            <?php echo get_the_archive_title(); ?>
        </h1>

        <div class="grid md:grid-cols-3 gap-10">

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <div class="bg-gray-50 p-6 rounded-lg shadow hover:shadow-lg transition">
                    <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('medium', ['class' => 'rounded-md mb-4']); ?>
                        </a>
                    <?php endif; ?>

                    <h2 class="text-xl font-bold mb-2">
                        <a href="<?php the_permalink(); ?>" class="hover:text-blue-600">
                            <?php the_title(); ?>
                        </a>
                    </h2>

                    <p class="text-gray-600 text-sm">
                        <?php echo wp_trim_words(get_the_excerpt(), 15); ?>
                    </p>
                </div>

            <?php endwhile; else : ?>

                <p class="text-gray-500">No posts found.</p>

            <?php endif; ?>
        </div>

    </div>
</main>

<?php get_footer(); ?>
